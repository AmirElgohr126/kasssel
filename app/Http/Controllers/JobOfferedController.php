<?php
namespace App\Http\Controllers;

use App\Models\JobOffered;
use Illuminate\Http\Request;

class JobOfferedController extends Controller
{
    public function insertJob(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'email' => ['required','string','email'],
            'phone' => ['required','numeric'],
            'here_about' => ['required','string'],
            'message' => ['required','string'],
            'file' => ['nullabale','file'],
        ]);

        if ($request->hasFile('flie')) {
            $path = $request->file("file")->store('job_offered', 'public');
            $validatedData['file'] = $path;
        }

        $data = JobOffered::create($validatedData);

        if (!$data) {
            return finalResponse('failed', 400, null, null, 'something error happen contact to backend');
        }
        return finalResponse('success',200,'success insert data ');
    }
}
