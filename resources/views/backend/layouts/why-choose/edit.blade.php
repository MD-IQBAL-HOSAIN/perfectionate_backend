@extends('backend.app')

@section('title', 'Why Choose Us')

@section('content')

    {{-- PAGE-HEADER --}}
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Why Choose Us Edit Form</h2>
                </div>
            </div>

            <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                    <nav>
                        <ol class="base-breadcrumb breadcrumb-three">
                            <li>
                                <a href="javascript:void(0);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 0a8 8 0 1 0 4.596 14.104A5.934 5.934 0 0 1 8 13a5.934 5.934 0 0 1-4.596-2.104A7.98 7.98 0 0 0 8 0zm-2 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm-1.465 5.682A3.976 3.976 0 0 0 4 9c0 1.044.324 2.01.882 2.818a6 6 0 1 1 6.236 0A3.975 3.975 0 0 0 12 9a3.976 3.976 0 0 0-.536-1.318l-1.898.633-.018-.056 2.194-.732a4 4 0 1 0-7.6 0l2.194.733-.018.056-1.898-.634z" />
                                    </svg>
                                    Settings
                                </a>
                            </li>
                            <li class="active"><span><i class="lni lni-angle-double-right"></i></span>Why Choose Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- PAGE-HEADER END --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">

                    <form action="{{ route('why-choose-us.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name Fields -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name_en" class="form-label">Name (English)</label>
                                <input type="text" class="form-control @error('name_en') is-invalid @enderror"
                                       name="name_en" placeholder="Enter name in English" id="name_en"
                                       value="{{ old('name_en', $item->getTranslation('name', 'en')) }}">
                                @error('name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="name_ar" class="form-label">Name (Arabic)</label>
                                <input type="text" class="form-control @error('name_ar') is-invalid @enderror" dir="rtl"
                                       name="name_ar" placeholder="أدخل الاسم بالعربية" id="name_ar"
                                       value="{{ old('name_ar', $item->getTranslation('name', 'ar')) }}">
                                @error('name_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Title Fields -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="title_en" class="form-label">Title (English)</label>
                                <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                       name="title_en" placeholder="Enter title in English" id="title_en"
                                       value="{{ old('title_en', $item->getTranslation('title', 'en')) }}">
                                @error('title_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="title_ar" class="form-label">Title (Arabic)</label>
                                <input type="text" class="form-control @error('title_ar') is-invalid @enderror" dir="rtl"
                                       name="title_ar" placeholder="أدخل العنوان بالعربية" id="title_ar"
                                       value="{{ old('title_ar', $item->getTranslation('title', 'ar')) }}">
                                @error('title_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Subtitle Fields -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="subtitle_en" class="form-label">Subtitle (English)</label>
                                <input type="text" class="form-control @error('subtitle_en') is-invalid @enderror"
                                       name="subtitle_en" placeholder="Enter subtitle in English" id="subtitle_en"
                                       value="{{ old('subtitle_en', $item->getTranslation('subtitle', 'en')) }}">
                                @error('subtitle_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="subtitle_ar" class="form-label">Subtitle (Arabic)</label>
                                <input type="text" class="form-control @error('subtitle_ar') is-invalid @enderror" dir="rtl"
                                       name="subtitle_ar" placeholder="أدخل العنوان الفرعي بالعربية" id="subtitle_ar"
                                       value="{{ old('subtitle_ar', $item->getTranslation('subtitle', 'ar')) }}">
                                @error('subtitle_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Field -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control dropify"
                                   data-default-file="{{ asset($item->image) }}">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Body Title Fields -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="body_title_en" class="form-label">Body Title (English)</label>
                                <input type="text" class="form-control @error('body_title_en') is-invalid @enderror"
                                       name="body_title_en" placeholder="Enter body title in English" id="body_title_en"
                                       value="{{ old('body_title_en', $item->getTranslation('body_title', 'en')) }}">
                                @error('body_title_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="body_title_ar" class="form-label">Body Title (Arabic)</label>
                                <input type="text" class="form-control @error('body_title_ar') is-invalid @enderror" dir="rtl"
                                       name="body_title_ar" placeholder="أدخل عنوان الجسم بالعربية" id="body_title_ar"
                                       value="{{ old('body_title_ar', $item->getTranslation('body_title', 'ar')) }}">
                                @error('body_title_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Description Fields -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="description_en" class="form-label">Description (English)</label>
                                <textarea name="description_en" id="description_en" rows="4"
                                          class="form-control" placeholder="Enter description in English">
                                    {{ old('description_en', $item->getTranslation('description', 'en')) }}
                                </textarea>
                                @error('description_en')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="description_ar" class="form-label">Description (Arabic)</label>
                                <textarea name="description_ar" id="description_ar" rows="4"
                                          class="form-control" dir="rtl" placeholder="أدخل الوصف بالعربية">
                                    {{ old('description_ar', $item->getTranslation('description', 'ar')) }}
                                </textarea>
                                @error('description_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

