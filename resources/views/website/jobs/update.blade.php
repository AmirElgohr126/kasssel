@extends('website.layout.main')

@section('contant')
    <!-- main-content start -->
    <div class="dashboard-content">
        <div class="container-fluid">
            <div class="handler">
                <div class="contact-form">
                    <div class="title">
                        <h3>Update Job Information - تحديث معلومات الوظيفة</h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Note the action now points to the update route for the job, and we're using method POST with @method('PUT') directive -->
                    <form id="contact-form" method="POST" action="{{ route('job.update', $job->id) }}">
                        @csrf
                        <div class="wrapper">
                            <input type="text" name="title[en]" id="title" placeholder="Job Title"
                                value="{{ old('title.en', $job->translate('en')->title ?? '') }}" />
                            <input type="text" name="title[ar]" id="title[ar]" placeholder="عنوان الوظيفة"
                                value="{{ old('title.ar', $job->translate('ar')->title ?? '') }}" />
                        </div>
                        <div class="wrapper">
                            <input type="text" id="description[en]" name="description[en]" placeholder="Job Description"
                                value="{{ old('description.en', $job->translate('en')->description ?? '') }}" />
                            <input type="text" id="description[ar]" name="description[ar]" placeholder="وصف الوظيفة"
                                value="{{ old('description.ar', $job->translate('ar')->description ?? '') }}" />
                        </div>
                        <div class="wrapper">
                            <input type="text" id="categories[en]" name="categories[en]" placeholder="Job Categories"
                                value="{{ old('categories.en', $job->translate('en')->categories ?? '') }}" />
                            <input type="text" id="categories[ar]" name="categories[ar]" placeholder="صنف الوظيفة"
                                value="{{ old('categories.ar', $job->translate('ar')->categories ?? '') }}" />
                        </div>
                        <input type="number" id="open_jobs" name="open_jobs" placeholder="Open Jobs"
                            value="{{ old('open_jobs', $job->open_jobs) }}" />
                        <div class="wrapper">
                            <input type="text" id="location[en]" name="location[en]" placeholder="Location"
                                value="{{ old('location.en', $job->translate('en')->location ?? '') }}" />
                            <input type="text" id="location[ar]" name="location[ar]" placeholder="الموقع"
                                value="{{ old('location.ar', $job->translate('ar')->location ?? '') }}" />
                        </div>
                        <div class="wrapper">
                            <input type="text" id="experience[en]" name="experience[en]" placeholder="Experience"
                                value="{{ old('experience.en', $job->translate('en')->experience ?? '') }}" />
                            <input type="text" id="experience[ar]" name="experience[ar]" placeholder="الخبرة المطلوبة"
                                value="{{ old('experience.ar', $job->translate('ar')->experience ?? '') }}" />
                        </div>
                        <div class="my-btn mt-8">
                            <button
                                class="btn btn-contact uppercase font-bold rounded-full transition duration-300 transform hover:scale-105 text-[20px]"
                                type="submit" name="submit">
                                UPDATE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
