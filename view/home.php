<html><body>
	<header>
		<ul id='menu'>
			<li><a href='index.php?action=index'>E-SHOP NAME</a></li>
			<?php if ($_SESSION['LOG_USR']) : ?>
			<li><a href='index.php?action=usrPanel'>My Account</a></li>
			<li><a href='index.php?action=logout'>Logout</a></li>
			<?php endif; ?>
			<?php if (!$_SESSION['LOG_USR']) : ?>
			<li><a href='index.php?action=login'>Login</a></li>
			<li><a href='index.php?action=createAccount'>Create Account</a></li>
			<?php endif; ?>
			<?php //if ($_SESSION['ROLE'] == 'admin') : ?>
			<li><a href='index.php?action=admin'>Admin</a></li>
			<?php //endif; ?>
			<li><a href='index.php?action=cartPanel'>Cart</a></li>
		</ul>
	</header>
	<div>
	<?php echo $content ?>
	</div>
</body></html>
