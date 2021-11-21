@extends('layout.backend')

@push('css')

@endpush

@section('contents')

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Request Perbaikan
                    <span class="d-block text-muted pt-2 font-size-sm">Management Request Perbaikan</span></h3>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-separate table-head-custom table-checkable mt-10 display nowrap responsive" id="tb_main">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Kode Maintenance</th>
                            <th>Nama Peralatan</th>
                            <th>Tanggal Maintenance</th>
                            <th>Nama Pelaksana</th>
                            <th>Status</th>
                            {{-- <th>contoh</th> --}}
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($main as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->kode_maintenance }}</td>
                                <td>{{ $item->havePeralatan->nama_peralatan }}</td>
                                <td>{{ tglIndo($item->tanggal_maintenance) }}</td>
                                <td>{{ $item->pelaksana_maintenance }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <span class="badge badge-success">Telah Diperbaiki</span>
                                    @elseif ($item->status == 1)
                                        <span class="badge badge-danger">Masih Perbaikan</span>
                                    @endif
                                </td>
                                {{-- {{ dd($item->haveOne_to_req_perbaikan->id) }} --}}
                                {{-- <td>{{ $item->haveOne_to_req_perbaikan->id }}</td> --}}
                                <td class="align-middle">
                                    <a href="{{ url('perbaikan/'.$item->id) }}" class="btn btn-primary">Detail</a>
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
        $('#tb_main').DataTable({
            "iDisplayLength": 15,
            "columnDefs": [
                { "width": "20%", "targets": 2 },
                { "width": "5%", "targets": 0 }
            ]
        });
    </script>
@endpush
