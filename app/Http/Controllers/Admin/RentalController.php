<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRentalRequest;
use App\Http\Requests\StoreRentalRequest;
use App\Http\Requests\UpdateRentalRequest;
use App\Models\Crane;
use App\Models\Project;
use App\Models\Rental;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RentalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rental_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rentals = Rental::with(['cranes', 'project'])->get();

        return view('admin.rentals.index', compact('rentals'));
    }

    public function create()
    {
        abort_if(Gate::denies('rental_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cranes = Crane::all()->pluck('sn', 'id');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rentals.create', compact('cranes', 'projects'));
    }

    public function store(StoreRentalRequest $request)
    {
        $rental = Rental::create($request->all());
        $rental->cranes()->sync($request->input('cranes', []));

        return redirect()->route('admin.rentals.index');
    }

    public function edit(Rental $rental)
    {
        abort_if(Gate::denies('rental_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cranes = Crane::all()->pluck('sn', 'id');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rental->load('cranes', 'project');

        return view('admin.rentals.edit', compact('cranes', 'projects', 'rental'));
    }

    public function update(UpdateRentalRequest $request, Rental $rental)
    {
        $rental->update($request->all());
        $rental->cranes()->sync($request->input('cranes', []));

        return redirect()->route('admin.rentals.index');
    }

    public function show(Rental $rental)
    {
        abort_if(Gate::denies('rental_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rental->load('cranes', 'project', 'rentalProjects');

        return view('admin.rentals.show', compact('rental'));
    }

    public function destroy(Rental $rental)
    {
        abort_if(Gate::denies('rental_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rental->delete();

        return back();
    }

    public function massDestroy(MassDestroyRentalRequest $request)
    {
        Rental::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
