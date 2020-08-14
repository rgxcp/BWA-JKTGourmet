<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>@yield('dashboard-title')</title>

	<!-- Includes Style -->
	@include('includes.admin.style')
	<!-- Includes Style -->
</head>
<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Includes Sidebar -->
		@include('includes.admin.sidebar')
		<!-- Includes Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<!-- Includes Navbar -->
				@include('includes.admin.navbar')
				<!-- Includes Navbar -->

				<!-- Pages Content -->
				@yield('dashboard-content')
				<!-- Pages Content -->
			</div>
			<!-- End of Main Content -->

			<!-- Includes Footer -->
			@include('includes.admin.footer')
			<!-- Includes Footer -->
		</div>
		<!-- End of Content Wrapper -->
	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<form action="{{ url('logout') }}" method="POST">
					@csrf
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<button class="btn btn-primary" type="submit">Logout</button>
				</form>
			</div>
			</div>
		</div>
	</div>

	<!-- Includes Script -->
	@include('includes.admin.script')
	<!-- Includes Script -->
</body>
</html>