@extends('layout.backend')

@section('contents')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Profile Account Information-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                <!--begin::Profile Card-->
                <div class="card card-custom ">
                    <!--begin::Body-->
                    <div class="card-body pt-4">
                        <!--end::Toolbar-->
                        <!--begin::User-->
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                <div class="symbol symbol-success mr-3">
                                    <h5 class="symbol-label font-size-h5">{{ substr(Auth::user()->nama_user,0,1) }}</h5>
                                </div>
                            </div>
                            <div>
                                <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->nama_user }}</a>
                                <div class="text-muted">{{ Auth::user()->getRole->name }}</div>
                            </div>
                        </div>
                        <!--end::User-->
                        <!--begin::Contact-->
                        <div class="py-9">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">Username:</span>
                                <a href="#" class="text-muted text-hover-primary">{{ Auth::user()->username }}</a>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">NIP:</span>
                                <span class="text-muted">{{ Auth::user()->nip_user }}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="font-weight-bold mr-2">Role:</span>
                                <span class="text-muted">{{ Auth::user()->getRole->name }}</span>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Profile Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Header-->
                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Account Information</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account settings</span>
                        </div>
                        <div class="card-toolbar">
                            <button type="button" id="btn_submit" class="btn btn-success mr-2">Save</button>
                            @if (isset(Auth::user()->file_ttd))
                                <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-info mr-2">Lihat tanda tangan</button>
                            @endif
                            <button type="reset" class="btn btn-secondary ">Cancel</button>
                            
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form" id="form_submit" method="POST" action="{{ url('profile') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">NIP</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div>
                                        <input class="form-control form-control-lg form-control-solid" type="text" value="{{ Auth::user()->nip_user }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Username</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div>
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="username" value="{{ Auth::user()->username }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Upload ttd</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div>
                                        <input type="file" name="file_upload" id="">
                                    </div>
                                    <small><b>*Ukuran foto 150x150 pixel</b></small>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Profile Account Information-->
    </div>
    <!--end::Container-->
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tanda Tangan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="{{ asset('uploads/ttd/'.Auth::user()->file_ttd) }}" alt="tanda tangan">
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#btn_submit').click(function () {
                Swal.fire({
                    title: 'Apakah anda yakin ingin merubah?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Save',
                    denyButtonText: `Don't save`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        // Swal.fire('Saved!', '', 'success')
                        $('#form_submit').submit();
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                });
            });
        });
    </script>
@endpush