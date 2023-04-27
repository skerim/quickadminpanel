<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRaportRequest;
use App\Http\Requests\StoreRaportRequest;
use App\Http\Requests\UpdateRaportRequest;
use App\Models\Crane;
use App\Models\Raport;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RaportController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('raport_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Raport::with(['crane_sn'])->select(sprintf('%s.*', (new Raport())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'raport_show';
                $editGate = 'raport_edit';
                $deleteGate = 'raport_delete';
                $crudRoutePart = 'raports';

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
            $table->addColumn('crane_sn_sn', function ($row) {
                return $row->crane_sn ? $row->crane_sn->sn : '';
            });

            $table->editColumn('start', function ($row) {
                return $row->start ? $row->start : '';
            });
            $table->editColumn('stop', function ($row) {
                return $row->stop ? $row->stop : '';
            });
            $table->editColumn('work', function ($row) {
                return $row->work ? $row->work : '';
            });
            $table->editColumn('engine', function ($row) {
                return $row->engine ? $row->engine : '';
            });
            $table->editColumn('gps_kraj', function ($row) {
                return $row->gps_kraj ? $row->gps_kraj : '';
            });
            $table->editColumn('gps_woj', function ($row) {
                return $row->gps_woj ? $row->gps_woj : '';
            });
            $table->editColumn('gps_city', function ($row) {
                return $row->gps_city ? $row->gps_city : '';
            });
            $table->editColumn('gps_ulica', function ($row) {
                return $row->gps_ulica ? $row->gps_ulica : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'crane_sn']);

            return $table->make(true);
        }

        $cranes = Crane::get();

        return view('admin.raports.index', compact('cranes'));
    }

    public function create()
    {
        abort_if(Gate::denies('raport_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crane_sns = Crane::pluck('sn', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.raports.create', compact('crane_sns'));
    }

    public function store(StoreRaportRequest $request)
    {
        $raport = Raport::create($request->all());

        return redirect()->route('admin.raports.index');
    }

    public function edit(Raport $raport)
    {
        abort_if(Gate::denies('raport_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crane_sns = Crane::pluck('sn', 'id')->prepend(trans('global.pleaseSelect'), '');

        $raport->load('crane_sn');

        return view('admin.raports.edit', compact('crane_sns', 'raport'));
    }

    public function update(UpdateRaportRequest $request, Raport $raport)
    {
        $raport->update($request->all());

        return redirect()->route('admin.raports.index');
    }

    public function show(Raport $raport)
    {
        abort_if(Gate::denies('raport_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $raport->load('crane_sn');

        return view('admin.raports.show', compact('raport'));
    }

    public function destroy(Raport $raport)
    {
        abort_if(Gate::denies('raport_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $raport->delete();

        return back();
    }

    public function massDestroy(MassDestroyRaportRequest $request)
    {
        Raport::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
