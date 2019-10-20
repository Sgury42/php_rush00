<?php ob_start(); ?>
<div>
	<?php if (!ft_isset($_SESSION['CART'])) : ?>
	<p>Your cart is empty !</p>
	<?php else : ?>
	<?php $datas = get_database(DB_ITEMS); ?>
	<?php foreach ($_SESSION['CART'] as $item) : ?>
	<?php if (is_array($item)) :?>
	<div style='display: flex;'>
		<?php $ref = $item['ref']?>
		<p><?php echo $datas[$ref]['name']; ?></p><br />
		<p><?php echo $datas[$ref]['price'] . '$'; ?></p><br />
		<form method='post' action='index.php?action=cartEdit' style='display: flex;'>
			<button type='submit' name='delFromCart' value='<?php echo $ref; ?>'>-</button>
			<p><?php echo $item['qty']; ?></p>
			<button type='submit' name='addToCart' value='<?php echo $ref; ?>'>+</button>
			<p><?php echo $item['price'] . '$'; ?></p>
			<button type='submit' name='remove' value='<?php echo $ref; ?>'>X</button>
		</form>
	</div>
	<?php endif; ?>
	<?php endforeach; ?>
	<p>total = <?php echo $_SESSION['CART']['total'] ?>
	<form method='post' action='index.php?action=placeOrder'>
		<button type='submit' name='placeOrder'>Place order !</button>
	</form>
	<?php endif; ?>
</div>
<?php
$content = ob_get_clean();
require_once './view/home.php';
?>
