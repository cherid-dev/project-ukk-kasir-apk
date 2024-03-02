@extends('layout_admin.app')
@section('title')
    Supplier Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Supplier /</span> Supplier Edit</h5>

            <div class="row gy-4">
                <!-- Form Tambah Produk -->
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Edit Supplier</h5>
                            <div class="text-muted float-end"><a href="{{ route('supplieradmin') }}" class="btn btn-secondary">Kembali</a></div>
                        </div>
                        <div class="card-body">
                            <form action="{{ $supplier->id }}" method="post">
                                @csrf
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname" name="nama_supplier"
                                        placeholder="Masukkan Nama Lengkap" value="{{ $supplier->nama_supplier }}" />
                                    <label for="basic-default-fullname">Nama Lengkap</label>
                                </div>
                                <div class="form-floating form-floating-outline mb-4">
                                    <select class="form-select" name="jenis_kelamin">
                                        <option>{{ $supplier->jenis_kelamin }}</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                      </select>
                                    <label for="role">Jenis Kelamin</label>
                                </div>
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname" name="no_telp"
                                        placeholder="Masukkan No. Handphone Aktif" value="{{ $supplier->no_telp }}" />
                                    <label for="basic-default-fullname">No. Handphone</label>
                                </div>
                                <div class="form-floating form-floating-outline mb-4">
                                    <textarea
                                      class="form-control h-px-100"
                                      id="exampleFormControlTextarea1" name="alamat"
                                      placeholder="Masukkan Alamat Lengkp">{{ $supplier->alamat }}</textarea>
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                  </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
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
