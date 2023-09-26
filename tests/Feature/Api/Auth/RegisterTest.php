<?php

namespace Tests\Feature\Api\Auth;

use Faker\Factory;
use Illuminate\Foundation\Testing\WithFaker;

class RegisterTest extends AuthTestCase
{
    use WithFaker;

    /**
     * @dataProvider InputErrorsDataProvider
     */
    public function test_errors_form_validator(
        array $data,
        array $errors,
        array $success
    ) {
        $response = $this->postJson(route('api.auth.register'), $data);

        $response->assertInvalid($errors)->assertValid($success);
    }

    public static function InputErrorsDataProvider()
    {
        $faker = Factory::create();
        $password = $faker->password();

        return [
            [[], ['name', 'email', 'password'], []], // required
            [
                [ // max:255
                  'name'                  => $faker->text(500),
                  'email'                 => $faker->text(500),
                  'password'              => $password,
                  'password_confirmation' => $password
                ],
                ['name', 'email'],
                ['password']
            ],
            [
                [ // min
                  'name'                  => 'ab',
                  'email'                 => 's@s',
                  'password'              => $password,
                  'password_confirmation' => $password,
                ],
                ['name', 'email'],
                ['password']
            ],
            [
                [ // confirmation
                  'name' => $faker->name(),
                  'email' => $faker->email(),
                  'password' => $faker->password(),
                  'password_confirmation' => $faker->password()

                ],
                ['password'],
                ['name', 'email']
            ]
        ];
    }
}
