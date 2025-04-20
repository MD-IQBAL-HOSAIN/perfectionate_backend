@extends('backend.app')

@section('title', 'Edit Home Content')

@section('content')
    {{-- PAGE-HEADER --}}

    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Home Content Five</h2>
                </div>
            </div>

            <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                    <nav>
                        <ol class="base-breadcrumb breadcrumb-three">
                            <li>
                                <a href="{{ route('dashboard') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 0a8 8 0 1 0 4.596 14.104A5.934 5.934 0 0 1 8 13a5.934 5.934 0 0 1-4.596-2.104A7.98 7.98 0 0 0 8 0zm-2 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm-1.465 5.682A3.976 3.976 0 0 0 4 9c0 1.044.324 2.01.882 2.818a6 6 0 1 1 6.236 0A3.975 3.975 0 0 0 12 9a3.976 3.976 0 0 0-.536-1.318l-1.898.633-.018-.056 2.194-.732a4 4 0 1 0-7.6 0l2.194.733-.018.056-1.898-.634z" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li class="active"><span><i class="lni lni-angle-double-right"></i></span>Home Content</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    {{-- PAGE-HEADER --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('home.content.five.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="button_text">Button Text</label>
                                    <input type="text" name="button_text" id="button_text" class="form-control"
                                        value="{{ old('button_text', $data->button_text) }}">
                                </div>
                                @error('button_text')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Main Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title', $data->title) }}">
                                </div>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="explore_title_one">Title One</label>
                                    <input type="text" name="explore_title_one" id="explore_title_one"
                                        class="form-control"
                                        value="{{ old('explore_title_one', $data->explore_title_one) }}">
                                </div>
                                @error('explore_title_one')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="explore_description_one">Description One</label>
                                    <textarea name="explore_description_one" id="explore_description_one" class="form-control" rows="4">{{ old('explore_description_one', $data->explore_description_one) }}</textarea>
                                </div>
                                @error('explore_description_one')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="explore_title_two">Title Two</label>
                                    <input type="text" name="explore_title_two" id="explore_title_two"
                                        class="form-control"
                                        value="{{ old('explore_title_two', $data->explore_title_two) }}">
                                </div>
                                @error('explore_title_two')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="explore_description_two">Description Two</label>
                                    <textarea name="explore_description_two" id="explore_description_two" class="form-control" rows="4">{{ old('explore_description_two', $data->explore_description_two) }}</textarea>
                                </div>
                                @error('explore_description_two')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="explore_title_three">Title Three</label>
                                    <input type="text" name="explore_title_three" id="explore_title_three"
                                        class="form-control"
                                        value="{{ old('explore_title_three', $data->explore_title_three) }}">
                                </div>
                                @error('explore_title_three')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="explore_description_three">Description Three</label>
                                    <textarea name="explore_description_three" id="explore_description_three" class="form-control" rows="4">{{ old('explore_description_three', $data->explore_description_three) }}</textarea>
                                </div>
                                @error('explore_description_three')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image_one">Image One</label>
                                    <input type="file" name="image_one" id="image_one" class="form-control dropify"
                                        data-default-file="{{ asset($data->image_one) }}">
                                    @error('image_one')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image_two">Image Two</label>
                                    <input type="file" name="image_two" id="image_two" class="form-control dropify"
                                        data-default-file="{{ asset($data->image_two) }}">
                                    @error('image_two')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="button_title_one">Button Title</label>
                                    <input type="text" name="button_title_one" id="button_title_one"
                                        class="form-control"
                                        value="{{ old('button_title_one', $data->button_title_one) }}">
                                </div>
                                @error('button_title_one')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Banner</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
@endpush
