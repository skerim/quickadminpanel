<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKlimatyzacjaRequest;
use App\Http\Requests\StoreKlimatyzacjaRequest;
use App\Http\Requests\UpdateKlimatyzacjaRequest;
use App\Models\Crane;
use App\Models\Klimatyzacja;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KlimatyzacjaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('klimatyzacja_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $klimatyzacjas = Klimatyzacja::with(['crane'])->get();

        return view('admin.klimatyzacjas.index', compact('klimatyzacjas'));
    }

    public function create()
    {
        abort_if(Gate::denies('klimatyzacja_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cranes = Crane::pluck('sn', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.klimatyzacjas.create', compact('cranes'));
    }

    public function store(StoreKlimatyzacjaRequest $request)
    {
        $klimatyzacja = Klimatyzacja::create($request->all());

        return redirect()->route('admin.klimatyzacjas.index');
    }

    public function edit(Klimatyzacja $klimatyzacja)
    {
        abort_if(Gate::denies('klimatyzacja_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cranes = Crane::pluck('sn', 'id')->prepend(trans('global.pleaseSelect'), '');

        $klimatyzacja->load('crane');

        return view('admin.klimatyzacjas.edit', compact('cranes', 'klimatyzacja'));
    }

    public function update(UpdateKlimatyzacjaRequest $request, Klimatyzacja $klimatyzacja)
    {
        $klimatyzacja->update($request->all());

        return redirect()->route('admin.klimatyzacjas.index');
    }

    public function show(Klimatyzacja $klimatyzacja)
    {
        abort_if(Gate::denies('klimatyzacja_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $klimatyzacja->load('crane');

        return view('admin.klimatyzacjas.show', compact('klimatyzacja'));
    }

    public function destroy(Klimatyzacja $klimatyzacja)
    {
        abort_if(Gate::denies('klimatyzacja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $klimatyzacja->delete();

        return back();
    }

    public function massDestroy(MassDestroyKlimatyzacjaRequest $request)
    {
        $klimatyzacjas = Klimatyzacja::find(request('ids'));

        foreach ($klimatyzacjas as $klimatyzacja) {
            $klimatyzacja->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
