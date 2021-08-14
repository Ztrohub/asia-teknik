@extends('adminlte.master')

@section('title')
Daftar Pekerjaan
@endsection

@section('content')
<div class="m-3">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Teknisi</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form action="/teknisi" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nama Teknisi</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name','') }}"
                        placeholder="Masukkan nama teknisi..." required>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah Teknisi</button>
                <a class="btn btn-danger" href="/">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
