@extends('website.layout.main')

@section('contant')
    <div class="dashboard-content">
        <div class="container-fluid">
            <div class="handler">
                <div class="contact-form">
                    <div class="title">
                        <h3>المدونة- Blog</h3>
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
                    <form id="contact-form" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="wrapper">
                            <input type="text" name="title[en][main]" id="title" placeholder="Blog Title"
                                value="{{ old('title.en.main') }}" required />
                            <input type="text" name="title[ar][main]" id="title" placeholder="عنوان المدونة"
                                value="{{ old('title.ar.main') }}" required />
                        </div>

                        <div class="wrapper">
                            <textarea name="description[en][main]" id="description" placeholder="Blog Description" required>{{ old('description.en.main') }}</textarea>
                            <textarea name="description[ar][main]" id="description" placeholder="وصف المدونة" required>{{ old('description.ar.main') }}</textarea>
                        </div>

                        <div class="file-upload">
                            <label for="formFile" class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">
                                Attach Image Here (Optional)
                            </label>
                            <input id="formFile" name="image[main]" type="file" />
                        </div>

                        <div class="wrapper">

                            <input type="text" name="categories[en]" id="categories" placeholder="Blog Categories"
                                value="{{ old('categories.en') }}" required />
                            <input type="text" name="categories[ar]" id="categories" placeholder="صنف المدونة"
                                value="{{ old('categories.ar') }}" required />
                        </div>

                        <button type="button" onclick="addInputFields()">Add More Details</button>
                        <div class="section-details" id="detailsSection">
                            <p>Details</p>
                            <div class="inputs">
                                <div class="wrapper">
                                    <input type="text" name="title[en][1]" placeholder="Detail Title"
                                        value="{{ old('title.en.1') }}" required />
                                    <input type="text" name="title[ar][1]" placeholder="عنوان المدونة"
                                        value="{{ old('title.ar.1') }}" required />
                                </div>

                                <div class="wrapper">
                                    <textarea name="description[en][1]" placeholder="Detail Description">{{ old('description.en.1') }}</textarea>
                                    <textarea name="description[ar][1]" placeholder="وصف المدونة">{{ old('description.ar.1') }}</textarea>
                                </div>
                                <div class="file-upload">
                                    <label for="formFile" class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">
                                        Attach Image Here (Optional)
                                    </label>
                                    <input name="image[1]" type="file" />
                                </div>
                            </div>
                        </div>
                        @if (old('title.en') && count(old('title.en')) > 2)
                            @foreach (old('title.en') as $key => $value)
                                @if ($key !== 'main')
                                    <div class="section-details">
                                        <p>Details{{ $key }}</p>
                                        <div class="inputs">
                                            <div class="wrapper">
                                                <input type="text" name="title[en][{{ $key }}]"
                                                    placeholder="Detail Title (EN)" value="{{ old('title.en.' . $key) }}"
                                                    required />
                                                <input type="text" name="title[ar][{{ $key }}]"
                                                    placeholder="عنوان التفاصيل (AR)" value="{{ old('title.ar.' . $key) }}"
                                                    required />
                                            </div>
                                            <div class="wrapper">
                                                <textarea name="description[en][{{ $key }}]" placeholder="Detail Description (EN)">{{ old('description.en.' . $key) }}</textarea>
                                                <textarea name="description[ar][{{ $key }}]" placeholder="وصف التفاصيل (AR)">{{ old('description.ar.' . $key) }}</textarea>
                                            </div>
                                            <div class="file-upload">
                                                <label for="formFile{{ $key }}"
                                                    class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">Attach
                                                    Image Here (Optional)</label>
                                                <input name="image[{{ $key }}]" type="file" />
                                                @if (old('image.' . $key))
                                                    <span>File selected</span>
                                                    <!-- You might not be able to "re-select" the file, but at least indicate something was chosen -->
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif

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

@push('scripts')
    <script>
        var counter = 2;

        function addInputFields() {
            const detailsSectionEn = document.querySelector('.contact-form .section-details');
            if (!detailsSectionEn) return;
            const newSectionEn = detailsSectionEn.lastElementChild.cloneNode(true);
            updateInputs(newSectionEn, counter);
            detailsSectionEn.appendChild(newSectionEn);
            counter++;
        }

        function updateInputs(section, counter) {
            section.querySelectorAll('input, textarea').forEach(input => {
                const nameAttr = input.name.match(/^(.+?)\[(en|ar)?\](\[.+\])?$/);
                if (nameAttr) {
                    if (input.type !== 'file') {
                        input.name = `${nameAttr[1]}[${nameAttr[2] ? nameAttr[2] : ''}][${counter}]`;
                        input.value = '';
                    }
                }
                if (input.type === 'file') {
                    input.name = `image[${counter}]`;
                    const newId = `formFile${counter}`;
                    input.id = newId;
                    if (input.previousElementSibling.tagName === 'LABEL') {
                        input.previousElementSibling.setAttribute('for', newId);
                    }
                }
            });
        }
    </script>
@endpush
