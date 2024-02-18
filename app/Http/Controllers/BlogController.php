<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogDetail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlog;
use App\Http\Resources\BlogResource;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // dd('asdfdasf');
        $blogs = Blog::with('details')->paginate(10);
        $blogs = BlogResource::collection($blogs);
        return view('website.blogs.listblog', compact('blogs'));
    }

    public function store(StoreBlog $request)
    {
        $vaildatedData = $request->validated();
        $blog = new Blog();
        $blog->translateOrNew('en')->title = $request->input('title.en.main');
        $blog->translateOrNew('ar')->title = $request->input('title.ar.main');
        $blog->translateOrNew('en')->description = $request->input('description.en.main');
        $blog->translateOrNew('ar')->description = $request->input('description.ar.main');
        $blog->translateOrNew('en')->categories = $request->input('categories.en');
        $blog->translateOrNew('ar')->categories = $request->input('categories.ar');

        if ($request->hasFile('image.main')) {
            $path = $request->file('image.main')->store('blogs', 'public');
            $blog->image = $path;
        }

        $blog->save();

        // Handling additional details
        foreach ($request->input('title.en', []) as $key => $value) {
            if ($key !== 'main') { // Skip the main entry
                $detail = new BlogDetail();
                $detail->blog_id = $blog->id;

                if ($request->hasFile("image.$key")) {
                    $detailPath = $request->file("image.$key")->store('blogs/details', 'public');
                    $detail->image = $detailPath;
                }

                $detail->translateOrNew('en')->title = $request->input("title.en.$key");
                $detail->translateOrNew('ar')->title = $request->input("title.ar.$key");
                $detail->translateOrNew('en')->description = $request->input("description.en.$key");
                $detail->translateOrNew('ar')->description = $request->input("description.ar.$key");
                $detail->save();
            }
        }

        return redirect()->route('blog.list')->with('success', 'Blog and its details saved successfully.');
    }


    public function create(Request $request)
    {
        return view('website.blogs.createblog');
    }


    public function update(StoreBlog $request, $id)
    {
        $blog = Blog::findOrFail($id);

        // Update main blog information with translations
        $blog->translateOrNew('en')->title = $request->input('title.en.main');
        $blog->translateOrNew('ar')->title = $request->input('title.ar.main');
        $blog->translateOrNew('en')->description = $request->input('description.en.main');
        $blog->translateOrNew('ar')->description = $request->input('description.ar.main');
        $blog->translateOrNew('en')->categories = $request->input('categories.en');
        $blog->translateOrNew('ar')->categories = $request->input('categories.ar');

        // Handle main image upload
        if ($request->hasFile('image.main')) {
            // Delete old image if exists
            if ($blog->image) {
                Storage::delete('public/' . $blog->image);
            }

            // Store new image
            $path = $request->file('image.main')->store('blogs', 'public');
            $blog->image = $path;
        }

        $blog->save();

        // Handling additional details
        $detailsInput = $request->input('details', []);
        foreach ($detailsInput as $detailId => $detailData) {
            $detail = BlogDetail::findOrNew($detailId !== 'new' ? $detailId : null);

            if ($detail->exists && $request->hasFile("details.$detailId.image")) {
                // Delete old detail image if exists
                if ($detail->image) {
                    Storage::delete('public/' . $detail->image);
                }
            }

            // Update or new translations for details
            $detail->translateOrNew('en')->title = $detailData['title']['en'];
            $detail->translateOrNew('ar')->title = $detailData['title']['ar'];
            $detail->translateOrNew('en')->description = $detailData['description']['en'];
            $detail->translateOrNew('ar')->description = $detailData['description']['ar'];

            // Assign blog ID for new details
            if (!$detail->exists) {
                $detail->blog_id = $blog->id;
            }

            // Handle detail image upload
            if ($request->hasFile("details.$detailId.image")) {
                $detailImagePath = $request->file("details.$detailId.image")->store('blogs/details', 'public');
                $detail->image = $detailImagePath;
            }

            $detail->save();
        }

        return redirect()->route('blog.list')->with('success', 'Blog updated successfully.');
    }

    public function edit(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        $blog->details;
        return view('website.blogs.updateblog', compact('blog'));
    }

    public function delete(Request $request)
    {
        $blog = Blog::with('details')->findOrFail($request->id);

        // Delete main image if exists
        if ($blog->image) {
            Storage::delete('public/' . $blog->image);
        }

        // Loop through and delete images of all details if they exist
        foreach ($blog->details as $detail) {
            if ($detail->image) {
                Storage::delete('public/' . $detail->image);
            }
            $detail->delete(); // Delete the detail
        }

        $blog->delete(); // Delete the blog post itself

        return redirect()->route('blog.list')->with('success', 'Blog and its details have been successfully deleted.');
    }



}
