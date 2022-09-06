<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo  $page_title ?></title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
		<link href="https://miniatuers.devser.net/public/assets/css/pages/login/login-3.css" rel="stylesheet" type="text/css" />
		<link href="https://miniatuers.devser.net/public/assets/css/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="https://miniatuers.devser.net/public/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!-- Error meassage icon-->
		<link href="https://miniatuers.devser.net/public/assets/plugins/general/morris.js/morris.css" rel="stylesheet" type="text/css">
		<link href="https://miniatuers.devser.net/public/assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css">
		<link href="https://miniatuers.devser.net/public/assets/plugins/general/socicon/css/socicon.css" rel="stylesheet" type="text/css">
		<link href="https://miniatuers.devser.net/public/assets/plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css">
		<link href="https://miniatuers.devser.net/public/assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css">
		<link href="https://miniatuers.devser.net/public/assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css">
		<link href="https://miniatuers.devser.net/public/assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<!-- Error meassage icon -->
		<script src="https://miniatuers.devser.net/public/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="https://miniatuers.devser.net/public/assets/js/jquery.validate.min.js"></script>
		<script src="https://miniatuers.devser.net/public/assets/js/additional-methods.min.js"></script>
		
		<style type="text/css">
			.logo_loginpage{
				width: 80%;
			}
			#email-error{
				width: 100%;
			}
			#password-error{
				width: 100%;
			}
			.error{
				color: red;
			}
		</style>
	</head>
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(https://miniatuers.devser.net/public/assets/media//bg/bg-3.jpg);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Sign In To Admin</h3>
								</div>
								<?php if (session()->has('error')) : ?>
									
									<div class="alert alert-solid-danger alert-bold" role="alert">
										<div class="alert-text"><?php echo  session('error') ?></div>
										<div class="alert-close">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true"><i class="la la-close"></i></span>
											</button>
										</div>
									</div>
								<?php endif ?>
								
								<form class="kt-form" name="loginForm" action="" method="post">
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Username" name="username" autocomplete="off" value="">
									</div>
									<?php if(isset($validation) && !empty($validation->getError('username'))): ?>
										<div class="error">
											<?php echo  $validation->getError('username') ?>
										</div>                                
									<?php endif; ?>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Password" name="password">
									</div>
									<?php if(isset($validation) && !empty($validation->getError('password'))): ?>
										<div class="error">
											<?php echo  $validation->getError('password') ?>
										</div>                                
									<?php endif; ?>
									<div class="kt-login__actions">
										<input id="kt_login_signin_submit" name = "commit" type = "submit" class="btn btn-brand btn-elevate kt-login__btn-primary" value="Sign In">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end:: Page -->
		<script>
			$("form[name='loginForm']").validate({
				rules: {
					username: "required",
					password: "required",
				},
				messages: {
					username: "The username field is required!",
					password: "The passwqord field is required!",
				},
				submitHandler: function(form) {
					form.submit();
				},
			});
			
			$(".close").click(function(){
			  $(".alert-bold").hide();
			});
		</script>
		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#2c77f4",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};  
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="https://miniatuers.devser.net/public/assets/js/plugins.bundle.js" type="text/javascript"></script>
		<script src="https://miniatuers.devser.net/public/assets/js/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Global Theme Bundle -->
		<!--begin::Page Scripts(used by this page) -->
		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>