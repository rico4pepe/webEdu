<?php
require_once("includes/connection.php");
// require_once("includes/session.php");

if (isset($_POST["btn"])) {
  require_once "phpmailer/class.phpmailer.php";
  $fname = trim($_POST["fname"]);
  $lname = trim($_POST["lname"]);
  $password = trim($_POST["pass1"]);
  $pass = password_hash($password, PASSWORD_BCRYPT);
  $email = trim($_POST["email"]);
  $is_permission = "4";


  $referal_code = trim($_POST["referal_code"]);
  // echo "SELECT *  from users where email = '$email'";


  $sql = " SELECT COUNT(*) AS count from users where email = :email_id";
  try {
    $stmt =  $conn->prepare($sql);
    $stmt->bindValue(":email_id", $email, PDO::PARAM_STR);

    //$result = $stmt->fetchAll();
    //$num_rows = $res->rowCount();

    // $stmt->bindValue(":email_id", $email);
    $stmt->execute();
    $result = $stmt->fetchAll();


    //$result = $stmt->fetchAll();

    if ($result[0]["count"] > 0) {
      $msg = "Email already exist";
      $msgType = "warning";
      echo '<script> alert("Email already Exist") </script>';
    } else {
      $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`,`password`, referral, is_permission  ) VALUES " . "( :fname, :lname, :email, :pass, :ref, :is_perm )";
      $stmt = $conn->prepare($sql);
      $stmt->bindValue(":fname", $fname);
      $stmt->bindValue(":lname", $lname);
      //Password Hashing
      $stmt->bindValue(":pass", $pass);
      //End Password Hashing
      $stmt->bindValue(":email", $email);
      $stmt->bindValue(":ref", $referal_code);
      $stmt->bindValue(":is_perm", $is_permission);
      $stmt->execute();
      $result = $stmt->rowCount();


      if ($result > 0) {

        $lastID = $conn->lastInsertId();

        echo "lastID ... $lastID";

        $message = '<html><head>
                <title>Email Verification</title>
                </head>
                <body>';
        $message .= '<h1>Hi ' . $name . '!</h1>';
        $message .= '<p><a href="' . SITE_URL . 'activate.php?id=' . base64_encode($lastID) . '">CLICK TO ACTIVATE YOUR ACCOUNT</a>';
        $message .= "</body></html>";


        // php mailer code starts
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP

        $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port = 465;                   // set the SMTP port for the GMAIL server

        $mail->Username = 'lanre.bolaji007@gmail.com';
        $mail->Password = 'pqxzesgmquphcexh';

        $mail->SetFrom('lanre.bolaji007@gmail.com', 'BayKins');
        $mail->AddAddress($email);

        $mail->Subject = trim("Email Verifcation - Baykins");
        $mail->MsgHTML($message);

        try {
          $mail->send();
          $msg = "An email has been sent for verfication.";
          $msgType = "success";
        } catch (Exception $ex) {
          $msg = $ex->getMessage();
          $msgType = "warning";
        }
      } else {
        $msg = "Failed to create User";
        $msgType = "warning";
      }
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }
}




// $user_query  = $conn->query("select * from user_table where user_id = '$session_id'");
// $user_row = $user_query->fetch((PDO::FETCH_ASSOC));
// $userName  = $user_row['user_name'];
// $userId    = $user_row['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Baykins</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="site-wrap">

    <?php if ($msg <> "") { ?>
      <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
        <button data-dismiss="alert" class="close" type="button">x</button>
        <p><?php echo $msg; ?></p>
      </div>
    <?php } ?>


    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.php" class="js-logo-clone">
                <img src="images/baykins_logo.png" alt="Baykins Logo" title="Baykins Logo" />
              </a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="index.php">Home</a></li>
                <li class="has-children">
                  <a href="#">Browse By Categories</a>
                  <ul class="dropdown">
                    <?php
                    $user_query1 = $conn->prepare("select * from categorys");
                    $user_query1->execute();
                    while ($row = $user_query1->fetch(PDO::FETCH_ASSOC)) {
                      $categoryid = $row['category_id'];
                      $categorydesc = $row['name'];
                    ?>
                      <li><a href="category.php?ID=<?php echo $categoryid; ?>"><?php echo $categorydesc; ?></a></li>
                    <?php
                    }
                    ?>
                  </ul>
                </li>
                <li><a href="about.php">About</a></li>
                <li class="active"><a href="contact.php">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="cart.html" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">2</span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index.html">Home</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Register</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-5 text-black">Register</h2>
          </div>
          <div class="col-md-12">

            <form action="" method="post" onsubmit="return validateForm();">

              <div class='col-12'>

                <div class="p-3 p-lg-5 border">
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                      <input type="text" class="form control RegcurvedInput" name="fname" id="fname" style="width:100%" placeholder="First Name" required />
                    </div>
                    <div class="col-md-6">
                      <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                      <input type="text" class="form control RegcurvedInput" name="lname" id="lname" style="width:100%" placeholder="First Name" required />

                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                      <input type="email" class="form-control RegcurvedInput" id="email" name="email" placeholder="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_fname" class="text-black">Password <span class="text-danger">*</span></label>
                      <input type="password" class="form control RegcurvedInput" id="pass1" name="pass1" style="width:100%" required />
                    </div>
                    <div class="col-md-6">
                      <label for="c_lname" class="text-black">Confirm Password <span class="text-danger">*</span></label>
                      <input type="password" class="form control RegcurvedInput" id="pass2" name="pass2" style="width:100%" required />

                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_email" class="text-black">Referral Code </label>
                      <input type="email" class="form-control RegcurvedInput" id="referall" name="referal_code" placeholder="Referral Code(Optional)">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label style="text-align: center;">We thought about your health all week long. Delighted to have you</label>

                    </div>
                  </div>


                  <div class="form-group row">
                    <div class="col-lg-12">
                      <input type="submit" class="btn btn-primary btn-lg btn-block" name="btn" value="Send Message">
                    </div>
                  </div>
                </div>
            </form>
          </div>

        </div>
      </div>
    </div>



    <div class="site-section bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="text-white mb-4">Offices</h2>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">New York</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">London</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">Canada</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
          </div>
        </div>
      </div>

    </div>


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About Us</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates
                sed dolorum excepturi iure eaque, aut unde.</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Quick Links</h3>
            <ul class="list-unstyled">
              <li><a href="#">Supplements</a></li>
              <li><a href="#">Vitamins</a></li>
              <li><a href="#">Diet &amp; Nutrition</a></li>
              <li><a href="#">Tea &amp; Coffee</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>


          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script> All rights reserved | This template is made
              with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <script>
    function validateForm() {

      var fname = $.trim($("#fname").val());
      var lname = $.trim($("#lname").val());
      var your_email = $.trim($("#email").val());
      var pass1 = $.trim($("#pass1").val());
      var pass2 = $.trim($("#pass2").val());


      // validate fname
      if (fname == "") {
        alert("Enter First name.");
        $("#fname").focus();
        return false;
      } else if (fname.length < 3) {
        alert("First Name must be atleast 3 character.");
        $("#uname").focus();
        return false;
      }

      // validate lname
      if (lname == "") {
        alert("Enter Last name.");
        $("#lname").focus();
        return false;
      } else if (lname.length < 3) {
        alert("Last Name must be atleast 3 character.");
        $("#lname").focus();
        return false;
      }


      // validate email
      if (!isValidEmail(your_email)) {
        alert("Enter valid email.");
        $("#uemail").focus();
        return false;
      }

      // validate subject
      if (pass1 == "") {
        alert("Enter password");
        $("#pass1").focus();
        return false;
      } else if (pass1.length < 6) {
        alert("Password must be atleast 6 character.");
        $("#pass1").focus();
        return false;
      }

      if (pass1 != pass2) {
        alert("Password does not matched.");
        $("#pass2").focus();
        return false;
      }

      return true;
    }

    function isValidEmail(email) {
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }
  </script>

</body>

</html>