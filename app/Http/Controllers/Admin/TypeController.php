<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTypeRequest;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Producer;
use App\Models\Type;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = Type::with(['producer'])->get();

        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        abort_if(Gate::denies('type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producers = Producer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.types.create', compact('producers'));
    }

    public function store(StoreTypeRequest $request)
    {
        $type = Type::create($request->all());

        return redirect()->route('admin.types.index');
    }

    public function edit(Type $type)
    {
        abort_if(Gate::denies('type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producers = Producer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $type->load('producer');

        return view('admin.types.edit', compact('producers', 'type'));
    }

    public function update(UpdateTypeRequest $request, Type $type)
    {
        $type->update($request->all());

        return redirect()->route('admin.types.index');
    }

    public function show(Type $type)
    {
        abort_if(Gate::denies('type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $type->load('producer');

        return view('admin.types.show', compact('type'));
    }

    public function destroy(Type $type)
    {
        abort_if(Gate::denies('type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $type->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypeRequest $request)
    {
        $types = Type::find(request('ids'));

        foreach ($types as $type) {
            $type->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
