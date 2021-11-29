<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInfrastructureRequest;
use App\Http\Requests\UpdateInfrastructureRequest;
use App\Http\Resources\Admin\InfrastructureResource;
use App\Models\Infrastructure;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InfrastructureApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('infrastructure_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InfrastructureResource(Infrastructure::all());
    }

    public function store(StoreInfrastructureRequest $request)
    {
        $infrastructure = Infrastructure::create($request->all());

        return (new InfrastructureResource($infrastructure))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Infrastructure $infrastructure)
    {
        abort_if(Gate::denies('infrastructure_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InfrastructureResource($infrastructure);
    }

    public function update(UpdateInfrastructureRequest $request, Infrastructure $infrastructure)
    {
        $infrastructure->update($request->all());

        return (new InfrastructureResource($infrastructure))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Infrastructure $infrastructure)
    {
        abort_if(Gate::denies('infrastructure_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $infrastructure->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
