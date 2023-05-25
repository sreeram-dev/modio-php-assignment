<?php

namespace Database\Factories;

use App\Models\Mod;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'user_id' => static function () {
                return User::factory()->create()->id;
            },
            'path' => $this->faker->url,
        ];
    }

}
