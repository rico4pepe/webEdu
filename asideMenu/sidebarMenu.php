<?php

$conn = connect();
	$query = "SELECT * FROM staff_db WHERE staff_ID = :sd";
	$res = $conn->prepare($query);
	$res->bindValue(":sd", $session_id, PDO::PARAM_STR);
	$res->execute();
  $row = $res->fetch(PDO::FETCH_ASSOC);
  $userrole  = "";
  
  if ($row) {
	
	$userrole = $row['role'];
    
} elseif($userrole == null || empty($userrole) ){
    $query = "SELECT * FROM learners_bd WHERE ID = :id";
	$res = $conn->prepare($query);
	$res->bindValue(":id", $session_id, PDO::PARAM_STR);
	$res->execute();
  $row = $res->fetch(PDO::FETCH_ASSOC);
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

                <?php    
if ($userrole == "student"){
                                ?>
                                
                                <div class="menu-item">
                               <a class="menu-link active" href="./href="./userManagement/viewStaff.php">
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
                                   <span class="menu-title">View Report Card</span>
                               </a>
                           </div>

                           <div class="menu-item">
                               <a class="menu-link active" href="./href="./userManagement/viewStaff.php">
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
                                   <span class="menu-title">View Your Time Table</span>
                               </a>
                           </div>

                           <div class="menu-item">
                               <a class="menu-link active" href="./href="./userManagement/viewStaff.php">
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
                                   <span class="menu-title">View Your Bus Time Tab</span>
                               </a>
                           </div>
                                
                                   <div class="menu-item">
                               <a class="menu-link active" href="./href="./userManagement/viewStaff.php">
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
                                   <span class="menu-title">Update/View student Profile</span>
                               </a>
                           </div> 
                               <?php  
                                }else{
                            
                        ?>
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
                            <span class="menu-title">Dashboard <?php echo $userrole; ?></span>
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
                            <span class="menu-title">Authentication</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="./Registration/password-reset.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Password Reset</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="./Registration/sign-in.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"> Sign in</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="./Registration/new-password.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">New Password</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a class="menu-link" href="./Registration/deactivation.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Account Deactivation</span>
                                </a>
                            </div>
                        </div>
                    </div>
                        <?php
                    if($userrole == 1){
                        ?>
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
                            <span class="menu-title">Registration</span>
                            <span class="menu-arrow"></span>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./Registration/sign-up.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Staff-Sign-up</span>
                                </a>
                            </div>	
                        </div>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./Registration/sign-up_learners.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Learner-Sign-up</span>
                                </a>
                            </div>	
                        </div>

                    </div>

                   <?php     
                    }
                    ?>
                   
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
                                <a class="menu-link" href="./exam/classroom.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"> My Class room</span>
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
                       

                       

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./exam/generate_exam_link.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"> Generate Exam </span>
                                </a>
                            </div>	
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./exam/viewAllExam.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"> View All Exams </span>
                                </a>
                            </div>	
                        </div>


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
                            
                            <span class="menu-title">Lesson Note </span>
                            <span class="menu-arrow"></span>
                        </span>
                        <?php 
                                if($userrole == 4){
                                    ?>
                                         <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./lessonNote/Create_LessonNote.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Create Lesson Note</span>
                                </a>
                            </div>	
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./lessonNote/Staff_LessonNotes.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"> View My Lesson Note</span>
                                </a>
                            </div>	
                        </div>
                        <?php
                                }else if ($userrole == 3){
                                        ?>
                                     <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./lessonNote/allStaff_LessonNotes.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"> View All Lesson Note</span>
                                </a>
                            </div>	
                        </div>
                               <?php
                                }
                        ?>
                       

                      

                        

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./lessonNote/View_LessonNotes.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"> Lesson Note Bank</span>
                                </a>
                            </div>	
                        </div>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./lessonNote/Response_LessonNotes.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"> Response To Note </span>
                                </a>
                            </div>	
                        </div>

                    </div>
                    


                    <?php 
                            if($userrole == 1 || $userrole == 5 || $userrole == 3){
                                ?>
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
                            <span class="menu-title">Manage Session</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/Create_Session.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Sessions</span>
                                </a>
                            </div>	
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/view_session.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View-Sessions</span>
                                </a>
                            </div>	
                        </div>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/Create_Term.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Terms</span>
                                </a>
                            </div>	
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/view_term.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View-Term</span>
                                </a>
                            </div>	
                        </div>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/Create_Class.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Class</span>
                                </a>
                            </div>	
                        </div>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/View_Class.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View-Class</span>
                                </a>
                            </div>	
                        </div>


                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/Create_Arms.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Class-Arms</span>
                                </a>
                            </div>	
                        </div>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/View_Arms.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View-Arms</span>
                                </a>
                            </div>	
                        </div>


                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/Invoice_Counter.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Create Invoice Coounter</span>
                                </a>
                            </div>	
                        </div>


                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/Create_Annex.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Create Annex</span>
                                </a>
                            </div>	
                        </div>

                        
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/View_Annex.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View Annex</span>
                                </a>
                            </div>	
                        </div>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/Create_Subject.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Create Subject</span>
                                </a>
                            </div>	
                        </div>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/Create_Notification.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Create Notification</span>
                                </a>
                            </div>	
                        </div>





                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link" href="./academicSession/Create_Present.php">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Present Session Data</span>
                                </a>
                            </div>	
                        </div>

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
                            <span class="menu-title">Payment Invoices</span>
                            <span class="menu-arrow"></span>
                        </span>
                        
                        <div class="menu-sub menu-sub-accordion">
                            
                                </span>

                                
                                    

                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div class="menu-item">
                                        <a class="menu-link" href="./Invoice/Generate_Invoice.php">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Create Invoice</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="./Invoice/Invoice.php">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Invoice </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="menu-item">
                                <a class="menu-link" href="../../demo3/dist/apps/invoices/create.html">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Create Invoice</span>
                                </a>
                            </div> -->
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
                                    <span class="menu-title">User Management</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                                        <span class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Users</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion">
                                            <div class="menu-item">
                                                <a class="menu-link" href="./userManagement/staff.php">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Users List</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="./userManagement/viewStaff.php">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">View User</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <span class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Roles / Task</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion">

                                        <div class="menu-item">
                                                <a class="menu-link" href="./userManagement/assign_class_staff.php">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Assign Class</span>
                                                </a>
                                            </div>

                                            <div class="menu-item">
                                                <a class="menu-link" href="./userManagement/Create_Role.php">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Create Role</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="./userManagement/View_Roles.php">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">View Role</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="./userManagement/Map_Roles.php">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Map Roles</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="./userManagement/View_Permission.php">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title"> View Permissions</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                         
                        <?php
                                }elseif ($userrole == 4){
                                ?> 
                                   <div class="menu-item">
                               <a class="menu-link active" href="./userManagement/viewStaff.php">
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
                                   <span class="menu-title">Update/View Profile</span>
                               </a>
                           </div> 
                               <?php  
                                }
                            
                        ?>
                 
                            <?php 
                                    if($userrole == 1 || $userrole == 5 || $userrole == 3){
                                ?>
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
                            <span class="menu-title">School Activites</span>
                            <span class="menu-arrow"></span>
                        </span>
                        
                        <div class="menu-sub menu-sub-accordion">
                            
                                </span>

                                
                                    

                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div class="menu-item">
                                        <a class="menu-link" href="./schoolactivities/Create_BusTable.php">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Create Bus Time Table</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="./schoolactivities/Create_TimeTable.php">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Create School Time Table </span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="./schoolactivities/Create_VirtualLink.php">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Create School Link for Virtual Class </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="menu-item">
                                <a class="menu-link" href="../../demo3/dist/apps/invoices/create.html">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Create Invoice</span>
                                </a>
                            </div> -->
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
                            <span class="menu-title">Inventory</span>
                            <span class="menu-arrow"></span>
                        </span>
                        
                          <div class="menu-sub menu-sub-accordion">
                            
                            
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="./Inventory/products.php">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Products</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="./Inventory/categories.php">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Categories</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="./Inventory/add-product.php">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Add Product</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="./Inventory/edit-product.php">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Edit Product</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="./Inventory/add-category.php">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Add Category</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link" href="./Inventory/edit-category.php">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Edit Category</span>
                                            </a>
                                        </div>
                                    </div>
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
                                        <span class="menu-title">Report</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    
                                      <div class="menu-sub menu-sub-accordion">
                                        
                                        
                                        <div class="menu-item">
                                            <a class="menu-link" href="./reports/student_details.php">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Student Report</span>
                                            </a>
                                        </div>

                                             
                                                    <div class="menu-item">
                                                        <a class="menu-link" href="./reports/trans_details.php">
                                                            <span class="menu-bullet">
                                                                <span class="bullet bullet-dot"></span>
                                                            </span>
                                                            <span class="menu-title">Transaction Details</span>
                                                        </a>
                                                    </div>
    
                        
    
                                                   
                                                 
                                                
                                                
                                                </div>
                                            </div>
                            <?php
                                    }
                                }
                            ?>

                    


                    
                                
                               
                                            
                                            
                                            
                                            
                                        </div>
    
                            
                                     
                            </div>
                        </div>	
                    </div>
            <!--end::Aside menu-->