@extends('backend.app')

@section('title', 'Google Login Settings')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Google Login Settings</h2>
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
                            <li class="active"><span><i class="lni lni-angle-double-right"></i></span>Google Login Settings</li>
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
                    <form method="post" action="{{ route('credentials.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="paypal_sandbox_client_id" value="{{ env('PAYPAL_SANDBOX_CLIENT_ID') }}">
                        <input type="hidden" name="paypal_sandbox_client_secret" value="{{ env('PAYPAL_SANDBOX_CLIENT_SECRET') }}">
                        <input type="hidden" name="stripe_key" value="{{ env('STRIPE_KEY') }}">
                        <input type="hidden" name="stripe_secret" value="{{ env('STRIPE_SECRET') }}">

                        <div class="row mb-4">
                            <label for="mail_host" class="col-md-3 form-label">GOOGLE CLIENT ID</label>
                            <div class="col-md-9">
                                <input class="form-control @error('google_client_id') is-invalid @enderror" id="google_client_id"
                                       name="google_client_id" placeholder="Enter your GOOGLE CLIENT KEY" type="text"
                                       value="{{ env('GOOGLE_CLIENT_ID') }}">
                                @error('google_client_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="mail_password" class="col-md-3 form-label">GOOGLE SECRET ID</label>
                            <div class="col-md-9">
                                <input class="form-control @error('google_client_secret_id') is-invalid @enderror" id="google_client_secret_id"
                                       name="google_client_secret_id" placeholder="Enter your GOOGLE SECRET ID" type="text"
                                       value="{{ env('GOOGLE_CLIENT_SECRET_ID') }}">
                                @error('google_client_secret_id')
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
