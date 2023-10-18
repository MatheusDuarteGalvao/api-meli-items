<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertResource;
use App\Services\AdvertService;
use Illuminate\Http\Response;

class AdvertController extends Controller
{

    public function __construct(
        protected AdvertService $service,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adverts = $this->service->getAll();

        return AdvertResource::collection($adverts);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$avdert = $this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new AdvertResource($avdert);
    }

}
