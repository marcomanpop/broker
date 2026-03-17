	<!-- jQuery & Toastify JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="assets/plugins/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Charts JS -->
	<script src="assets/plugins/chart.js/chart.min.js"></script>
	<script src="assets/js/index-charts.js"></script>


	<!-- Page Specific JS -->
	<script src="assets/js/app.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.js" integrity="sha512-79j1YQOJuI8mLseq9icSQKT6bLlLtWknKwj1OpJZMdPt2pFBry3vQTt+NZuJw7NSd1pHhZlu0s12Ngqfa371EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Get URL parameters
			var urlParams = new URLSearchParams(window.location.search);
			var message = urlParams.get("message");
			var type = urlParams.get("type"); // Type: success, error, warning, info

			if (message) {
				// Define class based on type
				var toastClass = "";
				switch (type) {
					case "success":
						toastClass = "toast-success";
						break;
					case "error":
						toastClass = "toast-error";
						break;
					case "warning":
						toastClass = "toast-warning";
						break;
					case "info":
					default:
						toastClass = "toast-info";
						break;
				}

				// Show Toastify message
				Toastify({
					text: decodeURIComponent(message),
					duration: 3000,
					close: true,
					gravity: "top",
					position: "center",
					stopOnFocus: true,
					className: toastClass,
				}).showToast();

				// Remove message & type from URL
				var newUrl = window.location.pathname + window.location.search.replace(/([?&])message=[^&]+/, '').replace(/([?&])type=[^&]+/, '').replace(/&$/, '');
				window.history.replaceState({}, document.title, newUrl);
			}
		});
	</script>

	</body>

	</html>