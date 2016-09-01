<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';
   // if (isset($_GET['add']))
   // {
    	$page_title = 'New author';
    	$action = '';
    	$name = '';
    	$email = '';
  		$id = '';
  		//$name_holder = 'new name';
  		//$email_holder = 'new email';
  		$button = 'Add author';

  		include 'form.html.php';
  		//exit();
    //}
    if (isset($_POST['button']))
    {
    	include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
    	try
    	{
    		$sql = 'INSERT INTO author SET
    		       name = :name, 
    		       email = :email';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':name', $_POST['name']);
            $statement->bindValue(':email', $_POST['email']);
            $statement->execute();
    	}
    	catch (PDOException $e)
    	{
    		echo " Inserted error : " . $e->getMessage();
    		exit();
    	}
    	echo "<script>alert('Add author successfully!');
    	      location.href = 'http://localhost/admin/authors/';</script>";
    }
?>