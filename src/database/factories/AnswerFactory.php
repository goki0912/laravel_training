<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        // ランダムに1または2をgenderに設定
        $gender=$faker->randomElement([1,2]);

        // ランダムに1から6までの数字をage_idに設定
        $ageId=$faker->numberBetween(1,6);

        return [
            'fullname'=>function()use($gender){
                return $gender ===1 ? $this->faker->firstNameMale():$this->faker->firstNameFemale();
            },
            'gender'=>$gender,
            'age_id'=>$ageId,
            'mail'=>fake()->safeEmail(),
            'feedback'=>fake()->realText(),

            
        ];
    }
}
