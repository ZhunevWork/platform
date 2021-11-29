<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMetroRequest;
use App\Http\Requests\StoreMetroRequest;
use App\Http\Requests\UpdateMetroRequest;
use App\Models\Metro;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MetroController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('metro_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metros = Metro::all();

        return view('admin.metros.index', compact('metros'));
    }

    public function create()
    {
        abort_if(Gate::denies('metro_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.metros.create');
    }

    public function store(StoreMetroRequest $request)
    {
        $metro = Metro::create($request->all());

        return redirect()->route('admin.metros.index');
    }

    public function edit(Metro $metro)
    {
        abort_if(Gate::denies('metro_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.metros.edit', compact('metro'));
    }

    public function update(UpdateMetroRequest $request, Metro $metro)
    {
        $metro->update($request->all());

        return redirect()->route('admin.metros.index');
    }

    public function show(Metro $metro)
    {
        abort_if(Gate::denies('metro_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.metros.show', compact('metro'));
    }

    public function destroy(Metro $metro)
    {
        abort_if(Gate::denies('metro_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metro->delete();

        return back();
    }

    public function massDestroy(MassDestroyMetroRequest $request)
    {
        Metro::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
