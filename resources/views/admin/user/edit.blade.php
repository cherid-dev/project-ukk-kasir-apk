@extends('layout_admin.app')
@section('title')
    User Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">User /</span> User Edit</h5>

            <div class="row gy-4">
                <!-- Form Tambah Produk -->
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Edit User</h5>
                            <div class="text-muted float-end"><a href="{{ route('useradmin') }}" class="btn btn-secondary">Kembali</a></div>
                        </div>
                        <div class="card-body">
                        <form id="formAuthentication" class="mb-3" action="{{ route('updateuseradmin', $user->id ) }}" method="post">
                            @csrf
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                    placeholder="Masukkan Nama Lengkap Kamu" value="{{ $user->nama_lengkap }}" autofocus />
                                <label for="nama_lengkap">Nama Lengkap</label>
                            </div>
                            @error('nama_lengkap')
                                <div class="alert alert-warning">
                                    <small>Nama lengkap Harus Diisi</small>
                                </div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukkan Username Kamu" value="{{ $user->username }}" />
                                <label for="username">Username</label>
                            </div>
                            @error('username')
                                <div class="alert alert-warning">
                                    <small>Username Harus Diisi</small>
                                </div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukkan Email Kamu" value="{{ $user->email }}" />
                                <label for="email">Email</label>
                            </div>
                            @error('email')
                                <div class="alert alert-warning">
                                    <small>Email Harus Diisi</small>
                                </div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-3">
                                <select class="form-select" name="jenis_kelamin">
                                    <option selected>{{ $user->jenis_kelamin }}</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                  </select>
                                <label for="role">Jenis Kelamin</label>
                            </div>
                            @error('role')
                                <div class="alert alert-warning">
                                    <small>Jenis Kelamin Harus Diisi</small>
                                </div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-3">
                                <select class="form-select" name="role">
                                    <option selected>{{ $user->role }}</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Petugas">Petugas</option>
                                  </select>
                                <label for="role">Role</label>
                            </div>
                            @error('role')
                                <div class="alert alert-warning">
                                    <small>Role Harus Diisi</small>
                                </div>
                            @enderror
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="number" class="form-control" id="usia" name="usia"
                                    placeholder="Masukkan Usia Kamu" value="{{ $user->usia }}" />
                                <label for="usia">Usia</label>
                            </div>
                            @error('usia')
                                <div class="alert alert-warning">
                                    <small>Usia Harus Diisi</small>
                                </div>
                            @enderror
                            <button type="submit" class="btn btn-primary d-grid w-100">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Form Tambah Produk -->
        </div>
    </div>
    <!-- / Content -->

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl">
            <div
                class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
                <div class="text-body mb-3 mb-md-0">
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    <a href="#"
                        class="footer-link fw-medium">Minishop</a>
                </div>
                <div class="d-none d-lg-inline-block">
                    <span>Versi 1.0</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
@endsection
