<?php
  session_start();
  $conn = mysqli_connect('localhost', 'root', 'root');
  mysqli_select_db($conn, 'egopoint');
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job = $_POST['job'];
    $addjob = sprintf("INSERT INTO available_job (name, close) " .
      "VALUES ('%s', '%s'); ",
      mysqli_real_escape_string($conn, $job),
      mysqli_real_escape_string($conn, 0),
      mysqli_insert_id($conn));
      if (mysqli_query($conn, $addjob)) {
        $_SESSION['msg'] = "Add Successfully";
        header("Location: " . $_SERVER['HTTP_REFERER']);
      }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Jobs</title>
  </head>
  <body>
    <form action="" method="post">
      <?php
        if (isset($_SESSION['msg'])) {
          echo $_SESSION['msg'];
          session_destroy();
        }
      ?>
      <label for="job"> Add Job Opportunity </label>
      <input type="text" name="job" placeholder="ADD JOB">
      <br>
      <button type="submit" name="button"> Add Job </button>
    </form>
    <br><br><br><br>

    <table style="width:70%">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Decription</th>
        <th>Job Title</th>
        <th>CV</th>
      </tr>
      <?php
        $getapplicant = "SELECT * FROM cv LIMIT 50";
        $result = mysqli_query($conn, $getapplicant);
        while ($row = mysqli_fetch_array($result)) {
          echo '<tr>
            <td>'. $row['name'] .'</td>
            <td>'. $row['email'] .'</td>
            <td>'. $row['descbio'] .'</td>
            <td>'. $row['jobtitle'] .'</td>
            <td><a href="cv/'. $row['cv_path'] .'">'. $row['cv_path'] .'</a></td>
          </tr>';
        }
      ?>
    </table>
  </body>
</html>
