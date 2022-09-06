<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-container  kt-container--fluid ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title"><?= $page_title ?></h3>
				<span class="kt-subheader__separator kt-hidden"></span>
			</div>
			<div class="kt-subheader__toolbar"></div>
		</div>
	</div>
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					<i class="kt-font-brand flaticon-cogwheel-1"></i> Setting
					</h3>
				</div>
			</div>
			<div class="kt-portlet__body">
				<div class="tab-content">
					<div class="tab-pane active" id="kt_tabs_4_1" role="tabpanel">
						<div class="kt-portlet__body">
							<div class="kt-widget12">
								<div class="kt-widget12__content">
									<div class="kt-widget12__item" style="margin-bottom: 0;">
										<div class="kt-widget12__info"></div>
									</div>	
									<?php if (session()->has('error')) : ?>
										<div class="alert alert-solid-danger alert-bold" role="alert">
											<div class="alert-text"><?= session('error') ?></div>
											<div class="alert-close">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true"><i class="la la-close"></i></span>
												</button>
											</div>
										</div>
									<?php endif ?>
									<?php if (session()->has('success')) : ?>
										<div class="alert alert-solid-success alert-bold" role="alert">
											<div class="alert-text"><?= session('success') ?></div>
											<div class="alert-close">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true"><i class="la la-close"></i></span>
												</button>
											</div>
										</div>
									<?php endif ?>
									<!--begin::Form-->
									<form class="kt-form kt-form--label-right" name="form_setting" action="<?= base_url() ?>/admin/setting/update" method="post" enctype="multipart/form-data">
										<div class="kt-portlet__body">
											<div class="form-group row">
												<label for="store_url" class="col-2 col-form-label">Store URL <span style="color: red;">*</span> </label>
												<div class="col-10">
													<input id="store_url" name="store_url" type="text" class="form-control" value="<?= config_setting()->store_url ?>">
													<?php if(isset($validation) && !empty($validation->getError('store_url'))): ?>
														<div class="text-danger">
															<?= $validation->getError('store_url') ?>
														</div>                                
													<?php endif; ?>
												</div>
												
											</div>
											<div class="form-group row">
												<label for="store_front_url" class="col-2 col-form-label">Store Front URL</label>
												<div class="col-10">
													<input id="store_front_url" name="store_front_url" type="text" class="form-control" value="<?= config_setting()->store_front_url ?>">
													<?php if(isset($validation) && !empty($validation->getError('store_front_url'))): ?>
														<div class="text-danger">
															<?= $validation->getError('store_front_url') ?>
														</div>                                
													<?php endif; ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="api_path" class="col-2 col-form-label">API Path <span style="color: red;">*</span> </label>
												<div class="col-10">
													<input id="api_path" name="api_path" type="text" class="form-control" value="<?= config_setting()->api_path ?>">
													<?php if(isset($validation) && !empty($validation->getError('api_path'))): ?>
														<div class="text-danger">
															<?= $validation->getError('api_path') ?>
														</div>                                
													<?php endif; ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="api_username" class="col-2 col-form-label">API Username <span style="color: red;">*</span></label>
												<div class="col-10">
													<input id="api_username" name="api_username" type="text" class="form-control" value="<?= config_setting()->api_username ?>">
													<?php if(isset($validation) && !empty($validation->getError('api_username'))): ?>
														<div class="text-danger">
															<?= $validation->getError('api_username') ?>
														</div>                                
													<?php endif; ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="api_token" class="col-2 col-form-label">API Token
												<span style="color: red;">*</span></label>
												<div class="col-10">
													<input id="api_token" name="api_token" type="text" class="form-control" value="<?= config_setting()->api_token ?>">
													<?php if(isset($validation) && !empty($validation->getError('api_token'))): ?>
														<div class="text-danger">
															<?= $validation->getError('api_token') ?>
														</div>                                
													<?php endif; ?>
												</div>
											</div>
											<div class="form-group row">
												<label for="logo" class="col-2 col-form-label">Logo
												<span style="color: red;">*</span></label>
												<div class="col-10">
													<?php if(config_setting()->logo): ?>
														<img style="text-align: center;margin-left: 0px;height: auto;width: 150px;float: left;margin-bottom: 10px;" class = "header_logo" alt="Logo" src="<?= base_url().'/public/uploads/logo/'.config_setting()->logo ?>">
													<?php else: ?>
														<img style="text-align: center;margin-left: 0px;height: auto;width: 150px;float: left;margin-bottom: 10px;" class = "header_logo" alt="Logo" src="<?= base_url();?>/public/assets/logo/">
													<?php endif ?>
													<input id="logo" name="logo" value="" type="file" class="form-control">
													<?php if(isset($validation) && !empty($validation->getError('logo'))): ?>
														<div class="text-danger">
															<?= $validation->getError('logo') ?>
														</div>                                
													<?php endif; ?>
												</div>
											</div>
										</div>
										<div class="kt-portlet__foot">
											<div class="kt-form__actions">
												<div class="row">
													<div class="col-2">
													</div>
													<div class="col-10">
															<button type="submit" class="btn btn-success">Save</button>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--form end-->
</div>
<script>
	$("form[name='form_setting']").validate({
		errorClass: 'text-danger',
		rules: {
			store_url:{
				required : true,
				url : true,
			},
			store_front_url:{
				// required : true,
				url : true
			},
			api_path:{
				required : true,
			},
			api_username:{
				required : true,
			},
			api_token:{
				required : true,
			},
			logo: {
				accept: "image/jpg,image/jpeg,image/png"
			}
		},
		messages: {
			store_url:{
				required : 'The store url field is required',
				url : 'Please enter valid url'
			},
			store_front_url:{
				url : 'Please enter valid url'
			},
			api_path:{
				required : 'The api path field is required',
			},
			api_username:{
				required : 'The api username field is required',
			},
			api_token:{
				required : 'The api token field is required',
			},
			logo: {
				accept: "Please enter valid image"
			}
		},
		submitHandler: function(form) {
			form.submit();
		},
	});
</script>