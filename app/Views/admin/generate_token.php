<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
	<!-- begin:: Subheader -->
		<div  class="kt-subheader   kt-grid__item" id="kt_subheader">
			<div class="kt-container  kt-container--fluid ">
				<div class="kt-subheader__main">
					<h3 class="kt-subheader__title"> Dashboard </h3>
					<span class="kt-subheader__separator kt-hidden"></span>
				</div>
				<div class="kt-subheader__toolbar"></div>
			</div>
		</div>
	<!-- end:: Subheader -->
	<!-- begin:: Content -->
		<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">	
			<div class="kt-portlet kt-portlet--mobile">
				<div class="kt-portlet__body kt-portlet__body--fit">
					<div class="kt-portlet__body" style="min-height: 480px">
					<?php  if (session()->has('success_message')) : ?>
					<div class="alert alert-success alert-bold" role="alert">
						<div class="alert-text"><?= session('success_message') ?></div>
						<div class="alert-close">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="la la-close"></i></span>
							</button>
						</div>
					</div>
				<?php endif ?>
				
				<?php  if (session()->has('error_message')) : ?>
					<div class="alert alert-danger alert-bold" role="alert">
						<div class="alert-text"><?= session('error_message') ?></div>
						<div class="alert-close">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="la la-close"></i></span>
							</button>
						</div>
					</div>
				<?php endif ?>
						<div class="row">
						<a href="<?=base_url()?>/admin/generate_token/request_code" type="button" class="btn btn-primary">Generate Dynamic Token</a>
						</div>	
					</div>
				</div>
			</div>
		</div>
	<!-- end:: Content -->
</div>
<script type="text/javascript">
	$(document).delegate(".kt-iconbox", "click", function() {
	   window.location = $(this).find("a").attr("href");
	});
</script>