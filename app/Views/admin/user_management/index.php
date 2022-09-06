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
						<span class="svg-icon svg-icon-primary svg-icon-2x">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon"> 
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"/>
									<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"/>
								</g>
							</svg>
						</span>
					</span>
					<h3 class="kt-portlet__head-title">
						User Management
					</h3>					
				</div>
				<div class="kt-portlet__head-toolbar">
            		<div class="kt-portlet__head-wrapper" >
							<a href="<?= base_url(); ?>/admin/user/add" class="btn btn-brand btn-icon-sm">
								<i class="flaticon2-plus"></i>
								Add New User
							</a>
					</div>		
				</div>
			</div>
			<div class="kt-portlet__body">
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
				<div class="kt-form kt-form--label-right">
					<div class="row align-items-center">
						<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
							<div class="kt-input-icon kt-input-icon--left">
								<input type="text" class="form-control" placeholder="Search..." id="generalSearch">
								<span class="kt-input-icon__icon kt-input-icon__icon--left">
									<span><i class="la la-search"></i></span>
								</span>
							</div>
						</div>
						<div class="col-md-4 kt-margin-b-20-tablet-and-mobile" >
							<div class="kt-form__group kt-form__group--inline">
								<div class="kt-form__label">
									<label>Status:</label>
								</div>
								<div class="kt-form__control">
									<div class="dropdown bootstrap-select form-control">
										<select name="filter_name" class="form-control bootstrap-select" id="kt_form_status" tabindex="-98">
											<option value="">Filter By Status</option>	
											<option value="1">Active</option>	
											<option value="2">Inactive</option>	
										</select>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body kt-portlet__body--fit">
				<form name="form_userlist" action="<?= base_url() ?>/admin/user/actions" method="post">
					<div class="kt-datatable" id="ajax_data"></div>
					<input type="hidden" name="userid">
					<input type="hidden" name="action">
					<input type="hidden" name="publish">			
				</form>
			</div>	
		</div>
	</div>
</div>
<script src="<?= base_url(); ?>/public/assets/js/pages/datatable/users-ajax.js" type="text/javascript"></script>
<script type="text/javascript">
	function changeStatus(frm,u_id,status,title)
	{
		swal.fire({
			title:"Are you sure to change \""+title+"\" user status ?",
			text:"You won't be able to revert this!",
			type:"warning",
			showCancelButton:!0,
			confirmButtonText:"Yes, update!"
		}).then(function(e){
			e.value&&swal.fire("Updated!","The user status has been updated.","success");
			if(e.value)
			{
				frm.userid.value = u_id;
				frm.action.value = "change_status";
				frm.publish.value = status;
				frm.submit();
			}
		});
	}

	function deleteUser(frm, p_id,title)
	{
		swal.fire({
			title:"are you sure you want to delete the user \""+title+"\" ?",
			text:"You won't be able to revert this!",
			type:"warning",
			showCancelButton:!0,
			confirmButtonText:"Yes, delete it!"
		}).then(function(e){
			e.value&&swal.fire("Deleted!","Your user has been deleted.","success");
			if(e.value)
			{
				frm.userid.value = p_id;
				frm.action.value = "delete";
				frm.submit();
			}
		});
	}

</script>