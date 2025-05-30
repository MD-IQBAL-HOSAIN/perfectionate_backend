@extends('backend.app')

@section('title', 'Faq Create')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>FAQ Form</h2>
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
                                    Dashboard
                                </a>
                            </li>
                            <li class="active"><span><i class="lni lni-angle-double-right"></i></span>Faq</li>
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
                    <form method="POST" action="{{ route('faq.store') }}" >
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="question_en" class="form-label">Faq Question (English)</label>
                            <input type="text" class="form-control @error('question_en') is-invalid @enderror"
                                   name="question_en" placeholder="Faq Question English" id="question_en" value="{{ old('question_en') }}">
                            @error('question_en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group" dir="rtl">
                            <label for="question_ar" class="form-label">Faq Question (Arabic)</label>
                            <input type="text" class="form-control @error('question_ar') is-invalid @enderror"
                                   name="question_ar" placeholder="Faq Question Arabic" id="question_ar" value="{{ old('question_ar') }}">
                            @error('question_ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer_en" class="form-label">Faq Answer (English)</label>
                            <textarea class="form-control @error('answer_en') is-invalid @enderror" name="answer_en" id="answer_en" placeholder="Faq Answer English" cols="30" rows="3">{{ old('answer_en') }}</textarea>
                            @error('answer_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group" dir="rtl">
                            <label for="answer_ar" class="form-label">Faq Answer (Arabic)</label>
                            <textarea class="form-control @error('answer_ar') is-invalid @enderror" name="answer_ar" id="answer_ar" placeholder="Faq Answer Arabic" cols="30" rows="3">{{ old('answer_ar') }}</textarea>
                            @error('answer_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('faq.index') }}" class="btn btn-danger me-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
