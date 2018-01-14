<?php 
   include('header.php');
	$dbcon=mysqli_connect("localhost","id794005_bdpackage123","bangladesh");  
mysqli_select_db($dbcon,"id794005_bdpackage123"); 

    		if(isset($_POST['post'])){
    		$post_content=$_POST['post_content'];
     
     $insert_post="insert into post values('','".$post_content."','A')";
    		//mysqli_query("insert into post (content) values('$post_content')")or die(mysqli_connect_errno());
    		//header('location:complain.php');
			if(mysqli_query($dbcon,$insert_post))  
		{  
			//echo "<script>window.open('user.php','_self')</script>";
			//echo "successful";
		} 
     
     
    		}
    		
    ?>
	<html>
	<head>
	<style>
	h4{
		color:white;
	}
	#me{
    background-color:#ff7043;
    width: 500px;
    height:30px;
    border: 2px #e65100;
    padding: 1px;
    margin: 25px;
}
p{
	color:black;
}
body{
	 background-color:#ffcc80;
}
	</style>
	</head>
    <body>
	
    <br>
    <br>
    <div class="container">
	<h1 align="center" ><i>Complain Desk</i></h1>
	</br></br></br></br>
    	<form class="form-horizontal" action="complain.php" method="POST">
    	<div class="control-group">
    		<div class="controls">
    			<input type="text" name="post_content" placeholder="Complain here" style="height: 90px; width: 300px;"/>
    		</div>
    	</div>
    	<div class="control-group">
    		<div class="controls">
    			<button name="post" type="submit" class="btn btn-info"><i class="icon-share"></i>Post</button>
    		</div>
    	</div>
    	<div class="control-group">
    	<div class="controls">
    	<table class="table table-bordered">
    	<thead>
    	</thead>
    	<tbody>
    		<?php
    	//$query=mysqli_query("select * from post")or die(mysqli_connect_errno());
		$link= new mysqli("localhost","id794005_bdpackage123","bangladesh","id794005_bdpackage123");
				if ($link->connect_errno) {
 
 
				  die ("Connect failed:".$link->connect_error);
				 
				}
			   $sql="SELECT post_id,content FROM post";
 
	             $records =  $link->query($sql);
    	while($row = mysqli_fetch_assoc($records)){
    	$id=$row['post_id'];
    	?>
    		<tr>
    			<td bgcolor="white"><?php echo "<p><b>".$row['content']."</b></p>"; ?></td>
    			<td bgcolor="white" width="50"><?php 
    	$comment_query="select * from comment where post_id='".$id."'";
		$comment_query1="select * from comment where post_id='".$id."'";
		mysqli_query($dbcon,$comment_query1);
		
		$records1 =  $link->query($comment_query1);
		$count= mysqli_num_rows($records1);
    	//$count=mysql_num_rows ($comment_query);
		//$count=$link->query("SELECT COUNT(comment_id) FROM comment");
		while($emp = mysqli_fetch_assoc($records1))
                    { }
		
    	?>
    				<a href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-comments-alt"></i><span class="badge badge-info"><?php echo $count; ?></span></a></td>
    			<td bgcolor="white" width="40"><a class="btn btn-info" color="blue" href="do_report.php<?php echo '?id='.$id; ?>"><i class="icon-trash"></i>Report</a></td>
    		</tr>
     
    		<!-- Modal -->
    	<div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-header"> </div>
    	<div class="modal-body">
     
    	<!----comment -->
    	<form  action="complain1.php" method="post">
    		<input type="hidden" name="id" value="<?php echo $id; ?>">
    		<input type="text" name="comment_content" placeholder="reply here" style="height: 30px; width: 300px;"/>
    		<br>
    		<br>
    		<button name="comment" type="submit" class="btn btn-info"><i class="icon-share"></i>Comment</button>
    	</form>
    	<br>
    	<br>
    	<?php $comment="select * from comment where post_id='".$id."'";
		$records2 =  $link->query($comment);
    	while($comment_row = mysqli_fetch_assoc($records2)){ 
		if($comment_row['color']==1){
    	$pom="Admin : ";
			$com=$pom.$comment_row['content'];
    	echo"
		<div id=me><h4><i>".$com."</i><h4></div>";
		}
		
		else{
		echo"
		<div class=alert alert-success>".$comment_row['content']."</div>";
		}
    } ?>
    	<!--- end comment --> 
     
    </div>
    <div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
    </div>
    <?php  } ?>
    </tbody>
    </table>
    </div>
    </div>
    </form>
    </div>
    
    <?php
    		if(isset($_POST['comment'])){
				//echo "done";
    		$comment_content=$_POST['comment_content'];
    		$post_id=$_POST['id'];
     $insert_comment="insert into comment values('','".$comment_content."','".$post_id."','0')";
    		//mysqli_query("insert into comment (content,post_id) values('$comment_content',$post_id)")or die(mysqli_connect_errno());
    		//header('location:index.php');
			if(mysqli_query($dbcon,$insert_comment))  
		{  
			//echo "<script>window.open('user.php','_self')</script>";
			//echo "successful";
		} 
     
     
    		}
    		?>
    </body>
    </html>