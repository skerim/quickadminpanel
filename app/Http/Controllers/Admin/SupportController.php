<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySupportRequest;
use App\Http\Requests\StoreSupportRequest;
use App\Http\Requests\UpdateSupportRequest;
use App\Models\Crane;
use App\Models\Customer;
use App\Models\Support;
use App\Models\Transport;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SupportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('support_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supports = Support::with(['crane', 'kontrahent', 'transport'])->get();

        return view('admin.supports.index', compact('supports'));
    }

    public function create()
    {
        abort_if(Gate::denies('support_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cranes = Crane::pluck('sn', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kontrahents = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transports = Transport::pluck('transport', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.supports.create', compact('cranes', 'kontrahents', 'transports'));
    }

    public function store(StoreSupportRequest $request)
    {
        $support = Support::create($request->all());

        return redirect()->route('admin.supports.index');
    }

    public function edit(Support $support)
    {
        abort_if(Gate::denies('support_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cranes = Crane::pluck('sn', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kontrahents = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transports = Transport::pluck('transport', 'id')->prepend(trans('global.pleaseSelect'), '');

        $support->load('crane', 'kontrahent', 'transport');

        return view('admin.supports.edit', compact('cranes', 'kontrahents', 'support', 'transports'));
    }

    public function update(UpdateSupportRequest $request, Support $support)
    {
        $support->update($request->all());

        return redirect()->route('admin.supports.index');
    }

    public function show(Support $support)
    {
        abort_if(Gate::denies('support_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $support->load('crane', 'kontrahent', 'transport');

        return view('admin.supports.show', compact('support'));
    }

    public function destroy(Support $support)
    {
        abort_if(Gate::denies('support_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $support->delete();

        return back();
    }

    public function massDestroy(MassDestroySupportRequest $request)
    {
        $supports = Support::find(request('ids'));

        foreach ($supports as $support) {
            $support->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
