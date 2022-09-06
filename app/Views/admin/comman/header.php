<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>

<title><?= $page_title ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
<link href="<?= base_url() ?>/public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/css/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

<!--end:: Vendor Plugins -->
<link href="<?= base_url() ?>/public/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

<!--begin:: Vendor Plugins for custom pages -->
<link href="<?= base_url() ?>/public/assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/@fullcalendar/core/main.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/@fullcalendar/daygrid/main.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/@fullcalendar/list/main.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/@fullcalendar/timegrid/main.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<link href="<?= base_url() ?>/public/assets/plugins/custom/jqvmap/dist/jqvmap.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/public/assets/plugins/custom/uppy/dist/uppy.min.css" rel="stylesheet" type="text/css" />

<script src="<?= base_url() ?>/public/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>/public/assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>/public/assets/js/additional-methods.min.js"></script>
<script src="<?= base_url() ?>/public/assets/js/ajaxupload.3.5.js"></script>
<script src="<?= base_url() ?>/public/assets/js/ckeditor/ckeditor.js"></script>
<script src="<?= base_url() ?>/public/assets/js/ckeditor/adapters/jquery.js"></script>

<link rel="shortcut icon" href="<?= base_url() ?>public/uploads/sitelogo/original/" />

<style type="text/css">
	.header_logo{
		max-width: 92%;
	}
	.hidden
	{
		display: none !important;
	}
	.hide_element
	{
		display: none !important;
	}

	.kt-subheader__title{
		font-size: 1.70rem !important;
	}

	.kt-iconbox{
		cursor: pointer;
	}
</style>
</head>


<script  type="text/javascript" async defer>
var base_url = "<?= base_url() ?>";
</script>

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
	
	<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
		<div class="kt-header-mobile__logo">
			<a href="index&demo=demo12.html">
				<!--<img alt="Logo" src="assets/media/logos/logo-12.png" />-->
			</a>
		</div>
		<div class="kt-header-mobile__toolbar">
			<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
			<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
			<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
		</div>
	</div>

	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
				<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
					<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
					<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
						
					</div>
					<div class="kt-header__topbar">
						<div class="kt-header__topbar-item kt-header__topbar-item--user">
							<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
								<div class="kt-header__topbar-user">
									<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
									<span class="kt-header__topbar-username kt-hidden-mobile"><?= admin_session()->username ?></span>
									<img alt="Pic" class="kt-radius-100" src="<?= base_url() ?>/public/assets/media/users/default.jpg" />
								</div>
							</div>
							<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
								<!--begin: Head -->
								<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(<?= base_url();?>/public/assets/media/misc/bg-1.jpg)">
									<div class="kt-user-card__avatar">
										<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success"><?= strtoupper(substr(admin_session()->username, 0,1)) ?></span>
									</div>
									<div class="kt-user-card__name">
										<?= admin_session()->username ?><br>
										<span>
										<small><?= admin_session()->email ?></small>
										</span>
									</div>
								</div>
								<div class="kt-notification">
									<div class="kt-notification__custom kt-space-between">
										<a href="<?= base_url('admin/logout'); ?>" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				

			
		


