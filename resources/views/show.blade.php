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
                    <h3 class="card-label">Grafik Mainenance
                    <span class="d-block text-muted pt-2 font-size-sm">Maintenance</span></h3>
                </div>
            </div>
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>
                
            </div>
        </div>
    </div>
</div>
<br>
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-6 mb-5">
                <div class="card card-custom mb-8 mb-lg-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-4x">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Code/Compiling.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                                            <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Get Started</a>
                                <div class="text-dark-75">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy since the 1500s.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 mb-5">
                <div class="card card-custom wave wave-animate-slow mb-8 mb-lg-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-warning svg-icon-4x">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Shopping/Chart-bar1.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5" />
                                            <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5" />
                                            <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero" />
                                            <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Jumlah Maintenance</a>
                                <div class="text-dark-75"><h3>{{ $count }}</h3></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        let data = [];
        let bulan_1 = {!! json_encode($main_1) !!}
        data.push(bulan_1);
        let bulan_2 = {!! json_encode($main_2) !!}
        data.push(bulan_2);
        let bulan_3 = {!! json_encode($main_3) !!}
        data.push(bulan_3);
        let bulan_4 = {!! json_encode($main_4) !!}
        data.push(bulan_4);
        let bulan_5 = {!! json_encode($main_5) !!}
        data.push(bulan_5);
        let bulan_6 = {!! json_encode($main_6) !!}
        data.push(bulan_6);
        let bulan_7 = {!! json_encode($main_7) !!}
        data.push(bulan_7);
        let bulan_8 = {!! json_encode($main_8) !!}
        data.push(bulan_8);
        let bulan_9 = {!! json_encode($main_9) !!}
        data.push(bulan_9);
        let bulan_10 = {!! json_encode($main_10) !!}
        data.push(bulan_10);
        let bulan_11 = {!! json_encode($main_11) !!}
        data.push(bulan_11);
        let bulan_12 = {!! json_encode($main_12) !!}
        data.push(bulan_12);

        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Grafik Jumlah Maintenance'
            },
            subtitle: {
                text: 'Tahun '+ {!! json_encode($tahun) !!}
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'Mei',
                    'Jun',
                    'Jul',
                    'Agu',
                    'Sep',
                    'Okt',
                    'Nov',
                    'Des'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
            tooltip: {
                 allowDecimals: false,
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Total Maintenance ',
                data: data

            }]
        });










        // $('#kt_datatable1').DataTable({
        //     "scrollY": 500,
        //     "scrollX": true,
        //     dom: 'Bfrtip',
        //     buttons: [
        //         {
        //             extend: 'excelHtml5',
        //             messageTop:"Data File Berguna",
        //             exportOptions: {
        //                 columns: ':visible'
        //             }
        //         },
        //         {
        //             extend: 'pdfHtml5',
        //             orientation: 'landscape',
        //             pageSize: 'LEGAL'
        //         }
        //     ],
        //     initComplete: function () {
        //     this.api().columns().every( function (index) {
        //         var column = this;
        //         if (index == 1) {
        //             var select = $('<select class="form-control"><option value="">Pilih semua</option></select>')
        //             .appendTo( $(column.footer()).empty() )
        //             .on( 'change', function () {
        //                 var val = $.fn.dataTable.util.escapeRegex(
        //                     $(this).val()
        //                 );

        //                 column
        //                     .search( val ? '^'+val+'$' : '', true, false )
        //                     .draw();
        //             } );

        //         column.data().unique().sort().each( function ( d, j ) {
        //             select.append( '<option value="'+d+'">'+d+'</option>' )
        //         } );
        //         }

        //     } );
        // }
        // });
    </script>
@endpush
