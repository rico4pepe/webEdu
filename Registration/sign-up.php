<?php
require_once('../PhpConnections/connection.php');
require_once('../classes/Staff.php');
require_once('../classes/Annex.php');
require_once('../utilites/Randomizer.php');
require_once('../classes/Role.php');


$Staff = new Staff();
$Annexes = new Annex();
$GenerateValue = new Randomizer();
$Roles = new Role();
$unique_id = $GenerateValue->generate_staffid();
$password = $GenerateValue->generate_random_password(10);
?>

<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../">
    <title>Web-edu</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/dozzy-1/14.png)">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="../../demo3/dist/index.html" class="mb-12">
                    <!-- <img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" /> -->
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
                        <!--begin::Heading-->

                        <?php
                       
                      
                                    if (isset($_POST["btn"])) {
                                      

                                        $first_name = trim($_POST["first_name"]);
                                        $last_name = trim($_POST["last_name"]);
                                        $phone_No = trim($_POST["phone_No"]);
                                        $address = trim($_POST["address"]);
                                        $staff_role = trim($_POST["staff_role"]);
                                       
                                      
                                        $targetDirectory = "../uploads/";
                                        $targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
                                      
                                        
                                        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                                        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);
                                       
                                        $email = $_POST["email"];
                                        $password = $_POST["password"];
                                        $pass = password_hash($password, PASSWORD_BCRYPT);

                                        $fos = $_POST["fos"];
                                        $qual = $_POST["qual"];
                                        $annex_id = $_POST["annex_id"];
                                        $sex = $_POST["sex"];
                                        $sUniqueId = $_POST["sUniqueId"];

                                        $degree_date = $_POST["degree_date"];

                                        

                                    
                                          
                                    $Staff->insertUser($sUniqueId, $first_name,$last_name,$phone_No,$address,$staff_role,$targetFile,$email,$pass,$sex,$qual, $annex_id, $fos, $degree_date);
                                    }
                        ?>
    
                        <div class="mb-10 text-center">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Create an Account</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Action-->
                        <!-- <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
							<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Sign in with Google</button> -->
                        <!--end::Action-->
                        <!--begin::Separator-->





                        <!-- <div class="col-xl-6">
							<label for="myfile">Select a file:</label>
							<input type="file" accept="image/*" />
						     </div> -->
                        <!-- <div class="d-flex align-items-center mb-10">
								<div class="border-bottom border-gray-300 mw-50 w-100"></div>
								<span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
								<div class="border-bottom border-gray-300 mw-50 w-100"></div>
							</div> -->
                        <!--end::Separator-->
                        <!--begin::Input group-->
                        <div class="row fv-row mb-7">
                            <!--begin::Col-->
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">First Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" id="first_name" name="first_name" autocomplete="off" />
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Last Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" id="last_name" name="last_name" autocomplete="off" /><br><br>
                            </div>
                        

                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Phone Num</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" id="phone_No" name="phone_No" autocomplete="off" />
                            </div>


                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Address</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" id="address" name="address" autocomplete="off" />
                                <br><br>
                            </div>
                        </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Staff Roles</label>
                                <select class="form-control form-control-lg form-control-solid" type="text" id="staff_role" name="staff_role" autocomplete="off">
                                <option value=""> Select Staff Role</option>
                                <?php $Roles->dropdownRoles(); ?>
                                
                                </select>
                            </div>

                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Select Image</label>
                                <input class="form-control form-control-lg form-control-solid" type="file" id="file" name="file" accept="image/*"><br><br>
                            </div>
                        </div>

                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Discipline</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" id="fos" name="fos" autocomplete="off" required />
                                <br><br>
                            </div>

                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Qualification</label>
                                <select class="form-control form-control-lg form-control-solid" type="text" id="qual" name="qual" autocomplete="off" required>
                                    <option value="">Select Qualification</option>
                                    <option value="SSCE">SSCE</option>
                                    <option value="NCE">NCE</option>
                                    <option value="BSC">BSC</option>
                                    <option value="BTECH">BTECH</option>
                                    <option value="Masters">Masters</option>
                                    <option value="Others">Others</option>

                                </select>
                            </div>
                        </div>

                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Date Qualification Obtained</label>
                            <input class="form-control form-control-lg form-control-solid" type="date" placeholder="" id="degree_date" name="degree_date" autocomplete="off"  
         required/>
                        </div>

                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Annex Assigned To</label>
                                <select class="form-control form-control-lg form-control-solid" id="annex_id" name="annex_id" required>
                                    <option value=""> Select Annex</option>
                                    <?php $Annexes->dropdownAnnex(); ?>
                                </select>
                                <br><br>
                            </div>

                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Sex</label>
                                <select class="form-control form-control-lg form-control-solid" type="text" id="sex" name="sex" autocomplete="off" required>
                                    <option value="">Select Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                  

                                </select>
                            </div>
                        </div>



                           
                            <!--end::Col-->
                       
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Email</label>
                            <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" id="email" name="email" autocomplete="off" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                          
                                <label class="form-label fw-bolder text-dark fs-6">Staff Id</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" id="sUniqueId" name="sUniqueId" value="<?php echo $unique_id; ?>" autocomplete="off" readonly />
                                <br><br>
                            </div>

                            <div class="col-xl-6">
                           
                                <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" id="password" name="password" value="<?php echo $password; ?>" autocomplete="off"  readonly/>
                            </div>
                        </div>
                       
                        <!--end::Input group=-->
                        <!--begin::Input group-->

                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="row fv-row mb-7">
                            <div id="error" class="alert alert-danger" style="display: none;" role="alert"></div>
                        </div>


                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <input type="submit" name ="btn" class="btn btn-lg btn-primary" value="Submit" />
                            </div>



                            <div class="col-xl-6">
                                <a href="batch_Upload.php" class="btn btn-lg btn-primary"> Batch Upload Submit </a>
                            </div>
                        </div>

                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
                    <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
                    <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script>
        function isValidEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        function validateForm() {

            var first_name = $.trim($("#first_name").val());
            var last_name = $.trim($("#last_name").val());
            var your_email = $.trim($("#email").val());
            var phone_No = $.trim($("#phone_No").val());
            var address = $.trim($("#address").val());
            var staff_role = $.trim($("#staff_role").val());
            var pass1 = $.trim($("#password").val());



            // validate fname
            if (first_name == "") {
                document.getElementById('error').style['display'] = 'block';
                document.getElementById('error').innerHTML = "Enter First name"
                $("#first_name").focus();
                return false;
            } else if (first_name.length < 3) {
                document.getElementById('error').style['display'] = 'block';
                document.getElementById('error').innerHTML = "First Name must be at least 3 character"
                $("#first_name").focus();
                return false;
            }

            // validate lname
            if (last_name == "") {
                document.getElementById('error').style['display'] = 'block';
                document.getElementById('error').innerHTML = "Enter last name"
                $("#last_name").focus();
                return false;
            } else if (last_name.length < 3) {
                document.getElementById('error').style['display'] = 'block';
                document.getElementById('error').innerHTML = "Last Name must be atleast 3 character."
                $("#last_name").focus();
                return false;
            }

            // validate Phone number
            if (phone_No == "") {
                document.getElementById('error').style['display'] = 'block';
                document.getElementById('error').innerHTML = "Phone Number is required"

                $("#phone_No").focus();
                return false;
            } else if (phone_No.length != 11) {
                document.getElementById('error').style['display'] = 'block';
                document.getElementById('error').innerHTML = "Invalid phone number format"
                $("#phone_No").focus();
                return false;
            }

            // validate Address
            if (address == "") {
                document.getElementById('error').style['display'] = 'block';
                document.getElementById('error').innerHTML = "Staff Address is required"

                $("#address").focus();
                return false;
            }


            // validate staff role
            if (staff_role == "") {
                document.getElementById('error').style['display'] = 'block';
                document.getElementById('error').innerHTML = "Select staff role"

                $("#staff_role").focus();
                return false;
            }



            // validate email
            if (!isValidEmail(your_email)) {
                document.getElementById('error').style['display'] = 'block';
                document.getElementById('error').innerHTML = "Invalid Mail format"
                $("#email").focus();
                return false;
            }

            // validate subject
            if (pass1 == "") {
                alert("Enter password");
                $("#pass1").focus();
                return false;
            } else if (pass1.length < 6) {
                alert("Password must be atleast 6 character.");
                $("#password").focus();
                return false;
            }

            return true;
        }
    </script>

    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <!--<script src="assets/js/custom/authentication/sign-up/general.js"></script>-->
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>