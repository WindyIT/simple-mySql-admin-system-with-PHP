<!DOCTYPE html>
<html>
<head>
	<title>Warning</title>
</head>
<body>
<script type="text/javascript">
     function delete()
     {
		var sure = confirm("Sure to delete?!!");
		if (sure == true) <?php include 'deleteAuthor' ?>;
	    else <?php exit() ?>;
	}
</script>
    <!--  <div id='select'>
     	<input type="submit" name="comfirm" value="Yes">
     	<input type="submit" name="comfirm" value="No">
     </div> -->
     <input type="button" id="delete" onclick="delete()" value="delete">
</body>
</html>