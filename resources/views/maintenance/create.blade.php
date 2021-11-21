@extends('layout.backend')

@push('css')

@endpush

@section('contents')
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Maintenance
                    <span class="d-block text-muted pt-2 font-size-sm">Management Maintenance</span></h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('maintenance/store') }}" method="POST">
                    @csrf
                      <div class="form-group">
                        <label for="inputEmail4">Nama Judul</label>
                        <input type="text" class="form-control" name="judul">
                      </div>
                      <div class="form-group">
                        <label for="inputEmail4">Nama Peralatan</label>
                        <select name="peralatan_id" class="form-control select2">
                            <option value="" selected>Pilih</option>
                            @foreach ($peralatan as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_peralatan }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail4">Tanggal Maintenance</label>
                        <input type="date" class="form-control" name="tgl_main" value="{{ date('Y-m-d') }}">
                      </div>
                      <div class="form-group">
                        <label for="inputEmail4">Nama Pelaksana Maintenance</label>
                        <input type="text" class="form-control" name="pelaksana">
                      </div>
                      <div class="form-group">
                        <label for="inputEmail4">Hasil Maintenance</label>
                        <textarea name="hasil_main" class="form-control" id="" cols="30" rows="10"></textarea>
                      </div>
                    <a href="{{ url('maintenance') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $('#tb_peralatan').DataTable({
            "iDisplayLength": 25
        });
    </script>
@endpush
