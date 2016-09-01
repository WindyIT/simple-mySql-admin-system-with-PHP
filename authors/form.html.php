<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title><?php html_out($page_title); ?></title>
</head>
<h2><?php html_out($page_title); ?></h2>
  <body>
	<form action="<?php html_out($action); ?>" method="post">
		<div>
		    <label for="name">
		    Name:<input type="text" name="name" id="name" value="<?php html_out($name); ?>"></label>
		</div>
		<div>
			<label>Email:<input type="text" name="email" id="email" value="<?php html_out($email); ?>"></label>
		</div>
		<div>
			<input type="hidden" name="id" id="id" value="<?php html_out($id); ?>">
			<input type="submit" name="button" id="button" value="<?php html_out($button); ?>">
		</div>
	</form>
  </body>
</html>