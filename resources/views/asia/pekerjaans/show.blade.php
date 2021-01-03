@extends('adminlte.master')

@section('title')
Detail Pekerjaan
@endsection

@section('content')
<div class="m-3">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Pekerjaan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-border">
                <tr>
                    <td style="width: 30%"><strong>ID Pekerjaan</strong></td>
                    <td>{{$pekerjaan -> id}}</td>
                </tr>
                <tr>
                    <td style="width: 30%"><strong>Nama Customer</strong></td>
                    <td> {{$pekerjaan -> name}}</td>
                </tr>
                <tr>
                    <td style="width: 30%"><strong>Alamat</strong></td>

                    <td> {{$pekerjaan -> alamat}}</td>
                </tr>
                <tr>
                    <td style="width: 30%"><strong>Tangal dan Waktu</strong>
                    </td>
                    <td> {{$pekerjaan -> kapan}}</td>
                </tr>
                <tr>
                    <td style="width: 30%"><strong>Deskripsi Pekerjaan</strong>
                    </td>
                    <td style="white-space: pre-line"> {{$pekerjaan -> pekerjaan}}</td>
                </tr>
                <tr>
                    <td style="width: 30%"><strong>Teknisi</strong></td>

                    <td>
                        @foreach ($pekerjaan -> teknisi as $tek)
                        {{$tek -> name}},
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td style="width: 30%"><strong>Jenis Pekerjaan</strong></td>
                    <td> @foreach ($pekerjaan -> jenis as $jen)
                        {{$jen -> name}},
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td style="width: 30%"><strong>Nominal</strong></td>

                    <td> Rp {{ number_format($pekerjaan->nominal, 2) }}</td>
                </tr>
                <tr>
                    <td style="width: 30%"><strong>Pembayaran</strong></td>
                    <td>
                        @if($pekerjaan -> pembayaran === "Belum")
                        <button type="button" class="btn-sm btn-danger">BELUM BAYAR</button>
                        @endif
                        @if($pekerjaan -> pembayaran === "Cash")
                        <button type="button" class="btn-sm btn-success">CASH</button>
                        @endif
                        @if($pekerjaan -> pembayaran === "Transfer")
                        <button type="button" class="btn-sm btn-warning">TRANSFER</button>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="width: 30%"><strong>Status Pekerjaan</strong></td>
                    <td> 
                        @if($pekerjaan -> status === "Belum")
                        <button type="button" class="btn-sm btn-danger">BELUM DIKERJAKAN</button>
                        @endif
                        @if($pekerjaan -> status === "Sudah")
                        <button type="button" class="btn-sm btn-success">SUDAH DIKERJAKAN</button>
                        @endif
                    </td>
                </tr>
                <tr class="spacer">
                    <td class="text-center" colspan="2">
                        <div class="d-flex justify-content-center">
                            <form action="/pekerjaans/{{$pekerjaan->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Hapus Pekerjaan">
                            </form>
                            @if($pekerjaan -> status === "Belum")
                            <form action="/pekerjaans/{{$pekerjaan->id}}/done" method="post" class="ml-2">
                                @csrf
                                @method('PUT')
                                <input type="submit" class="btn btn-success" value="Sudah Dikerjakan">
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a class="btn btn-info btn" href="/pekerjaans">Kembali</a>

            @if($pekerjaan -> pembayaran === "Belum")
            <div class="float-right d-flex justify-content-center">
                <form action="/pekerjaans/{{$pekerjaan->id}}/cash" method="post" class="ml-2">
                    @csrf
                    @method('PUT')
                    <input type="submit" class="btn btn-success" value="Bayar Cash">
                </form>
                <form action="/pekerjaans/{{$pekerjaan->id}}/tf" method="post" class="ml-2">
                    @csrf
                    @method('PUT')
                    <input type="submit" class="btn btn-warning" value="Bayar Transfer">
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection