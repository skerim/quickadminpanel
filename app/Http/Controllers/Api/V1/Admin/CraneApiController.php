<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCraneRequest;
use App\Http\Requests\UpdateCraneRequest;
use App\Http\Resources\Admin\CraneResource;
use App\Models\Crane;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CraneApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('crane_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CraneResource(Crane::with(['type', 'producer'])->get());
    }

    public function store(StoreCraneRequest $request)
    {
        $crane = Crane::create($request->all());

        return (new CraneResource($crane))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Crane $crane)
    {
        abort_if(Gate::denies('crane_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CraneResource($crane->load(['type', 'producer']));
    }

    public function update(UpdateCraneRequest $request, Crane $crane)
    {
        $crane->update($request->all());

        return (new CraneResource($crane))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Crane $crane)
    {
        abort_if(Gate::denies('crane_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crane->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
