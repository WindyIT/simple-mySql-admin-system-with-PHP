<?php
     //连接数据库
     include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
     try
     {
     	$result = $pdo->query('SELECT id, name FROM author');
     }
     catch(PDOException $e)
     {
     	echo 'Error fetch author message from database' . $e->getMessage();
     	exit();
     }
     foreach ($result as $row)
     {
     	//将数据存储到关联数组中
     	$authors[] = array('id'=>$row['id'], 'name'=>$row['name']);
     }
     include 'authors.html.php';
     include 'deleteAuthor.php';
     
    // if (isset($_POST['action']) and $_POST['action'] == 'Delete')
     //{
   	   //echo 'Delete ??!! Push Yes to continue, No to cancel ' . '<br/>';
   	   // include 'confirm.html.php';
   	// }
   	// if (isset($_POST['comfirm']) and $_POST['comfirm'] == 'Yes')   include 'deleteAuthor.php'; 
     //else exit();
?>