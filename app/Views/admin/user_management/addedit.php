<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-container  kt-container--fluid ">
			<div class="kt-subheader__main">
				<h3 class="kt-subheader__title"> <?= $page_title ?> </h3>
				<span class="kt-subheader__separator kt-hidden"></span>
			</div>
		</div>
	</div>
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="kt-font-brand flaticon2-user"></i>
					</span>
					<h3 class="kt-portlet__head-title">
						User <?= $action ?>
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
            		<div class="kt-portlet__head-wrapper"  >
						<a href="<?= base_url(); ?>/admin/user" class="btn btn-clean btn-icon-sm">
							<i class="la la-long-arrow-left"></i>
							Back
						</a>
					</div>		
				</div>
			</div>
			<div class="tab-content">
				<div class="tab-pane active" id="kt_tabs_4_1" role="tabpanel">
					<div class="kt-portlet__body">
						<div class="kt-widget12">
							<div class="kt-widget12__content">
								<div class="kt-widget12__item" style="margin-bottom: 0;">
									<div class="kt-widget12__info">
									</div>
								</div>
								<form class="kt-form kt-form--label-right" autocomplete="off" name="form_user" action="<?= base_url() ?>/admin/user/<?= $action == 'Add' ? 'insert' : 'update' ?>" method="post" enctype="multipart/form-data">
									<div class="kt-portlet__body">
										<?php if($action == 'Edit'): ?> 
											<input type="hidden"  name="id" value="<?= isset($user_entry) ? $user_entry['id'] : set_value('id') ?>">
										<?php endif; ?>
										<div class="form-group row">
											<label for="category_id" class="col-2 col-form-label">Username <span style="color: red;">*</span> </label>
											<div class="col-10">
												<input id="username" name="username" type="text" class="form-control" value="<?= isset($user_entry) ? $user_entry['username'] : set_value('username') ?>">
												<?php if(isset($validation) && !empty($validation->getError('username'))): ?>
													<div class="text-danger" for="username"><?= $validation->getError('username') ?></div>                                                                                              
												<?php endif; ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="category_id" class="col-2 col-form-label">First Name <span style="color: red;">*</span></label>
											<div class="col-10">
												<input id="firstname" name="firstname" type="text" class="form-control" value="<?= isset($user_entry) ? $user_entry['firstname'] : set_value('firstname') ?>">
												<?php if(isset($validation) && !empty($validation->getError('firstname'))): ?>
													<div class="text-danger" for="firstname"><?= $validation->getError('firstname') ?></div>                            
												<?php endif; ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="category_id" class="col-2 col-form-label">Last Name <span style="color: red;">*</span></label>
											<div class="col-10">
												<input id="lastname" name="lastname" type="text" class="form-control" value="<?= isset($user_entry) ? $user_entry['lastname'] : set_value('lastname') ?>">
												<?php if(isset($validation) && !empty($validation->getError('lastname'))): ?>
													<div class="text-danger" for="lastname"><?= $validation->getError('lastname') ?></div>                               
												<?php endif; ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="category_id" class="col-2 col-form-label">Email <span style="color: red;">*</span></label>
											<div class="col-10">
												<input id="email" name="email" type="text" class="form-control" value="<?= isset($user_entry) ? $user_entry['email'] : set_value('email') ?>">
												<?php if(isset($validation) && !empty($validation->getError('email'))): ?>
													<div class="text-danger" for="email"><?= $validation->getError('email') ?></div>                               
												<?php endif; ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="category_id" class="col-2 col-form-label">Password 
												<?php if($action == 'Add'): ?> <span style="color: red;">*</span> <?php endif; ?></label>
											<div class="col-10">
												<input id="password" name="password" type="password" class="form-control" value="<?= set_value('password') ?>" autocomplete="new-password">
												<?php if(isset($validation) && !empty($validation->getError('password'))): ?>
													<div class="text-danger" for="password"><?= $validation->getError('password') ?></div>                        
												<?php endif; ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="category_id" class="col-2 col-form-label">Confirm Password <?php if($action == 'Add'): ?> <span style="color: red;">*</span> <?php endif; ?></label>
											<div class="col-10">
												<input id="cpassword" name="cpassword" type="password" class="form-control" value="<?= set_value('cpassword') ?>">
												<?php if(isset($validation) && !empty($validation->getError('cpassword'))): ?>
													<div class="text-danger" for="cpassword"><?= $validation->getError('cpassword') ?></div>                                
												<?php endif; ?>
											</div>
										</div>
										
										<div class="form-group row">
											<label for="category_id" class="col-2 col-form-label">Status <span style="color: red;">*</span></label>
											<div class="col-10">
												<div class="kt-radio-inline">
													<label class="kt-radio">
														<input <?= isset($user_entry) ? ($user_entry['status'] == 1 ? 'checked' : '') : set_value('status') == '1' ? 'checked' : 'checked' ?> value = "1" type="radio" name="status"> Active
														<span></span>
													</label>
													<label class="kt-radio">
														<input <?= isset($user_entry) ? ($user_entry['status'] == 0 ? 'checked' : '') : set_value('status') == '0' ? 'checked' : '' ?> type="radio" value = "0" name="status"> Inactive
														<span></span>
													</label>
												</div>
												<?php if(isset($validation) && !empty($validation->getError('status'))): ?>
													<div class="text-danger" for="status"><?= $validation->getError('status') ?></div>                                
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
														<button type="submit" class="btn btn-success">
															<?= $action == 'Add' ? 'Add User' : 'Save' ?>
														</button>
													<a href="<?= base_url(); ?>/admin/user" class="btn btn-secondary">Cancel</a>
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
<script>
	$("form[name='form_user']").validate({
		errorClass: 'text-danger',
		rules: {
			username:{
				required : true,
			},
			firstname:{
				required : true
			},
			lastname:{
				required : true,
			},
			email:{
				required : true,
				email : true
			},
			password:{
				<?php if($action == 'Add'): ?>
					required : true,
				<?php endif; ?>
				minlength : 6
			},
			cpassword: {
				<?php if($action == 'Add'): ?>
					required : true,
				<?php endif; ?>
				equalTo : "#password"
			},
			status: {
				required : true,
			}
		},
		messages: {

			username:{
				required : 'The username field is required'
			},
			firstname:{
				required : 'The firstname field is required'
			},
			lastname:{
				required : 'The lastname field is required'
			},
			email:{
				required : 'The email field is required',
				email : 'Please enter a valid email'
			},
			password:{
				required : 'The password field is required',
			},
			cpassword: {
				required : 'The confirm password field is required',
				equalTo : 'Password and confirm password miss match',
			},
			status: {
				required : 'Please select status',
			}
		},
		submitHandler: function(form) {
			form.submit();
		},
	});
</script>