<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRaportRequest;
use App\Http\Requests\UpdateRaportRequest;
use App\Http\Resources\Admin\RaportResource;
use App\Models\Raport;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RaportApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('raport_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RaportResource(Raport::with(['crane_sn'])->get());
    }

    public function store(StoreRaportRequest $request)
    {
        $raport = Raport::create($request->all());

        return (new RaportResource($raport))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Raport $raport)
    {
        abort_if(Gate::denies('raport_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RaportResource($raport->load(['crane_sn']));
    }

    public function update(UpdateRaportRequest $request, Raport $raport)
    {
        $raport->update($request->all());

        return (new RaportResource($raport))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Raport $raport)
    {
        abort_if(Gate::denies('raport_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $raport->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
