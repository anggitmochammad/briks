@extends('layout.backend')

@push('css')

@endpush

@section('contents')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Dashboard-->
        <!--begin::Row-->
        <!--end::Row-->
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Peralatan
                    <span class="d-block text-muted pt-2 font-size-sm">Management Peralatan</span></h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('peralatan/store') }}" method="POST">
                    @csrf
                      <div class="form-group">
                        <label for="inputEmail4">Nama Peralatan</label>
                        <input type="text" class="form-control" name="nama_peralatan" @error('nama_peralatan')
                            style="border: 1px solid red"
                        @enderror value="{{ old('nama_peralatan') }}">
                        @error('nama_peralatan')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="inputEmail4">Lokasi Peralatan</label>
                        <input type="text" class="form-control" name="lokasi_peralatan" @error('lokasi_peralatan')
                            style="border: 1px solid red"
                        @enderror value="{{ old('lokasi_peralatan') }}">
                        @error('lokasi_peralatan')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="inputEmail4">Merk Peralatan</label>
                        <input type="text" class="form-control" name="merk_peralatan" @error('merk_peralatan')
                            style="border: 1px solid red"
                        @enderror value="{{ old('merk_peralatan') }}">
                        @error('merk_peralatan')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="inputEmail4">Detail Peralatan</label>
                        <textarea name="detail_peralatan" class="form-control" id="" cols="30" rows="10" @error('detail_peralatan')
                        style="border: 1px solid red"
                    @enderror value="{{ old('detail_peralatan') }}"></textarea>
                        @error('detail_peralatan')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                    <button type="submit" class="btn btn-primary">Tambahkan Peralatan</button>
                  </form>
            </div>
        </div>
    </div>
</div>
<br>
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Peralatan
                    <span class="d-block text-muted pt-2 font-size-sm">Management Peralatan</span></h3>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-separate table-head-custom table-peralatan" id="tb_peralatan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Peralatan</th>
                            <th>Nama Peralatan</th>
                            <th>Lokasi Peralatan</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peralatan as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->kode_peralatan }}</td>
                                <td>{{ $row->nama_peralatan }}</td>
                                <td>{{ $row->lokasi }}</td>
                                <td>
                                    @if ($row->status == 0)
                                        <span class="badge badge-success">Baik</span>
                                    @elseif ($row->status == 1)
                                        <span class="badge badge-danger">Perbaikan</span>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-danger del_data" data-target="#ModalDel" data-id="{{ $row->id }}" data-title="Yakin Ingin menghapus {{ $row->kode_peralatan }}" data-url="{{ url('peralatan/destroy') }}">Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
