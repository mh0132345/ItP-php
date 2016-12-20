  <!DOCTYPE HTML>
  <html>
  <h4> You can upload your file here. </h4>
  <body>
    <form action="as12.php" method="post" enctype="multipart/form-data">
    File name:<input type='file' name='upload_file[]' multiple='multiple'/>
    <input type="submit" name="upload" value="Upload" />
    </form>
    <?php
    if(isset($_POST['upload'])) {
      $upload_dir="uploads/";
      if(!file_exists($upload_dir)) {
        mkdir($upload_dir, 0711, true);
      }
      for($counter=0; $counter<count($_FILES['upload_file']['name']); $counter++) {
        if($_FILES["upload_file"]["error"][$counter]<>0 ) {
          switch($_FILES["upload_file"]["error"][$counter] )
          {
            case 1:
              echo "The uploaded file exceeds the upload_max_filesize directive in php.ini.<br />";
            break;
            case 2:
              echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form." . "<br />";
              break;
            case 3:
              echo "The uploaded file was only partially uploaded. " . "<br />";
              break;
            case 4:
              echo "No file was uploaded." . "<br />";
              break;
            case 6:
              echo "Missing a temporary folder." . "<br />";
              break;
            case 7:
              echo "Failed to write file to disk." . "<br />";
              break;
            case 8:
              echo "Failed to write file to disk." . "<br />";
              break;
          }

          echo "<hr>";
          echo "<a href='as12.php'>Main Page</a><br/>";

          //Here we stop running the program in case of error.
          return;
        }
        // else {
        //   echo "File name: " . $_FILES["upload_file"]["name"][$counter] . "<br />";
        //   echo "File type: " . $_FILES["upload_file"]["type"][$counter] . "<br />";
        //   echo "File size: " . ($_FILES["upload_file"]["size"][$counter]) . " byte(s). <br/>";
        //   echo "Temporary location: " . $_FILES["upload_file"]["tmp_name"][$counter] . "<br/>";
        // }
        if (file_exists($upload_dir . $_FILES["upload_file"]["name"][$counter])) {
          echo "File '" . $_FILES["upload_file"]["name"][$counter] . "' already exists. <br/>";
        } else {
          if (move_uploaded_file($_FILES["upload_file"]["tmp_name"][$counter],$upload_dir.$_FILES['upload_file']['name'][$counter])) {
            chmod($upload_dir.$_FILES["upload_file"]["name"][$counter], 0644);
            echo "File was saved as: " . $upload_dir . $_FILES['upload_file']['name'][$counter] . "<br/>";
          }
        }
      }
    }
    ?>
    <h4> Or you can also check out my file in blog folder</h4>
    <form action="as12.php" method="POST">
    <select name="fileList">
    //Download file
    <?php
    if(isset($_POST['download'])) {
        $f= $_POST['fileList'];
        if(file_exists('./blog/'.$f)){
            header("Content-type: ".filetype('./blog/'.$f));
            header('Content-disposition: attachment; filename="'.$f.'"');
            echo file_get_contents('./blog/'.$f);
            exit;
        }
    }
    //Show all file in blog folder
    $dir='blog/';
    // Open a directory, and read its contents
    if ($f = opendir($dir)){
      while (($file = readdir($f)) !== false){
       //Use if to not display system file
       if ($file !='.' && $file !='..') echo "<option value=\"".$file."\">".$file."</option>";
     }
    }
    closedir($f);
    ?>
    </select>
    <input type="submit" name ='download' value="download">
    </form>
  </body>
  </html>
