<?php
  session_start();
  $conn = mysqli_connect('localhost', 'root', 'root');
  mysqli_select_db($conn, 'egopoint');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Free management consulting website templates. Download management consulting web layout / template." />
<meta name="keywords" content="management consulting  website template, management consulting  website layout, management consulting web template, management consulting  web layout, business and finance templates free download, download business and finance templates, free business and finance templates, business and finance website templates, business and finance web templates, business and finance web layouts, free download," />
<title>Management Consulting  Website Template | Business and Finance Templates Free Download</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<!--<link href="w3.css" rel="stylesheet" type="text/css">-->
</head>

<body>
<?php include_once 'header.php' ?>

<div id="head3">
    <div id="header">
    	<div id="logo"><img src="images/name.png" alt="Discover Consulting" /></div>
    </div>
</div>

<section class="content-wrap">
  <div class="middle-wrap">
    <h2><span class="btn"> Our Career </span></h2>
    <br>
    <p>
      Egopoint Limited recruits broadly and internationally. If you would like to work with us then please send us a cover letter and your CV/resume. We are especially looking for professionals with experience of the international oil industry and technical skills (welders, heavy-duty mechanics, Crane operators, etc)
    </p>
    <br>
    <h4> Submit Your CV </h4> <br>
      <?php
        if (isset($_SESSION['msg'])) {
          echo "<span class='btn'>" . $_SESSION['msg'] . "</span>";
          session_destroy();
        }
      ?>
    </span>
    <form action="upload.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8" target="_self">
      <label for="name"> <h5>Fullname:</h5>
        <input type="text" name="name" placeholder="Fullname" value="">
      </label> <br>

      <label for="name"> <h5>Email:</h5>
        <input type="email" name="email" placeholder="Email" value="">
      </label> <br>

      <label for="name"> <h5>Job:</h5>
        <select class="" name="jobtitle">
          <?php
            $jobs = "SELECT * FROM available_job WHERE close = 0";
            $result = mysqli_query($conn, $jobs);
            while ($row = mysqli_fetch_array($result)) {
              echo '<option> ' . $row['name'] . ' </option>';
            }
          ?>
        </select>
      </label> <br>

      <label for="name"> <h5>Description:</h5>
        <textarea name="desc" rows="8" cols="40" placeholder="Description of the job you wish to apply for"></textarea>
      </label> <br>

      <label for="name"> <h5>Upload Resume:</h5>
        <input type="file" name="file">
      </label> <br>
      <button type="submit" class="btn" name="submit"> Upload </button>
    </form>
  </div>
</section>

<?php include_once 'footer.php'; ?>

</body>
</html>
