<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFinishingRequest;
use App\Http\Requests\StoreFinishingRequest;
use App\Http\Requests\UpdateFinishingRequest;
use App\Models\Finishing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FinishingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('finishing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $finishings = Finishing::all();

        return view('admin.finishings.index', compact('finishings'));
    }

    public function create()
    {
        abort_if(Gate::denies('finishing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.finishings.create');
    }

    public function store(StoreFinishingRequest $request)
    {
        $finishing = Finishing::create($request->all());

        return redirect()->route('admin.finishings.index');
    }

    public function edit(Finishing $finishing)
    {
        abort_if(Gate::denies('finishing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.finishings.edit', compact('finishing'));
    }

    public function update(UpdateFinishingRequest $request, Finishing $finishing)
    {
        $finishing->update($request->all());

        return redirect()->route('admin.finishings.index');
    }

    public function show(Finishing $finishing)
    {
        abort_if(Gate::denies('finishing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.finishings.show', compact('finishing'));
    }

    public function destroy(Finishing $finishing)
    {
        abort_if(Gate::denies('finishing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $finishing->delete();

        return back();
    }

    public function massDestroy(MassDestroyFinishingRequest $request)
    {
        Finishing::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
