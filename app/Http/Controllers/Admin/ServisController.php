<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServiRequest;
use App\Http\Requests\StoreServiRequest;
use App\Http\Requests\UpdateServiRequest;
use App\Models\Crane;
use App\Models\Project;
use App\Models\Servi;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServisController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('servi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servis = Servi::with(['crane', 'project', 'conservator'])->get();

        return view('admin.servis.index', compact('servis'));
    }

    public function create()
    {
        abort_if(Gate::denies('servi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cranes = Crane::pluck('sn', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $conservators = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.servis.create', compact('conservators', 'cranes', 'projects'));
    }

    public function store(StoreServiRequest $request)
    {
        $servi = Servi::create($request->all());

        return redirect()->route('admin.servis.index');
    }

    public function edit(Servi $servi)
    {
        abort_if(Gate::denies('servi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cranes = Crane::pluck('sn', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $conservators = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $servi->load('crane', 'project', 'conservator');

        return view('admin.servis.edit', compact('conservators', 'cranes', 'projects', 'servi'));
    }

    public function update(UpdateServiRequest $request, Servi $servi)
    {
        $servi->update($request->all());

        return redirect()->route('admin.servis.index');
    }

    public function show(Servi $servi)
    {
        abort_if(Gate::denies('servi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servi->load('crane', 'project', 'conservator');

        return view('admin.servis.show', compact('servi'));
    }

    public function destroy(Servi $servi)
    {
        abort_if(Gate::denies('servi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servi->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiRequest $request)
    {
        $servis = Servi::find(request('ids'));

        foreach ($servis as $servi) {
            $servi->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
