@extends('layout_admin.app')
@section('title')
    Transaksi Pembelian
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="py-3 mb-4">Transaksi Pembelian</h5>

            <div class="row gy-4">
                <!-- Data Tables -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Data Pembelian</h5>
                            </div>
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="text-muted float-end"><a href=""
                                        class="btn btn-primary"><i class="mdi mdi-printer mdi-20px lh-0"></i></a></div>
                                <div class="text-muted float-end"><a href="/admin/pembelian/create"
                                        class="btn btn-primary">Tambah</a></div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-truncate text-center" width="10">No</th>
                                            <th class="text-truncate text-center">Tanggal Pembelian</th>
                                            <th class="text-truncate text-center">Total Belanja</th>
                                            <th class="text-truncate text-center">Nama Supplier</th>
                                            <th class="text-truncate">Nama Kasir</th>
                                            <th class="text-truncate text-center"><i class="menu-icon tf-icons mdi mdi-cog-outline"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembelian as $p)
                                            <tr>
                                                <td class="text-truncate text-center">{{ $loop->iteration }}</td>
                                                <td class="text-truncate text-center">{{ $p->tanggal_pembelian }}</td>
                                                <td class="text-truncate text-center">{{ format_rupiah($p->total_harga) }}</td>
                                                <td class="text-truncate text-center">{{ $p->nama_pelanggan }}</td>
                                                <td class="text-truncate">{{ $p->nama_kasir }}</td>
                                                <td class="text-truncate text-center">
                                                    <div class="dropdown text-center">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="mdi mdi-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="pembelian/{{ $p->id }}/edit"><i
                                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                                            <a class="dropdown-item"
                                                                href="pembelian/hapus/{{ $p->id }}"><i
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
