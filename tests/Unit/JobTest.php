<?php

it('can be created with valid attributes', function () {
    $employer = \App\Models\Employer::factory()->create();
    $job = \App\Models\Job::factory()->create([
        'title' => 'Programmer',
        'salary' => '$50,000',
        'location' => 'New York, NY',
        'schedule' => 'Full Time',
        'url' => 'http://google.com',
        'featured' => true,
        'employer_id' => $employer->id,
    ]);

    expect($job)->toBeInstanceOf(\App\Models\Job::class)
        ->and($job->title)->toBe('Programmer')
        ->and($job->salary)->toBe('$50,000')
        ->and($job->location)->toBe('New York, NY')
        ->and($job->schedule)->toBe('Full Time')
        ->and($job->url)->toBe('http://google.com')
        ->and($job->featured)->toBeTrue()
        ->and($job->employer->is($employer))->toBeTrue();
});

it('requires', function ($data) {
    $this->expectException(Illuminate\Database\QueryException::class);

    \App\Models\Job::factory()->create($data);
})->with('require job attributes');

test('it belongs to an employer', function () {
    // Arrange
    $employer = \App\Models\Employer::factory()->create();
    $job = \App\Models\Job::factory()->create([
        'employer_id' => $employer->id,
    ]);

    // Act and Assert
    expect($job->employer->is($employer))->toBeTrue();
});

test('it can have tags', function () {
    $job = \App\Models\Job::factory()->create();

    $job->tag("Frontend");

    expect($job->tags)->toHaveCount(1);
});
