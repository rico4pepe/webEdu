<?php

$conn = connect();
	$query = "SELECT * FROM staff_db WHERE staff_ID = :sd";
	$res = $conn->prepare($query);
	$res->bindValue(":sd", $session_id, PDO::PARAM_STR);
	$res->execute();
  $row = $res->fetch(PDO::FETCH_ASSOC);
  
  if ($row) {
	
	$userrole = $row['role'];
} else {
 // Return null or handle the case where no result is found
	$userrole = null;
}
?>

<!--begin::Aside-->
    <div id="kt_aside" class="aside py-9" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
        <!--begin::Brand-->
        <div class="aside-logo flex-column-auto px-9 mb-9" id="kt_aside_logo">
            <!--begin::Logo-->
            <a href="../../demo3/dist/index.html">
                <img alt="Logo" src="assets/media/logos/logo-demo3-default.svg" class="h-20px logo" />
            </a>
            <!--end::Logo-->
        </div>
        <!--end::Brand-->
        <!--begin::Aside menu-->
        <div class="aside-menu flex-column-fluid ps-5 pe-3 mb-9" id="kt_aside_menu">
            <!--begin::Aside Menu-->
            <div class="w-100 hover-scroll-overlay-y d-flex pe-2" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="100">
                <!--begin::Menu-->
                <div class="menu menu-column menu-rounded fw-bold my-auto" id="#kt_aside_menu" data-kt-menu="true">
                    <div class="menu-item">
                        <a class="menu-link active" href="./Dashboard.php">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                <span class="svg-icon svg-icon-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                                        <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </div>

       
                    


                    



                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                <span class="svg-icon svg-icon-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                                        <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Exam </span>
                            <span class="menu-arrow"></span>
                        </span>
                        <?php 
                                if($userrole == 4){
                            ?>
                                     <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./exam/Create_Exam.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Create Exam</span>
                                </a>
                            </div>	
                        </div>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./exam/viewStaffExam.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"> Edit Your Question</span>
                                </a>
                            </div>	
                        </div>
                            <?php
                                }
                        ?>
                       

                       

                     
                   


                    </div> 

                    </div>
                
                 
                         

                    


                    
                                
                               
                                            
                                            
                                            
                                            
                                        </div>
    
                            
                                     
                            </div>
                        </div>	
                    </div>
            <!--end::Aside menu-->