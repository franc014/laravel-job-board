<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $jobs = Job::query()
        ->with(['employer', 'tags'])
        ->where('title', 'like', '%' . $request->q . '%')
        ->get();
        return view('jobs.results', ['jobs' => $jobs]);
    }
}
