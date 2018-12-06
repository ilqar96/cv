<?php
  // Message Vars
  $msg = '';
  $msgClass = '';

  // Check For Submit
  if(filter_has_var(INPUT_POST, 'submit')){
    // Get Form Data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['text']);

    // Check Required Fields
    if(!empty($email) && !empty($name) && !empty($message)){
      // Passed
      // Check Email
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        // Failed
        $msg = 'Please use a valid email';
        $msgClass = 'alert-danger';
      } else {
        // Passed
        $toEmail = 'ilqar.huseynli.9686@gmail.com';
        $subject = 'Contact Request From '.$name;
        $body = '<h2>Contact Request</h2>
          <h4>Name</h4><p>'.$name.'</p>
          <h4>Email</h4><p>'.$email.'</p>
          <h4>Message</h4><p>'.$message.'</p>
        ';

        // Email Headers
        $headers = "MIME-Version: 1.0" ."\r\n";
        $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

        // Additional Headers
        $headers .= "From: " .$name. "<".$email.">". "\r\n";

        if(mail($toEmail, $subject, $body, $headers)){
          // Email Sent
          $msg = 'Email göndərildi';
          $msgClass = 'alert-success';
        } else {
          // Failed
          $msg = 'email ünvanı keçərli deyil';
          $msgClass = 'alert-danger';
        }
      }
    } else {
      // Failed
      $msg = 'Bütün sahələri doldurun';
      $msgClass = 'alert-danger';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
    crossorigin="anonymous">

  <link rel="stylesheet" href="css/main.css">
  <title>İlqar Hüseynli</title>


</head>

<body>
  <header>
    <div class="menu-btn">
      <div class="btn-line"></div>
      <div class="btn-line"></div>
      <div class="btn-line"></div>
    </div>

    <nav class="menu">
      <div class="menu-branding">
        <div class="portrait"></div>
      </div>
      <ul class="menu-nav">
        <li class="nav-item">
          <a href="index.html" class="nav-link">
            Ana səhifə
          </a>
        </li>
        <li class="nav-item">
          <a href="about.html" class="nav-link">
            Haqqımda
          </a>
        </li>
        <li class="nav-item">
          <a href="cv.html" class="nav-link">
            Rezyume
          </a>
        </li>
        <li class="nav-item">
          <a href="work.html" class="nav-link">
            İşlərim
          </a>
        </li>
        <li class="nav-item current">
          <a href="contact.html" class="nav-link">
            Mənimlə Əlaqə
          </a>
        </li>
      </ul>
    </nav>
  </header>

  <main id="contact">
    <h1 class="lg-heading">
      Mənimlə
      <span class="text-secondary"> Əlaqə Saxla</span>
    </h1>
    <?php if($msg != ''): ?>
        <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    <?php endif; ?>

    <div class="contact-grid">
      <div class="contact-form">
        <h2 class="sm-heading">
          Mesaj yaz...
        </h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
          <div class="form-component">
            <label for="name">Ad *</label>
            <input name="name" type="text" placeholder="Adinizi daxil edin..">
          </div>
          <div class="form-component">
            <label for="email">Email *</label>
            <input name="email" type="email" placeholder="Email daxil edin..">
          </div>
          <div class="form-component">
            <label for="name">Mətin *</label>
            <textarea name="text" cols="30" rows="7"></textarea>
          </div>
          <input type="submit" value="Göndər" name="submit" class="btn">
        </form>
      </div>

      <div class="contact-info">
        <div class="contact-img">
          <img src="img/portrait.jpg">
        </div>
        <div class="communication">
          <h3 class="text-secondary">Əlaqə vasitələri</h3>
          <p><i class="fas fa-map-marker-alt"></i> &nbsp;&nbsp;Baki s, Qaradag ray</p>

          <p><i class="fas fa-phone"></i>&nbsp;&nbsp; +99577-544-89-96</p>
          <p><i class="fas fa-envelope"></i>&nbsp;&nbsp; ilqar.huseynli.9686@gmail.com</p>
          <p><i class="fas fa-globe"></i>&nbsp;&nbsp; ilqar.huseynli.com</p>
        </div>
      </div>
    </div>


  </main>

  <footer id="main-footer">
    Copyright &copy; 2018 All Rights Reserved
  </footer>

  <script src="js/main.js"></script>
</body>

</html>