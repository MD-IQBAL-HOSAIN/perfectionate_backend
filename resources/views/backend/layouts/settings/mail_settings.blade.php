@extends('backend.app')

@section('title', 'Mail Settings')

@section('content')
    {{-- PAGE-HEADER --}}
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Mail Settings</h2>
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
                            <li class="active"><span><i class="lni lni-angle-double-right"></i></span>Mail Settings</li>
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
                    <form method="post" action="{{ route('mail.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row mb-4">
                            <label for="mail_mailer" class="col-md-3 form-label">MAIL MAILER</label>
                            <div class="col-md-9">
                                <input class="form-control @error('mail_mailer') is-invalid @enderror" id="mail_mailer"
                                    name="mail_mailer" placeholder="Enter your mail mailer" type="text"
                                    value="{{ env('MAIL_MAILER') }}">
                                @error('mail_mailer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="mail_host" class="col-md-3 form-label">MAIL HOST</label>
                            <div class="col-md-9">
                                <input class="form-control @error('mail_host') is-invalid @enderror" id="mail_host"
                                    name="mail_host" placeholder="Enter your host" type="text"
                                    value="{{ env('MAIL_HOST') }}">
                                @error('mail_host')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="mail_port" class="col-md-3 form-label">MAIL PORT</label>
                            <div class="col-md-9">
                                <input class="form-control @error('mail_port') is-invalid @enderror" id="mail_port"
                                    name="mail_port" placeholder="Enter your mail port" type="text"
                                    value="{{ env('MAIL_PORT') }}">
                                @error('mail_port')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="mail_username" class="col-md-3 form-label">MAIL USERNAME</label>
                            <div class="col-md-9">
                                <input class="form-control @error('mail_username') is-invalid @enderror" id="mail_username"
                                    name="mail_username" placeholder="Enter your mail username" type="text"
                                    value="{{ env('MAIL_USERNAME') }}">
                                @error('mail_username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="mail_password" class="col-md-3 form-label">MAIL PASSWORD</label>
                            <div class="col-md-9">
                                <input class="form-control @error('mail_password') is-invalid @enderror" id="mail_password"
                                    name="mail_password" placeholder="Enter your mail password" type="text"
                                    value="{{ env('MAIL_PASSWORD') }}">
                                @error('mail_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="mail_encryption" class="col-md-3 form-label">MAIL ENCRYPTION</label>
                            <div class="col-md-9">
                                <input class="form-control @error('mail_encryption') is-invalid @enderror"
                                    id="mail_encryption" name="mail_encryption" placeholder="Enter your mail encryption"
                                    type="text" value="{{ env('MAIL_ENCRYPTION') }}">
                                @error('mail_encryption')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="mail_from_address" class="col-md-3 form-label">MAIL FROM ADDRESS</label>
                            <div class="col-md-9">
                                <input class="form-control @error('mail_from_address') is-invalid @enderror"
                                    id="mail_from_address" name="mail_from_address" placeholder="Enter mail from address"
                                    type="text" value="{{ env('MAIL_FROM_ADDRESS') }}">
                                @error('mail_from_address')
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
