<?php ob_start(); ?>
<div>
	<p><?php echo $error_msg ?></p>
	<form method='post'>
		Login: <input type='text' name='login'><br />
		Password: <input type='password' name='passwd'>
		<button type='submit'>Create my account !</button>
	</form>
</div>
<?php
$content = ob_get_clean();
require_once './view/home.php';
?>
