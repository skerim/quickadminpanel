<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProducerRequest;
use App\Http\Requests\StoreProducerRequest;
use App\Http\Requests\UpdateProducerRequest;
use App\Models\Producer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProducerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('producer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producers = Producer::all();

        return view('admin.producers.index', compact('producers'));
    }

    public function create()
    {
        abort_if(Gate::denies('producer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.producers.create');
    }

    public function store(StoreProducerRequest $request)
    {
        $producer = Producer::create($request->all());

        return redirect()->route('admin.producers.index');
    }

    public function edit(Producer $producer)
    {
        abort_if(Gate::denies('producer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.producers.edit', compact('producer'));
    }

    public function update(UpdateProducerRequest $request, Producer $producer)
    {
        $producer->update($request->all());

        return redirect()->route('admin.producers.index');
    }

    public function show(Producer $producer)
    {
        abort_if(Gate::denies('producer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producer->load('producerCranes');

        return view('admin.producers.show', compact('producer'));
    }

    public function destroy(Producer $producer)
    {
        abort_if(Gate::denies('producer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producer->delete();

        return back();
    }

    public function massDestroy(MassDestroyProducerRequest $request)
    {
        $producers = Producer::find(request('ids'));

        foreach ($producers as $producer) {
            $producer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
