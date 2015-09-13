<!doctype html>
<html>
	
	<head><title>Gallery view</title></head>
  
  <body bgcolor="skyblue">
         <center><h3>WELCOME TO YOUR GALLERY</h3></center>
  	
     <?php      
         /*  script to select all images and display on webpage*/       
           mysql_connect("localhost","root","");
           mysql_select_db("image");

        $result= mysql_query("SELECT * FROM image_info");
       echo "<hr />"; 
      while ($row = mysql_fetch_array($result))
        {
             $image = $row['image_path'];
             echo "<img border='2' width='120px' height='150px' src='$image'>";
             echo " ";
            
       }

    mysql_close();
 
      ?>

      <h3><a href="upload.php">ADD MORE PICTURES</a></h3>

  </body>
</html>