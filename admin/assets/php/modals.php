	<!-- Update Crypto Balance Modal -->
	<div class="modal fade" id="updateBalanceModal" tabindex="-1" aria-labelledby="updateBalanceLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="updateBalanceLabel">Update Balances</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="POST" action="assets/php/update_crypto_balance.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">

						<!-- BTC Balance -->
						<div class="mb-3">
							<label for="btc" class="form-label">BTC Balance</label>
							<input type="number" class="form-control" name="btc" id="btc" value="<?= $user['btc']; ?>" min="0" step="0.00000001" required>
						</div>

						<!-- ETH Balance -->
						<div class="mb-3">
							<label for="eth" class="form-label">ETH Balance</label>
							<input type="number" class="form-control" name="eth" id="eth" value="<?= $user['eth']; ?>" min="0" step="0.00000001" required>
						</div>

						<!-- USDT Balance -->
						<div class="mb-3">
							<label for="usdt" class="form-label">USDT Balance</label>
							<input type="number" class="form-control" name="usdt" id="usdt" value="<?= $user['usdt']; ?>" min="0" step="0.01" required>
						</div>

						<!-- BNB Balance -->
						<div class="mb-3">
							<label for="bnb" class="form-label">BNB Balance</label>
							<input type="number" class="form-control" name="bnb" id="bnb" value="<?= $user['bnb']; ?>" min="0" step="0.00000001" required>
						</div>

						<!-- LTC Balance -->
						<div class="mb-3">
							<label for="ltc" class="form-label">LTC Balance</label>
							<input type="number" class="form-control" name="ltc" id="ltc" value="<?= $user['ltc']; ?>" min="0" step="0.00000001" required>
						</div>

						<!-- DOGE Balance -->
						<div class="mb-3">
							<label for="doge" class="form-label">DOGE Balance</label>
							<input type="number" class="form-control" name="doge" id="doge" value="<?= $user['doge']; ?>" min="0" step="0.00000001" required>
						</div>

						<!-- XRP Balance -->
						<div class="mb-3">
							<label for="xrp" class="form-label">XRP Balance</label>
							<input type="number" class="form-control" name="xrp" id="xrp" value="<?= $user['xrp']; ?>" min="0" step="0.00000001" required>
						</div>

						<!-- SHIB Balance -->
						<div class="mb-3">
							<label for="shib" class="form-label">SHIB Balance</label>
							<input type="number" class="form-control" name="shib" id="shib" value="<?= $user['shib']; ?>" min="0" step="1" required>
						</div>

						<!-- SOL Balance -->
						<div class="mb-3">
							<label for="sol" class="form-label">SOL Balance</label>
							<input type="number" class="form-control" name="sol" id="sol" value="<?= $user['sol']; ?>" min="0" step="0.00000001" required>
						</div>

						<button type="submit" class="btn btn-primary">Update Balances</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Update USD Balance Modal -->
	<div class="modal fade" id="updateProfitBalanceModal" tabindex="-1" aria-labelledby="updateProfitBalanceLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="updateProfitBalanceLabel">Update Balances</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="POST" action="assets/php/update_balance.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">

						<!-- Main Balance -->
						<div class="mb-3">
							<label for="balance" class="form-label">Main Balance (USD)</label>
							<input type="number" class="form-control" name="balance" id="balance" value="<?= $user['balance']; ?>" min="0" required>
						</div>

						<!-- Profit Balance -->
						<div class="mb-3">
							<label for="profit_balance" class="form-label">Profit Balance (USD)</label>
							<input type="number" class="form-control" name="profit_balance" id="profit_balance" value="<?= $user['profit_balance']; ?>" min="0" required>
						</div>

						<!-- Investment Balance -->
						<div class="mb-3">
							<label for="total_investment" class="form-label">Investment Balance (USD)</label>
							<input type="number" class="form-control" name="total_investment" id="total_investment" value="<?= $user['total_investment']; ?>" min="0" required>
						</div>

						<button type="submit" class="btn btn-primary">Update Balances</button>
					</form>
				</div>
				<fiv>
			</div>
		</div>
	</div>

	<!-- Change Password Modal -->
	<div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="changePasswordModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="changePasswordModal">Change Password</h5>
					<button type="button" class="btn-close" id="close_password_modal" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="POST" action="assets/php/update_password.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">

						<div class="mb-3">
							<label for="oldPassword" class="form-label">Current Password</label>
							<input type="text" class="form-control" id="oldPassword" value="<?= $user['password']; ?>" disabled>
						</div>

						<div class="mb-3">
							<label for="newPassword" class="form-label">New Password</label>
							<input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="********" required>
						</div>

						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Change OTP Modal -->
	<div class="modal fade" id="changeOTP" tabindex="-1" aria-labelledby="changeOTPModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="changeOTPModal">Change OTP</h5>
					<button type="button" class="btn-close" id="close_otp_modal" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="POST" action="assets/php/update_otp.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">

						<div class="mb-3">
							<label for="oldPassword" class="form-label">Current Password</label>
							<input type="text" class="form-control" id="oldOTP" value="<?= $user['otp']; ?>" disabled>
						</div>

						<div class="mb-3">
							<label for="newPassword" class="form-label">New Password</label>
							<input type="number" class="form-control" name="newOTP" id="newPassword" placeholder="****" required>
						</div>

						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Reset Balances Confirmation Modal -->
	<div class="modal fade" id="resetBalancesModal" tabindex="-1" aria-labelledby="resetBalancesLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="resetBalancesLabel">Reset <?= $user['fullname']; ?> Balances</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to reset this <?= $user['username']; ?>'s balances to <strong>0</strong>? This action cannot be undone.</p>
				</div>
				<div class="modal-footer">
					<form id="resetBalanceForm" method="POST" action="assets/php/reset_balances.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-danger">Yes, Reset</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Change Account Modal -->
	<div class="modal fade" id="updateAccount" tabindex="-1" aria-labelledby="updateAccountModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="updateAccountModal">Update Account</h5>
					<button type="button" class="btn-close" id="close_password_modal" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="POST" action="assets/php/update_account_type.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">

						<div class="mb-3">
							<label for="old_account" class="form-label">Current Account</label>
							<input type="text" class="form-control" id="old_account" value="<?= $user['account_type']; ?>" disabled>
						</div>

						<div class="mb-3">
							<label for="new_account" class="form-label">New Account</label>
							<input type="text" class="form-control" name="new_account" id="new_account" placeholder="<?= $user['account_type']; ?>" required>
						</div>

						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Change Trade Progress Modal -->
	<div class="modal fade" id="updateTradeProgress" tabindex="-1" aria-labelledby="updateTradeProgressModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="updateTradeProgressModal">Update Trade Progress</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="tradeProgressForm" method="POST" action="assets/php/update_trade_progress.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">

						<div class="mb-3">
							<label for="old_trade_progress" class="form-label">Current Trade Progress</label>
							<input type="number" class="form-control" id="old_trade_progress" value="<?= $user['trade_progress']; ?>" disabled>
						</div>

						<div class="mb-3">
							<label for="new_trade_progress" class="form-label">New Trade Progress</label>
							<input type="number" class="form-control" name="new_trade_progress" id="new_trade_progress" min="0" max="100" required>
						</div>

						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Change Signal Strength Modal -->
	<div class="modal fade" id="updateSignalStrength" tabindex="-1" aria-labelledby="updateSignalStrengthModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="updateSignalStrengthModal">Update Signal Strength</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="signalStrengthForm" method="POST" action="assets/php/update_signal_strength.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">

						<div class="mb-3">
							<label for="old_signal_strength" class="form-label">Current Signal Strength</label>
							<input type="number" class="form-control" id="old_signal_strength" value="<?= $user['signal_strength']; ?>" disabled>
						</div>

						<div class="mb-3">
							<label for="new_signal_strength" class="form-label">New Signal Strength</label>
							<input type="number" class="form-control" name="new_signal_strength" id="new_signal_strength" min="0" max="100" required>
						</div>

						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Add Profit Modal -->
	<div class="modal fade" id="addProfitModal" tabindex="-1" aria-labelledby="addProfitLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addProfitLabel">Add Profit</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="addProfitForm" method="POST" action="assets/php/add_profit.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">
						<input type="hidden" name="user_name" value="<?= $user['fullname']; ?>">
						<div class="mb-3">
							<label for="profit_amount" class="form-label">Profit Amount (USD)</label>
							<input type="number" class="form-control" name="profit_amount" id="profit_amount" required>
						</div>
						<button type="submit" class="btn btn-success">Add Profit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Add Loss Modal -->
	<div class="modal fade" id="addLossModal" tabindex="-1" aria-labelledby="addLossLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addLossLabel">Add Loss</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="addLossForm" method="POST" action="assets/php/add_loss.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">
						<input type="hidden" name="user_name" value="<?= $user['fullname']; ?>">
						<div class="mb-3">
							<label for="loss_amount" class="form-label">Loss Amount (USD)</label>
							<input type="number" class="form-control" name="loss_amount" id="loss_amount" required>
						</div>
						<button type="submit" class="btn btn-danger">Add Loss</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Generate Deposit History Modal -->
	<div class="modal fade" id="generateDepositsModal" tabindex="-1" aria-labelledby="generateDepositsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="generateDepositsLabel">Generate Deposit History</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="generateDepositsForm" method="POST" action="assets/php/generate_deposits.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">
						<input type="hidden" name="username" value="<?= $user['username']; ?>">

						<div class="mb-3">
							<label for="num_deposits" class="form-label">Number of Deposits</label>
							<input type="number" class="form-control" name="num_deposits" id="num_deposits" min="1" max="50" placeholder="50 max" required>
						</div>

						<button type="submit" class="btn btn-primary">Generate Deposits</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Generate Withdrawal History Modal -->
	<div class="modal fade" id="generateWithdrawalsModal" tabindex="-1" aria-labelledby="generateWithdrawalsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="generateWithdrawalsLabel">Generate Withdrawal History</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="generateWithdrawalsForm" method="POST" action="assets/php/generate_withdrawal.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">
						<input type="hidden" name="username" value="<?= $user['username']; ?>">

						<div class="mb-3">
							<label for="num_withdrawals" class="form-label">Number of Withdrawals</label>
							<input type="number" class="form-control" name="num_withdrawals" id="num_withdrawals" min="1" max="50" placeholder="50 max" required>
						</div>

						<button type="submit" class="btn btn-primary">Generate Withdrawals</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Send Popup Message Modal -->
	<div class="modal fade" id="sendPopupMessageModal" tabindex="-1" aria-labelledby="sendPopupMessageLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="sendPopupMessageLabel">Send Popup Message</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="popupMessageForm" method="POST" action="assets/php/send_popup.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">
						<input type="hidden" name="username" value="<?= $user['username']; ?>">

						<div class="mb-3">
							<label for="popup_message" class="form-label">Message</label>
							<textarea class="form-control" name="popup_message" id="popup_message" rows="5"></textarea>
						</div>

						<div class="mb-3">
							<label for="show_popup" class="form-label">Show Popup?</label>
							<select class="form-control" name="show_popup" id="show_popup" required>
								<option value="1" <?= ($user['show_popup'] == 1) ? 'selected' : ''; ?>>Yes</option>
								<option value="0" <?= ($user['show_popup'] == 0) ? 'selected' : ''; ?>>No</option>
							</select>
						</div>


						<button type="submit" class="btn btn-primary">Send Popup</button>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- Send Notification Modal -->
	<div class="modal fade" id="sendNotificationModal" tabindex="-1" aria-labelledby="sendNotificationLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="sendNotificationLabel">Send Notification</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="notificationForm" method="POST" action="assets/php/send_notification.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">
						<input type="hidden" name="username" value="<?= $user['username']; ?>">

						<div class="mb-3">
							<label for="notification_message" class="form-label">Message</label>
							<textarea class="form-control" name="notification_message" id="notification_message" rows="3" required></textarea>
						</div>

						<button type="submit" class="btn btn-primary">Send Notification</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Send Email Modal -->
	<div class="modal fade" id="sendEmailModal" tabindex="-1" aria-labelledby="sendEmailLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="sendEmailLabel">Send Email</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="emailForm" method="POST" action="assets/php/send_user_email.php">
						<input type="hidden" name="user_id" value="<?= $user['id']; ?>">
						<input type="hidden" name="email" value="<?= $user['email']; ?>">

						<div class="mb-3">
							<label for="email_subject" class="form-label">Subject</label>
							<input type="text" class="form-control" name="email_subject" id="email_subject" required>
						</div>

						<div class="mb-3">
							<label for="email_message" class="form-label">Message</label>
							<textarea class="form-control" name="email_message" id="email_message" rows="3" required></textarea>
						</div>

						<button type="submit" class="btn btn-primary">Send Email</button>
					</form>
				</div>
			</div>
		</div>
	</div>