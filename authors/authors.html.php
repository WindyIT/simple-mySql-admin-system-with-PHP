<?php include $_SERVER['DOCUMENT_ROOT'] . 'includes/helpers.inc.php'; ?>;
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Manage Author</title>
</head>
<h2>Manage Author</h2>
<body>
<p><a href="?add">Add new author</a></p>
<div class="editOrDelete">
	<ul>
	  <?php foreach ($authors as $author) : ?>
		<li>
		   <form action="" id="form" method="post">
		   	  <div class="manage">
		   	  	<?php html_out($author['name']) ?>
		   	  	<input type="hidden" name="id" value="<?php html_out($author['id']); ?>">   
		   	  	<input type="submit" name="action" value="Edit">
		   	  	<input type="submit" name="action" value="Delete">
		   	  </div>
		   </form>
		</li>
	  <?php endforeach; ?>
	</ul>
</div> 
<p><a href="..">Return JMS home</a></p>
</body>
</html>