<?php

use App\Models\Employer;
use App\Models\Job;

test('it belongs to an Employer', function () {
    $employer = Employer::factory()->create();
    $job = Job::factory()->create(['employer_id' => $employer->id]);
    expect($job->employer->is($employer))->toBeTrue();
    
});

test('it can have tags', function () {
    $job = Job::factory()->create();
    $tag = $job->tag('Frontend');
    expect($job->tags)->toHaveCount(1);
});
