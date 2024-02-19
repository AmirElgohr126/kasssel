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
            'file_attachment' => 'nullable|file|max:6048'
            ]);
        if ($request->hasFile('file_attachment')) {
            $file = $request->file_attachment;
            $path = storeFile($file, 'jobs', 'public');
            unset($validatedData['file']);
            $validatedData['file'] = $path;
        }

        $data = JobOffered::create($validatedData);

        if (!$data) {
            return finalResponse('failed', 400, null, null, 'something error happen contact to backend');
        }
        return finalResponse('success',200,'success insert data ');
    }



    public function applcationView(Request $request)
    {
        $employees = JobOffered::latest()->paginate(10);

        return view('website.applcations.list', compact('employees'));
    }
}
