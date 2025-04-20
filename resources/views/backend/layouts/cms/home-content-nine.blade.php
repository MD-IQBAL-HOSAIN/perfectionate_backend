@extends('backend.app')

@section('title', 'Edit Home Content')

@section('content')
    {{-- PAGE-HEADER --}}
    
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Loan page Banner</h2>
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
                    <form action="{{ route('home.content.nine.update', $data->id) }}" method="POST"
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
                                    <label for="button_title_one">Button Text One</label>
                                    <input type="text" name="button_title_one" id="button_title_one" class="form-control"
                                        value="{{ old('button_title_one', $data->button_title_one) }}">
                                </div>
                                @error('button_title_one')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="button_title_two">Button Text Two</label>
                                    <input type="text" name="button_title_two" id="button_title_two" class="form-control"
                                        value="{{ old('button_title_two', $data->button_title_two) }}">
                                </div>
                                @error('button_title_two')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="button_title_three">Button Text Three</label>
                                    <input type="text" name="button_title_three" id="button_title_three" class="form-control"
                                        value="{{ old('button_title_three', $data->button_title_three) }}">
                                </div>
                                @error('button_title_three')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title', $data->title) }}">
                                </div>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{ old('description', $data->description) }}</textarea>
                                </div>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                       

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image_one">Loan page Banner</label>
                                    <input type="file" name="image_one" id="image_one" class="form-control dropify"
                                        data-default-file="{{ asset($data->image_one) }}">
                                    @error('image_one')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>                           
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
@endpush
