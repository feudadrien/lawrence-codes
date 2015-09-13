<?php //script to insert image into database
        /* 
           Database name= image
           CREATE TABLE image_info{
                 image_id INT AUTO_INCREMENT,
                 image_name VARCHAR(30),
                 image_path VARCHAR(30)	          
                 PRIMARY KEY(image_id)
           }

 */   mysql_connect("localhost","root","");
    mysql_select_db("image");

  error_reporting(0);

    if($_POST['submit']){
       
       $name=basename($_FILES['file_upload']['name']);
       $type=$_FILES['file_upload']['type'];
       $t_name=$_FILES['file_upload']['tmp_name'];
       $dir='upload';
       $path=$dir."/".$name;

      
       if(move_uploaded_file($t_name,$dir."/".$name)){

             if(($type=='image/jpeg') || ($type=='image/jpg') || ($type=='image/png') ){
            	 
                 /*i have trouble stopping duplicate images from being inserted into the database*/
         	    mysql_query("INSERT INTO image_info(image_name,image_path) VALUES('$name','$path')");

               echo "File uploaded successfully";
  
          }else{
                	echo "only picture files are allowed";
          }

                  
         }else{

           	echo "Upload failed!";
         }
     }

mysql_close();
?>

<!doctype html>
<html>
<head><title>Gallery Site</title></head>

<body bgcolor="skyblue">
     <center><h3>Welcome to Gallery Upload</h3>
     <p>Upload pictures into your album</p>
     <hr />
     
     <image  border="4" width="15%" height="40%" src="<?php echo $path; ?>">
	 <form action="#" method="POST" enctype="multipart/form-data">
     <input type="file" name="file_upload" />
     <input type="submit" name="submit" value="upload" />	 	
     </form>
     <p>
     <h3><a href="view.php">ViEw GallErY</a></h3></center>
   
</body>
</html>