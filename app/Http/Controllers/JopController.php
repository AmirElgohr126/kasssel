<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJob;

class JopController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::paginate(10);
        return view('website.jobs.listjobs', compact('jobs'));
    }

    public function create(Request $request)
    {
        return view('website.jobs.createjob');
    }

    public function store(StoreJob $request)
    {
        $validatedData = $request->validated();
        $job = new Job();
        $job->fill([
            'open_jobs' => $validatedData['open_jobs'],
        ]);
        foreach (['en', 'ar'] as $locale) {
            $job->translateOrNew($locale)->title = $validatedData['title'][$locale];
            $job->translateOrNew($locale)->description = $validatedData['description'][$locale];
            $job->translateOrNew($locale)->categories = $validatedData['categories'][$locale];
            $job->translateOrNew($locale)->location = $validatedData['location'][$locale];
            $job->translateOrNew($locale)->experience = $validatedData['experience'][$locale];
        }
        $job->save();
                return redirect()->route('job.list')->with([
                    'success' => 'jobs and his details saved successfully.'
                ]);
    }


    public function update(StoreJob $request, $id)
    {
        $validatedData = $request->validated();
        $job = Job::findOrFail($id);
        $job->open_jobs = $validatedData['open_jobs'];
        foreach (['en', 'ar'] as $locale) {
            $job->translateOrNew($locale)->title = $validatedData['title'][$locale];
            $job->translateOrNew($locale)->description = $validatedData['description'][$locale];
            $job->translateOrNew($locale)->categories = $validatedData['categories'][$locale];
            $job->translateOrNew($locale)->location = $validatedData['location'][$locale];
            $job->translateOrNew($locale)->experience = $validatedData['experience'][$locale];
        }
        $job->save();
        return redirect()->route('job.list')->with('success', 'Job updated successfully.');
    }


    public function edit(Request $request)
    {
        $job = Job::findOrFail($request->id);
        return view('website.jobs.update', compact('job'));
    }


    public function delete(Request $request)
    {
        // Retrieve the job by ID and delete it
        $job = Job::findOrFail($request->id);
        // Delete the job
        $job->delete();

        // Redirect back with a success message
        return back()->with('success', 'Job deleted successfully.');
    }



}
