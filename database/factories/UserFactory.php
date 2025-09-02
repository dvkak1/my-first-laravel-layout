<?php


/**
 * This is a factory.
 * The documentation of Laravel reads that you need to insert a few records in your database. Laravel
 * allows users to define a set of default values and attributes for Eloquent models using what we call
 * modern factories.
 *
 * They are used as a quick way to fill up databases with fake but realistic data for testing and system
 * prototyping.
 *
 * To create a factory via the command used when typing php artisan tinker:
 *
 * App\Models\--model name--::factory()->create()
 *
 * Factories use an Application Program Interface we call as Faker, it is used within Laravel applications
 * to generate fake data for various purposes.
 *
 * NOTE: During the time I was learning about Factories, Mr Way faced an error involving his database. Most likely,
 * what happened was he had to fix a table related problem.
 *
 * The parenthesis on factory() represents a blank slate where one can enter how many fake data can be generated into the data-
 * base for the making of the application.
 *
 * Yes, you can also make factories via php artisan too!
 *
 * Just type: php artisan make:factory --insert whatever name--
 *
 * To create fake data with an unverified status, simply type the following command via php artisan tinker:
 *
 * App\Models\User::factory()->unverified()->create()
 *
 */


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            //For a simple exercise, your user may have an admin status.
            // 'admin' => false
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

//     public function admin(): static
//     {
//         return $this->state(fn (array $attributes) => [
//             'admin' => true,
//         ]);
//     }//User::factory()->admin()->create()
// }
}
