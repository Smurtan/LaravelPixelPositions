<?php

use Illuminate\Http\UploadedFile;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@test.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'employer' => 'Test Employer',
        'logo' => UploadedFile::fake()->image('logo.png'),
    ]);

    $response->assertRedirect('/');
    $response->assertSessionHasNoErrors();

    $this->assertDatabaseHas('users', [
        'email' => 'test@test.com',
        'name' => 'Test User',
    ]);

    $user = \App\Models\User::where('email', 'test@test.com')->first();

    $this->assertDatabaseHas('employers', [
        'name' => 'Test Employer',
        'user_id' => $user->id,
    ]);

    $employer = $user->employer;
    Storage::disk('local')->assertExists($employer->logo);

    $this->assertAuthenticatedAs($user);
});

test('cannot register a user with invalid data', function () {
    $userData = [
        'name' => '',
        'email' => 'test-invalid',
        'password' => 'pass',
        'password_confirmation' => 'mismatch',
        'employer' => '',
        'logo' => null
    ];

    $response = $this->post('/register', $userData);

    $response->assertSessionHasErrors(['name', 'email', 'password']);

    $this->assertDatabaseMissing('users', [
        'email' => 'test-invalid',
    ]);

    $this->assertGuest();
});

test('cannot register a user with invalid employer data', function () {
    $userData = [
        'name' => 'Test User',
        'email' => 'test@test.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'employer' => '',
        'logo' => null
    ];

    $response = $this->post('/register', $userData);

    $response->assertSessionHasErrors(['employer', 'logo']);

    $this->assertDatabaseMissing('users', [
        'email' => 'test-invalid',
    ]);

    $this->assertGuest();
});
