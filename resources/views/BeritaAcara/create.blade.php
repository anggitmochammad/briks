@extends('layout.backend')

@push('css')

@endpush

@section('contents')

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Form Maintenance 
                    <span class="d-block text-muted pt-2 font-size-sm">Management Maintenance</span></h3>
                </div>
                @if (!isset($main->haveOne_to_req_perbaikan->status_request_perbaikan) == 0)
                    <div class="card-toolbar">
                        <a href="{{ url('report/ce/'.$main->id) }}" target="_blank" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>Laporan
                        </a>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="inputEmail4">Nama Judul</label>
                    <input type="text" class="form-control" value="{{ $berita->judul }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Nama Peralatan</label>
                    <input type="text" class="form-control" value="{{ $berita->havePeralatan->nama_peralatan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Tanggal Maintenance</label>
                    <input type="text" class="form-control" name="tgl_main" value="{{ tglIndo($berita->tanggal_maintenance) }}" readonly>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Nama Pelaksana Maintenance</label>
                    <input type="text" class="form-control" readonly name="pelaksana" value="{{ $berita->pelaksana_maintenance }}">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Hasil Maintenance</label>
                    <textarea name="hasil_main" class="form-control" id="" cols="30" rows="10" readonly>{{ $berita->hasil_maintenance }}</textarea>
                </div>
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
                    <h3 class="card-label">Form Berita Acara 
                    @if (isset($berita->ToBeritaAcara->status_berita_acara) == true)
                        @if ($berita->ToBeritaAcara->status_berita_acara == 2)
                            <span class="badge badge-primary">Sudah disetujui</span>  
                        @elseif($berita->ToBeritaAcara->status_berita_acara == 1)  
                            <span class="badge badge-warning">Proses Pengajuan</span>  
                        @elseif($berita->ToBeritaAcara->status_berita_acara == 99)  
                            <span class="badge badge-danger">Ditolak</span>  
                        @endif
                        
                    @endif
                    <span class="d-block text-muted pt-2 font-size-sm">Management Berita Acara</span></h3>
                </div>
            </div>
            <div class="card-body">
                @if ($berita->status_form == 2)
                    @include('BeritaAcara.created_done')
                @elseif($berita->status_form == 0)
                    @include('BeritaAcara.created')
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $('#btn_store').click(function() {
            Swal.fire({
                title: 'Apakah anda yakin ingin Menambahkan berita acara?',
                showCancelButton: true,
                confirmButtonText: 'Tambahkan',
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#form_sbmt').submit();
                }
            });
        });
    </script>
@endpush
