<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransportRequest;
use App\Http\Requests\StoreTransportRequest;
use App\Http\Requests\UpdateTransportRequest;
use App\Models\Transport;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transport_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transports = Transport::all();

        return view('admin.transports.index', compact('transports'));
    }

    public function create()
    {
        abort_if(Gate::denies('transport_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.transports.create');
    }

    public function store(StoreTransportRequest $request)
    {
        $transport = Transport::create($request->all());

        return redirect()->route('admin.transports.index');
    }

    public function edit(Transport $transport)
    {
        abort_if(Gate::denies('transport_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.transports.edit', compact('transport'));
    }

    public function update(UpdateTransportRequest $request, Transport $transport)
    {
        $transport->update($request->all());

        return redirect()->route('admin.transports.index');
    }

    public function show(Transport $transport)
    {
        abort_if(Gate::denies('transport_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.transports.show', compact('transport'));
    }

    public function destroy(Transport $transport)
    {
        abort_if(Gate::denies('transport_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transport->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransportRequest $request)
    {
        $transports = Transport::find(request('ids'));

        foreach ($transports as $transport) {
            $transport->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
