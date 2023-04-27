<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLinyRequest;
use App\Http\Requests\StoreLinyRequest;
use App\Http\Requests\UpdateLinyRequest;
use App\Models\Crane;
use App\Models\Liny;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LinyController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('liny_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Liny::with(['crane'])->select(sprintf('%s.*', (new Liny)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'liny_show';
                $editGate      = 'liny_edit';
                $deleteGate    = 'liny_delete';
                $crudRoutePart = 'linies';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('diameter', function ($row) {
                return $row->diameter ? $row->diameter : '';
            });
            $table->editColumn('dostawca', function ($row) {
                return $row->dostawca ? $row->dostawca : '';
            });
            $table->addColumn('crane_sn', function ($row) {
                return $row->crane ? $row->crane->sn : '';
            });

            $table->editColumn('crane.udt', function ($row) {
                return $row->crane ? (is_string($row->crane) ? $row->crane : $row->crane->udt) : '';
            });
            $table->editColumn('crane.enova', function ($row) {
                return $row->crane ? (is_string($row->crane) ? $row->crane : $row->crane->enova) : '';
            });
            $table->editColumn('length', function ($row) {
                return $row->length ? $row->length : '';
            });
            $table->editColumn('certificate', function ($row) {
                return $row->certificate ? $row->certificate : '';
            });
            $table->editColumn('certificate_file', function ($row) {
                return $row->certificate_file ? '<a href="' . $row->certificate_file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('stan', function ($row) {
                return $row->stan ? $row->stan : '';
            });
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'crane', 'certificate_file']);

            return $table->make(true);
        }

        return view('admin.linies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('liny_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cranes = Crane::pluck('sn', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.linies.create', compact('cranes'));
    }

    public function store(StoreLinyRequest $request)
    {
        $liny = Liny::create($request->all());

        if ($request->input('certificate_file', false)) {
            $liny->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate_file'))))->toMediaCollection('certificate_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $liny->id]);
        }

        return redirect()->route('admin.linies.index');
    }

    public function edit(Liny $liny)
    {
        abort_if(Gate::denies('liny_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cranes = Crane::pluck('sn', 'id')->prepend(trans('global.pleaseSelect'), '');

        $liny->load('crane');

        return view('admin.linies.edit', compact('cranes', 'liny'));
    }

    public function update(UpdateLinyRequest $request, Liny $liny)
    {
        $liny->update($request->all());

        if ($request->input('certificate_file', false)) {
            if (! $liny->certificate_file || $request->input('certificate_file') !== $liny->certificate_file->file_name) {
                if ($liny->certificate_file) {
                    $liny->certificate_file->delete();
                }
                $liny->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate_file'))))->toMediaCollection('certificate_file');
            }
        } elseif ($liny->certificate_file) {
            $liny->certificate_file->delete();
        }

        return redirect()->route('admin.linies.index');
    }

    public function show(Liny $liny)
    {
        abort_if(Gate::denies('liny_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liny->load('crane');

        return view('admin.linies.show', compact('liny'));
    }

    public function destroy(Liny $liny)
    {
        abort_if(Gate::denies('liny_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liny->delete();

        return back();
    }

    public function massDestroy(MassDestroyLinyRequest $request)
    {
        $linies = Liny::find(request('ids'));

        foreach ($linies as $liny) {
            $liny->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('liny_create') && Gate::denies('liny_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Liny();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
