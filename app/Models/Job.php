<?php
namespace App\Models;
use Illuminate\Support\Arr;

class Job {
    public static function all() {
        $jobs = [
            [
                'id' => 1,
                'title' => 'Software Engineer',
                'salary' => 100000,
                'description' => 'I am a software engineer',
            ],
            [
                'id' => 2,
                'title' => 'Web Developer',
                'salary' => 200000,
                'description' => 'I am a web developer',
            ],
            [
                'id' => 3,
                'title' => 'Data Scientist',
                'salary' => 300000,
                'description' => 'I am a data scientist',
            ]
        ];
        return $jobs;
    }
    public static function find($id) : array
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);
        if (!$job)
        {
            abort(404);
        }
        return $job;
    }
}
