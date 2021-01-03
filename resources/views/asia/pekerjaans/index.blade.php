@extends('adminlte.master')

@section('title')
    Daftar Pekerjaan
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
@endpush

@section('content')
<div class="m-3">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Pekerjaan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @if(session('disimpan'))
      <div class="alert alert-success" role="alert">
        {{ session('disimpan') }}
      </div>
      @endif
      @if(session('diubah'))
      <div class="alert alert-warning" role="alert">
        {{ session('diubah') }}
      </div>
      @endif
      @if(session('dihapus'))
      <div class="alert alert-danger" role="alert">
        {{ session('dihapus') }}
      </div>
      @endif
      @if(session('hari'))
      <div class="alert alert-danger" role="alert">
        {{ session('hari') }}
      </div>
      @endif
      <a class="btn btn-primary mb-3" href="{{ route('pekerjaans.create') }}">Buat Pekerjaan Baru</a>
      <form action="/pekerjaans" method="GET">
      <div class="row input-daterange mb-4">
        <div class="col-md-4">
          <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly/>
        </div>
        <div class="col-md-4">
          <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly/>
        </div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary">Filter</button>
          <a class="btn btn-primary" href='/'>Refresh</a>
        </div>
      </div>
    </form>
      <table id='example' class="table table-bordered table-hover">
        <thead>
          <tr class="text-center">
            <th style="width: 2%">#</th>
            <th style="width: 16%">Tanggal</th>
            <th>Nama Customer</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Nominal</th>
            <th>Teknisi</th>
            <th style="width:10%">Jenis</th>
            <th style="width: 5%">Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($pekerjaan->reverse() as $key => $item)
          <tr onclick="document.location = '/pekerjaans/{{$item->id}}';" style="cursor: pointer">
            <td>{{ $key +1 }}.</td>
            <td>{{ $item -> kapan}}</td>
            <td>{{ $item -> name}}</td>
            <td>{{ $item -> alamat}}</td>
            <td style="white-space: pre-line">{{ $item -> pekerjaan}}</td>
            {{-- @php
               $harga =  (int)$item -> nominal;
               setlocale(LC_MONETARY, 'id_ID'); 
               $myharga = money_format("%.2n", $harga);
            @endphp --}}
            <td>Rp {{ number_format($item->nominal, 2) }}</td>
            <td> 
                @foreach($item->teknisi as $tek)
                {{ $tek -> name}}, 
                @endforeach
            </td>
            <td class="text-center align-middle"> 
                @foreach($item->jenis as $jen)
                @if($jen->id === 1)
                    <button type="button" class="btn-sm btn-primary">AC</button>
                @endif
                @if($jen->id === 2)
                    <button type="button" class="btn-sm btn-danger">K</button>
                @endif
                @if($jen->id === 3)
                    <button type="button" class="btn-sm btn-warning">MC</button>
                @endif
                @endforeach
            </td>
            <td>{{ $item -> status}}</td>
          </tr>
          @empty
          <tr>
            <td colspan="9" class="text-center">Tidak ada pekerjaan!</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
              </ul>
            </div> --}}
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function() {
         $('#example').DataTable();
        } );
    </script>
    <script>
      $('.input-daterange').datepicker({
        todayBtn: 'linked',
        format: 'yyyy-mm-dd',
        autoclose:true
      });
    </script>
@endpush