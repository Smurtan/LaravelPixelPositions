<?php

it('belongs to jobs', function () {
    $tag = \App\Models\Tag::factory()->create();
    $job = \App\Models\Job::factory()->create();

    $job->tag($tag->name);

    expect($tag->jobs)->toHaveCount(1);
});
