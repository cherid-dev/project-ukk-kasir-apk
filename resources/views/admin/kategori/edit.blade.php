@extends('layout_admin.app')
@section('title')
    Kategori Edit
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Kategori /</span> Kategori Edit</h5>

            <div class="row gy-4">
                <!-- Form Edit Kategori -->
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Edit Kategori</h5>
                            <div class="text-muted float-end"><a href="{{ route('kategoriadmin') }}"
                                    class="btn btn-secondary">Kembali</a></div>
                        </div>
                        <div class="card-body">
                            <form action="{{ $kategori->id }}" method="post">
                                @csrf
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        name="nama_kategori" placeholder="Masukkan Nama Kategori"
                                        value="{{ $kategori->nama_kategori }}" />
                                    <label for="basic-default-fullname">Nama Kategori</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Form Edit Kategori -->
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
        <!-- Content wrapper -->
    </div>
@endsection
