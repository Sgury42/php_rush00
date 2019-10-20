<?php ob_start(); ?>
<div>
	<div>
		<p>Change my password</p>
		<?php echo $display_msg ?>
		<form method='post' action='index.php?action=pwdUpdate'>
			Old password: <input type='password' name='oldpwd'><br />
			New password: <input type='password' name='newpwd'>
			<button type='submit'>Change it !</button>
		</form>
	</div>
	<div>
		<?php if (isset($_POST['askDel'])) : ?>
		<p>Are you sure ?</p>
		<form method='post' action='index.php?action=delAccount'>
			Password: <input type='password' name='passwd'><br />
			<button type='submit' name='cancel'>Cancel</button>
			<button type='submit' name='validDel'>Yes, Delete account</button>
		</form>
		<?php else : ?>
		<?php echo $tryagain; ?>
		<form method='post' action='index.php?action=delAccount'>
			<button type='submit' name='askDel'>Delete my account</button>
		</form>
		<?php endif; ?>
	</div>
	<div>
		<?php $orders = get_database(DB_ORDERS); ?>
		<?php $datas = get_database(DB_ITEMS); ?>
		<?php foreach ($orders as $order) : ?>
		<?php if ($order['login'] == $_SESSION['LOG_USR']) : ?>
		<div style='display: flex; flex-direction: column;'>
			<?php foreach ($order as $item) : ?>
			<?php if (is_array($item)) : ?>
			<div style='display: flex;'>
				<?php $ref = $item['ref']; ?>
				<p><?php echo $item['qty']; ?></p><br />
				<p><?php echo $datas[$ref]['name']; ?></p><br />
				<p><?php echo $item['unitPrice'] . '$'; ?></p><br />
				<p><?php echo $item['price'] . '$'; ?></p><br />
			</div>
			<?php endif ?>
			<?php endforeach ?>
			<p>Total = <?php echo $order['total']; ?>
		</div>
		<?php endif ?>
		<?php endforeach ?>
	</div>
</div>
<?php
$content = ob_get_clean();
require_once './view/home.php';
?>
