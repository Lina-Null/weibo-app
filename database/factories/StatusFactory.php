<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Status;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Status::class;
    public function definition()
    {
        $date_time = $this->faker->date . ' ' . $this->faker->time;
        return [
            //
            'user_id' => $this->faker->randomElement(['1','2','3','51','52']),
            'content' => $this->faker->text(),
            'created_at' => $date_time,
            'updated_at' => $date_time
        ];
    }
}
