<?php
namespace App\Http\Controllers;

use Exception;
use App\Models\Job;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Resources\JobResource;
use App\Http\Resources\BlogResource;

class ApiController extends Controller
{

    /**
     * Fetch blogs and their details based on the application's current language setting.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBlogs(Request $request)
    {
        try {
            $preferredLanguage = $request->header('Accept-Language') ?? 'en';
            app()->setLocale($preferredLanguage);
            $blogs = Blog::with([
                'details',
                'translations' => function ($query) {
                    $query->where('locale', app()->getLocale());
                }
            ])->orderBy('created_at', 'desc')
                ->paginate(10);
            $pagination = pagnationResponse($blogs);
            return finalResponse('success', 200, BlogResource::collection($blogs), $pagination);
        } catch (Exception $e) {
            return finalResponse('failed', 400, null, null, $e->getMessage());
        }
    }

    /**
     * Fetch job listings and their details based on the application's current language setting.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getJobs(Request $request)
    {
        try {
            $preferredLanguage = $request->header('Accept-Language') ?? 'en';
            app()->setLocale($preferredLanguage);
            $jobs = Job::with([
                'translations' => function ($query) {
                    $query->where('locale', app()->getLocale());
                }
            ])->orderBy('created_at', 'desc')
                ->paginate(10);

            $pagination = pagnationResponse($jobs);

            return finalResponse('success', 200, JobResource::collection($jobs), $pagination);
        } catch (Exception $e) {
            return finalResponse('failed', 400, null, null, $e->getMessage());
        }
    }


    /**
     * Fetch a single blog and its details based on the provided ID and the application's current language setting.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id  The ID of the blog to fetch.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBlog(Request $request, $id)
    {
        try {
            $preferredLanguage = $request->header('Accept-Language') ?? 'en';
            app()->setLocale($preferredLanguage);

            $blog = Blog::with([
                'details',
                'translations' => function ($query) {
                    $query->where('locale', app()->getLocale());
                }
            ])->findOrFail($id);

            return finalResponse('success', 200, new BlogResource($blog));
        } catch (Exception $e) {
            return finalResponse('failed', 400, null, null, $e->getMessage());
        }
    }


    /**
     * Fetch a single job listing and its details based on the provided ID and the application's current language setting.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id  The ID of the job to fetch.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getJob(Request $request, $id)
    {
        try {
            $preferredLanguage = $request->header('Accept-Language') ?? 'en';
            app()->setLocale($preferredLanguage);

            $job = Job::with([
                'translations' => function ($query) {
                    $query->where('locale', app()->getLocale());
                }
            ])->findOrFail($id);

            return finalResponse('success', 200, new JobResource($job));
        } catch (Exception $e) {
            return finalResponse('failed', 400, null, null, $e->getMessage());
        }
    }


}


