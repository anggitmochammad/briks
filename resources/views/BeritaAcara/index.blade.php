@extends('layout.backend')

@push('css')

@endpush

@section('contents')
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Berita Acara
                    <span class="d-block text-muted pt-2 font-size-sm">Management Berita Acara</span></h3>
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
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita_acara as $item)
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
                                        <span class="badge badge-info">Masih Perbaikan</span>
                                    @elseif ($item->status == 99)
                                        <span class="badge badge-danger">Ditolak</span>
                                    @endif
                                    
                                    @if (isset($item->ToBeritaAcara) == true)
                                        @if ($item->ToBeritaAcara->status_berita_acara == 1)
                                            <span class="badge badge-warning">Masih Pengajuan</span>
                                        @elseif($item->ToBeritaAcara->status_berita_acara == 2)
                                            <span class="badge badge-primary">Telah Disetujui</span>
                                        @endif
                                    @else
                                        <span class="badge badge-info">Belum melakukan Pengajuan</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="{{ url('b_acara/'.$item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                    @if ($item->status_form == 2)
                                    <a href="{{ url('b_acara/create/'.$item->id) }}" class="btn btn-info">Lihat Berita Acara</a>
                                    
                                    @elseif ($item->status_form == 0)
                                        <a href="{{ url('b_acara/create/'.$item->id) }}" class="btn btn-sm btn-info">Buat Berita Acara</a>
                                        {{-- <form action="{{ url('b_acara/delete/'.$item->id) }}" id="form-{{ $item->id }}" method="get">
                                            <button type="button" class="btn btn-sm btn-danger" onclick="deleted({{ $item->id }})">Delete</button>
                                        </form> --}}
                                    @endif
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
            "iDisplayLength": 25
        });

        function deleted(id) {
            Swal.fire({
                title: 'Apakah anda yakin ingin Menghapus?',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                // denyButtonText: `Don't save`,
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-'+id).submit();
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            });
        }
    </script>
@endpush
