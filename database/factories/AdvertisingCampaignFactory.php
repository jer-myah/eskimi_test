<?php

namespace Database\Factories;

use App\Models\AdvertisingCampaign;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdvertisingCampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdvertisingCampaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'name' => $this->faker->name(),
            'from_date' => now()->subDays(rand(2, 4)),
            'to_date' => now()->addDays(rand(1, 3)),
            'total_budget' => rand(999, 999999),
            'daily_budget' => rand(99, 9999),
            'banner_1' => 'https://source.unsplash.com/random',
            'banner_2' => 'https://source.unsplash.com/random',
            'banner_3' => 'https://source.unsplash.com/random',
            'banner_4' => 'https://source.unsplash.com/random',
            'banner_5' => 'https://source.unsplash.com/random'
        ];
    }
}
