<?php ob_start(); ?>
<div>
	<?php $datas = get_database(DB_ITEMS); ?>
	<?php foreach ($datas as $data) : ?>
		<div>
			<p><?php echo $data['name']; ?></p><br />
			<img src='<?php echo $data['src_img']; ?>' alt='<?php echo $data['name']; ?>'><br />
			<form method='post' action='index.php?action=ToCart'>
			<button type='submit' name='delToCart' value='<?php echo $data['ref']; ?>'>-</button>
			<p><?php echo $data['price'] ?> $</p>
			<button type='submit' name='addToCart' value='<?php echo $data['ref']; ?>'>+</button>
			</form>
		</div>
	<?php endforeach ?>
</div>
<?php
$content = ob_get_clean();
require_once './view/home.php';
?>

