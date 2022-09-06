<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
	<!-- begin:: Aside -->
	<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
		<div class="kt-aside__brand-tools">
			<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
		</div>
		<div  class="kt-aside__brand-logo">
			<a href="<?= base_url('admin/dashboard') ?>">
				<img style="text-align: center;margin-left: 25px;height: 60px;width: 150px" class = "header_logo" alt="Logo">
			</a>
		</div>
	</div>
	<!-- end:: Aside -->
	<!-- begin:: Aside Menu -->
	<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
		<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
			<ul class="kt-menu__nav ">
					<li class="kt-menu__item <?= active_link('Dashboard') ?>" aria-haspopup="true">
						<a href="<?= base_url('admin/dashboard'); ?>" class="kt-menu__link ">
							<i class="kt-menu__link-icon flaticon2-architecture-and-city"></i>
							<span class="kt-menu__link-text"> Dashboard </span>
						</a>
					</li>
					<li class="kt-menu__item <?= active_link('Generate_token') ?>" aria-haspopup="true">
						<a href="<?= base_url('admin/generate_token'); ?>" class="kt-menu__link ">
							<i class="kt-menu__link-icon flaticon2-avatar"></i>
							<span class="kt-menu__link-text"> Generate Token </span>
						</a>
					</li>

					
			</ul>
		</div>
	</div>
	<!-- end:: Aside Menu -->
</div>