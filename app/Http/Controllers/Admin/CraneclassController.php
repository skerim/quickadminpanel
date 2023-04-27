<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCraneclassRequest;
use App\Http\Requests\StoreCraneclassRequest;
use App\Http\Requests\UpdateCraneclassRequest;
use App\Models\Craneclass;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CraneclassController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('craneclass_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $craneclasses = Craneclass::all();

        return view('admin.craneclasses.index', compact('craneclasses'));
    }

    public function create()
    {
        abort_if(Gate::denies('craneclass_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.craneclasses.create');
    }

    public function store(StoreCraneclassRequest $request)
    {
        $craneclass = Craneclass::create($request->all());

        return redirect()->route('admin.craneclasses.index');
    }

    public function edit(Craneclass $craneclass)
    {
        abort_if(Gate::denies('craneclass_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.craneclasses.edit', compact('craneclass'));
    }

    public function update(UpdateCraneclassRequest $request, Craneclass $craneclass)
    {
        $craneclass->update($request->all());

        return redirect()->route('admin.craneclasses.index');
    }

    public function show(Craneclass $craneclass)
    {
        abort_if(Gate::denies('craneclass_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.craneclasses.show', compact('craneclass'));
    }

    public function destroy(Craneclass $craneclass)
    {
        abort_if(Gate::denies('craneclass_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $craneclass->delete();

        return back();
    }

    public function massDestroy(MassDestroyCraneclassRequest $request)
    {
        $craneclasses = Craneclass::find(request('ids'));

        foreach ($craneclasses as $craneclass) {
            $craneclass->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
