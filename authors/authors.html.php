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
		   	  	<input type="hidden" name="id" id="id" value="<?php html_out($author['id']); ?>">   
		   	  	<input type="submit" name="action"  id="Edit" value="Edit">
		   	  	<input type="submit" name="action" id="Delete" value="Delete">
		   	  </div>
		   </form>
		</li>
	  <?php endforeach; ?>
	</ul>
</div> 
<p><a href="..">Return JMS home</a></p>
<script type="text/javascript">
	/*document.getElementById("Edit").onclick = function()
	{
		var request = new XMLHttpRequest();
		    request.open()
	}*/
	document.getElementById("Delete").onclick = function()
	{
		var request = new XMLHttpRequest();
		    request.open("POST","deleteAuthor.php");
		var data = "id=" + document.getElementById("id").value + "&action=" + document.getElementById("Delete").value;
		    request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		var isSure = confirm(" Sure to delete???!!! ");
		if (isSure)
		{
			request.send(data);
			request.onreadystatechange = function()
			{
				if (request.readyState === 4)
					if(request.state !== 200)
						alert("Error " + request.status);
			}
		} 
		return false;  //没有return false会直接刷新页面
	}
</script>
</body>
</html>