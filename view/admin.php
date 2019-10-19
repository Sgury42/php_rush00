<?php ob_start(); ?>
<div>
	<div id='addItem'>
		<p><?php echo $display_msg . PHP_EOL . $category_msg ?>
		<form method='post' action="index.php?action=addItem">
			name: <input type='text' name='name'><br />
			reference: <input type='text' name='ref'><br />
			size: <input type='text' name='size'><br />
			color: <input type='text' name='color'><br />
			price: <input type='text' name='price'><br />
			category: <input type='text' name='category'>[cat1, cat2, cat3]<br />
			description: <input type='text' name='description'><br />
			image: <input type='text' name='src_img'><br />
			<button type='submit'>Add Item</button>
		</form>
	</div>
	<div id='categories'>
		<?php $categories = get_database(DB_CATEGORY);?>
		<?php foreach ($categories as $category) : ?>
		<form method='post' action='index.php?action=removeCategory'>
		<?php echo $category ?> <button type='submit' name='remove' value='<?php echo $category ?>'>Remove</button>
		</form>
		<?php endforeach ?>
		<form method='post' action='index.php?action=addCategory'>
		<input type='text' name='newCategory'>
		<button type-'submit'>Add Category</button>
		</form>
	</div>
	<div id='deleteItem'>
	</div>
	<div>
		<p>Delete User Account</p>
		<?php echo $removeUser_msg; ?>
		<form method='post' action='index.php?action=admRemoveUser'>
		User login: <input type='text' name='admRemoveUser'>
		<button type='submit'>Delete</button>
		</form>
	</div>
</div>
<?php
$content = ob_get_clean();
require_once './view/home.php';
?>
