@extends('layout_petugas.app')
@section('title')
    Transaksi Baru
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="py-3 mb-4"><span class="text-muted fw-light">Transaksi Penjualan /</span> Transaksi Baru</h5>

            <!-- Transaksi -->
            <div class="row">
                <!-- Form Penjualan -->
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Form Penjualan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3 d-flex">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Id Produk</label>
                                <div class="col-sm-9">
                                    <form method="get">
                                        {{-- <div class="form-floating form-floating-outline"> --}}
                                            <select class="select2 form-select mb-3"
                                                data-allow-clear="true" name="id_produk">
                                                <option selected>
                                                    {{ isset($produkdetail) ? $produkdetail->id : 'Nama Produk' }}
                                                </option>
                                                @foreach ($produk as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->id . ' - ' . $item->nama_produk }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-primary">Pilih</button>
                                        {{-- </div> --}}
                                    </form>
                                </div>
                            </div>
                            <form action="{{ route('detailpenjualanpetugas') }}" method="post">
                                @csrf

                                <input type="hidden" name="id_penjualan" value="{{ Request::segment(3) }}">
                                <input type="hidden" name="id_produk"
                                    value="{{ isset($produkdetail) ? $produkdetail->id : '' }}">
                                <input type="hidden" name="nama_produk"
                                    value="{{ isset($produkdetail) ? $produkdetail->nama_produk : '' }}">
                                <input type="hidden" name="subtotal" value="{{ $subtotal }}">

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-default-company">Nama Produk</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_produk"
                                            id="basic-default-company"
                                            value="{{ isset($produkdetail) ? $produkdetail->nama_produk : '' }}"
                                            disabled />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-default-company">Harga
                                        Satuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="harga"
                                            id="basic-default-company"
                                            value="{{ isset($produkdetail) ? format_rupiah($produkdetail->harga_jual) : '' }}"
                                            disabled />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-default-company">Qty</label>
                                    <div class="col-sm-9 d-flex">
                                        <a href="?id_produk={{ request('id_produk') }}&act=min&qty={{ $qty }}"
                                            class="btn btn-primary"><i class="tf-icons mdi mdi-minus"></i></a>
                                        <input type="text" class="form-control" name="jumlah_produk"
                                            id="basic-default-company" value="{{ $qty }}" />
                                        <a href="?id_produk={{ request('id_produk') }}&act=plus&qty={{ $qty }}"
                                            class="btn btn-primary"><i class="tf-icons mdi mdi-plus"></i></a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="basic-default-company">Subtotal</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="subtotal"
                                            id="basic-default-company" value="{{ format_rupiah($subtotal) }}" disabled />
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Tabel Penjualan -->
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Tabel Penjualan</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" >
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-truncate text-center">No</th>
                                            <th class="text-truncate text-center">Nama Produk</th>
                                            <th class="text-truncate text-center">QTY</th>
                                            <th class="text-truncate text-center">Subtotal</th>
                                            <th class="text-truncate text-center">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detailpenjualan as $dp)
                                            <tr>
                                                <td class="text-truncate text-center">{{ $loop->iteration }}</td>
                                                <td class="text-truncate">{{ $dp->nama_produk }}</td>
                                                <td class="text-truncate text-center">{{ $dp->jumlah_produk }}</td>
                                                <td class="text-truncate">{{ format_rupiah($dp->subtotal) }}</td>
                                                <td class="text-truncate"><a
                                                        href="/petugas/penjualan/detail/hapus?id={{ $dp->id }}"><i
                                                            class="mdi mdi-close"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pembayaran -->
            <div class="row">
                <!-- Form Member -->
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Form Member</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4 d-flex">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Cari Id</label>
                                <div class="col-sm-9">
                                    <form method="get">
                                        {{-- <div class="form-floating form-floating-outline"> --}}
                                            <select class="select2 form-select mb-3"
                                                data-allow-clear="true" name="id_pelanggan">
                                                <option selected>
                                                    {{ isset($memberdetail) ? $memberdetail->id : 'Nama Member' }}
                                                </option>
                                                @foreach ($pelanggan as $member)
                                                    <option value="{{ $member->id }}">
                                                        {{ $member->id . ' - ' . $member->nama_pelanggan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-primary">Pilih</button>
                                        {{-- </div> --}}
                                    </form>
                                </div>
                            </div>
                            <div class="row mb-3 d-flex">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Member</label>
                                <div class="col-sm-9">
                                    <form action="{{ route('memberpenjualanpetugas') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_penjualan" value="{{ Request::segment(3) }}">
                                        <input type="hidden" name="id_pelanggan"
                                            value="{{ isset($memberdetail) ? $memberdetail->id : '' }}">
                                        <input type="hidden" name="nama_pelanggan"
                                            value="{{ isset($memberdetail) ? $memberdetail->nama_pelanggan : '' }}">

                                        <div class="d-flex">
                                            <input type="text" class="form-control" name="nama_pelanggan"
                                                id="basic-default-company"
                                                value="{{ isset($memberdetail) ? $memberdetail->id.' - '.$memberdetail->nama_pelanggan : '' }}"
                                                disabled />
                                            <button type="submit" class="btn btn-primary"><i class="mdi mdi-arrow-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="row mb-3 d-flex">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Id Member</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="id_pelanggan"
                                        id="basic-default-company"
                                        value="{{ $penjualan->id_pelanggan }}" disabled />
                                </div>
                            </div> --}}
                            <div class="row mb-3 d-flex">
                                <label class="col-sm-3 col-form-label" for="basic-default-name">Nama Member</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_pelanggan"
                                        id="basic-default-company"
                                        value="{{ $penjualan->nama_pelanggan }}" disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Pembayaran -->
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Form Pembayaran</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="totalHarga">Total Belanja</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="totalHarga" name="total_harga"
                                        placeholder="" value="{{ format_rupiah($penjualan->total_harga) }}" disabled />
                                </div>
                            </div>
                            <form action="" method="get">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label" for="bayar">Bayar</label>
                                    <div class="col-sm-9 d-flex">
                                        <input type="text" class="form-control" id="bayar" name="bayar"
                                            placeholder="" value="{{ request('bayar') }}" />
                                        <button type="submit" class="btn btn-primary">Hitung</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="kembali">Kembali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kembali" placeholder=""
                                        value="{{ isset($bayar) ? format_rupiah($kembali) : 'Rp. 0' }}" disabled />
                                </div>
                            </div>
                            <form action="{{ route('updatepenjualanpetugas') }}" method="post">
                                @csrf
                                <input type="hidden" name="id_penjualan" value="{{ Request::segment(3) }}">
                                <input type="hidden" name="bayar" value="{{ request('bayar') }}">
                                <input type="hidden" name="kembali" value="{{ $kembali }}">

                                <div class="row justify-content-end">
                                    <div class="col-sm-9 d-flex">
                                        <div class="mb-2">
                                            <button type="submit" class="btn btn-info"><i
                                                        class="tf-icons mdi mdi-content-save-plus-outline"></i> Simpan</button>
                                            <a href="?print=klik" class="btn btn-success"><i
                                                    class="tf-icons mdi mdi-printer"></i> Print</a>
                                            <a href="/petugas/penjualan" class="btn btn-secondary">Selesai</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
    </div>
@endsection
