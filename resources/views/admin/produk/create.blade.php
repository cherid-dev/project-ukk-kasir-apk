@extends('layout_admin.app')
@section('title')
    Produk Baru
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Produk /</span> Produk Baru</h5>

            <div class="row gy-4">
                <!-- Form Tambah Produk -->
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Tambah Produk</h5>
                            <div class="text-muted float-end"><a href="{{ route('produkadmin') }}" class="btn btn-secondary">Kembali</a></div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('actionprodukadmin') }}" method="post">
                                @csrf
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname" name="nama_produk"
                                        placeholder="Masukkan Nama Produk" />
                                    <label for="basic-default-fullname">Nama Produk</label>
                                </div>
                                <div class="form-floating form-floating-outline mb-4">
                                    <select class="select2 form-select mb-3" data-allow-clear="true" name="nama_kategori">
                                        <option selected>--Pilih--</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->nama_kategori }}">
                                                {{ $item->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="basic-default-fullname">Nama Kategori</label>
                                </div>
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname" name="harga_beli"
                                        placeholder="Masukkan Harga Beli Produk" />
                                    <label for="basic-default-fullname">Harga Beli</label>
                                </div>
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname" name="harga_jual"
                                        placeholder="Masukkan Harga Jual Produk" />
                                    <label for="basic-default-fullname">Harga Jual</label>
                                </div>
                                <div class="form-floating form-floating-outline mb-4">
                                    <select class="select2 form-select mb-3" data-allow-clear="true" name="satuan">
                                            <option selected>--Pilih--</option>
                                            <option value="Pcs">Pcs</option>
                                            <option value="Box">Box</option>
                                            <option value="Dus">Dus</option>
                                            <option value="Pack">Pack</option>
                                            <option value="Botol">Botol</option>
                                            <option value="Kaleng">Kaleng</option>
                                            <option value="Bungkus">Bungkus</option>
                                    </select>
                                    <label for="basic-default-fullname">Satuan</label>
                                </div>
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname" name="stok"
                                        placeholder="Masukkan Stok Produk" />
                                    <label for="basic-default-fullname">Stok</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
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
