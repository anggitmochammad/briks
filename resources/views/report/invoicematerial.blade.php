<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Purchasing Cetak</title>
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
</head>
<body>
    <div class="container">
        <!-- begin::Card-->
        <div class="card card-custom overflow-hidden">
            <div class="card-body p-0">
                <!-- begin: Invoice-->
                <!-- begin: Invoice header-->
                <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                            <h1 class="display-4 font-weight-boldest mb-10">INVOICE</h1>
                            <div class="d-flex flex-column align-items-md-end px-0">
                                <!--begin::Logo-->
                                <a href="#" class="mb-5">
                                    <img src="../../../../theme/html/demo1/dist/assets/media/logos/logo-dark.png" alt="" />
                                </a>
                                <!--end::Logo-->
                                <span class="d-flex flex-column align-items-md-end opacity-70">
                                    <span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
                                    <span>Mississippi 96522</span>
                                </span>
                            </div>
                        </div>
                        <div class="border-bottom w-100"></div>
                        <div class="d-flex justify-content-between pt-6">
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">DATE</span>
                                <span class="opacity-70">{{ hariTglWaktuIndo($invoice->tanggal_request_perbaikan) }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">INVOICE NO.</span>
                                <span class="opacity-70">{{ $invoice->kode }}</span>
                            </div>
                            <div class="d-flex flex-column flex-root">
                                <span class="font-weight-bolder mb-2">INVOICE TO.</span>
                                <span class="opacity-70">Chief Enginer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="pl-0 font-weight-bold text-muted text-uppercase">Nama Peralatan/Material</th>
                                        <th class="text-right font-weight-bold text-muted text-uppercase">Jumlah Peralatan/Material</th>
                                        <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Harga Perlatan/Material</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $jum = 0;
                                    @endphp
                                    @foreach ($invoice->haveManyMaterial as $item)
                                        @php
                                            $jum += $item->harga
                                        @endphp
                                        <tr class="font-weight-boldest">
                                            <td class="pl-0 pt-7">{{ $item->nama_material }}</td>
                                            <td class="text-right pt-7">{{ $item->jumlah }}</td>
                                            <td class="text-danger pr-0 pt-7 text-right">{{ number_format($item->harga , 2) }}</td>
                                        </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold text-muted text-uppercase">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="font-weight-bolder">
                                        <td class="text-danger font-size-h3 font-weight-boldest">{{ number_format($jum,2) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
<script>
    $(document).ready(function() {
        window.print();
    })
</script>
</body>
</html>