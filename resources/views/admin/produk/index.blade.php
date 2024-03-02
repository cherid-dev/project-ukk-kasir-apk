@extends('layout_admin.app')
@section('title')
    Produk
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="py-3 mb-4">Produk</h5>

            <div class="row gy-4">
                <!-- Data Tables -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header  d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Data Produk</h5>
                            </div>
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="text-muted float-start"><a href="{{ route('printprodukadmin') }}"
                                    class="btn btn-primary"><i class="mdi mdi-printer mdi-20px lh-0"></i> Cetak Laporan</a></div>
                                <div class="text-muted float-end"><a href="{{ route('tambahprodukadmin') }}"
                                        class="btn btn-primary">Tambah</a></div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-truncate text-center" width="10%">No</th>
                                            <th class="text-truncate text-center">Nama Produk</th>
                                            <th class="text-truncate text-center">Kategori</th>
                                            <th class="text-truncate text-center">Harga Beli</th>
                                            <th class="text-truncate text-center">Harga Jual</th>
                                            <th class="text-truncate text-center">Satuan</th>
                                            <th class="text-truncate text-center">Stok</th>
                                            <th class="text-truncate text-center" width="10%"><i class="menu-icon tf-icons mdi mdi-cog-outline"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produk as $p)
                                            <tr>
                                                <td class="text-truncate text-center">{{ $loop->iteration }}</td>
                                                <td class="text-truncate">{{ $p->nama_produk }}</td>
                                                <td class="text-truncate text-center">{{ $p->nama_kategori }}</td>
                                                <td class="text-truncate text-center">{{ format_rupiah($p->harga_beli) }}</td>
                                                <td class="text-truncate text-center">{{ format_rupiah($p->harga_jual) }}</td>
                                                <td class="text-truncate text-center">{{ $p->satuan }}</td>
                                                <td class="text-truncate text-center">{{ $p->stok }}</td>
                                                <td class="text-truncate text-center">
                                                    <div class="dropdown text-center">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="mdi mdi-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="produk/edit/{{ $p->id }}"><i
                                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                                            <a class="dropdown-item"
                                                                href="produk/hapus/{{ $p->id }}"><i
                                                                    class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Data Tables -->
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
