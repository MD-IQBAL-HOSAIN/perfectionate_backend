@extends('backend.app')

@section('title', 'Twillio Settings')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Twillio Settings</h2>
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
                            <li class="active"><span><i class="lni lni-angle-double-right"></i></span>Twillio Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-body">
                    <form method="post" action="{{ route('twillio.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row mb-4">
                            <label for="twilio_sid" class="col-md-3 form-label">TWILIO SID</label>
                            <div class="col-md-9">
                                <input class="form-control @error('twilio_sid') is-invalid @enderror" id="twilio_sid"
                                    name="twilio_sid" placeholder="Enter your twilio sid" type="text"
                                    value="{{ env('TWILIO_SID') }}">
                                @error('twilio_sid')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="twilio_auth_token" class="col-md-3 form-label">TWILIO AUTH TOKEN</label>
                            <div class="col-md-9">
                                <input class="form-control @error('twilio_auth_token') is-invalid @enderror" id="twilio_auth_token"
                                    name="twilio_auth_token" placeholder="Enter your paystack public key" type="text"
                                    value="{{ env('TWILIO_AUTH_TOKEN') }}">
                                @error('twilio_auth_token')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="twilio_from" class="col-md-3 form-label">TWILIO FROM</label>
                            <div class="col-md-9">
                                <input class="form-control @error('twilio_from') is-invalid @enderror" id="twilio_from"
                                    name="twilio_from" placeholder="Enter your Paystack client secret" type="text"
                                    value="{{ env('TWILIO_FROM') }}">
                                @error('twilio_from')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
