@extends('website.layout.main')
@section('contant')
    <!-- main-content start -->
    <div class="dashboard-content">
        <div class="container-fluid">
            <div class="handler">
                <div class="contact-form">
                    <div class="title">
                        <h3>create Job Information - انشاء معلومات الوظيفة</h3>
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
                    <form id="contact-form" method="POST" action="{{ route('job.store') }}">
                        @csrf

                        <div class="wrapper">
                            <input type="text" name="title[en]" id="title[en]" placeholder="Job Title"
                                value="{{ old('title.en') }}" />
                            <input type="text" name="title[ar]" id="title[ar]" placeholder="عنوان الوظيفة"
                                value="{{ old('title.ar') }}" />
                        </div>
                        <div class="wrapper">
                            <input type="text" id="description[en]" name="description[en]" placeholder="Job Description"
                                value="{{ old('description.en') }}" />
                            <input type="text" id="description[ar]" name="description[ar]" placeholder="وصف الوظيفة"
                                value="{{ old('description.ar') }}" />
                        </div>
                        <div class="wrapper">
                            <input type="text" id="categories[en]" name="categories[en]" placeholder="Job Categories"
                                value="{{ old('categories.en') }}" />
                            <input type="text" id="categories[ar]" name="categories[ar]" placeholder="صنف الوظيفة"
                                value="{{ old('categories.ar') }}" />
                        </div>
                        <input type="number" id="openJop" name="open_jobs" placeholder="openJop - الاماكن المتاحة"
                            value="{{ old('open_jobs') }}" />
                        <div class="wrapper">
                            <input type="text" id="location[en]" name="location[en]" placeholder="Location"
                                value="{{ old('location.en') }}" />
                            <input type="text" id="location[ar]" name="location[ar]" placeholder="الموقع"
                                value="{{ old('location.ar') }}" />
                        </div>
                        <div class="wrapper">
                            <input type="text" id="experience[en]" name="experience[en]" placeholder="Experience"
                                value="{{ old('experience.en') }}" />
                            <input type="text" id="experience[ar]" name="experience[ar]" placeholder="الخبرة"
                                value="{{ old('experience.ar') }}" />
                        </div>

                        <div class="my-btn mt-8">
                            <button
                                class="btn btn-contact uppercase font-bold rounded-full transition duration-300 transform hover:scale-105 text-[20px]"
                                type="submit" name="submit">
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
