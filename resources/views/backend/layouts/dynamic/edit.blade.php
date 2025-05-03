@extends('backend.app')

@section('title', 'Edit Dynamic page')

@push('style')
@endpush

@section('content')

    {{-- PAGE-HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Form</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dynamic page</li>
            </ol>
        </div>
    </div>

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Edit Form</h2>
                </div>
            </div>

            <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                    <nav>
                        <ol class="base-breadcrumb breadcrumb-three">
                            <li>
                                <a href="javascript:void(0);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0a8 8 0 1 0 4.596 14.104A5.934 5.934 0 0 1 8 13a5.934 5.934 0 0 1-4.596-2.104A7.98 7.98 0 0 0 8 0zm-2 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm-1.465 5.682A3.976 3.976 0 0 0 4 9c0 1.044.324 2.01.882 2.818a6 6 0 1 1 6.236 0A3.975 3.975 0 0 0 12 9a3.976 3.976 0 0 0-.536-1.318l-1.898.633-.018-.056 2.194-.732a4 4 0 1 0-7.6 0l2.194.733-.018.056-1.898-.634z" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li class="active"><span><i class="lni lni-angle-double-right"></i></span>Dynamic page</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form action="{{ route('dynamic.update', $data->id) }}" method="POST">
                        @csrf

                        {{-- Page Title (English) --}}
                        <div class="mb-3">
                            <label for="page_title_en" class="form-label">Page Title (English)</label>
                            <input type="text" name="page_title_en" id="page_title_en" class="form-control"
                                placeholder="Enter title in English"
                                value="{{ old('page_title_en', $data->getTranslation('page_title', 'en')) }}">
                            @error('page_title_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Page Title (Arabic) --}}
                        <div class="mb-3">
                            <label for="page_title_ar" class="form-label">Page Title (Arabic)</label>
                            <input type="text" name="page_title_ar" id="page_title_ar" class="form-control"
                                placeholder="Enter title in Arabic"
                                value="{{ old('page_title_ar', $data->getTranslation('page_title', 'ar')) }}">
                            @error('page_title_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Page Content (English) --}}
                        <div class="mb-3">
                            <label for="page_content_en" class="form-label">Page Content (English)</label>
                            <textarea name="page_content_en" id="page_content_en" class="form-control ck-editor" rows="5"
                                placeholder="Enter content in English">{{ old('page_content_en', $data->getTranslation('page_content', 'en')) }}</textarea>
                            @error('page_content_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Page Content (Arabic) --}}
                        <div class="mb-3">
                            <label for="page_content_ar" class="form-label">Page Content (Arabic)</label>
                            <textarea name="page_content_ar" id="page_content_ar" class="form-control ck-editor" rows="5"
                                placeholder="Enter content in Arabic">{{ old('page_content_ar', $data->getTranslation('page_content', 'ar')) }}</textarea>
                            @error('page_content_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Page</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
