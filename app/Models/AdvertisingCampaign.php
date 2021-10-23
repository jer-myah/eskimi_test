<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisingCampaign extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'user_id',
        'name',
        'from_date',
        'to_date',
        'total_budget',
        'daily_budget',
        'banner_1',
        'banner_2',
        'banner_3',
        'banner_4',
        'banner_5'
    ];
}
