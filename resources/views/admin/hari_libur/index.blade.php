@include('admin.layouts.components.asset_datatables')
@extends('admin.layouts.index')

@section('title')
<h1>
  Hari Libur Kehadiran
</h1>
@endsection

@section('breadcrumb')
<li class="active">Hari Libur Kehadiran</li>
@endsection

@section('content')

@include('admin.layouts.components.notifikasi')

<div class="box box-info">
  <div class="box-header with-border">
    @if (can('u'))
      <a href="{{ route('kehadiran_hari_libur.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
      <a href="{{ route('kehadiran_hari_libur.import') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-calendar"></i> Import</a>
    @endif
    @if (can('h'))
      <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '{{ route('kehadiran_hari_libur.delete') }}')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i class='fa fa-trash-o'></i> Hapus</a>
    @endif  
  </div>
  <div class="box-body">
    {!! form_open(null, 'id="mainform" name="mainform"') !!}
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="tabeldata">
        <thead>
          <tr>
            <th><input type="checkbox" id="checkall"/></th>
            <th class="padat">NO</th>
            <th class="padat">AKSI</th>
            <th>TANGGAL</th>
            <th>KETERANGAN</th>
          </tr>
        </thead>
      </table>
    </div>
    </form>
  </div>
</div>

@include('admin.layouts.components.konfirmasi_hapus')

@endsection

@push('scripts')
<script>
  $(document).ready(function () {
    var TableData = $('#tabeldata').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: "{{ route('kehadiran_hari_libur.datatables') }}",
      columns: [
        { data: 'ceklist', class: 'padat', searchable: false, orderable: false },
        { data: 'DT_RowIndex', class: 'padat', searchable: false, orderable: false },
        { data: 'aksi', class: 'aksi', searchable: false, orderable: false},
        { data: 'tanggal', name: 'tanggal', searchable: true, orderable: true },
        { data: 'keterangan', name: 'keterangan', searchable: true, orderable: true },
      ],
      order: [[ 3, 'asc' ]]
    });
  });
</script>
@endpush
