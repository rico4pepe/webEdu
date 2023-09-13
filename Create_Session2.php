

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
	<head><base base href="../">
		<title>WEB-EDU || Create Session </title>
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
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body>
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="docs-page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_docs_aside" class="docs-aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_docs_aside_toggle">
					<!--begin::Logo-->
					<div class="docs-aside-logo flex-column-auto h-75px" id="kt_docs_aside_logo">
						<!--begin::Link-->
					<a href="../../demo3/dist/index.html">
							<img alt="Logo" src="assets/media/logos/baykins_logo.png" class="h-200px" />
						</a>
						<!--end::Link-->
					</div>
					<!--end::Logo-->
					<!--begin::Menu-->
					<div class="docs-aside-menu flex-column-fluid">
						<!--begin::Aside Menu-->
                        <?php 
					include_once("./asideMenu/sidebarMenu.html");
			?>
						
					</div>
					<!--end::Menu-->
				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="docs-wrapper d-flex flex-column flex-row-fluid" id="kt_docs_wrapper">
					<!--begin::Header-->
					<div id="kt_docs_header" class="docs-header align-items-stretch mb-2 mb-lg-10">
						<!--begin::Container-->
						<div class="container">
							<div class="d-flex align-items-stretch justify-content-between py-3 h-75px">
								<!--begin::Aside toggle-->
								<div class="d-flex align-items-center d-lg-none ms-n2 me-1" title="Show aside menu">
									<div class="btn btn-icon btn-flex btn-active-color-primary" id="kt_docs_aside_toggle">
										<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
										<span class="svg-icon svg-icon-1 mt-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
												<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</div>
								</div>
								<!--end::Aside toggle-->
								<!--begin::Logo-->
								<div class="d-flex d-lg-none align-items-center flex-grow-1 flex-lg-grow-0 me-3 me-lg-15">
									<a href="../../demo3/dist/index.html">
										<img alt="Logo" src="assets/media/logos/logo-1.svg" class="d-none d-lg-block h-25px" />
										<img alt="Logo" src="assets/media/logos/logo-2.svg" class="d-lg-none h-35px" />
									</a>
								</div>
								<!--end::Logo-->
								<!--begin::Wrapper-->
								<div class="d-flex align-items-center justify-content-between flex-lg-grow-1">
									<!--begin::Header title-->
									<div class="d-flex align-items-center" id="kt_docs_header_title">
										<!--begin::Page title-->
										<div class="docs-page-title d-flex flex-column flex-lg-row align-items-lg-center py-5 mb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_docs_content_container', 'lg': '#kt_docs_header_title'}">
											<!--begin::Title-->
											<h1 class="d-flex align-items-center text-dark my-1 fs-4">E-Learning
											
											<!--end::Title-->
											<!--begin::Separator-->
											<span class="d-none d-lg-block bullet h-20px w-1px bg-secondary mx-4"></span>
											<!--end::Separator-->
											<!--begin::Breadcrumb-->
											<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-6 my-1">
												<!--begin::Item-->
												<li class="breadcrumb-item text-gray-600">Dashboard</li>
												<!--end::Item-->
												<!--begin::Item-->
												<li class="breadcrumb-item">
													<span class="bullet w-5px h-2px"></span>
												</li>
												<!--end::Item-->
												<!--begin::Item-->
												<li class="breadcrumb-item text-gray-600">E-Learning</li>
												<!--end::Item-->
												<!--begin::Item-->
												<li class="breadcrumb-item">
													<span class="bullet w-5px h-2px"></span>
												</li>
												<!--end::Item-->
												<!--begin::Item-->
												<li class="breadcrumb-item text-dark">Create E-Learning Link</li>
												<!--end::Item-->
											</ul>
											<!--end::Breadcrumb-->
										</div>
										<!--end::Page title-->
									</div>
									<!--end::Header title-->
									<!--begin::Toolbar-->
								
                                    
									<!--end::Toolbar-->
								</div>
								<!--end::Wrapper-->
							</div>
							<div class="border-gray-300 border-bottom border-bottom-dashed"></div>
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="docs-content d-flex flex-column flex-column-fluid" id="kt_docs_content">
						<!--begin::Container-->
						<div class="container" id="kt_docs_content_container">
							<!--begin::Card-->
							<div class="card card-docs mb-2">
								<!--begin::Card Body-->
								<div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
									<!--begin::Notice-->
								
									<!--end::Notice-->
									<!--begin::Section-->
									<div class="py-10">
										<!--begin::Heading-->
										<h1 class="anchor fw-bolder mb-5" id="zero-configuration">
										Create E-Learning</h1>
										<!--end::Heading-->
										<!--begin::Block-->
										
										<!--end::Block-->
										<!--begin::Block-->
										<div class="py-5">
                                        <form class="form w-100" method="post" action="" enctype="multipart/form-data">
                                                
                                        <div class="fv-row mb-10">
								<!--begin::Label-->
								
								<!--end::Label-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="text" value="<?php echo $unique_key; ?>" name="unique_key" readonly />
								<!--end::Input-->
							</div>
                        

                    


                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-lg form-control-solid"  type="text" name="description" placeholder="Description"  autocomplete="off" />
                                                    <!--end::Input-->
                                                </div>


                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-lg form-control-solid"  type="text" name="url" placeholder="Learning Material"  autocomplete="off" />
                                                    <!--end::Input-->
                                                </div>
                    
                                               
                  


                                            <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select  class="form-control form-control-lg form-control-solid" name = "type" required>
                                                        <option value = "">Select Type</option>
                                                         <option value = "Video">Video</option>
                                                         <option value = "Audio">Audio</option>
                                                          <option value = "EBook">EBook</option>
                                                         
                                                    </select>
                                                    <!--<input class="form-control form-control-lg form-control-solid"  type="text" name="type" placeholder="Type"  autocomplete="off" />
                                                    <!--end::Input-->
                                                </div>

                                              
                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <button name = "btn" class="btn btn-sm btn-primary" >Create</button>
                                                    <!--end::Input-->
                                                </div>
                    
                                                <?php
                                                     if(isset($_POST['btn'])){
                                                        $createdAt = date("Y-m-d H:i:s");
                                                        $updatedAt = date("Y-m-d H:i:s");
                                                         
                                                        $elearnin_randId  = $_POST['unique_key'];
                                                      
                                                        
                                                        $description  = $_POST['description'];
                                                        $url    = $_POST['url'];
                                                        $type = $_POST['type'];
                                                         //$id = "elearn" . uniqid('', true);
                                                      
                                                        //Upload File to Upload Folder

                                               
                    
                                                            $stmt ="insert into  elearnings(elearnin_randId, description, url, type, createdAt, updatedAt ) values( '$elearnin_randId','$description', '$url', '$type', '$createdAt', '$updatedAt')";
                    
                                                            $res = $conn->prepare($stmt);
                    
                                        
                                        $res->bindParam("elearnin_randId", $elearnin_randId);
                                        $res->bindParam("description", $description);
                                        $res->bindParam("url", $url);
                                       $res->bindParam("type", $type);
                                        
                                        $res->bindParam("createdAt", $createdAt);
                                        $res->bindParam("updatedAt", $updatedAt);
                                         
                    
                                                    $res->execute();
                                                    $num_rows = $res->rowCount();
                                                if($num_rows  > 0){
                    
                                                    $varAction = array( "action"=>"Create E-Learning");
                                            
                                                            $action  = json_encode($varAction);
                                                             $id = "Baykins" . uniqid('', true);
                    
                                                    $stmt2 ="insert into audit_logs(id, user_id, action, createdOn, createdAt, updatedAt) values('$id','$user_name', '$action ', '$created_at', '$created_at',  '$created_at' )";
                                                    $res2 = $conn->prepare($stmt2);
                                                    $res2->execute();
                                                        ?>
                                                    <script type="text/javascript">
                                                    alert(" Elearning have been succesfully created");
                                                    window.location.href = "elearning.php";
                    
                                            </script>
                                                    <?php
                                                }
                    
                                                    }
                                        ?>
                                                 
                                                                </form>
										</div>
										<!--end::Block-->
										<!--begin::Code-->
										
										<!--end::Code-->
									</div>
									<!--end::Section-->
									<!--begin::Section-->
	
									<!--end::Section-->
									<!--begin::Section-->
									
									<!--end::Section-->
									<!--begin::Section-->

									<!--end::Section-->
								</div>
								<!--end::Card Body-->
							</div>
							<!--end::Card-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="py-4 d-flex flex-lg-column py-6" id="kt_footer">
						<!--begin::Container-->
						<div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">2021©</span>
								<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1 align-items-center mb-3 mb-md-0">
								<!--begin::Menu item-->
								<li class="menu-item">
									<!--begin::Menu link-->
									<a href="https://www.youtube.com/c/KeenThemesTuts/videos" target="_blank" class="menu-link px-3">
										<img alt="Keenthemes Youtube" src="assets/media/svg/social-logos/youtube.svg" class="h-20px" />
									</a>
									<!--end::Menu link-->
								</li>
								<!--end::Menu link-->
								<!--begin::Menu item-->
								<li class="menu-item">
									<!--begin::Menu link-->
									<a href="https://github.com/KeenthemesHub" target="_blank" class="menu-link px-3">
										<img alt="Keenthemes Github" src="assets/media/svg/social-logos/github.svg" class="h-20px" />
									</a>
									<!--end::Menu link-->
								</li>
								<!--end::Menu link-->
								<!--begin::Menu item-->
								<li class="menu-item">
									<!--begin::Menu link-->
									<a href="https://twitter.com/keenthemes" target="_blank" class="menu-link px-3">
										<img alt="Keenthemes Twitter" src="assets/media/svg/social-logos/twitter.svg" class="h-20px" />
									</a>
									<!--end::Menu link-->
								</li>
								<!--end::Menu link-->
								<!--begin::Menu item-->
								<li class="menu-item">
									<!--begin::Menu link-->
									<a href="https://www.instagram.com/keenthemes" target="_blank" class="menu-link px-3">
										<img alt="Keenthemes Instagram" src="assets/media/svg/social-logos/instagram.svg" class="h-20px" />
									</a>
									<!--end::Menu link-->
								</li>
								<!--end::Menu link-->
								<!--begin::Menu item-->
								<li class="menu-item">
									<!--begin::Menu link-->
									<a href="https://www.facebook.com/keenthemes" target="_blank" class="menu-link px-3">
										<img alt="Keenthemes Facebook" src="assets/media/svg/social-logos/facebook.svg" class="h-20px" />
									</a>
									<!--end::Menu link-->
								</li>
								<!--end::Menu link-->
								<!--begin::Menu item-->
								<li class="menu-item">
									<!--begin::Menu link-->
									<a href="https://dribbble.com/keenthemes" target="_blank" class="menu-link px-3">
										<img alt="Keenthemes Dribbble" src="assets/media/svg/social-logos/dribbble.svg" class="h-20px" />
									</a>
									<!--end::Menu link-->
								</li>
								<!--end::Menu link-->
							</ul>
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!--begin::Engage drawers-->
		<!--begin::Demos drawer-->
		<div id="kt_engage_demos" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="explore" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'350px', 'lg': '475px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_engage_demos_toggle" data-kt-drawer-close="#kt_engage_demos_close">
			<!--begin::Card-->
			<div class="card shadow-none rounded-0 w-100">
				<!--begin::Header-->
				<div class="card-header" id="kt_engage_demos_header">
					<h3 class="card-title fw-bolder text-gray-700">Explore</h3>
					<div class="card-toolbar">
						<button type="button" class="btn btn-sm btn-icon btn-active-color-primary h-40px w-40px me-n6" id="kt_engage_demos_close">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</button>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body" id="kt_engage_demos_body">
					<!--begin::Content-->
					<div id="kt_explore_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_engage_demos_body" data-kt-scroll-dependencies="#kt_engage_demos_header" data-kt-scroll-offset="5px">
						<!--begin::Wrapper-->
						<div class="mb-0">
							<!--begin::Heading-->
							<div class="mb-7">
								<div class="d-flex flex-stack">
									<h3 class="mb-0">Metronic Licenses</h3>
									<a href="https://themeforest.net/licenses/standard" class="fw-bold" target="_blank">License FAQs</a>
								</div>
							</div>
							<!--end::Heading-->
							<!--begin::License-->
							<div class="rounded border border-dashed border-gray-300 py-4 px-6 mb-5">
								<div class="d-flex flex-stack">
									<div class="d-flex flex-column">
										<div class="d-flex align-items-center mb-1">
											<div class="fs-6 fw-bold text-gray-800 fw-bold mb-0 me-1">Regular License</div>
											<i class="text-gray-400 fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="popover" data-bs-custom-class="popover-dark" data-bs-trigger="hover" data-bs-placement="top" data-bs-content="Use, by you or one client in a single end product which end users are not charged for"></i>
										</div>
										<div class="fs-7 text-muted">For single end product used by you or one client</div>
									</div>
									<div class="text-nowrap">
										<span class="text-muted fs-7 fw-bold me-n1">$</span>
										<span class="text-dark fs-1 fw-bolder">39</span>
									</div>
								</div>
							</div>
							<!--end::License-->
							<!--begin::License-->
							<div class="rounded border border-dashed border-gray-300 py-4 px-6 mb-5">
								<div class="d-flex flex-stack">
									<div class="d-flex flex-column">
										<div class="d-flex align-items-center mb-1">
											<div class="fs-6 fw-bold text-gray-800 fw-bold mb-0 me-1">Extended License</div>
											<i class="text-gray-400 fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="popover" data-bs-custom-class="popover-dark" data-bs-trigger="hover" data-bs-placement="top" data-bs-content="Use, by you or one client, in a single end product which end users can be charged for."></i>
										</div>
										<div class="fs-7 text-muted">For single SaaS app with paying users</div>
									</div>
									<div class="text-nowrap">
										<span class="text-muted fs-7 fw-bold me-n1">$</span>
										<span class="text-dark fs-1 fw-bolder">939</span>
									</div>
								</div>
							</div>
							<!--end::License-->
							<!--begin::License-->
							<div class="rounded border border-dashed border-gray-300 py-4 px-6 mb-5">
								<div class="d-flex flex-stack">
									<div class="d-flex flex-column">
										<div class="d-flex align-items-center mb-1">
											<div class="fs-6 fw-bold text-gray-800 fw-bold mb-0 me-1">Custom License</div>
										</div>
										<div class="fs-7 text-muted">Reach us for custom license offers.</div>
									</div>
									<div class="text-nowrap">
										<a href="https://keenthemes.com/contact/" class="btn btn-sm btn-success" target="_blank">Contact Us</a>
									</div>
								</div>
							</div>
							<!--end::License-->
							<!--begin::Purchase-->
				
							<!--end::Purchase-->
							<!--begin::Demos-->
						
							
							<!--end::Demos-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Card-->
		</div>
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
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/documentation/documentation.js"></script>
		<script src="assets/js/custom/documentation/search.js"></script>
		<script src="assets/js/custom/documentation/general/datatables/basic.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->

		
		<script>
			$("#kt_datatable_example_1").DataTable({
 "language": {
  "lengthMenu": "Show _MENU_",
 },
 "dom":
  "<'row'" +
  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
  ">" +

  "<'table-responsive'tr>" +

  "<'row'" +
  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
  ">"
});
		</script>
	</body>
	<!--end::Body-->
</html>