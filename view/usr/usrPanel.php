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
	<!--  CREATE A DIV TO DISPLAY PAST ORDERS   -->
</div>
<?php
$content = ob_get_clean();
require_once './view/home.php';
?>
