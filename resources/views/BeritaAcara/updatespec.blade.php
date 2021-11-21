@extends('layout.backend')

@push('css')

@endpush

@section('contents')

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
                {{-- <input type="hidden" name="main_id" id="main_id" value="{{ $berita->id }}">
                <input type="hidden" name="berita_acara_id" value="{{ $berita->ToBeritaAcara->id }}"> --}}
                <div class="form-group">
                    <label for="inputEmail4">*Nama Berita Acara</label>
                    <input type="text" class="form-control" value="{{ $berita->ToBeritaAcara->nama_berita_acara }}" readonly name="name_b_acara" @error('name_b_acara')
                        style="border: 1px solid red"
                    @enderror>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">*Kronologi</label>
                    <input type="text" value="{{ $berita->ToBeritaAcara->kronologi}}" readonly class="form-control" name="kronologi" @error('kronologi')
                    style="border: 1px solid red"
                    @enderror>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">*Kode Dokumentasi</label>
                    <input type="text" value="{{ $berita->ToBeritaAcara->kode_dokumentasi }}" class="form-control" name="kode_dokumentasi" @error('kode_dokumentasi')
                    style="border: 1px solid red"
                    @enderror readonly>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">*Analisa Masalah</label>
                    <textarea name="analisa_masalah" class="form-control" id="" cols="30" rows="10" @error('analisa_masalah')
                    style="border: 1px solid red"
                    @enderror readonly>{{ $berita->ToBeritaAcara->analisa_masalah }}</textarea>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">*Rekomendasi</label>
                    <textarea name="rekomendasi" class="form-control" id="" cols="30" rows="10" @error('rekomendasi')
                    style="border: 1px solid red"
                    @enderror readonly>{{$berita->ToBeritaAcara->rekomendasi }}</textarea>
                </div>
                
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
