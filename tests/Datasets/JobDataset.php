<?php

use App\Models\Employer;
use App\Models\User;

dataset('require job attributes', [
    'empty title' => ['data' => ['title' => null, 'salary' => '$50,000', 'location' => 'New York, NY', 'url' => 'https://google.com', 'schedule' => 'Full Time', 'featured' => false, 'employer_id' => fn() => Employer::factory()->create(['user_id' => User::factory()->create()->id])]],
    'empty salary' => ['data' => ['title' => 'Programmer PHP', 'salary' => null, 'location' => 'New York, NY', 'url' => 'https://google.com', 'schedule' => 'Full Time', 'featured' => false, 'employer_id' => fn() => Employer::factory()->create(['user_id' => User::factory()->create()->id])]],
    'empty location' => ['data' => ['title' => 'Programmer PHP', 'salary' => '$50,000', 'location' => null, 'url' => 'https://google.com', 'schedule' => 'Full Time', 'featured' => false, 'employer_id' => fn() => Employer::factory()->create(['user_id' => User::factory()->create()->id])]],
    'empty url' => ['data' => ['title' => 'Programmer PHP', 'salary' => '$50,000', 'location' => 'New York, NY', 'url' => null, 'schedule' => 'Full Time', 'featured' => false, 'employer_id' => fn() => Employer::factory()->create(['user_id' => User::factory()->create()->id])]],
    'empty schedule' => ['data' => ['title' => 'Programmer PHP', 'salary' => '$50,000', 'location' => 'New York, NY', 'url' => 'https://google.com', 'schedule' => null, 'featured' => false, 'employer_id' => fn() => Employer::factory()->create(['user_id' => User::factory()->create()->id])]],
    'empty featured' => ['data' => ['title' => 'Programmer PHP', 'salary' => '$50,000', 'location' => 'New York, NY', 'url' => 'https://google.com', 'schedule' => 'Full Time', 'featured' => null, 'employer_id' => fn() => Employer::factory()->create(['user_id' => User::factory()->create()->id])]],
    'empty employer' => ['data' => ['title' => 'Programmer PHP', 'salary' => '$50,000', 'location' => 'New York, NY', 'url' => 'https://google.com', 'schedule' => 'Full Time', 'featured' => false, 'employer_id' => null]],
]);
