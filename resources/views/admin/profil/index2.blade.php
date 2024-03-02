@extends('layout_admin.app')
@section('content')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card mb-4"">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ asset('storage/avatar/' . Auth::user()->avatar) }}" alt="Profile" class="rounded-circle">
                        <h2>Name : {{ $user->nama_lengkap }}</h2>
                        <h3>Email : {{ $user->email }}</h3>
                        <h3>Level : {{ $user->role }}</h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">




                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('updateprofiladmin', $user->id) }}"
                                    enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImage"
                                            class="col-md-4 col-lg-3 col-form-label">{{ __('Change Profile Photo') }}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="pt-2">

                                                <!-- <img src="{{ asset('assets/template') }}/assets/img/profile-img.jpg" alt="Profile"> -->
                                                @if ($user->photo)
                                                    <img src="{{ asset('storage/photos/' . Auth::user()->photo) }}"
                                                        alt="Profile" class="rounded-circle">
                                                @else
                                                    <img src="{{ asset('storage/photos/profile.png') }}"
                                                        class="img-thumbnail rounded mx-auto d-block">
                                                @endif
                                                <!-- <img src="{{ asset('app/public/photos/' . Auth::user()->photo) }}" > -->
                                            </div>
                                            <div class="pt-2">

                                                <input id="photo" type="file" class="form-control" name="photo">
                                                <!-- <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a> -->
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Remove my profile image"
                                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');"><i
                                                        class="bi bi-trash"></i></button>

                                                <!-- <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');">Delete</button> -->

                                            </div>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName"
                                            class="col-md-4 col-lg-3 col-form-label">{{ __('Name') }}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="fullName"
                                                value="{{ $user->name }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address"
                                            class="col-md-4 col-lg-3 col-form-label">{{ __('Email Address') }}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="text" class="form-control" id="Address"
                                                value="{{ $user->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address"
                                            class="col-md-4 col-lg-3 col-form-label">{{ __('No Telepon') }}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="no_telp" type="text" class="form-control" id="Address"
                                                value="{{ $user->no_telp }}">
                                            @error('no_telp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Address"
                                            class="col-md-4 col-lg-3 col-form-label">{{ __('Alamat') }}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="alamat" type="text" class="form-control" id="Address"
                                                value="{{ $user->alamat }}">
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Address"
                                            class="col-md-4 col-lg-3 col-form-label">{{ __('Jenis Kelamin') }}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="jenis_kelamin" type="text" class="form-control"
                                                id="Address" value="{{ $user->jenis_kelamin }}">
                                            @error('jenis_kelamin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone"
                                            class="col-md-4 col-lg-3 col-form-label">{{ __('Level') }}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="level" type="text" class="form-control" id="level"
                                                value="{{ $user->level }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary"
                                            onclick="return confirm('Apakah Anda Yakin Melakukan Perubahan?');">Save
                                            Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->
                            </div>

                            <!-- <div class="tab-pane fade pt-3" id="profile-settings">

                      

                    </div> -->

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <!-- <hr> -->
                                @if (session('warning'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('warning') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <form method="POST" action=""
                                    enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf

                                    <!-- <div class="row mb-3">
                          <label for="Address" class="col-md-4 col-lg-3 col-form-label">{{ __('Email Address') }}</label>
                          <div class="col-md-8 col-lg-9">
                            <input name="email" type="email" class="form-control" id="Address" value="{{ $user->email }}" disabled> -->
                                    <!-- @error('email')
        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
    @enderror -->
                                    <!-- </div>
                        </div> -->



                                    <div class="row mb-3">
                                        <label for="old_password"
                                            class="col-md-4 col-lg-3 col-form-label">{{ __('Old Password') }}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="old_password" type="password"
                                                class="form-control @error('old_password') is-invalid @enderror"
                                                name="old_password" autocomplete="old_password">
                                            @error('old_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-lg-3 col-form-label">{{ __('New Password') }}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                autocomplete="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm"
                                            class="col-md-4 col-lg-3 col-form-label">{{ __('Confirm Password') }}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password_confirmation" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                autocomplete="password">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary"
                                            onclick="return confirm('Apakah Anda Yakin Melakukan Perubahan?');">Update</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
