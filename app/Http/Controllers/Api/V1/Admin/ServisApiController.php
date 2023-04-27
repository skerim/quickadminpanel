<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiRequest;
use App\Http\Requests\UpdateServiRequest;
use App\Http\Resources\Admin\ServiResource;
use App\Models\Servi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServisApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('servi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiResource(Servi::with(['crane', 'project', 'conservator'])->get());
    }

    public function store(StoreServiRequest $request)
    {
        $servi = Servi::create($request->all());

        return (new ServiResource($servi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Servi $servi)
    {
        abort_if(Gate::denies('servi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiResource($servi->load(['crane', 'project', 'conservator']));
    }

    public function update(UpdateServiRequest $request, Servi $servi)
    {
        $servi->update($request->all());

        return (new ServiResource($servi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Servi $servi)
    {
        abort_if(Gate::denies('servi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $servi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
