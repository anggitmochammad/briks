<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

		
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<title>Report-CE</title>
	

</head>
<body style="
margin-top: 1cm;
margin-bottom: 2cm;
margin-left: 2cm;
margin-right: 2cm; text-align: justify">
	<div class="row">
		<div class="col-xl-12">
			<section class="hk-sec-wrapper hk-invoice-wrap pa-35" >
				<div class="invoice-from-wrap">
				<div class="row">
                    <div class="col-md-2 mb-20">
						<a href="login" class="logo logo-admin"><img src="{{ asset('Logo/logo BRIKS buat kop 2_Layer 1.png') }}" 	height="100" alt="logo"></a>
                        {{-- <address>
							<span class="d-block">Jl. Kembangkuning No. 03, Pakis,</span>
							<span> Kec. Sawahan, Kota Surabaya</span>
							<span class="d-block">serviceoffice@gmail.com</span>
						</address> --}}
                    </div>
					<div class="col-md-1"></div>
					<div class="col-md-6 ml-4 mb-20 pl-5">
                        <div>&nbsp;</div>
                        <div>&nbsp;</div>
						<h3>
							<b style="font-size: 30px">
								Request Perbaikan
							</b>
						</h3>
						
                    </div>
					<br>
					
                    {{-- <div class="col-md-5">
						<table class="ml-5 pl-5" style="width:auto;">
							<tr class="">
								<th style="width:25%">
									No BA
								</th>
								<td>&ensp;&emsp;</td>
								<td>&ensp;&emsp;</td>
								<td colspan="4">: 
									
								</td>
							</tr>
							<tr>
								<th style="width:25%">
									Tanggal
								</th>
								<td>&ensp;&emsp;</td>
								<td>&ensp;&emsp;</td>
								<td colspan="4">: 
									{{ tglIndo($main->tanggal_maintenance) }}
								</td>
							</tr>
							<tr>
								<th style="width:25%">
									Perihal
								</th>
								<td>&ensp;&emsp;</td>
								<td>&ensp;&emsp;</td>
								<td colspan="4">: 
									{{ $main->judul }}
								</td>
							</tr>
							<tr>
								<th style="width:25%">
									Nama PT
								</th>
								<td>&ensp;&emsp;</td>
								<td>&ensp;&emsp;</td>
								<td colspan="4">: 
									PT. BRIKS
								</td>
							</tr>
						</table>
                    </div> --}}
                    {{-- <div class="col-md-3 mb-20">
                        <h4 class="mb-35 font-weight-600">: 123445</h4>
                        <h5 class="mb-35 d-block font-weight-600">: 21 Oktober 2021<span class="pl-10 text-dark"></span></h5>
                        <h5 class="d-block font-weight-600">: Pemeliharaan ruangan ber ac agar dingin<span class="pl-10 text-dark"></span></h5>
                        <h5 class="d-block font-weight-600">: PT. BRIKS<span class="pl-10 text-dark"></span></h5>
                    </div> --}}
				</div>
				<br>
				<div class="row">
					<div class="col">
						<table class="table table-borderless">
							<tr>
								<td style="width: 10%">Tanggal</td>
								<td>: Pembayaran</td>
							</tr>
							<tr>
								<td style="width: 10%">Tanggal</td>
								<td>: Pembayaran</td>
							</tr>
						</table>
					</div>
					<div class="col">
						<table class="table table-borderless">
							<tr>
								<td>Work&nbsp;Item</td>
								<td>: Pembayaran</td>
							</tr>
							<tr>
								<td style="width: 10%">Section</td>
								<td>: Pembayaran</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
				<hr class="mt-3" style="border: 1px solid black">
				<br>
				<table border="1" style="width:100%">
					<tr>
						<th style="width: 25%; text-align: center">NO</th>
						<th style="width: 55%; text-align: center">DESCRIPTION OF GOODS</th>
						<th style="width: 25%; text-align: center">QUANTITY</th>
					</tr>
					<tbody>
						@foreach ($main->haveOne_to_req_perbaikan->haveManyMaterial as $item)
							<tr>
								<td class="text-center">{{ $loop->iteration }}</td>
								<td class="text-center">{{ $item->nama_material }}</td>
								<td class="text-center">{{ $item->jumlah }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<br><br>
				<div class="row">
					<div class="col">
						<table class='ml-5 pl-5' style="width: 100%">
							<tr>
								<td></td>
								<td></td>
								<td style="width: 40%; text-align: center;">
									<h6>Dibuat Oleh, </h6>
									{{-- <h6>CHIEF ENGINER</h6> --}}
									<img style="" src="{{ asset('uploads/ttd/'.$ce_by->file_ttd) }}" alt="">
									<h6><u>{{ $ce_by->nama_user }}</u></h6>
									<h6>Jabatan</h6>
									<h6>{{ Auth::user()->getRole->name }}</h6>
								</td>
							</tr>
						</table>
					</div>
					<div class="col">
						<table class='mr-5 pr-5' style="width: 100%">
							<tr>
								<td></td>
								<td></td>
								<td style="width: 40%; text-align: center;">
									<h6>Disetujui Oleh, </h6>
									{{-- <h6>MANAGER</h6> --}}
									<img style="" src="{{ asset('uploads/ttd/'.$user_create->file_ttd) }}" alt="">
									<h6><u>{{ $user_create->nama_user }}</u></h6>
									<h6>Jabatan</h6>
									<h6>{{ Auth::user()->getRole->name }}</h6>
								</td>
							</tr>
						</table>
					</div>
				</div>
				{{-- <h5>Pada hari dan Tanggal ini , {{ hariTglWaktuIndo($main->tanggal_maintenance) }}  telah dilakukan maintenance di : Nama peralatan / equipment</h5>
				<br>
				<div class="container" style="border: 1px solid black;min-height: 10vh;">
					<h5>asdasdqweqwe</h5>
				</div>
				<br>
				<h5>Ditemukan kerusakan :</h5>
				<br>
				<div class="container" style="border: 1px solid black;min-height: 10vh;">
					<br>
					<h5>asdjoaijsiod</h5>
				</div>
				<br>
				<h5>Request Material :</h5>
				<br>
				<div class="container" style="border: 1px solid black;height: auto;" >
					<br>
					<div class="table-wrap">
						<table class="table table-striped table-border mb-0">
							<thead>
								<tr>
									<td>No</td>
									<td>Nama Barang</td>
									<td>Harga</td>
								</tr>
							</thead>
							<tbody>
								@foreach ($main->haveOne_to_req_perbaikan->haveManyMaterial as $item)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $item->nama_material }}</td>
										<td>{{ $item->harga }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div> --}}
				{{-- <div class="invoice-details">
					<div class="table-wrap">
						<div class="table-responsive">
							<table class="table table-striped table-border mb-0">
							<thead>
								<th>Nama Fasilitas</th>
								<th>Jumlah</th>
								<th class="text-right">Total Jumlah</th>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td>x  Jam</td>
									<td class="text-right">Rp</td>
								</tr>
								<tr>
									<td colspan="2" style="text-align: left;">TOTAL</td>
									<td class="text-right">Rp</td>
								</tr>
							</tbody>
							</table>
						</div>
					</div>
				</div> --}}
			</section>
		</div>
	</div>
</body>
</html>

<script>
	window.addEventListener(window.print());
</script>