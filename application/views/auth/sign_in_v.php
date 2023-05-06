<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.1.8
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
	<head><base href="../../../"/>
		<title>Metronic - The World's #1 Selling Bootstrap Admin Template by Keenthemes</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="<?php echo base_url();?>metronic/dist/assets/media/logos/favicon.ico" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="<?php echo base_url();?>metronic/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>metronic/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>metronic/dist/assets/css/animate.min.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('metronic/dist/assets/media/auth/bg4.jpg'); } [data-bs-theme="dark"] body { background-image: url('metronic/dist/assets/media/auth/bg4-dark.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<!--begin::Aside-->
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
					<!--begin::Aside-->
					<div class="d-flex flex-center flex-lg-start flex-column">
						<!--begin::Logo-->
						<a href="<?php echo base_url();?>" class="mb-7">
							<img alt="Logo" src="<?php echo base_url();?>metronic/dist/assets/media/logos/custom-3.svg" />
						</a>
						<!--end::Logo-->
						<!--begin::Title-->
						<h2 class="text-white fw-normal m-0">Financial tools designed for you</h2>
						<!--end::Title-->
					</div>
					<!--begin::Aside-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
					<!--begin::Card-->
					<div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
						<!--begin::Wrapper-->
						<div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
							<!--begin::Form-->
							
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3">Sign In</h1>
									<!--end::Title-->
									<!--begin::Subtitle-->
									<div class="text-gray-500 fw-semibold fs-6">Financially Smart</div>
									<!--end::Subtitle=-->
								</div>
								<!--begin::Heading-->
								<!--begin::Login options-->
								<div class="row g-3 mb-9">
									<!--begin::Col-->
									<div class="col-md-6">
										<!--begin::Google link=-->
										<a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
										<img alt="Logo" src="<?php echo base_url();?>metronic/dist/assets/media/svg/brand-logos/google-icon.svg" class="h-15px me-3" />Sign in with Google</a>
										<!--end::Google link=-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-6">
										<!--begin::Google link=-->
										<a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
										<img alt="Logo" src="<?php echo base_url();?>metronic/dist/assets/media/svg/brand-logos/apple-black.svg" class="theme-light-show h-15px me-3" />
										<img alt="Logo" src="<?php echo base_url();?>metronic/dist/assets/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show h-15px me-3" />Sign in with Apple</a>
										<!--end::Google link=-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Login options-->
								<!--begin::Separator-->
								<div class="separator separator-content my-14 w-100">
									<span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
								</div>
								<!--end::Separator-->
								<div class="sign-up d-none w-100" id="sign-up-form">
									<form class="form" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="<?php echo base_url();?>dashboard" action="#" method="POST">
										<!--begin::Input group=-->
										<div class="fv-row mb-8">
											<!--begin::Email-->
											<input type="text" placeholder="Username" name="username" autocomplete="off" class="form-control bg-transparent signup-username" />
											<!--end::Email-->
										</div>
										<!--begin::Input group-->
										<!--begin::Input group=-->
										<div class="fv-row mb-8">
											<!--begin::Email-->
											<input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent signup-email" />
											<!--end::Email-->
										</div>
										<!--begin::Input group-->
										<div class="fv-row mb-8" data-kt-password-meter="true">
											<!--begin::Wrapper-->
											<div class="mb-1">
												<!--begin::Input wrapper-->
												<div class="position-relative mb-3">
													<input class="form-control bg-transparent signup-password" type="password" placeholder="Password" name="password" autocomplete="off" />
													<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
														<i class="ki-duotone ki-eye-slash fs-2"></i>
														<i class="ki-duotone ki-eye fs-2 d-none"></i>
													</span>
												</div>
												<!--end::Input wrapper-->
												<!--begin::Meter-->
												<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
													<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
													<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
													<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
													<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
												</div>
												<!--end::Meter-->
											</div>
											<!--end::Wrapper-->
											<!--begin::Hint-->
											<div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
											<!--end::Hint-->
										</div>
										<!--end::Input group=-->
										<!--end::Input group=-->
										<div class="fv-row mb-8">
											<!--begin::Repeat Password-->
											<input placeholder="Repeat Password" name="confirm-password" type="password" autocomplete="off" class="form-control bg-transparent" />
											<!--end::Repeat Password-->
										</div>
										<!--end::Input group=-->
										<!--begin::Accept-->
										<div class="fv-row mb-8">
											<label class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" name="toc" value="1" />
												<span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">I Accept the
												<a href="#" class="ms-1 link-primary">Terms</a></span>
											</label>
										</div>
										<!--end::Accept-->
										<div class="d-grid mb-10">
											<button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
												<!--begin::Indicator label-->
												<span class="indicator-label">Sign up</span>
												<!--end::Indicator label-->
												<!--begin::Indicator progress-->
												<span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												<!--end::Indicator progress-->
											</button>
										</div>
									</form>	
								</div>
								<div class="sign-in w-100" id="sign-in-form">
									<form class="form" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="<?php echo base_url();?>dashboard" action="#" method="POST">
										<!--begin::Input group=-->
										<div class="fv-row mb-8">
											<!--begin::Email-->
											<input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent login-email" />
											<!--end::Email-->
										</div>
										<!--end::Input group=-->
										<div class="fv-row mb-3">
											<!--begin::Password-->
											<!--begin::Input wrapper-->
											<div class="password-div position-relative mb-3">
												<input class="form-control bg-transparent login-password" placeholder="Password" type="password" placeholder="" name="password" autocomplete="off" />

												<!--begin::Visibility toggle-->
												<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
														<i class="ki-duotone unview_password ki-eye-slash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
														<i class="ki-duotone view_password d-none ki-eye fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
												</span>
												<!--end::Visibility toggle-->
											</div>
											<!--end::Input wrapper-->
											<!--end::Password-->
										</div>
										<!--end::Input group=-->
										<!--begin::Wrapper-->
										<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
											<div></div>
											<!--begin::Link-->
											<a href="<?php echo base_url();?>" class="link-primary">Forgot Password ?</a>
											<!--end::Link-->
										</div>
										<!--end::Wrapper-->
										<!--begin::Submit button-->
										<div class="d-grid mb-10">
											<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
												<!--begin::Indicator label-->
												<span class="indicator-label">Sign In</span>
												<!--end::Indicator label-->
												<!--begin::Indicator progress-->
												<span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												<!--end::Indicator progress-->
											</button>
										</div>
									</form>
								</div>
								<!--end::Submit button-->
								<!--begin::Sign up-->
								<div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
									<a href="javascript:void(0);" class="link-primary show-sign-up">Sign up</a>
									<a href="javascript:void(0);" class="link-primary d-none show-sign-in">Sign in</a>
								</div>
								<!--end::Sign up-->
							
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Footer-->
						<div class="d-flex flex-center px-lg-10">
							<!--begin::Links-->
							<div class="d-flex fw-semibold text-primary fs-base gap-5">
								<a href="<?php echo base_url();?>" target="_blank">Terms</a>
								<a href="<?php echo base_url();?>" target="_blank">Plans</a>
								<a href="<?php echo base_url();?>" target="_blank">Contact Us</a>
							</div>
							<!--end::Links-->
						</div>
						<!--end::Footer-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script type="text/javascript">
			var baseUrl = '<?php echo base_url() ?>';
		</script>
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="<?php echo base_url();?>metronic/dist/assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?php echo base_url();?>metronic/dist/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="<?php echo base_url();?>metronic/dist/assets/js/custom/authentication/sign-in/general.js?v=<?php echo time();?>"></script>
		<script src="<?php echo base_url();?>metronic/dist/assets/js/custom/authentication/sign-up/general.js?v=<?php echo time();?>"></script>
		<!--end::Custom Javascript-->
		
		<script type="text/javascript">
			
			$(function() {
					
				$('.show-sign-up').click(function(){
					$(this).addClass('d-none');
					$('.sign-up').removeClass('d-none');
					$('.sign-in').addClass('d-none');
					$('.show-sign-in').removeClass('d-none');
					$('.sign-up').addClass('animate__animated animate__fadeIn');
				});
				
				$('.show-sign-in').click(function(){
					$(this).addClass('d-none');
					$('.sign-in').removeClass('d-none');
					$('.sign-up').addClass('d-none');
					$('.show-sign-up').removeClass('d-none');
					$('.sign-in').addClass('animate__animated animate__fadeIn');
				});
				
				if (localStorage.getItem("email") && localStorage.getItem("password") === null) 
				{
					$('.login-email').val("")
					$('.login-password').val("")
				}
				else
				{
					$('.login-email').val(localStorage.getItem("email"))
					$('.login-password').val(localStorage.getItem("password"))
				}	
				
				$('.view_password, .unview_password').click(function()
				{
					var input = $(this).parents('.password-div').find('input');
		
					if (input.attr("type") == "password") 
					{
						$(this).addClass('d-none');
						$(this).parents('.password-div').find('.view_password').removeClass('d-none');
						input.attr("type", "text");
					} 
					else 
					{
						$(this).addClass('d-none');
						$(this).parents('.password-div').find('.unview_password').removeClass('d-none');
						input.attr("type", "password");
					}
				});
				
			});
	
		</script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>