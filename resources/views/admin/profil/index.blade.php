@extends('layout_admin.app')
@section('title')
    Profil
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Profil /</span> Detail Profil</h5>

            <div class="row">
                <!-- User Sidebar -->
                <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                    <!-- User Card -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="user-avatar-section">
                                <div class="d-flex align-items-center flex-column">
                                    @if ($user->avatar)
                                        <img class="img-fluid rounded mb-3 mt-4" src="{{ asset(Auth::user()->avatar) }}"
                                            height="120" width="120" alt="">
                                    @else
                                        <img class="img-fluid rounded mb-3 mt-4" src="{{ asset('storage/avatar/1.png') }}"
                                            height="120" width="120" alt="">
                                    @endif
                                    <div class="user-info text-center">
                                        <h4>{{ $user->nama_lengkap }}</h4>
                                        <span class="badge bg-label-danger rounded-pill">{{ $user->role }}</span>
                                    </div>
                                </div>
                            </div>
                            <h5 class="pb-3 border-bottom mb-3">Detail</h5>
                            <div class="info-container">
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-3">
                                        <span class="h6">Username :</span>
                                        <span>{{ $user->username }}</span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="h6">Email :</span>
                                        <span>{{ $user->email }}</span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="h6">Jenis Kelamin :</span>
                                        <span>{{ $user->jenis_kelamin }}</span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="h6">Role :</span>
                                        <span>{{ $user->role }}</span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="h6">Usia :</span>
                                        <span>{{ $user->usia }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="card mb-3">
                        <div class="card-header">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-tab-home" aria-controls="navs-tab-home" aria-selected="true">
                                        Profil
                                    </button>
                                </li>
                                {{-- <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-tab-profile" aria-controls="navs-tab-profile"
                                        aria-selected="false">
                                        Password
                                    </button>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="tab-pane fade show active" id="navs-tab-home" role="tabpanel">
                                    <form method="POST" action="{{ route('updateprofiladmin', $user->id) }}"
                                        enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        {{-- <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-name">Avatar</label>
                                            <div class="col-sm-9">
                                                <div class="button-wrapper">
                                                    <label for="upload" class="btn btn-primary me-2 mb-2" tabindex="0">
                                                        <span class="d-none d-sm-block">Upload Foto Profil</span>
                                                        <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                                                        <input type="file" class="form-control" name="avatar" id="upload" class="account-file-input" hidden
                                                            accept="image/png, image/jpeg" />
                                                    </label>
                                                    <button type="button" class="btn btn-outline-danger account-image-reset mb-2">
                                                        <i class="mdi mdi-reload d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Reset</span>
                                                    </button>
                                                    <div class="text-muted small">Diizinkan JPG atau PNG. Format 1:1</div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-name">Avatar</label>
                                            <div class="col-sm-9 d-flex">
                                                <input type="file" class="form-control me-2" id="nama_lengkap" name="avatar"
                                                    placeholder="" value="" />
                                                {{-- @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Remove my profile image"
                                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');"><i
                                                        class="mdi mdi-trash-can-outline"></i></button> --}}
                                            </div>
                                        </div>
                                        @error('nama_lengkap')
                                            <div class="alert alert-warning">
                                                <small>Nama lengkap Harus Diisi</small>
                                            </div>
                                        @enderror
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-name">Nama
                                                Lengkap</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nama_lengkap"
                                                    name="nama_lengkap" placeholder="Masukkan Nama Lengkap Kamu"
                                                    value="{{ $user->nama_lengkap }}" />
                                            </div>
                                        </div>
                                        @error('nama_lengkap')
                                            <div class="alert alert-warning">
                                                <small>Nama lengkap Harus Diisi</small>
                                            </div>
                                        @enderror
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label"
                                                for="basic-default-name">Username</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="username"
                                                    name="username" placeholder="Masukkan Nama Lengkap Kamu"
                                                    value="{{ $user->username }}" />
                                            </div>
                                        </div>
                                        @error('username')
                                            <div class="alert alert-warning">
                                                <small>Username Harus Diisi</small>
                                            </div>
                                        @enderror
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-name">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="email" name="email"
                                                    placeholder="Masukkan Nama Lengkap Kamu"
                                                    value="{{ $user->email }}" />
                                            </div>
                                        </div>
                                        @error('email')
                                            <div class="alert alert-warning">
                                                <small>Email Harus Diisi</small>
                                            </div>
                                        @enderror
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-name">Jenis
                                                kelamin</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="jenis_kelamin"
                                                    name="jenis_kelamin" placeholder="Masukkan Nama Lengkap Kamu"
                                                    value="{{ $user->jenis_kelamin }}" />
                                            </div>
                                        </div>
                                        @error('jenis_kelamin')
                                            <div class="alert alert-warning">
                                                <small>Jenis Kelamin Harus Diisi</small>
                                            </div>
                                        @enderror
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="basic-default-name">Usia</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="usia" name="usia"
                                                    placeholder="Masukkan Nama Lengkap Kamu"
                                                    value="{{ $user->usia }}" />
                                            </div>
                                        </div>
                                        @error('usia')
                                            <div class="alert alert-warning">
                                                <small>Usia Harus Diisi</small>
                                            </div>
                                        @enderror
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="navs-tab-profile" role="tabpanel">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">
                                        With supporting text below as a natural lead-in to additional content.
                                    </p>
                                    <a href="javascript:void(0);" class="btn btn-primary">Go profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
    </div>
@endsection
