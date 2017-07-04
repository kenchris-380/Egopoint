<?php
  session_start();
  $conn = mysqli_connect('localhost', 'root', 'root');
  mysqli_select_db($conn, 'egopoint');
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
    $jobtitle = $_POST['jobtitle'];
    $date = date_default_timezone_set("Africa/Lagos");

    $targetfolder = "cv/";
     $targetfolder = $targetfolder . basename( $_FILES['file']['name']);
       $ok=1;
      $file_type=$_FILES['file']['type'];
      if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {
       if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)) {
         $upload_cv = sprintf("INSERT INTO cv (name, email, descbio, jobtitle, date, cv_path) " .
           "VALUES ('%s', '%s', '%s', '%s', '%s', '%s'); ",
           mysqli_real_escape_string($conn, $name),
           mysqli_real_escape_string($conn, $email),
           mysqli_real_escape_string($conn, $desc),
           mysqli_real_escape_string($conn, $jobtitle),
           mysqli_real_escape_string($conn, $date),
           mysqli_real_escape_string($conn, basename( $_FILES["file"]["name"])),
           mysqli_insert_id($conn));
           if (mysqli_query($conn, $upload_cv)) {
             $_SESSION['msg'] = "Uploaded Successfully";
             header("Location: " . $_SERVER['HTTP_REFERER']);
           }
       } else {
         echo "Problem uploading file";
       }
      } else {
       echo "You may only upload PDFs, JPEGs or GIF files.<br>";
       echo "<a href='career.php'>return to career</a>";
      }
  } else {
    echo "Something went wrong try again";
    echo "<a href='career.php'>return to career</a>";
  }

?>
