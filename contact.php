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
<title>Egopoint Limited | Contact us</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<!--<link href="w3.css" rel="stylesheet" type="text/css">-->
</head>

<body>
<?php include_once 'header.php' ?>

<div id="head">
    <div id="header3">
    	<div id="logo"><img src="docs/logo.jpg" alt="Logo" /></div>
    </div>
</div>

<section class="content-wrap">
  <div class="middle-wrap">
    <h3> Inquiries </h3> <br><br>
    <form action="upload.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8" target="_self">

      <label for="name"> <h5>Fullname:</h5>
        <input type="text" name="name" placeholder="Fullname" value="">
      </label> <br>

      <label for="name"> <h5>Email:</h5>
        <input type="email" name="email" placeholder="Email" value="">
      </label> <br>

      <label for="name"> <h5>Message:</h5>
        <input type="text" name="email" placeholder="Your Message" value="">
      </label> <br>

      <button type="submit" class="btn" name="submit"> Send Messages </button>
    </form>
  </div>
  <div class="left-postion">
    <h3> Office Address</h3>
    Plot 1 Trans Woji / Slaughter Link Road <br>
    Port Harcourt <br>
    Rivers State. <br>
    <br><br>

  </div>
</section>

<?php include_once 'footer.php'; ?>

</body>
</html>
