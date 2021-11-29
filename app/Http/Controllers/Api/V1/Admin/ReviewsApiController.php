<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Resources\Admin\ReviewResource;
use App\Models\Review;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReviewResource(Review::all());
    }

    public function store(StoreReviewRequest $request)
    {
        $review = Review::create($request->all());

        if ($request->input('photo', false)) {
            $review->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new ReviewResource($review))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Review $review)
    {
        abort_if(Gate::denies('review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReviewResource($review);
    }

    public function update(UpdateReviewRequest $request, Review $review)
    {
        $review->update($request->all());

        if ($request->input('photo', false)) {
            if (!$review->photo || $request->input('photo') !== $review->photo->file_name) {
                if ($review->photo) {
                    $review->photo->delete();
                }
                $review->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($review->photo) {
            $review->photo->delete();
        }

        return (new ReviewResource($review))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Review $review)
    {
        abort_if(Gate::denies('review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $review->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
