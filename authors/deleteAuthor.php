<?php
   if (isset($_POST['action']) and $_POST['action'] == 'Delete')
   {
   	   // echo 'Delete ??!! Push Yes to continue, No to canl ' . '<br/>';
    	include $_SERVER['DOCUMENT_ROOT'] . 'includes/db.inc.php';
    	//从joke中获取要删除的内容
        try
        {
        	$sql = 'SELECT id FROM joke WHERE author_id = :id';
        	$statement = $pdo->prepare($sql);
        	$statement->bindValue(':id',$_POST['id']);
        	$statement->execute();
        }
        catch(PDOException $e)
        {
        	echo 'Error fetched ids from database :' . $e->getMessage();
        	exit();
        }
        //捕获PDOStatement中的数据到数组中
        /* 使用fetchAll()而不使用以往的fetch()的原因
         * foreach (($statement->fetch()) as $v) 
         * fetch()并不会一次性将所有PDOStatement中的数据捕获
         * 而是在第一次循环时先获取一行数据，挂起，进入第二次循环时再获取下一行数据，是一个迭代过程
         * 但是在foreach的执行语句中包含了 prepare(),execute()等语句会影响到fetch()的挂起
         * 形象点就是数据库在操作时只有一只手，当这只手在fetch something时，是无法进行其他工作的
         * 而使用fetchAll()会返回一个数组，将所有数据一次性捕获至数组中
         * 如此当执行其他PDO语句时不造成冲突
         */
         $result = $statement->fetchAll();  //$result[]弱类型语言的奇妙之处
    
        //删除joke_category中的数据
    	try
    	{
        	$sql = 'DELETE FROM joke_category WHERE joke_id = :id' ;
        	$statement = $pdo->prepare($sql);
        	foreach ($result as $value)
        	{
        		$statement->bindValue(':id',$value['id']);	
        		$statement->execute();
        	}
        }
        catch(PDOException $e)
        {
        	echo 'Error deleted from joke_category: ' . $e->getMessage();
        	exit();
        }
    
        //删除joke中的数据
        try
        {
        	$sql = 'DELETE FROM joke WHERE author_id = :id';
        	$statement = $pdo->prepare($sql);
        	$statement->bindValue(':id',$_POST['id']);
        	$statement->execute(); 
        }
        catch(PDOException $e)
        {
        	echo 'Error deleted from joke: ' . $e->getMessage();
        	exit();
        }
        //删除author中的数据
        try
        {
        	$sql = 'DELETE FROM author WHERE id = :id';
        	$statement = $pdo->prepare($sql);
        	$statement->bindValue(':id',$_POST['id']);
        	$statement->execute();
        }
        catch(PDOException $e)
        {
        	echo 'Error deleted from author: ' . $e->getMessage();
        	exit();
        }
        header('Location: . ');
        exit();
   }
?>