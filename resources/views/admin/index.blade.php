@extends('layout_admin.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="py-3 mb-4">Dashboard</h5>

            <!-- Dashboard -->
            <div class="row gy-4 mb-4">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title m-0 me-2">User</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-6 mb-3">
                                <div class="col-md-6 col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-initial bg-primary rounded shadow">
                                                <i class="mdi mdi-account-outline mdi-24px"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="mb-0">{{ $pengguna }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title m-0 me-2">Produk</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-6 mb-3">
                                <div class="col-md-6 col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-initial bg-warning rounded shadow">
                                                <i class="mdi mdi-shopping-outline mdi-24px"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="mb-0">{{ $produk }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title m-0 me-2">Member</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-6 mb-3">
                                <div class="col-md-6 col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-initial bg-success rounded shadow">
                                                <i class="mdi mdi-card-account-details-outline mdi-24px"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="mb-0">{{ $pelanggan }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title m-0 me-2">Supplier</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-6 mb-3">
                                <div class="col-md-6 col-6">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar">
                                            <div class="avatar-initial bg-dark rounded shadow">
                                                <i class="mdi mdi-truck-cargo-container mdi-24px"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <h5 class="mb-0">{{ $supplier }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Dashboard -->

            <!-- Pendapatan -->
            <div class="row mb-2">
                <div class="col-xl mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">Total Pengeluaran</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 mt-md-3 mb-md-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-info rounded shadow">
                                            <i class="mdi mdi-cash-minus mdi-24px"></i>
                                        </div>
                                    </div>
                                    <h2 class="m-3">{{ format_rupiah($pengeluaran) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">Total Pendapatan</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 mt-md-3 mb-md-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-info rounded shadow">
                                            <i class="mdi mdi-cash-plus mdi-24px"></i>
                                        </div>
                                    </div>
                                    <h2 class="m-3">{{ format_rupiah($penghasilan) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl mb-3">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">Laba Bersih</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 mt-md-3 mb-md-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-info rounded shadow">
                                            <i class="mdi mdi-currency-usd mdi-24px"></i>
                                        </div>
                                    </div>
                                    <h2 class="m-3">{{ format_rupiah($laba) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Pendapatan -->

            <!-- Total Profit Chart & Last month balance -->
            {{-- <div class="row gy-4 mb-4">
                <div class="col-xl">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6 pe-md-0">
                                <div class="card-header">
                                    <h5 class="mb-0">Total Profit</h5>
                                </div>
                                <div class="card-body">
                                    <div id="totalProfitChart"></div>
                                </div>
                            </div>
                            <div class="col-md-6 border-start ps-md-0">
                                <hr class="d-block d-md-none my-0">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-1">$482.85k</h5>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="totalProfit"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical mdi-24px"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalProfit">
                                                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-body mb-0">Last month balance $234.40k</p>
                                </div>
                                <div class="card-body pt-3">
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <div class="avatar">
                                            <div class="avatar-initial bg-label-success rounded">
                                                <i class="mdi mdi-trending-up mdi-24px"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3 d-flex flex-column">
                                            <h6 class="mb-1">$48,568.20</h6>
                                            <small>Total Profit</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <div class="avatar">
                                            <div class="avatar-initial bg-label-primary rounded">
                                                <i class="mdi mdi-account-outline mdi-24px"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3 d-flex flex-column">
                                            <h6 class="mb-1">$38,453.25</h6>
                                            <small>Total Income</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <div class="avatar">
                                            <div class="avatar-initial bg-label-secondary rounded">
                                                <i class="mdi mdi-cellphone-link mdi-24px"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3 d-flex flex-column">
                                            <h6 class="mb-1">$2,453.45</h6>
                                            <small>Total Expense</small>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#laporan">Cetak Laporan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--/ Total Profit Chart & Last month balance -->

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

@includeIf('admin.laporan.laporan')
@endsection
