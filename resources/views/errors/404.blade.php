@extends('errors::minimal')

@section('title', __('Not Found'))


@section('message')
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Error-->
    <div class="error error-6 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url('{{ asset('assets/media/error/bg6.jpg') }}');">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-row-fluid text-center">
            <h1 class="error-title font-weight-boldest text-white mb-12" style="margin-top: 12rem;">Oops...</h1>
            <p class="display-4 font-weight-bold text-white">Looks like something went wrong.We're working on it</p>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Error-->
</div>
@endsection
