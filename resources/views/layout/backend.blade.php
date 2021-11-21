<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BRIKS | maintenance</title>
    {{-- FAVICON --}}
    <link rel="shortcut icon" href="{{ asset('Logo/logo BRIKS buat kop 2_Layer 1_Layer 1.png') }}" />

    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('assets/css/themes/layout/header/base/light1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/header/menu/light1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('assets/css/themes/layout/brand/dark1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/aside/dark1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('assets/css/themes/layout/brand/light1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/aside/light1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->

    @stack('css')
</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        <!--begin::Logo-->
        <div>

        </div>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Aside Mobile Toggle-->
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
            <!--end::Aside Mobile Toggle-->
            <!--begin::Header Menu Mobile Toggle-->
            {{-- <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
                <span></span>
            </button> --}}
            <!--end::Header Menu Mobile Toggle-->
            <!--begin::Topbar Mobile Toggle-->
            <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/User.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </button>
            <!--end::Topbar Mobile Toggle-->
        </div>
        <!--end::Toolbar-->
    </div>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
            <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                @include('layout.brand')

                @include('layout.asidemenu')
            </div>

            {{-- WREAPER --}}
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                @include('layout.header')

                {{-- Content --}}
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    {{-- Content --}}
                    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
                        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center flex-wrap mr-2">
                                <!--begin::Page Title-->
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">BRIKS</h5>
                                <!--end::Page Title-->
                                <!--begin::Breadcrumb-->
                                {{-- <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="#" class="text-muted">Menu</a>
                                    </li>
                                </ul> --}}
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Toolbar-->
                            <div class="d-flex align-items-center">
                                <a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="Select dashboard daterange" data-placement="left">
                                    <span class="text-muted font-size-base font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today</span>
                                    <span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">Aug 16</span>
                                </a>
                                <!--end::Daterange-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                    </div>
                    @yield('contents')
                </div>
                <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                    @include('layout.footer')
                </div>
            </div>

            @include('layout.user')

            <!--begin::Scrolltop-->
            <div id="kt_scrolltop" class="scrolltop">
                <span class="svg-icon">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Up-2.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                            <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="ModalDel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Hapus</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_del">
                    @csrf
                    <p id="title"></p>
                    <input type="hidden" name="id" id="id_del">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
          </div>
        </div>
      </div>



<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle1894.js?v=7.1.9') }}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle1894.js?v=7.1.9') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle1894.js?v=7.1.9') }}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle1894.js?v=7.1.9') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/js/pages/widgets1894.js?v=7.1.9') }}"></script>
<!--end::Page Scripts-->
{{-- Select2 --}}
<script src="{{ asset('assets/js/pages/crud/forms/widgets/select21894.js?v=7.1.9') }}"></script>
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle1894.js?v=7.1.9') }}"></script>
<!--end::Page Vendors-->
{{-- Form repeat --}}
<script src="{{ asset('assets/js/pages/crud/forms/widgets/form-repeater1894.js?v=7.1.9') }}"></script>

<script src="{{ asset('assets/js/pages/features/miscellaneous/sweetalert21894.js?v=7.1.9') }}"></script>


@stack('js')
<script>
$('.del_data').on('click' , function () {
    let id = $(this).data('id');
    let title = $(this).data('title');
    let url = $(this).data('url');
    $('#title').text(title);
    $('#id_del').val(id);
    $('#form_del').attr('action' , url);
    $('#ModalDel').modal("show");
});

@if (session()->has('success'))
    alert_type("<i class='fas fa-cloud-upload-alt text-light mr-2'></i>Sukses",'success',"{{ session()->get('success') }}");
@endif
@if (session()->has('warning'))
    alert_type("<i class='far fa-edit mr-3 text-light'></i>Pemberitahuan",'warning',"{{ session()->get('warning') }}");
@endif
@if (session()->has('danger'))
    alert_type("<i class='fas fa-exclamation-triangle text-light mr-3'></i>Gagal",'danger',"{{ session()->get('danger') }}");
@endif
function alert_type(title,type,message) {
    var KTBootstrapNotifyDemo={
    init:function(){
    var t={
        message: message
    };
    t.title=title
    var e=$.notify(t,
        {
            type:type,
            timer:1000,
            placement:
            {
                from:"bottom",
                align:"right"
            },
            z_index:"1000",
            animate:
            {
                enter:"animate__animated animate__bounce",
                exit:"animate__animated animate__bounce"
            }
        });
    }
    };
    jQuery(document).ready((function(){KTBootstrapNotifyDemo.init()}));
}

</script>
</body>
</html>
