<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCraneRequest;
use App\Http\Requests\StoreCraneRequest;
use App\Http\Requests\UpdateCraneRequest;
use App\Models\Crane;
use App\Models\Craneclass;
use App\Models\Producer;
use App\Models\Type;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CraneController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('crane_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cranes = Crane::with(['type', 'producer', 'crane_class'])->get();

        return view('admin.cranes.index', compact('cranes'));
    }

    public function create()
    {
        abort_if(Gate::denies('crane_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = Type::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $producers = Producer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crane_classes = Craneclass::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cranes.create', compact('crane_classes', 'producers', 'types'));
    }

    public function store(StoreCraneRequest $request)
    {
        $crane = Crane::create($request->all());

        return redirect()->route('admin.cranes.index');
    }

    public function edit(Crane $crane)
    {
        abort_if(Gate::denies('crane_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = Type::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $producers = Producer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crane_classes = Craneclass::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crane->load('type', 'producer', 'crane_class');

        return view('admin.cranes.edit', compact('crane', 'crane_classes', 'producers', 'types'));
    }

    public function update(UpdateCraneRequest $request, Crane $crane)
    {
        $crane->update($request->all());

        return redirect()->route('admin.cranes.index');
    }

    public function show(Crane $crane)
    {
        abort_if(Gate::denies('crane_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crane->load('type', 'producer', 'crane_class', 'craneMaintenances', 'craneRentals', 'craneSnRaports', 'craneLinies', 'craneServis');

        return view('admin.cranes.show', compact('crane'));
    }

    public function destroy(Crane $crane)
    {
        abort_if(Gate::denies('crane_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crane->delete();

        return back();
    }

    public function massDestroy(MassDestroyCraneRequest $request)
    {
        $cranes = Crane::find(request('ids'));

        foreach ($cranes as $crane) {
            $crane->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
