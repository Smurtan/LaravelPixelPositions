<?php

it('belongs to user', function () {
    $user = \App\Models\User::factory()->create();
    $employer = \App\Models\Employer::factory()->create([
        'user_id' => $user->id,
    ]);

    expect($employer->user->is($user))->toBeTrue();
});

it('can have jobs', function () {
    $employer = \App\Models\Employer::factory()->create();
    $job = \App\Models\Job::factory(10)->create([
        'employer_id' => $employer->id,
    ]);

    expect($employer->jobs)->toHaveCount(10);
});
