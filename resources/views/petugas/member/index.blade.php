@extends('layout_petugas.app')
@section('title')
    Member
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="py-3 mb-4">Member</h5>

            <div class="row gy-4">
                <!-- Data Tables -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Data Member</h5>
                                <div class="text-muted float-end"><a href="{{ route('tambahmemberpetugas') }}"
                                        class="btn btn-primary">Tambah</a></div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-truncate text-center" width="10">No</th>
                                            <th class="text-truncate text-center">Nama Lengkap</th>
                                            <th class="text-truncate text-center">Jenis Kelamin</th>
                                            <th class="text-truncate text-center">Alamat</th>
                                            <th class="text-truncate text-center">No. Handphone</th>
                                            <th class="text-truncate text-center" width="10"><i class="menu-icon tf-icons mdi mdi-cog-outline"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pelanggan as $m)
                                            <tr>
                                                <td class="text-truncate text-center">{{ $loop->iteration }}</td>
                                                <td class="text-truncate">{{ $m->nama_pelanggan }}</td>
                                                <td class="text-truncate text-center">{{ $m->jenis_kelamin }}</td>
                                                <td class="text-truncate text-center">{{ $m->alamat }}</td>
                                                <td class="text-truncate text-center">{{ $m->no_telp }}</td>
                                                <td>
                                                    <div class="dropdown text-center">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="mdi mdi-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="member/edit/{{$m->id}}"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                                            <a class="dropdown-item" href="member/hapus/{{$m->id}}"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
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
