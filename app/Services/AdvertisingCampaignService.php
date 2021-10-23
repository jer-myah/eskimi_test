<?php

namespace App\Services;

use App\Interfaces\CrudInterface;
use App\Models\AdvertisingCampaign;
use Illuminate\Support\Facades\Auth;

class AdvertisingCampaignService
{
    private $crudInterface;
    private $advertisingCampaignModel;

    public function __construct(CrudInterface $crudInterface, AdvertisingCampaign $advertisingCampaignModel)
    {
        $this->crudInterface = $crudInterface;
        $this->advertisingCampaignModel = $advertisingCampaignModel;
    }

    /**
     * get listing of campaign
     */
    public function getAll()
    {
        return $this->crudInterface->index($this->advertisingCampaignModel);
    }

    /**
     * create new createCampaign
     * @param object $input validated request data
     * 
     * @return boolean
     */
    public function createCampaign($input)
    {
        $banner_2 = '';
        if ($input->hasFile('banner_2')) {
            $banner_2 = $input->banner_2->store('banners', 'public');
        }

        $banner_3 = '';
        if ($input->hasFile('banner_3')) {
            $banner_3 = $input->banner_3->store('banners', 'public');
        }

        $banner_4 = '';
        if ($input->hasFile('banner_4')) {
            $banner_4 = $input->banner_4->store('banners', 'public');
        }

        $banner_5 = '';
        if ($input->hasFile('banner_5')) {
            $banner_5 = $input->banner_5->store('banners', 'public');
        }

        $banner_1 = $input->banner_1->store('banners', 'public');

        $data = [
            'user_id' => Auth::user()->id,
            'name' => $input->name,
            'from_date' => $input->from_date,
            'to_date' => $input->to_date,
            'total_budget' => $input->total_budget,
            'daily_budget' => $input->daily_budget,
            'banner_1' => $banner_1,
            'banner_2' => $banner_2,
            'banner_3' => $banner_3,
            'banner_4' => $banner_4,
            'banner_5' => $banner_5,
        ];

        return $this->crudInterface->store($this->advertisingCampaignModel, $data);
    }

    /**
     * 
     */
    public function getById($id)
    {
        return $this->crudInterface->show($this->advertisingCampaignModel, $id);
    }

    /**
     * Update campaign
     */
    public function updateById($id, $input)
    {
        $data = [
            'name' => $input->name,
            'from_date' => $input->from_date,
            'to_date' => $input->to_date,
            'total_budget' => $input->total_budget,
            'daily_budget' => $input->daily_budget,
        ];

        return $this->crudInterface->update($this->advertisingCampaignModel, $id, $data);
    }

}
