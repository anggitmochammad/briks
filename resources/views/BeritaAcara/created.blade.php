<form action="{{ url('b_acara/store') }}" id="form_sbmt" method="POST">
    @csrf
    <input type="hidden" name="main_id" value="{{ $berita->id }}">
    <div class="form-group">
        <label for="inputEmail4">*Nama Berita Acara</label>
        <input type="text" class="form-control" name="name_b_acara" @error('name_b_acara')
            style="border: 1px solid red"
        @enderror>
        @error('name_b_acara')
            <small style="color: red">Harap diisi</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="inputEmail4">*Kronologi</label>
        <input type="text" class="form-control" name="kronologi" @error('kronologi')
        style="border: 1px solid red"
        @enderror>
        @error('kronologi')
            <small style="color: red">Harap diisi</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="inputEmail4">*Kode Dokumentasi</label>
        <input type="text" class="form-control" name="kode_dokumentasi" @error('kode_dokumentasi')
        style="border: 1px solid red"
        @enderror>
        @error('kode_dokumentasi')
            <small style="color: red">Harap diisi</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="inputEmail4">*Analisa Masalah</label>
        <textarea name="analisa_masalah" class="form-control" id="" cols="30" rows="10" @error('analisa_masalah')
        style="border: 1px solid red"
        @enderror></textarea>
    
        @error('analisa_masalah')
            <small style="color: red">Harap diisi</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="inputEmail4">*Rekomendasi</label>
        <textarea name="rekomendasi" class="form-control" id="" cols="30" rows="10" @error('rekomendasi')
        style="border: 1px solid red"
        @enderror></textarea>
    
        @error('rekomendasi')
            <small style="color: red">Harap diisi</small>
        @enderror
    </div>
    <a href="{{ url('b_acara') }}" class="btn btn-secondary">Kembali</a>
    <button type="button" class="btn btn-primary" id="btn_store">Tambahkan</button>
    </form>