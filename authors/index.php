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
     //数据库不为空时
     foreach ($result as $row)
     {
     	//将数据存储到关联数组中
     	$authors[] = array('id'=>$row['id'], 'name'=>$row['name']);
     }
    if (!empty($authors))  include 'authors.html.php';
    else  include 'noAuthor.html.php';
        // echo "<script>alert('NO DATA EXIST IN AUTHOR!');
        //       history.back();</script>";
        // include 'addAuthor.php';
?>