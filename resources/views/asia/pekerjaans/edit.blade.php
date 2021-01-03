@extends('adminlte.master')

@section('title')
Daftar Pekerjaan
@endsection

@section('content')
<div class="m-3">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Pekerjaan ID: {{$pekerjaan->id}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form action="/pekerjaans/{{$pekerjaan->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nama Customer</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $pekerjaan->name) }}"
                        placeholder="Masukkan nama customer..." required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat',$pekerjaan->alamat) }}"
                        placeholder="Masukkan alamat customer..." required>
                </div>
                <div class="form-group">
                    <label for="kapan">Tanggal dan Waktu</label>
                    <input type="datetime-local" name="kapan" class="form-control" id="kapan"
                        value="{{ old('kapan', $pekerjaan->kapan) }}" required>
                </div>
                <div class="form-group">
                    <label for="pekerjaan">Deskripsi Pekerjaan</label>
                    <textarea id="pekerjaan" name="pekerjaan" class="form-control" placeholder="Jelaskan pekerjaan..." rows="4"
                        col="50" required>{{ old('pekerjaan', $pekerjaan->pekerjaan)}}</textarea>
                </div>
                <div class="form-group">
                    <label>Teknisi</label><br>
                    <div class="ml-4">
                    <input class="form-check-input" type="checkbox" value="1" id="1" name="teknisis_id[]">
                    <label class="form-check-label" for="1">Eko</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="2" id="2" name="teknisis_id[]">
                    <label class="form-check-label" for="2">Budi</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="3" id="3" name="teknisis_id[]">
                    <label class="form-check-label" for="3">Joko</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Jenis Pekerjaan</label><br>
                    <div class="ml-4">
                    <input class="form-check-input" type="checkbox" value="1" id="11" name="jenis_id[]">
                    <label class="form-check-label" for="11">AC</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="2" id="22" name="jenis_id[]">
                    <label class="form-check-label" for="22">Kulkas</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="3" id="33" name="jenis_id[]">
                    <label class="form-check-label" for="33">Mesin Cuci</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="text" name="nominal" class="form-control" id="nominal" value="{{ old('nominal', $pekerjaan->nominal) }}"
                        placeholder="Masukkan nominal..." required>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit Pekerjaan!</button>
                <a class="btn btn-danger" href="/pekerjaans/{{$pekerjaan->id}}">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
