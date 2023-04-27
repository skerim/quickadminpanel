<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHarmonogramRequest;
use App\Http\Requests\StoreHarmonogramRequest;
use App\Http\Requests\UpdateHarmonogramRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HarmonogramController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('harmonogram_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harmonograms.index');
    }

    public function create()
    {
        abort_if(Gate::denies('harmonogram_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harmonograms.create');
    }

    public function store(StoreHarmonogramRequest $request)
    {
        $harmonogram = Harmonogram::create($request->all());

        return redirect()->route('admin.harmonograms.index');
    }

    public function edit(Harmonogram $harmonogram)
    {
        abort_if(Gate::denies('harmonogram_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harmonograms.edit', compact('harmonogram'));
    }

    public function update(UpdateHarmonogramRequest $request, Harmonogram $harmonogram)
    {
        $harmonogram->update($request->all());

        return redirect()->route('admin.harmonograms.index');
    }

    public function show(Harmonogram $harmonogram)
    {
        abort_if(Gate::denies('harmonogram_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harmonograms.show', compact('harmonogram'));
    }

    public function destroy(Harmonogram $harmonogram)
    {
        abort_if(Gate::denies('harmonogram_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $harmonogram->delete();

        return back();
    }

    public function massDestroy(MassDestroyHarmonogramRequest $request)
    {
        $harmonograms = Harmonogram::find(request('ids'));

        foreach ($harmonograms as $harmonogram) {
            $harmonogram->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
