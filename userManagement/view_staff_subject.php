<?php 
require_once("../PhpConnections/session.php");
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );



require_once("../PhpConnections/connection.php");
require_once("../classes/AcademicSession.php");
require_once("../classes/Staff.php");
require_once("../classes/Subjects.php");
require_once('../classes/Annex.php');
require_once ("../classes/SchoolClass.php");


require_once("../classes/AssignSubject.php");


$conn = connect();

$AcademicYear = new AcademicSession();
$response = $AcademicYear->getActiveSessionTerm();
$school_session_id = $response['session_id']; 
$term_id = $response['term_id'];
$getTeacherSubject = new AssignSubject();
$class = new SchoolClass();

$annex = new Annex();
$staff = new Staff();
$subjects = new Subjects();

$staff_id = isset($_GET['id']) ? $_GET['id'] : null;
$result = $getTeacherSubject->getStaffAndSubject($staff_id);
$output = $getTeacherSubject->getStaffAndSubjectById(1, $term_id, $school_session_id);


include_once ("../asideMenu/header.php");
?>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header">
						<!--begin::Container-->
						<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
							<!--begin::Page title-->
							<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
								<!--begin::Heading-->
								<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Student List</h1>
								<!--end::Heading-->
								<!--begin::Breadcrumb-->
								<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
									<li class="breadcrumb-item text-muted">
										<a href="../../demo3/dist/index.html" class="text-muted">Home</a>
									</li>
									<li class="breadcrumb-item text-muted">Applications</li>
									<li class="breadcrumb-item text-muted">User Management</li>
									<li class="breadcrumb-item text-muted">Exam</li>
									<li class="breadcrumb-item text-dark">My Class List</li>
								</ul>
								<!--end::Breadcrumb-->
							</div>
							<!--end::Page title=-->
							<!--begin::Wrapper-->
							<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
								<!--begin::Aside mobile toggle-->
								<div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
									<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
									<span class="svg-icon svg-icon-1 mt-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
								<!--end::Aside mobile toggle-->
								<!--begin::Logo-->
								<a href="../../demo3/dist/index.html" class="d-flex align-items-center">
									<img alt="Logo" src="assets/media/logos/logo-demo3-default.svg" class="h-20px" />
								</a>
								<!--end::Logo-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Topbar-->
							<div class="d-flex align-items-center flex-shrink-0">
								<!--begin::Search-->
								<div id="kt_header_search" class="d-flex align-items-center w-125px w-md-150px w-lg-225px" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">
									<!--begin::Form-->

									<!--end::Form-->
									<!--begin::Menu-->
									
									<!--end::Menu-->
								</div>
								<!--end::Search-->
								<!--begin::Activities-->
								
								<!--end::Activities-->
								<!--begin::Chat-->
								
								<!--end::Chat-->
								<!--begin::Sidebar Toggler-->
								
								<!--end::Sidebar Toggler-->
							</div>
							<!--end::Topbar-->
						</div>
						<!--end::Container-->
					</div>
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
										<div class="d-flex align-items-center position-relative my-1">
											<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
											<span class="svg-icon svg-icon-1 position-absolute ms-6">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
													<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
											<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
										</div>
										<!--end::Search-->
									</div>
									<!--begin::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Toolbar-->
										<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
											<!--begin::Filter-->
											
											<!--begin::Menu 1-->
										
												<!--begin::Header-->
												
											<!--end::Menu 1-->
											<!--end::Filter-->
											<!--begin::Export-->
										
											<!--end::Export-->
											<!--begin::Add user-->
											<a href="./Registration/sign-up.php" class="btn btn-primary">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
												<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->Add User</a>
											<!--end::Add user-->
										</div>
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
									<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
												<th class="w-10px pe-2">
													<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
														<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
													</div>
												</th>
												<th class="min-w-125px">User</th>
                                                <th class="min-w-125px">Last Name</th>
												<th class="min-w-125px">Class</th>
												<th class="min-w-125px">Subject</th>
												<th class="min-w-125px">Annex Name</th>
												<th class="text-end min-w-100px">Actions</th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-bold">
											<!--begin::Table row-->
										
											<!--end::Table row-->
											<!--begin::Table row-->
											<?php
											
                                          
                                        
											foreach($result as $row) {
												$subject_teacher = $row['staff_subject_id'];
                                               
												?>
									
											<tr>
												<!--begin::Checkbox-->
												<td>
													<div class="form-check form-check-sm form-check-custom form-check-solid">
														<input class="form-check-input" type="checkbox" value="1" />
													</div>
												</td>
												<!--end::Checkbox-->
												<!--begin::User=-->
												<td class="d-flex align-items-center">
													<!--begin:: Avatar -->
													<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
														<a href="../../demo3/dist/apps/user-management/users/view.html">
															<div class="symbol-label fs-3 bg-light-danger text-danger">M</div>
														</a>
													</div>
													<!--end::Avatar-->
													<!--begin::User details-->
													<div class="d-flex flex-column">
														<div class="text-gray-800 text-hover-primary mb-1"><?php echo   $row['First_Name']; ?></div>
														
													</div>
													<!--begin::User details-->
												</td>
												<!--end::User=-->
												<!--begin::Role=-->
												<td><?php echo   $row['Sur_Name']; ?></td>
												<!--end::Role=-->
												<!--begin::Last login=-->
												<td>
													<div class="badge badge-light fw-bolder"><?php echo   $row['class_name']; ?></div>
												</td>
												<!--end::Last login=-->
												<!--begin::Two step=-->
												<td>
													<div class="badge badge-light-success fw-bolder"><?php echo   $row['Name']; ?></div>
												</td>

												
												<!--end::Two step=-->
												<!--begin::Joined-->
												<td><?php echo   $row['annex_name']; ?></td>
												<!--begin::Joined-->
												<!--begin::Action=-->
												<td class="text-end">
													<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
													<span class="svg-icon svg-icon-5 m-0">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon--></a>
													<!--begin::Menu-->
													<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
														<!--begin::Menu item-->
														<div class="menu-item px-3">
                                                        <a href="#kt_modal_users_search_handler" data-bs-toggle="modal" data-subject-teacher="<?php echo $subject_teacher; ?>" data-bs-target="#kt_modal_1" class="menu-link px-3">Edit</a>
															
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
														</div>

								
														<!--end::Menu item-->
													</div>
													<!--end::Menu-->
												</td>
												<!--end::Action=-->
											</tr>
												<?php
											}
												?>
											
									
										
										</tbody>
										<!--end::Table body-->
									</table>
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

        <?php
                $output = $getTeacherSubject->getStaffAndSubjectById(1, $term_id, $school_session_id);
        ?>
		<div class="modal fade" id="kt_modal_1" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Modal header-->
					<div class="modal-header pb-0 border-0 justify-content-end">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--begin::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
						<!--begin::Content-->
						<div class="text-center mb-13">
						
							<div class="text-muted fw-bold fs-5">Edit Subject or Teacher assigned</div>
						</div>
                        <?php echo $row['staff_subject_id'] . " .... Hello "; ?>
						<!--end::Content-->
						<!--begin::Search-->
						<div id="kt_modal_users_search_handler" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline">
							<!--begin::Form-->
							<form method = "POST" id="myform" class="w-100 position-relative mb-5" autocomplete="off">
								
							
                                <div class="fv-row mb-5">
                                <input type="text" name="subject_teacher" id="subject_teacher">

                                            <label class="form-label fw-bolder text-dark fs-6"> Select Staff</label>
                                            <select  name="staff_id"  class="form-control form-control-lg form-control-solid"  autocomplete="off">
											<option value = ""> Select Staff</option>
										
											<?php $staff->dropdownFacilitator(); ?>
                                            </select>
                                        </div>

                                <div class="fv-row mb-5">
                                            <label class="form-label fw-bolder text-dark fs-6"> Select Subject</label>
                                            <select  name="subject_id"  class="form-control form-control-lg form-control-solid"  autocomplete="off">
											<option value = ""> Select Subject</option>
										
											<?php $subjects->dropdownSubject(); ?>
                                            </select>
                                        </div>
                                
                                        <div class="fv-row mb-5">
                                            <label class="form-label fw-bolder text-dark fs-6"> Select Class</label>
                                            <select  name="class_id[]"  id="multiple-checkboxes"  class="form-control form-control-lg form-control-solid"  data-control="select2" data-placeholder="Select Class/es" data-allow-clear="true" multiple="multiple" autocomplete="off">
											<option value = ""></option>
										
											<?php $class->dropdownClass(); ?>
                                            </select>
                                        </div>

                                        <div class="fv-row mb-5">
                                          <label class="form-label fw-bolder text-dark fs-6"> Select Annex</label>
											<select  name="annex_id"  class="form-control form-control-lg form-control-solid"  autocomplete="off">
											<option value=""> Select Annex</option>
											<?php $annex->dropdownAnnex(); ?>
                                            </select>
                                        </div>

                                        <div class="row fv-row mb-7" style="float:left;">
                                        <div class="col-xl-6">
										<input type="submit" name="btn" class="btn btn-lg btn-primary" value="Create Subject Teacher"  />
                                           
                                        </div>
								<!--end::Input-->
								<!--begin::Spinner-->
								
								<!--end::Spinner-->
								<!--begin::Reset-->
								
								<!--end::Reset-->
							</form>
							<!--end::Form-->
							<!--begin::Wrapper-->
							
							<!--end::Wrapper-->
						</div>
						<!--end::Search-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
	
		<!--end::Modal - Invite Friend-->
		<!--end::Modals-->
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
        <script> 
    $(document).ready(function() {
        $('#kt_modal_1').on('show.bs.modal', function (event) {
        var link = $(event.relatedTarget); // Button that triggered the modal
        var subject_teacher = link.data('subject-teacher'); // Get the subject_teacher from the link's data attribute
        var modal = $(this);

        // Set the subject_teacher in the hidden input field
        modal.find('#subject_teacher').val(subject_teacher);
    });
   
});
        </script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>