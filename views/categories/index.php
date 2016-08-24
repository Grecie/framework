
<div class="row">
<div class="col-sm-11"><h3>Category</h3></div>
<div class="col-sm-1">
	<a href="<?php echo APP_URL;?>categories/add">
	<span class="glyphicon glyphicon-plus"></span>
	</a>
</div>
</div>

<table class="table">
<tr>
	<th>Name</th>
	<th>Actions</th>
</tr>
<?php foreach ($categories as $category):?>
 <tr>
     <td><?php echo $category["name"]; ?></td>
 	<td><a href="<?php echo APP_URL; ?>categories/edit/<?php echo $category[0]; ?>">Edit</a>
 	<a href="<?php echo APP_URL; ?>categories/delete/<?php echo $category[0]; ?>">Delete</a></td>
 </tr>
<?php endforeach; ?>
</table>
