@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ $user->name }}</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">

                <div class="col-12 col-md-6">
                    <div class="card">
                        <form method="post"
                            action="{{ route('admin.profile.update', auth()->guard('admin')->user()->id) }}"
                            class="needs-validation" novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">

                                <div class="col-12">
                                    <div id="image-preview" class="image-preview mb-3">
                                        <label for="image-upload" id="image-label">Choose File'</label>
                                        <input type="file" name="image" id="image-upload">
                                        <input type="hidden" name="old_image" value="{{ $user->image }}">

                                    </div>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" required=""
                                        name="name">
                                    <div class="invalid-feedback">
                                        Please fill in the name
                                    </div>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Email</label>
                                    <input type="text" class="form-control" value="{{ $user->email }}" required=""
                                        name="email">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <form method="post" action="{{ route('admin.profile-password.update', $user->id) }}"
                            class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Update Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group col-12">
                                    <label>Old Password</label>
                                    <input type="password" class="form-control" value="" required=""
                                        name="current_password">
                                    <div class="invalid-feedback">
                                        Please fill in the old password
                                    </div>
                                    @error('current_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" value="" required=""
                                        name="password">
                                    <div class="invalid-feedback">
                                        Please fill in the new password
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Confirmed Password</label>
                                    <input type="password" class="form-control" value="" required=""
                                        name="password_confirmation">
                                    <div class="invalid-feedback">
                                        Please fill in the confirmed password
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                "background-image": "url({{ asset($user->image) }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        })
    </script>
@endpush
