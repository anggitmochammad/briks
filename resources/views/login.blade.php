<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>BRIKS | maintenance</title>
    {{-- FAVICON --}}
    <link rel="shortcut icon" href="{{ asset('logo/logo BRIKS buat kop 2_Layer 1_Layer 1.png') }}" />

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">

    <script src="{{asset('assets/js/pages/features/miscellaneous/bootstrap-notify1894.js?v=7.1.9')}}"></script>


</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				{{-- <div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div> --}}
                {{-- <br>
                @foreach ($user as $user)
                    <h1>{{$user->username}}</h1><br>
                    <h1>{{$user->password}}</h1>
                @endforeach --}}

			</div>
			<div class="card-body">
				<form action="{{ url('prosesLogin') }}" method="post" class="py-3">
                    @csrf
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name="username">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="password">
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Pusat pengolahan data maintenance
				</div>
                <div class="d-flex justify-content-center links">
					PT. BRIKS PLAZA BRI Surabaya
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
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle1894.js?v=7.1.9') }}"></script>
<!--end::Page Vendors-->
<script>
    @if (session()->has('success'))
        alert_type("<i class='fas fa-cloud-upload-alt text-light mr-2'></i>",'success',"{{ session()->get('success') }}");
    @endif
    @if (session()->has('warning'))
        alert_type("<i class='far fa-edit mr-3 text-light'></i>",'warning',"{{ session()->get('warning') }}");
    @endif
    @if (session()->has('danger'))
        alert_type("<i class='fas fa-exclamation-triangle text-light mr-3'></i>",'danger',"{{ session()->get('danger') }}");
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
