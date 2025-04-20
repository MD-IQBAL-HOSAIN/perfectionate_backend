@extends('backend.app')

@section('title', 'Profile Settings')


@section('content')
    {{-- PAGE-HEADER --}}
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Profile Settings</h2>
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
                            <li class="active"><span><i class="lni lni-angle-double-right"></i></span>Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- PAGE-HEADER --}}


    <div class="row" id="user-profile">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="profile-img-main rounded"
                                    style="width: 125px; height: 125px; overflow: hidden;">
                                    <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('frontend/default-avatar-profile.jpg') }}"
                                        alt="Profile Picture" class="m-0 p-1"
                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                                </div>
                                <div class="ms-4">
                                    <h4>{{ Auth::user()->name ?? 'N/A' }}</h4>
                                    <h4>{{ Auth::user()->email ?? 'N/A' }}</h4>
                                    <a href="#" class="btn btn-primary btn-sm" id="uploadImageBtn">
                                        <i class="fa fa-rss"></i> Update Profile
                                    </a>
                                    <input type="file" name="profile_picture" id="profile_picture_input"
                                        style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-top">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" href="#editProfile" role="tab">Edit
                                Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#updatePassword" role="tab">Update
                                Password</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane active show" id="editProfile">
                    <div class="card">
                        <div class="card-body border-0">
                            <form class="row g-3 needs-validation" method="post" action="{{ route('update.profile') }}"
                                novalidate>
                                @csrf
                                @method('PATCH')
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" placeholder="Name" id="username" value="{{ Auth::user()->name }}"
                                        required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="firstname" placeholder="Email" value="{{ Auth::user()->email }}"
                                        required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="updatePassword">
                    <div class="card">
                        <div class="card-body border-0">
                            <form class="form-horizontal" method="POST" action="{{ route('update.Password') }}">
                                @csrf
                                @method('PUT')

                                <div class="row card p-4">
                                    <div class="mb-3 col-md-6">
                                        {{-- <label for="old_password" class="form-label">Current Password:</label> --}}
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                name="old_password" placeholder="Enter your current password"
                                                id="old_password">
                                            <span class="input-group-text" id="toggle-old-password">
                                                <i class="bi bi-eye-slash" id="eye-icon-old"></i>
                                            </span>
                                        </div>
                                        @error('old_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        {{-- <label for="password" class="form-label">New Password:</label> --}}
                                        <div class="input-group"> 
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" id="password" placeholder="Enter a new password">
                                            <span class="input-group-text" id="toggle-password">
                                                <i class="bi bi-eye-slash" id="eye-icon"></i>
                                            </span>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        {{-- <label for="password_confirmation" class="form-label">Confirm New
                                            Password:</label>  --}}
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" id="password_confirmation"
                                                placeholder="Confirm your new password">
                                            <span class="input-group-text" id="toggle-confirm-password">
                                                <i class="bi bi-eye-slash" id="eye-icon-confirm"></i>
                                            </span>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex mt-2 col-md-6">
                                        <button type="submit" class="btn btn-primary px-4 py-2">Update Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            // Handle Image button click to trigger file input
            $('#uploadImageBtn').click(function(e) {
                e.preventDefault();
                $('#profile_picture_input').click();
            });

            // Handle file input change to upload the selected image
            $('#profile_picture_input').change(function() {
                var formData = new FormData();
                formData.append('profile_picture', $(this)[0].files[0]);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: '{{ route('update.profile.picture') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            // Update the profile picture src in the profile settings page
                            $('.profile-img-main img').attr('src', response.image_url);

                            // Also update the profile picture in the header view page
                            $('.profile-img-change').attr('src', response.image_url);

                            toastr.success('Profile picture updated successfully.');
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function() {
                        toastr.error('An error occurred while updating the profile picture.');
                    }
                });
            });

            // Preview image before upload
            $('#profile_picture_input').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.profile-img-main img').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>

    <script>
        // Function to toggle password visibility
        function togglePassword(id, iconId) {
            const passwordField = document.getElementById(id);
            const icon = document.getElementById(iconId);

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            } else {
                passwordField.type = "password";
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            }
        }

        // Add event listeners for the toggle buttons
        document.getElementById('toggle-old-password').addEventListener('click', function() {
            togglePassword('old_password', 'eye-icon-old');
        });

        document.getElementById('toggle-password').addEventListener('click', function() {
            togglePassword('password', 'eye-icon');
        });

        document.getElementById('toggle-confirm-password').addEventListener('click', function() {
            togglePassword('password_confirmation', 'eye-icon-confirm');
        });
    </script>
    
@endpush
