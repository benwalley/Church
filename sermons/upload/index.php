<?php include '../../includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="css/upload.css">
<div class="upload-container">
	<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("mp3");
      $password = '8zVNr2WVz1gi59Mr';

      if($_POST['password'] === $password) {
      	if(in_array($file_ext,$extensions)=== false){
	         $errors[]="extension not allowed, please choose an mp3 file.";
	      }
	      
	      if($file_size > 2000000000){
	         $errors[]='File size must be less than 2 GB';
	      }
	      
	      if(empty($errors)==true){
	         move_uploaded_file($file_tmp,"../audio/".$file_name);
	         echo 'Successful upload';
	      }else{
	         print_r($errors);
	      }
      } else {
      	echo 'Incorrect Password';
      }
      
      
   }
?>
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" /><br/>
         <input type="password" name="password" placeholder = "password"><br/>
         <input type="submit"/>
      </form>

      <div>
         <h2>Instructions</h2>
         <p>Click Choose file, and select an mp3 file.</p>
         <p>File Name should be in the format, <span>mm-dd-yy_sermon.mp3</span></p>
         <p>Title (metadata) should be what you want the title of the sermon to display as.</p>
         <p>Subtitle (metadata) should be the scripture(s) that the sermon is from.</p>

         <p>Enter the password, and click Submit</p>
         <p>It may take a few minutes for the upload to finish. Do not close the page until the upload finishes</p>

      </div>

</div>

<?php include '../../includes/footer.php'; ?>