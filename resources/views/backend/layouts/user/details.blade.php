@extends('backend.app')

@section('title', 'Valet Details')

@push('styles')

@endpush

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>User Details</h2>
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
                                    Table
                                </a>
                            </li>
                            <li class="active"><span><i class="lni lni-angle-double-right"></i></span>User</li>
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Valet Name</label>
                                <input type="text" name="name" value="{{ $data->name }}" class="form-control @error('name') is-invalid @enderror" disabled >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Shop -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Valet Email</label>
                                <input type="text" name="email" value="{{ $data->email }}" class="form-control @error('email') is-invalid @enderror" disabled >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Shop -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number">Number</label>
                                <input type="text" name="number" value="{{ $data->number }}" class="form-control @error('number') is-invalid @enderror" disabled >
                                @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Shop -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" name="country" value="{{ $data->country }}" class="form-control @error('country') is-invalid @enderror" disabled >
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="meet_requirement"> Meet Requirement</label>
                                <select name="meet_requirement" id="meet_requirement" class="form-select" disabled readonly>
                                    <option value="0" {{ $data->valetProfile->meet_requirement == 0 ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $data->valetProfile->meet_requirement == 1 ? 'selected' : '' }}>Yes</option>
                                </select>
                                @error('meet_requirement')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="paper_work"> Digital Signature </label>
                                <div class="">
                                    <img src="{{ asset($data->valetProfile->paper_work) }}" alt="" style="height: 100px; width: auto;">
                                </div>
                                @error('paper_work')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meet_requirement"> Photo ID </label>
                                <div class="">
                                    @foreach($data->valetProfile->images as $images)
                                        <img src="{{ asset($images->image_path) }}" alt="" style="height: 200px; width: auto; margin: 10px;">
                                    @endforeach
                                </div>
                                @error('meet_requirement')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
