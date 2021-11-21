<form action="{{ url('ce/approve/b_acara') }}" id="form_sbmt" method="POST">
    @csrf
    <input type="hidden" name="main_id" id="main_id" value="{{ $berita->id }}">
    <input type="hidden" name="berita_acara_id" value="{{ $berita->ToBeritaAcara->id }}">
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
    
    {{-- <a href="{{ url('b_acara') }}" class="btn btn-secondary">Kembali</a> --}}
    @if (Auth::user()->id_role == 4)
        @if ($berita->ToBeritaAcara->status_berita_acara == 1)
            <div class="form-group">
                <label></label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="check">
                    <label class="form-check-label" for="defaultCheck1" class="error" style="">
                    Ketika anda mencentang maka akan secara otomatis anda akan menyetujui.
                    </label>
                    <span id="spnError" class="error" style="display: none">Tolong Dicetang Terlebih dahulu dan Pastikan semuanya benar.</span>
                </div>
            </div>
            <button type="button" class="btn btn-primary" id="approve">Setujui</button>
            <button type="button" class="btn btn-danger" id="reject">Tolak</button>
        @endif
    @endif
    
</form>

@push('js')
    <script>
        $('#approve').click(function () {
            var check = $('#check').is(':checked');
            if (check == true) {
                $('#form_sbmt').submit();
            }
            else {
                $('#spnError').css({'display': 'block'});
                $('.error').css({'color': 'red'})
            }
        });
        $('#reject').click(function() {
            Swal.fire({
                title: 'Apakah anda yakin ingin menolak?',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                // denyButtonText: `Don't save`,
                }).then((result) => {
                if (result.isConfirmed) {
                    let id = $('#main_id').val();
                    $.ajax({
                        url: "{{ url('ce/b_acara/reject') }}",
                        method: "POST",
                        data: {
                            id_main:id,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data == 1) {
                                location.reload();  
                            }
                        }
                    });
                }
            });
        });
        
    </script>
@endpush

