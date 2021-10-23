<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdvertisingCampaignRequest;
use App\Http\Requests\UpdateAdvertisingCampaignRequest;
use App\Models\AdvertisingCampaign;
use App\Services\AdvertisingCampaignService;
use Illuminate\Http\Request;

class AdvertisingCampaignController extends Controller
{
    private $advertisingCampaignService;

    public function __construct(AdvertisingCampaignService $advertisingCampaignService)
    {
        $this->advertisingCampaignService = $advertisingCampaignService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $ads = $this->advertisingCampaignService->getAll();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'data' => $ads
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'data' => $e,
                'message' => 'Something went wrong!'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvertisingCampaignRequest $request)
    {
        try {
            $resp = $this->advertisingCampaignService->createCampaign($request);
            
            return response()->json([
                'status' => 'success',
                'code' => 201,
                'data' => $resp,
                'message' => 'Campaign successfully created!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'data' => $e,
                'message' => 'Something went wrong!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdvertisingCampaign  $advertisingCampaign
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $ads = $this->advertisingCampaignService->getById($id);

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'data' => $ads
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'data' => $e,
                'message' => 'Something went wrong!'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdvertisingCampaign  $advertisingCampaign
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvertisingCampaignRequest $request, $id)
    {
        try {
            $updated = $this->advertisingCampaignService->updateById($id, $request);

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'data' => $updated,
                'message' => 'Advertising campaign successfully updated!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'data' => $e,
                'message' => 'Something went wrong!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdvertisingCampaign  $advertisingCampaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvertisingCampaign $advertisingCampaign)
    {
        //
    }
}
