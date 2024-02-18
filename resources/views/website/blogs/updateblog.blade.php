@extends('website.layout.main')

@section('contant')
    <div class="dashboard-content">
        <div class="container-fluid">
            <div class="handler">
                <div class="contact-form">
                    <div class="title">
                        <h3>Update blog - تحديث المدونة</h3>
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

                    <form id="contact-form" action="{{ route('blog.update', $blog->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Main Blog Information -->
                        <div class="wrapper">
                            <input type="text" name="title[en][main]" placeholder="Blog Title"
                                value="{{ old('title.en.main', optional($blog->translate('en'))->title) }}" required />
                            <input type="text" name="title[ar][main]" placeholder="عنوان المدونة"
                                value="{{ old('title.ar.main', optional($blog->translate('ar'))->title) }}" required />
                        </div>
                        <div class="wrapper">
                            <textarea name="description[en][main]" placeholder="Blog Description" required>{{ old('description.en.main', optional($blog->translate('en'))->description) }}</textarea>
                            <textarea name="description[ar][main]" placeholder="وصف المدونة" required>{{ old('description.ar.main', optional($blog->translate('ar'))->description) }}</textarea>
                        </div>
                        <div class="file-upload">
                            <label for="formFile">Attach Image Here (Optional)</label>
                            <input id="formFile" name="image[main]" type="file" />
                        </div>
                        <div class="wrapper">
                            <input type="text" name="categories[en]" placeholder="Blog Categories"
                                value="{{ old('categories.en', optional($blog->translate('en'))->categories) }}" />
                            <input type="text" name="categories[ar]" placeholder="صنف المدونة"
                                value="{{ old('categories.ar', optional($blog->translate('ar'))->categories) }}" />
                        </div>

                        <!-- Details -->
                        <button type="button" onclick="addInputFields()">Add More</button>
                        <div id="detailsContainer">
                            @foreach ($blog->details as $index => $detail)
                                <div class="section-details">
                                    <p>Details {{ $index + 1 }}</p>
                                    <div class="inputs">
                                        <div class="wrapper">
                                            <input type="text" name="details[{{ $detail->id }}][title][en]"
                                                placeholder="Blog Title"
                                                value="{{ old('details.' . $detail->id . '.title.en', optional($detail->translate('en'))->title) }}"
                                                required />
                                            <input type="text" name="details[{{ $detail->id }}][title][ar]"
                                                placeholder="عنوان المدونة"
                                                value="{{ old('details.' . $detail->id . '.title.ar', optional($detail->translate('ar'))->title) }}"
                                                required />
                                        </div>
                                        <div class="wrapper">
                                            <textarea name="details[{{ $detail->id }}][description][en]" placeholder="Blog Description">{{ old('details.' . $detail->id . '.description.en', optional($detail->translate('en'))->description) }}</textarea>
                                            <textarea name="details[{{ $detail->id }}][description][ar]" placeholder="وصف المدونة">{{ old('details.' . $detail->id . '.description.ar', optional($detail->translate('ar'))->description) }}</textarea>
                                        </div>
                                        <div class="file-upload">
                                            <label for="detailImage{{ $detail->id }}">Attach Image Here
                                                (Optional)</label>
                                            <input id="detailImage{{ $detail->id }}"
                                                name="details[{{ $detail->id }}][image]" type="file" />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="my-btn mt-8">
                            <button class="btn btn-contact" type="submit">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var counter = {{ $blog->details->count() + 1 }};

        function addInputFields() {
            var container = document.getElementById('detailsContainer');
            var newSection = document.createElement('div');
            newSection.classList.add('section-details');
            newSection.innerHTML = `
            <p>Details ${counter}</p>
            <div class="inputs">
                <div class="wrapper">
                    <input type="text" name="details[new${counter}][title][en]" placeholder="Blog Title details" required />
                    <input type="text" name="details[new${counter}][title][ar]" placeholder="عنوان تفاصيل المدونة" required />
                </div>
                <div class="wrapper">
                    <textarea name="details[new${counter}][description][en]" placeholder="Detail Description "></textarea>
                    <textarea name="details[new${counter}][description][ar]" placeholder="وصف التفاصيل"></textarea>
                </div>
                <div class="file-upload">
                    <label for="newDetailImage${counter}">Attach Image Here (Optional)</label>
                    <input id="newDetailImage${counter}" name="details[new${counter}][image]" type="file" />
                </div>
            </div>`;
            container.appendChild(newSection);
            counter++;
        }
    </script>
@endpush
