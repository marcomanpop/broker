<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
	header("Location: login.php");
	exit();
}

require 'assets/php/config/connection.php';

$admin = $_SESSION['admin_id'];

$sql = "SELECT * FROM signal_packages ORDER BY id ASC";
$result = $conn->query($sql);

$signal_packages = [];
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$signal_packages[] = $row;
	}
}
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Signal Packages</title>
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/admin-favicon.png">

	<!-- Meta -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- App CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.min.css" integrity="sha512-UiKdzM5DL+I+2YFxK+7TDedVyVm7HMp/bN85NeWMJNYortoll+Nd6PU9ZDrZiaOsdarOyk9egQm6LOJZi36L2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="assets/css/portal.css" />
	<link id="theme-style" rel="stylesheet" href="assets/css/toast-style.css" />
</head>

<body class="app">
	<header class="app-header fixed-top">
		<div class="app-header-inner">
			<div class="container-fluid py-2">
				<div class="app-header-content">
					<div class="row justify-content-between align-items-center">
						<div class="col-auto">
							<a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
									<title>Menu</title>
									<path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
								</svg>
							</a>
						</div>
						<!--//col-->

						<div class="app-utilities col-auto">
							<div class="app-utility-item app-notifications-dropdown dropdown">
								<a href="notifications.php" role="button" aria-expanded="false" title="Notifications">
									<i class="fa-solid fa-bell fa-xl"></i>
									<?php if ($total_unread > 0) : ?>
										<span class="icon-badge"><?= $total_unread; ?></span>
									<?php endif; ?>
								</a>
							</div>
							<!--//app-utility-item-->

							<div class="app-utility-item app-user-dropdown dropdown">
								<a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="assets/images/user.png" alt="user profile" /></a>
								<ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
									<li>
										<a class="dropdown-item" href="dashboard.php">Account</a>
									</li>
									<li>
										<hr class="dropdown-divider" />
									</li>
									<li>
										<a class="dropdown-item" href="assets/php/logout.php">Log Out</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="app-sidepanel" class="app-sidepanel">
			<div id="sidepanel-drop" class="sidepanel-drop"></div>
			<div class="sidepanel-inner d-flex flex-column">
				<a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
				<div class="app-branding">
					<a class="app-logo" href="#"><img class="logo-icon me-2" src="assets/images/admin-logo.png" alt="logo" /><span class="logo-text">ADMIN</span></a>
				</div>
				<!--//app-branding-->

				<?php include 'assets/php/nav.php'; ?>

				<!--//app-nav-->
				<div class="app-sidepanel-footer">
					<nav class="app-nav app-nav-footer">
						<ul class="app-menu footer-menu list-unstyled">

							<li class="nav-item">

								<a class="nav-link" href="assets/php/logout.php">
									<span class="nav-icon">
										<i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>
									</span>
									<span class="nav-link-text">Logout</span> </a><!--//nav-link-->
							</li>
							<!--//nav-item-->
						</ul>
						<!--//footer-menu-->
					</nav>
				</div>
				<!--//app-sidepanel-footer-->
			</div>
			<!--//sidepanel-inner-->
		</div>
	</header>

	<div class="app-wrapper">
		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<h1 class="app-page-title">Signal Packages</h1>
				<hr class="mb-4" />

				<!-- Create New Miner Button -->
				<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createMinerModal">
					+ Create New Signal Pacakge
				</button>

				<div class="tab-content" id="orders-table-tab-content">
					<div class="tab-pane fade show active" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
						<div class="row g-4 settings-section">
							<div class="col-12">
								<div class="app-card app-card-settings shadow-sm p-4">
									<div class="app-card-body">

                                    <!-- Dynamic Signal Package Cards -->
                                    <?php if (!empty($signal_packages)) : ?>
                                        <?php foreach ($signal_packages as $signal_package) : ?>
                                            <div class="card border-success mb-3 text-center">
                                                <div class="card-header">
                                                    <?= htmlspecialchars($signal_package['name']); ?>
                                    
                                                    <!-- Edit Button -->
                                                    <button class="btn btn-sm btn-warning float-end" data-bs-toggle="modal" data-bs-target="#editSignalPackageModal<?= $signal_package['id']; ?>">
                                                        Edit
                                                    </button>
                                    
                                                    <!-- Delete Button -->
                                                    <button class="btn btn-sm btn-danger float-end me-2" data-bs-toggle="modal" data-bs-target="#deleteSignalPackageModal<?= $signal_package['id']; ?>">
                                                        Delete
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Price</th>
                                                                <td><?= number_format($signal_package['price'], 2); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Accuracy</th>
                                                                <td><?= htmlspecialchars($signal_package['accuracy']); ?>%</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">ROI</th>
                                                                <td><?= htmlspecialchars($signal_package['roi']); ?>%</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Duration</th>
                                                                <td><?= htmlspecialchars($signal_package['duration']); ?> days</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                    
                                            <!-- Edit Signal Package Modal -->
                                            <div class="modal fade" id="editSignalPackageModal<?= $signal_package['id']; ?>" tabindex="-1" aria-labelledby="editSignalPackageModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Signal Package: <?= htmlspecialchars($signal_package['name']); ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="assets/php/update_signal_packages.php">
                                                                <input type="hidden" name="signal_package_id" value="<?= $signal_package['id']; ?>">
                                    
                                                                <div class="mb-3">
                                                                    <label class="form-label">Name</label>
                                                                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($signal_package['name']); ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">ROI (%)</label>
                                                                    <input type="number" class="form-control" name="roi" value="<?= htmlspecialchars($signal_package['roi']); ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Accuracy (%)</label>
                                                                    <input type="number" class="form-control" name="accuracy" value="<?= $signal_package['accuracy']; ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Price</label>
                                                                    <input type="number" class="form-control" name="price" value="<?= $signal_package['price']; ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Duration (days)</label>
                                                                    <input type="number" class="form-control" name="duration" value="<?= $signal_package['duration']; ?>" required>
                                                                </div>                                                                    
                                                                <button type="submit" class="btn btn-success">Update Signal Package</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade" id="deleteSignalPackageModal<?= $signal_package['id']; ?>" tabindex="-1" aria-labelledby="deleteSignalPackageModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Confirm Deletion</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete the signal package <strong><?= htmlspecialchars($signal_package['name']); ?></strong>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="POST" action="assets/php/delete_signal_package.php">
                                                                <input type="hidden" name="signal_package_id" value="<?= $signal_package['id']; ?>">
                                                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <p class="text-center">No Signal Packages available.</p>
                                    <?php endif; ?>



									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Footer -->
			<footer class="app-footer">
				<div class="container text-center py-3">
				</div>
			</footer>
		</div>
	</div>

	<!-- Create Miner Modal -->
	<div class="modal fade" id="createMinerModal" tabindex="-1" aria-labelledby="createMinerModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Create New Signal Package</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="POST" action="assets/php/create_signal_package.php">
						<div class="mb-3">
							<label class="form-label">Name</label>
							<input type="text" class="form-control" name="name" required>
						</div>
						<div class="mb-3">
							<label class="form-label">ROI (%)</label>
							<input type="number" class="form-control" name="roi" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Accuracy</label>
							<input type="number" class="form-control" name="accuracy" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Price</label>
							<input type="number" class="form-control" name="price" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Duration</label>
							<input type="number" class="form-control" name="duration" required>
						</div>
						<button type="submit" class="btn btn-primary">Create Signal Package</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php include 'assets/php/footer.php'; ?>