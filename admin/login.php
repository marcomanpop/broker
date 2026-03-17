<?php
session_start();

if (isset($_SESSION['admin_id'])) {
	header("Location: dashboard.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Login</title>

	<!-- Meta -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="shortcut icon" href="assets/images/icons8-login-ios-17-outlined-32.png" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.css" integrity="sha512-UiKdzM5DL+I+2YFxK+7TDedVyVm7HMp/bN85NeWMJNYortoll+Nd6PU9ZDrZiaOsdarOyk9egQm6LOJZi36L2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="assets/css/portal.css" />
	<link id="theme-style" rel="stylesheet" href="assets/css/toast-style.css" />
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

</head>

<body class="app app-login p-0">
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<h2 class="auth-heading text-center mb-5">Admin Login</h2>

					<div class="auth-form-container text-start">
						<form class="auth-form login-form" id="loginForm" method="POST" action="assets/php/login.php">
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input
									id="signin-email"
									name="signin-email"
									type="text"
									class="form-control signin-email"
									placeholder="Username"
									required="required" />
							</div>
							<!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input
									id="signin-password"
									name="signin-password"
									type="password"
									class="form-control signin-password"
									placeholder="Password"
									required="required" />
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input
												class="form-check-input"
												type="checkbox"
												value=""
												id="RememberPassword" />
											<label class="form-check-label" for="RememberPassword">
												Remember me
											</label>
										</div>
									</div>
								</div>
								<!--//extra-->
							</div>
							<!--//form-group-->
							<div class="text-center">
								<button
									type="submit"
									class="btn app-btn-primary w-100 theme-btn mx-auto">
									Log In
								</button>
							</div>
						</form>

						<div class="auth-option text-center pt-5">
							No Account? Sign up
							<a class="text-link" href="signup.php">here</a>.
						</div>
					</div>
					<!--//auth-form-container-->
				</div>
				<!--//auth-body-->

			</div>
			<!--//flex-column-->
		</div>
		<!--//auth-main-col-->
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			<div class="auth-background-holder"></div>
			<div class="auth-background-mask"></div>
			<div class="auth-background-overlay p-3 p-lg-5">
				<div class="d-flex flex-column align-content-end h-100">
					<div class="h-100"></div>
				</div>
			</div>
			<!--//auth-background-overlay-->
		</div>
		<!--//auth-background-col-->
	</div>
	<!--//row-->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.js" integrity="sha512-79j1YQOJuI8mLseq9icSQKT6bLlLtWknKwj1OpJZMdPt2pFBry3vQTt+NZuJw7NSd1pHhZlu0s12Ngqfa371EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var urlParams = new URLSearchParams(window.location.search);
			var message = urlParams.get("message");

			if (message) {
				Toastify({
					text: "Invalid Credentials!",
					duration: 3000,
					close: true,
					gravity: "top",
					position: "center",
					stopOnFocus: true,
					className: "toast-error",
				}).showToast();

				// Remove 'message' parameter from URL after displaying the toast
				var newUrl = window.location.pathname + window.location.search.replace(/([?&])message=[^&]+/, '').replace(/&$/, '');
				window.history.replaceState({}, document.title, newUrl);
			}
		});
	</script>

</body>

</html>