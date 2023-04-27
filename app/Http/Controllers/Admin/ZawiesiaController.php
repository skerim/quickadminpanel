<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyZawiesiumRequest;
use App\Http\Requests\StoreZawiesiumRequest;
use App\Http\Requests\UpdateZawiesiumRequest;
use App\Models\Crane;
use App\Models\Zawiesium;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ZawiesiaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('zawiesium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zawiesia = Zawiesium::with(['crane', 'media'])->get();

        return view('admin.zawiesia.index', compact('zawiesia'));
    }

    public function create()
    {
        abort_if(Gate::denies('zawiesium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cranes = Crane::pluck('sn', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.zawiesia.create', compact('cranes'));
    }

    public function store(StoreZawiesiumRequest $request)
    {
        $zawiesium = Zawiesium::create($request->all());

        if ($request->input('certificate_file', false)) {
            $zawiesium->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate_file'))))->toMediaCollection('certificate_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $zawiesium->id]);
        }

        return redirect()->route('admin.zawiesia.index');
    }

    public function edit(Zawiesium $zawiesium)
    {
        abort_if(Gate::denies('zawiesium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cranes = Crane::pluck('sn', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zawiesium->load('crane');

        return view('admin.zawiesia.edit', compact('cranes', 'zawiesium'));
    }

    public function update(UpdateZawiesiumRequest $request, Zawiesium $zawiesium)
    {
        $zawiesium->update($request->all());

        if ($request->input('certificate_file', false)) {
            if (! $zawiesium->certificate_file || $request->input('certificate_file') !== $zawiesium->certificate_file->file_name) {
                if ($zawiesium->certificate_file) {
                    $zawiesium->certificate_file->delete();
                }
                $zawiesium->addMedia(storage_path('tmp/uploads/' . basename($request->input('certificate_file'))))->toMediaCollection('certificate_file');
            }
        } elseif ($zawiesium->certificate_file) {
            $zawiesium->certificate_file->delete();
        }

        return redirect()->route('admin.zawiesia.index');
    }

    public function show(Zawiesium $zawiesium)
    {
        abort_if(Gate::denies('zawiesium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zawiesium->load('crane');

        return view('admin.zawiesia.show', compact('zawiesium'));
    }

    public function destroy(Zawiesium $zawiesium)
    {
        abort_if(Gate::denies('zawiesium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zawiesium->delete();

        return back();
    }

    public function massDestroy(MassDestroyZawiesiumRequest $request)
    {
        $zawiesia = Zawiesium::find(request('ids'));

        foreach ($zawiesia as $zawiesium) {
            $zawiesium->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('zawiesium_create') && Gate::denies('zawiesium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Zawiesium();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
