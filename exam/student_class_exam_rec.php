<?php
require_once("../PhpConnections/session.php");

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../classes/SchoolClass.php');
require_once('../classes/AcademicSession.php');
require_once('../classes/Subjects.php');
require_once('../classes/AssignClass.php');
require_once('../utilites/Sanitize.php');
$staffClass = new AssignClass();
$activatesessionterm= new AcademicSession();
$response = $activatesessionterm->getActiveSessionTerm();
$staffClass = new AssignClass();
 $school_session_id = $response['session_id']; 
$term_id = $response['term_id'];

$classes = new SchoolClass();
$subject = new Subjects();

// $GenerateExamLink->generateLink()


if(isset($_GET['id'])){
	
	$student_id = $_GET['id'];	
}else {
    
	$student_id = null;	
}


include_once("../asideMenu/header.php");
?>

				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Card-->
							<div class="card">
								<!--begin::Card header-->
								<div class="card-header border-0 pt-6">
									<!--begin::Card title-->
									<div class="card-title">
										<!--begin::Search-->
										
										<!--end::Search-->
									</div>
									<!--begin::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Toolbar-->
										<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
											<!--begin::Filter-->
											
											<!--begin::Menu 1-->
											
											<!--end::Menu 1-->
											<!--end::Filter-->
											<!--begin::Export-->
											
										<!--end::Toolbar-->
										<!--begin::Group actions-->
										
										<!--end::Group actions-->
										<!--begin::Modal - Adjust Balance-->
									
										<!--end::Modal - New Card-->
										<!--begin::Modal - Add task-->
										
										<!--end::Modal - Add task-->
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<form class="form w-100" method="POST" novalidate="novalidate" id="kt_sign_up_form">

												
									<?php
									   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    if (isset($_POST["btn"])) {
										

																		
																		
																			
									$student_id;
									$staff_id = $session_id;
									$subject_ids = $_POST['subject_id'];
									$ca1 = $_POST['ca1'];
									$ca2 = $_POST['ca2'];
									$exam_scores = $_POST['exam_score'];
									$remarks = $_POST['remark'];

									$school_session_id;
									$term_id;

									for ($i = 0; $i < count($subject_ids); $i++) {
										$subject_id = Sanitize::sanitizeString($subject_ids[$i]);
										$ca1_value = Sanitize::sanitizeInteger($ca1[$i]);
										$ca2_value = Sanitize::sanitizeInteger($ca2[$i]);
										$exam_score = Sanitize::sanitizeInteger($exam_scores[$i]);
										$remark = Sanitize::sanitizeString($remarks[$i]);
										$staffClass->insertClassRecord($student_id, $school_session_id, $term_id, $staff_id, $subject_id, $ca1_value, $ca2_value, $exam_score, $remark);
									}

										
                                                                       
										

                                    }
							}
                        ?>
                                        <!--begin::Heading-->
                                        <div class="mb-10 text-center">
                                            <!--begin::Title-->
                                            <h1 class="text-dark mb-3">Enter Class Record</h1>
                                            <!--end::Title-->
                                            <!--begin::Link-->
                                            <div class="text-gray-400 fw-bold fs-4">
                                            <!-- <a href="../../demo3/dist/authentication/layouts/basic/sign-in.html" class="link-primary fw-bolder"></div> -->
                                            <!--end::Link-->
                                        </div>
                                      
            
									
                                        
            
										
                                      
                                        <div id="frmwrapper">
                                    <div class="row fv-row mb-5">


                                        <div class="col-xl-3">
                                            <label class="form-label fw-bolder text-dark fs-6"> Subject</label>
                                            <select class="form-control form-control-lg form-control-solid" name="subject_id[]" autocomplete="off">
                                                <option value=""> Select Subject</option>
                                                <?php $subject->dropdownSubject(); ?>
                                            </select>
                                        </div>


                                        <div class="col-xl-2">
                                            <label class="form-label fw-bolder text-dark fs-6"> CA 1</label>
                                            <input type="text" class="form-control form-control-lg form-control-solid" name="ca1[]" autocomplete="off">

                                        </div>


                                        <div class="col-xl-2">
                                            <label class="form-label fw-bolder text-dark fs-6">CA 2 </label>
                                            <input type="text" class="form-control form-control-lg form-control-solid" name="ca2[]" autocomplete="off">
                                        </div>


                                        <div class="col-xl-2">
                                            <label class="form-label fw-bolder text-dark fs-6"> Examination </label>
                                            <input type="text" class="form-control form-control-lg form-control-solid" name="exam_score[]" autocomplete="off">
                                        </div>
										<div class="col-xl-3">
                                            <label class="form-label fw-bolder text-dark fs-6"> Remark </label>
                                            <input type="text" class="form-control form-control-lg form-control-solid" name="remark[]" autocomplete="off">
                                        </div>


                                    </div>

                                </div>

                                <div class="row fv-row mb-7" >
                                    <div class="col-xl-4">
                                        <input type="button" style="float: left;" id="addRow" class="btn btn-lg  btn-info" value="Add More" />

                                    </div>
									<div class="col-xl-4">
                					<button type="button" class="removeRow btn btn-lg btn-warning">Remove</button>
            					</div>
									<div class="col-xl-4">
										<input type="submit" style="float: right;" name="btn" class="btn btn-lg btn-primary" value="Insert Exam Records"  />
                                           
                                        </div>
								</div>
								<br><br>




										
                                      
										
            
            
            
                                        
                                    </div>
                                        <!--end::Actions-->
                                    </form>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php include_once("../asideMenu/footer.php"); ?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
				<!--begin::Sidebar-->
				
				<!--end::Sidebar-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Drawers-->
		<!--begin::Activities drawer-->
		
		<!--end::Activities drawer-->
		<!--begin::Chat drawer-->
		
		<!--end::Chat drawer-->
		<!--end::Drawers-->
		<!--end::Main-->
		<!--begin::Engage drawers-->
		<!--begin::Demos drawer-->
		
		<!--end::Demos drawer-->
		<!--end::Engage drawers-->
		<!--begin::Engage toolbar-->
		
		<!--end::Engage toolbar-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/apps/user-management/users/list/table.js"></script>
		<script src="assets/js/custom/apps/user-management/users/list/export-users.js"></script>
		<script src="assets/js/custom/apps/user-management/users/list/add.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/modals/users-search.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->

		<script>
        $(document).ready(function () {

			$(".removeRow").hide();
            // Add a new row when the "Add Row" button is clicked
            $("#addRow").click(function () {
                var newRow = $("#frmwrapper .fv-row").first().clone();
				newRow.find("input[type='text']").val("")
                $("#frmwrapper").append(newRow);

				//show remove button
				toggleRemoveButton();

            });
			 // Function to toggle the Remove button
			function toggleRemoveButton() {
        var rows = $("#frmwrapper .fv-row");
        if (rows.length > 1) {
            // Show the Remove button if there's more than one row
            $(".removeRow").show();
        } else {
            // Hide the Remove button if there's only one row
            $(".removeRow").hide();
        }
    }

				   // Remove a row when the "Remove" button is clicked
			  // Remove the last row when the "Remove" button is clicked
			  $(".removeRow").click(function () {
        var rows = $("#frmwrapper .fv-row");
        if (rows.length > 1) {
            rows.last().remove();
            toggleRemoveButton();
        }
    });

			
        });
    </script>
	</body>
	<!--end::Body-->
</html>