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
                    <h3 class="card-label">Management Users
                    <span class="d-block text-muted pt-2 font-size-sm">Management Users</span></h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('users/store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Nama</label>
                        <input type="text" class="form-control" name="nama_user" @error('nama_user')
                            style="border: 1px solid red"
                        @enderror value="{{ old('nama_user') }}">
                        @error('nama_user')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">NIP</label>
                        <input type="text" class="form-control" name="nip_user" @error('nip_user')
                        style="border: 1px solid red"
                        @enderror value="{{ old('nip_user') }}">
                        @error('nip_user')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Username</label>
                          <input type="text" class="form-control" name="username" @error('username')
                          style="border: 1px solid red"
                          @enderror value="{{ old('username') }}">
                          @error('username')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Password</label>
                          <input type="password" class="form-control" name="password" @error('password')
                          style="border: 1px solid red"
                          @enderror>
                          @error('password')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                      </div>
                    <div class="form-group">
                      <label for="inputAddress2">Jabatan</label>
                        <div @error('id_role')
                        style="border: 1px solid red"
                        @enderror>
                            <select class="form-control select2" name="id_role" >
                                <option value="" selected></option>
                                @foreach ($role as $items)
                                    <option value="{{ $items->id }}">{{ $items->name }}</option>
                                @endforeach
                            </select>
                        </div>
                      @error('id_role')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Daftarkan</button>
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
                    <h3 class="card-label">Daftar User
                    <span class="d-block text-muted pt-2 font-size-sm">Management Users</span></h3>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-separate table-head-custom table-checkable" id="tb_user">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $row)
                            <tr>
                                <td>{{ $row->nip_user }}</td>
                                <td>{{ $row->nama_user }}</td>
                                <td>{{ $row->getRole->name }}</td>
                                <td class="d-flex justify-content-center">
                                    @if ($row->id_role != 1)
                                        <button type="button" class="btn btn-danger del_data" data-target="#ModalDel" data-id="{{ $row->id }}" data-title="Yakin Ingin menghapus {{ $row->nama_user }}" data-url="{{ url('user/del') }}">Hapus
                                        </button>
                                    @else
                                        <br>
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
        $('#tb_user').DataTable({
            "iDisplayLength": 25
        });
    </script>
@endpush
