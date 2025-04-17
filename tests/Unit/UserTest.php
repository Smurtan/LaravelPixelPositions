<?php

it('has one employer', function () {
    $user = \App\Models\User::factory()->create();
    $employer = \App\Models\Employer::factory()->create([
        'user_id' => $user->id,
    ]);

    expect($user->employer->is($employer))->toBeTrue();
});
