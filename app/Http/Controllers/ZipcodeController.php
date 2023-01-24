<?php

namespace App\Http\Controllers;

use App\Http\Requests\{UpdateZipcodeRequest, StoreZipcodeRequest};
use App\Http\Resources\{ZipcodeCollection, ZipcodeResource};
use App\Services\ZipcodeService;
use Illuminate\Http\{JsonResponse, Response};

class ZipcodeController extends Controller
{
    /**
     * @var ZipcodeService
     */
    private ZipcodeService $zipcodeService;

    /**
     * @param ZipcodeService $zipcodeService
     */
    public function __construct(ZipcodeService $zipcodeService)
    {
        $this->zipcodeService = $zipcodeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreZipcodeRequest $storeZipcodeRequest)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(string $zipCode): ?JsonResponse
    {
        return (new ZipcodeCollection($this->zipcodeService->getZipCode($zipCode)))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateZipcodeRequest $updateZipcodeRequest
     * @param string $id
     * @return Response
     */
    public function update(UpdateZipcodeRequest $updateZipcodeRequest, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return Response
     */
    public function destroy(string $id)
    {
        //
    }
}
