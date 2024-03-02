@extends('layout_admin.app')
@section('title')
    User
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="py-3 mb-4">User</h5>

            <div class="row gy-4">
                <!-- Data Tables -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Data User</h5>
                                <div class="text-muted float-end"><a href="{{ route('register') }}"
                                        class="btn btn-primary">Tambah</a></div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-truncate">User</th>
                                            <th class="text-truncate">Email</th>
                                            <th class="text-truncate">Jenis Kelamin</th>
                                            <th class="text-truncate">Role</th>
                                            <th class="text-truncate">Usia</th>
                                            <th class="text-truncate text-center"><i class="menu-icon tf-icons mdi mdi-cog-outline"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $u)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($u->avatar)
                                                            <img class="w-px-40 h-auto rounded-circle me-3" src="{{ asset($u->avatar) }}" />
                                                        @else
                                                            <img class="w-px-40 h-auto rounded-circle me-3" src="{{ asset('storage/avatar/1.png') }}" />
                                                        @endif
                                                        <div>
                                                            <h6 class="mb-0 text-truncate">{{ $u->nama_lengkap }}</h6>
                                                            <small
                                                                class="text-truncate"><span>@</span>{{ $u->username }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-truncate">{{ $u->email }}</td>
                                                <td class="text-truncate">{{ $u->jenis_kelamin }}</td>
                                                <td class="text-truncate">{{ $u->role }}</td>
                                                <td class="text-truncate">{{ $u->usia }}</td>
                                                <td class="text-truncate text-center">
                                                    <div class="dropdown text-center">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="mdi mdi-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="user/edit/{{ $u->id }}"><i
                                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                                            <a class="dropdown-item"
                                                                href="user/hapus/{{ $u->id }}"><i
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
                        <a href="#" class="footer-link fw-medium">Minishop</a>
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
