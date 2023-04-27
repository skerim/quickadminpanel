<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProducerRequest;
use App\Http\Requests\UpdateProducerRequest;
use App\Http\Resources\Admin\ProducerResource;
use App\Models\Producer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProducerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('producer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProducerResource(Producer::all());
    }

    public function store(StoreProducerRequest $request)
    {
        $producer = Producer::create($request->all());

        return (new ProducerResource($producer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Producer $producer)
    {
        abort_if(Gate::denies('producer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProducerResource($producer);
    }

    public function update(UpdateProducerRequest $request, Producer $producer)
    {
        $producer->update($request->all());

        return (new ProducerResource($producer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Producer $producer)
    {
        abort_if(Gate::denies('producer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
