<?php
$this->load->view('dashboard/dashboard_header_v');
?>

<?php
$this->load->view('dashboard/dashboard_sidebar_v');
?>

<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
	<!--begin::Content wrapper-->
	<div class="d-flex flex-column flex-column-fluid">
		<!--begin::Toolbar-->
		<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
			<!--begin::Toolbar container-->
			<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
				<!--begin::Page title-->
				<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
					<!--begin::Title-->
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">My Balance: 37,045$</h1>
					<!--end::Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">
							<a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">Dashboards</li>
						<!--end::Item-->
					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page title-->
				<!--begin::Actions-->
				<div class="d-flex align-items-center gap-2 gap-lg-3">
					<!--begin::Primary button-->
					<a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_top_up_wallet">Top Up</a>
					<!--end::Primary button-->
				</div>
				<!--end::Actions-->
			</div>
			<!--end::Toolbar container-->
		</div>
		<!--end::Toolbar-->
		<!--begin::Content-->
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<!--begin::Content container-->
			<div id="kt_app_content_container" class="app-container container-xxl">
				<!--begin::Row-->
				<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
					<!--begin::Col-->
					<div class="col-xxl-4">
						<!--begin::Forms widget 1-->
						<div class="card h-xl-100">
							<!--begin::Header-->
							<div class="card-header position-relative min-h-50px p-0 border-bottom-2">
								<!--begin::Nav-->
								<ul class="nav nav-pills nav-pills-custom d-flex position-relative w-100">
									<!--begin::Item-->
									<li class="nav-item mx-0 p-0 w-50">
										<!--begin::Link-->
										<a class="nav-link btn btn-color-muted active border-0 h-100 px-0" data-bs-toggle="pill" id="kt_forms_widget_1_tab_1" href="#kt_forms_widget_1_tab_content_1">
											<!--begin::Subtitle-->
											<span class="nav-text fw-bold fs-4 mb-3">In</span>
											<!--end::Subtitle-->
											<!--begin::Bullet-->
											<span class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
											<!--end::Bullet-->
										</a>
										<!--end::Link-->
									</li>
									<!--end::Item-->
									<!--begin::Item-->
									<li class="nav-item mx-0 px-0 w-50">
										<!--begin::Link-->
										<a class="nav-link btn btn-color-muted border-0 h-100 px-0" data-bs-toggle="pill" id="kt_forms_widget_1_tab_2" href="#kt_forms_widget_1_tab_content_2">
											<!--begin::Subtitle-->
											<span class="nav-text fw-bold fs-4 mb-3">Out</span>
											<!--end::Subtitle-->
											<!--begin::Bullet-->
											<span class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
											<!--end::Bullet-->
										</a>
										<!--end::Link-->
									</li>
									<!--end::Item-->
								</ul>
								<!--end::Nav-->
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body">
								<!--begin::Tab Content-->
								<div class="tab-content">
									<!--begin::Tap pane-->
									<div class="tab-pane fade active show" id="kt_forms_widget_1_tab_content_1">
										<!--begin::Input group-->
										<div class="form-floating border border-gray-300 rounded mb-7">
											<select class="form-select form-select-transparent" id="kt_forms_widget_1_select_1">
												<option></option>
												<?php
												if(isset($account['user_account']) && sizeof($account['user_account']) > 0 )
												{
													foreach($account['user_account'] as $row_account)
													{
														echo '<option selected="selected" value="' . $row_account['account_token'] . '" data-kt-select2-icon="' .  base_url() . 'metronic/dist/assets/media/icons/duotune/finance/fin008.svg">' . $row_account['account_name'] . '</option>';
													}
													
												}
												?>
												<?php
												/* 
												<option value="0" data-kt-select2-icon="<?php echo base_url();?>metronic/dist/assets/media/svg/coins/bitcoin.svg">Bitcoin/BTC</option>
												<option value="1" data-kt-select2-icon="<?php echo base_url();?>metronic/dist/assets/media/svg/coins/ethereum.svg">Ethereum/ETH</option>
												<option value="2" data-kt-select2-icon="<?php echo base_url();?>metronic/dist/assets/media/svg/coins/filecoin.svg">Filecoin/FLE</option>
												<option value="3" data-kt-select2-icon="<?php echo base_url();?>metronic/dist/assets/media/svg/coins/chainlink.svg">Chainlink/CIN</option>
												<option value="4" data-kt-select2-icon="<?php echo base_url();?>metronic/dist/assets/media/svg/coins/binance.svg">Binance/BCN</option>
												 */
												?>
											</select>
											<label for="floatingInputValue">Account Name</label>
										</div>
										<!--end::Input group-->
										<!--begin::Row-->
										<!--begin::Input group-->
										<div class="form-floating rounded mb-7">
											<select class="form-select form-control " data-control="select2" data-placeholder="Select an option">
												<option></option>
												<option value="Salary">Salary</option>
												<option value="Commission">Commission</option>
												<option value="Hourly wage">Hourly wage</option>
												<option value="Bonus">Bonus</option>
												<option value="Dividends">Dividends</option>
												<option value="Tips">Tips</option>
												<option value="Inheritance">Inheritance</option>
												<option value="Royalties">Royalties</option>
												<option value="Gifts">Gifts</option>
											</select>
											<label for="floatingInputValue">Category</label>
										</div>
										<!--end::Input group-->
										<!--end::Row-->
										<!--begin::Row-->
										<!--begin::Input group-->
										<div class="form-floating rounded mb-7">
											<select class="form-select form-control " data-control="select2" data-placeholder="Select an option">
												<option></option>
												<option value="Recurring">Recurring</option>
												<option value="One Time">One Time</option>
											</select>
											<label for="floatingInputValue">Type</label>
										</div>
										<!--end::Input group-->
										<!--end::Row-->
										<div class="form-floating rounded mb-7">
											<div class="input-group" id="kt_td_picker_date_only" data-td-target-input="nearest" data-td-target-toggle="nearest">
												<input id="kt_td_picker_date_only_input" type="text" class="form-control text-gray-800 fw-bold" data-td-target="#kt_td_picker_date_only"/>
												<span class="input-group-text" data-td-target="#kt_td_picker_date_only" data-td-toggle="datetimepicker">
													<i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
												</span>
											</div>
										</div>
										<!--begin::Row-->
										<!--begin::Input group-->
										<div class="form-floating rounded mb-7">
											<select class="form-select form-control " data-control="select2" data-placeholder="Select an option">
												<option></option>
												<option value="Weekly">Weekly</option>
												<option value="Bi-Weekly">Bi-Weekly</option>
												<option value="Semi Monthly">Semi Monthly</option>
												<option value="Monthly">Monthly</option>
												<option value="Bi-Monthly">Bi-Monthly</option>
												<option value="Quarterly ">Quarterly </option>
												<option value="Semi-Annual">Semi-Annual</option>
												<option value="Annually">Annually</option>
											</select>
											<label for="floatingInputValue">Frequency</label>
										</div>
										<!--end::Input group-->
										<!--end::Row-->
										<div class="form-floating rounded mb-7">
											<!--begin::Default example-->
											<select class="form-select form-control" data-control="select2" data-placeholder="Select an option">
												<option></option>
												<option value="Weekly">Weekly</option>
												<option value="Bi-Weekly">Bi-Weekly</option>
												<option value="Semi Monthly">Semi Monthly</option>
												<option value="Monthly">Monthly</option>
												<option value="Bi-Monthly">Bi-Monthly</option>
												<option value="Quarterly ">Quarterly </option>
												<option value="Semi-Annual">Semi-Annual</option>
												<option value="Annually">Annually</option>
											</select>
											<label for="floatingInputValue">Frequency Date</label>
											<!--end::Default example-->
										</div>
										<!--begin::Row-->
										<!--begin::Input group-->
										<div class="form-floating rounded mb-7">
											<input type="number" class="form-control " placeholder="0" id="floatingInputValue" value="0.00" />
											<label for="floatingInputValue">Amount</label>
										</div>
										<!--end::Input group-->
										<!--end::Row-->
										<!--begin::Input group-->
										<div class="form-floating rounded mb-7">
											<input type="text" class="form-control " placeholder="Any Remarks" id="remarksInput" />
											<label for="remarksInput">Comments</label>
										</div>
										<!--end::Input group-->
										<!--begin::Action-->
										<div class="d-flex align-items-end">
											<a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_top_up_wallet" class="btn btn-primary fs-3 w-100">Record</a>
										</div>
										<!--end::Action-->
									</div>
									<!--end::Tap pane-->
									<!--begin::Tap pane-->
									<div class="tab-pane fade" id="kt_forms_widget_1_tab_content_2">
										<!--begin::Input group-->
										<div class="form-floating border rounded mb-7">
											<select class="form-select form-select-transparent" id="kt_forms_widget_1_select_2">
												<option></option>
												<option value="0" data-kt-select2-icon="<?php echo base_url();?>metronic/dist/assets/media/svg/coins/bitcoin.svg" selected="selected">Bitcoin/BTC</option>
												<option value="1" data-kt-select2-icon="<?php echo base_url();?>metronic/dist/assets/media/svg/coins/ethereum.svg">Ethereum/ETH</option>
												<option value="2" data-kt-select2-icon="<?php echo base_url();?>metronic/dist/assets/media/svg/coins/filecoin.svg">Filecoin/FLE</option>
												<option value="3" data-kt-select2-icon="<?php echo base_url();?>metronic/dist/assets/media/svg/coins/chainlink.svg">Chainlink/CIN</option>
												<option value="4" data-kt-select2-icon="<?php echo base_url();?>metronic/dist/assets/media/svg/coins/binance.svg">Binance/BCN</option>
											</select>
											<label for="floatingInputValue">Coin Name</label>
										</div>
										<!--end::Input group-->
										<!--begin::Row-->
										<div class="row mb-7">
											<!--begin::Col-->
											<div class="col-6">
												<!--begin::Input group-->
												<div class="form-floating">
													<input type="email" class="form-control text-gray-800 fw-bold" placeholder="00.0" id="floatingInputValue" value="$0,0000005" />
													<label for="floatingInputValue">Amount(BTC)</label>
												</div>
												<!--end::Input group-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-6">
												<!--begin::Input group-->
												<div class="form-floating">
													<input type="email" class="form-control text-gray-800 fw-bold" placeholder="00.0" id="floatingInputValue" value="$1230.00" />
													<label for="floatingInputValue">Amount(USD)</label>
												</div>
												<!--end::Input group-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<!--begin::Action-->
										<div class="d-flex align-items-end">
											<a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_top_up_wallet" class="btn btn-primary fs-3 w-100">Place Offer</a>
										</div>
										<!--end::Action-->
									</div>
									<!--end::Tap pane-->
								</div>
								<!--end::Tab Content-->
							</div>
							<!--end: Card Body-->
						</div>
						<!--end::Forms widget 1-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-xxl-8">
						<!--begin::Row-->
						<div class="row g-5 g-xl-10">
							<?php
							if(isset($account['user_account']) && sizeof($account['user_account']) > 0 )
							{
								if(sizeof($account['user_account']) == 1)
								{
									$col_size = '12';
								}
								else if(sizeof($account['user_account']) == 2)
								{
									$col_size = '6';
								}
								else if(sizeof($account['user_account']) == 3)
								{
									$col_size = '3';
								}
								
								foreach($account['user_account'] as $row_account)
								{
							?>
								<!--begin::Col-->
								<div class="col-md-<?php echo isset($col_size) && $col_size != '' ? $col_size :'12';?>">
									<!--begin::Card widget 11-->
									<div class="card card-flush h-xl-100" style="background-color: #F6E5CA">
										<!--begin::Header-->
										<div class="card-header flex-nowrap pt-5">
											<!--begin::Title-->
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold fs-4 text-gray-800"><?php echo isset($row_account['account_name']) && $row_account['account_name'] != '' ? $row_account['account_name'] : 'Account Name Missing';?></span>
												<span class="mt-1 fw-semibold fs-7" style="color:">Since : <?php echo isset($row_account['create_date']) && $row_account['create_date'] != '' ? date("d F Y", $row_account['create_date']) : 'Created Date Missing';?></span>
											</h3>
											<!--end::Title-->
											<!--begin::Toolbar-->
											<div class="card-toolbar">
												<!--begin::Menu-->
												<button class="btn btn-icon justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true" style="color:">
													<i class="ki-duotone ki-dots-square fs-1">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
													</i>
												</button>
												<!--begin::Menu 2-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu separator-->
													<div class="separator mb-3 opacity-75"></div>
													<!--end::Menu separator-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">New Ticket</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">New Customer</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
														<!--begin::Menu item-->
														<a href="#" class="menu-link px-3">
															<span class="menu-title">New Group</span>
															<span class="menu-arrow"></span>
														</a>
														<!--end::Menu item-->
														<!--begin::Menu sub-->
														<div class="menu-sub menu-sub-dropdown w-175px py-4">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">Admin Group</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">Staff Group</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">Member Group</a>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu sub-->
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">New Contact</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu separator-->
													<div class="separator mt-3 opacity-75"></div>
													<!--end::Menu separator-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<div class="menu-content px-3 py-3">
															<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
														</div>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu 2-->
												<!--end::Menu-->
											</div>
											<!--end::Toolbar-->
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body text-center pt-5">
											<!--begin::Image-->
											<img src="<?php echo base_url();?>metronic/dist/assets/media/svg/shapes/bitcoin.svg" class="h-125px mb-5" alt="" />
											<!--end::Image-->
											<!--begin::Section-->
											<div class="text-start">
												<span class="d-block fw-bold fs-1 text-gray-800"><?php echo isset($row_account['amount_total']) && $row_account['amount_total'] != '' ? 'RM ' . number_format($row_account['amount_total'],2) : 'RM 0.00';?></span>
												<span class="mt-1 fw-semibold fs-3" style="color:">Since : <?php echo isset($row_account['create_date']) && $row_account['create_date'] != '' ? date("d F Y", $row_account['create_date']) : 'Created Date Missing';?></span>
											</div>
											<!--end::Section-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Card widget 11-->
								</div>
								<!--end::Col-->
							<?php
								}
							}
							?>
						</div>
						<!--end::Row-->
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
				<!--begin::Row-->
				<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
					<!--begin::Col-->
					<div class="col-xxl-8">
						<!--begin::Chart widget 26-->
						<div class="card card-flush overflow-hidden h-xl-100">
							<!--begin::Header-->
							<div class="card-header pt-7 mb-2">
								<!--begin::Title-->
								<h3 class="card-title text-gray-800 fw-bold">Transaction History</h3>
								<!--end::Title-->
								<!--begin::Toolbar-->
								<div class="card-toolbar">
									<!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
									<div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4">
										<!--begin::Display range-->
										<div class="text-gray-600 fw-bold">Loading date range...</div>
										<!--end::Display range-->
										<i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0">
											<span class="path1"></span>
											<span class="path2"></span>
											<span class="path3"></span>
											<span class="path4"></span>
											<span class="path5"></span>
											<span class="path6"></span>
										</i>
									</div>
									<!--end::Daterangepicker-->
								</div>
								<!--end::Toolbar-->
							</div>
							<!--end::Header-->
							<!--begin::Card body-->
							<div class="card-body d-flex justify-content-between flex-column pt-0 pb-1 px-0">
								<!--begin::Info-->
								<div class="px-9 mb-5">
									<!--begin::Statistics-->
									<div class="d-flex align-items-center mb-2">
										<!--begin::Currency-->
										<span class="fs-4 fw-semibold text-gray-400 align-self-start me-1">$</span>
										<!--end::Currency-->
										<!--begin::Value-->
										<span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">12,706</span>
										<!--end::Value-->
										<!--begin::Label-->
										<span class="badge badge-success fs-base">
										<i class="ki-duotone ki-arrow-up fs-5 text-white ms-n1">
											<span class="path1"></span>
											<span class="path2"></span>
										</i>4.5%</span>
										<!--end::Label-->
									</div>
									<!--end::Statistics-->
									<!--begin::Description-->
									<span class="fs-6 fw-semibold text-gray-400">Transactions in April</span>
									<!--end::Description-->
								</div>
								<!--end::Info-->
								<!--begin::Chart-->
								<div id="kt_charts_widget_26" class="min-h-auto ps-4 pe-6" data-kt-chart-info="Transactions" style="height: 300px"></div>
								<!--end::Chart-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Chart widget 26-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-xxl-4">
						<!--begin::Engage widget 1-->
						<div class="card h-md-100" dir="ltr">
							<!--begin::Body-->
							<div class="card-body d-flex flex-column flex-center">
								<!--begin::Heading-->
								<div class="mb-2">
									<!--begin::Title-->
									<h1 class="fw-semibold text-gray-800 text-center lh-lg">Try out our
									<br />new
									<span class="fw-bolder">Invoice Manager</span></h1>
									<!--end::Title-->
									<!--begin::Illustration-->
									<div class="py-10 text-center">
										<img src="<?php echo base_url();?>metronic/dist/assets/media/svg/illustrations/easy/2.svg" class="theme-light-show w-200px" alt="" />
										<img src="<?php echo base_url();?>metronic/dist/assets/media/svg/illustrations/easy/2-dark.svg" class="theme-dark-show w-200px" alt="" />
									</div>
									<!--end::Illustration-->
								</div>
								<!--end::Heading-->
								<!--begin::Links-->
								<div class="text-center mb-1">
									<!--begin::Link-->
									<a class="btn btn-sm btn-primary me-2" data-bs-target="#kt_modal_create_account" data-bs-toggle="modal">Try Now</a>
									<!--end::Link-->
									<!--begin::Link-->
									<a class="btn btn-sm btn-light" href="../../demo1/dist/apps/ecommerce/sales/listing.html">Learn More</a>
									<!--end::Link-->
								</div>
								<!--end::Links-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Engage widget 1-->
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
				<!--begin::Row-->
				<div class="row g-5 g-xl-10">
					<!--begin::Col-->
					<div class="col-xxl-8">
						<!--begin::Table widget 7-->
						<div class="card card-flush h-xl-100">
							<!--begin::Header-->
							<div class="card-header pt-7">
								<!--begin::Title-->
								<h4 class="card-title align-items-start flex-column">
									<span class="card-label fw-bold text-gray-800">Latest Activity</span>
									<span class="text-gray-400 mt-1 fw-semibold fs-7">Updated 37 minutes ago</span>
								</h4>
								<!--end::Title-->
								<!--begin::Toolbar-->
								<div class="card-toolbar">
									<!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
									<div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4">
										<!--begin::Display range-->
										<div class="text-gray-600 fw-bold">Loading date range...</div>
										<!--end::Display range-->
										<i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0">
											<span class="path1"></span>
											<span class="path2"></span>
											<span class="path3"></span>
											<span class="path4"></span>
											<span class="path5"></span>
											<span class="path6"></span>
										</i>
									</div>
									<!--end::Daterangepicker-->
								</div>
								<!--end::Toolbar-->
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body py-3">
								<!--begin::Table container-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
										<!--begin::Table head-->
										<thead>
											<tr class="border-bottom-0">
												<th class="p-0 w-50px"></th>
												<th class="p-0 min-w-175px"></th>
												<th class="p-0 min-w-175px"></th>
												<th class="p-0 min-w-150px"></th>
												<th class="p-0 min-w-150px"></th>
												<th class="p-0 min-w-50px"></th>
											</tr>
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody>
											<tr>
												<td>
													<div class="symbol symbol-40px">
														<span class="symbol-label bg-light-info">
															<i class="ki-duotone ki-abstract-24 fs-2x text-info">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
													</div>
												</td>
												<td class="ps-0">
													<a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Insurance</a>
													<span class="text-muted fw-semibold d-block fs-7">Personal Health</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">BTC Wallet</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Personal Account</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">23 Jan, 22</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Last Payment</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">-0.0024 BTC</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Balance</span>
												</td>
												<td class="text-end">
													<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
														<i class="ki-duotone ki-arrow-right fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<div class="symbol symbol-40px">
														<span class="symbol-label bg-light-success">
															<i class="ki-duotone ki-flask fs-2x text-success">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
													</div>
												</td>
												<td class="ps-0">
													<a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Annette Black</a>
													<span class="text-muted fw-semibold d-block fs-7">Zuid Area</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">ETH Wallet</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Personal Account</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">04 Feb, 22</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Last Payment</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">-0.346 ETH</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Balance</span>
												</td>
												<td class="text-end">
													<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
														<i class="ki-duotone ki-arrow-right fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<div class="symbol symbol-40px">
														<span class="symbol-label bg-light-danger">
															<i class="ki-duotone ki-abstract-33 fs-2x text-danger">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
													</div>
												</td>
												<td class="ps-0">
													<a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Esther Howard</a>
													<span class="text-muted fw-semibold d-block fs-7">Zuid Area</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">BTC Wallet</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Personal Account</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">18 Feb, 22</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Last Payment</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">-0.00081 BTC</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Balance</span>
												</td>
												<td class="text-end">
													<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
														<i class="ki-duotone ki-arrow-right fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<div class="symbol symbol-40px">
														<span class="symbol-label bg-light-primary">
															<i class="ki-duotone ki-abstract-47 fs-2x text-primary">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
													</div>
												</td>
												<td class="ps-0">
													<a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Guy Hawkins</a>
													<span class="text-muted fw-semibold d-block fs-7">Zuid Area</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">DOGE Wallet</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Personal Account</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">01 Apr, 22</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Last Payment</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">-456.34 DOGE</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Balance</span>
												</td>
												<td class="text-end">
													<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
														<i class="ki-duotone ki-arrow-right fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<div class="symbol symbol-40px">
														<span class="symbol-label bg-light-warning">
															<i class="ki-duotone ki-technology-2 fs-2x text-warning">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
													</div>
												</td>
												<td class="ps-0">
													<a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Marvin McKinney</a>
													<span class="text-muted fw-semibold d-block fs-7">Zuid Area</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">BTC Wallet</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Personal Account</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">26 May, 22</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Last Payment</span>
												</td>
												<td>
													<span class="text-dark fw-bold d-block fs-6">-0.000039 BTC</span>
													<span class="text-gray-400 fw-semibold d-block fs-7">Balance</span>
												</td>
												<td class="text-end">
													<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
														<i class="ki-duotone ki-arrow-right fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
													</a>
												</td>
											</tr>
										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
								</div>
								<!--end::Table container-->
							</div>
							<!--begin::Body-->
						</div>
						<!--end::Table widget 7-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-xxl-4">
						<!--begin::List widget 22-->
						<div class="card card-flush h-xl-100">
							<!--begin::Header-->
							<div class="card-header pt-5">
								<!--begin::Title-->
								<h3 class="card-title align-items-start flex-column">
									<span class="card-label fw-bold text-gray-800">Mining Status</span>
									<span class="text-gray-400 mt-1 fw-semibold fs-6">8k social visitors</span>
								</h3>
								<!--end::Title-->
								<!--begin::Toolbar-->
								<div class="card-toolbar">
									<a href="#" class="btn btn-sm btn-light">All Courses</a>
								</div>
								<!--end::Toolbar-->
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body">
								<!--begin::Item-->
								<div class="d-flex flex-stack">
									<!--begin::Section-->
									<div class="d-flex align-items-center me-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<span class="symbol-label bg-light-info">
												<i class="ki-duotone ki-abstract-24 fs-2x text-info">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Content-->
										<div class="me-5">
											<!--begin::Title-->
											<a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">GPUs mining</a>
											<!--end::Title-->
											<!--begin::Desc-->
											<span class="fw-semibold fs-7 d-block text-start text-success ps-0">Running</span>
											<!--end::Desc-->
										</div>
										<!--end::Content-->
									</div>
									<!--end::Section-->
									<!--begin::Wrapper-->
									<div class="d-flex align-items-center">
										<!--begin::Info-->
										<div class="d-flex flex-center">
											<!--begin::Action-->
											<div class="form-check form-switch form-check-custom form-check-solid">
												<input class="form-check-input h-20px w-30px" type="checkbox" value="" id="flexSwitchChecked" checked="checked" />
											</div>
											<!--end::Action-->
										</div>
										<!--end::Info-->
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Item-->
								<!--begin::Separator-->
								<div class="separator separator-dashed my-4"></div>
								<!--end::Separator-->
								<!--begin::Item-->
								<div class="d-flex flex-stack">
									<!--begin::Section-->
									<div class="d-flex align-items-center me-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<span class="symbol-label bg-light-success">
												<i class="ki-duotone ki-flask fs-2x text-success">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Content-->
										<div class="me-5">
											<!--begin::Title-->
											<a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">GPUs mining</a>
											<!--end::Title-->
											<!--begin::Desc-->
											<span class="fw-semibold fs-7 d-block text-start text-success ps-0">Running</span>
											<!--end::Desc-->
										</div>
										<!--end::Content-->
									</div>
									<!--end::Section-->
									<!--begin::Wrapper-->
									<div class="d-flex align-items-center">
										<!--begin::Info-->
										<div class="d-flex flex-center">
											<!--begin::Action-->
											<div class="form-check form-switch form-check-custom form-check-solid">
												<input class="form-check-input h-20px w-30px" type="checkbox" value="" id="flexSwitchChecked" checked="checked" />
											</div>
											<!--end::Action-->
										</div>
										<!--end::Info-->
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Item-->
								<!--begin::Separator-->
								<div class="separator separator-dashed my-4"></div>
								<!--end::Separator-->
								<!--begin::Item-->
								<div class="d-flex flex-stack">
									<!--begin::Section-->
									<div class="d-flex align-items-center me-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<span class="symbol-label bg-light-danger">
												<i class="ki-duotone ki-abstract-33 fs-2x text-danger">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Content-->
										<div class="me-5">
											<!--begin::Title-->
											<a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Est. daily USD</a>
											<!--end::Title-->
											<!--begin::Desc-->
											<span class="fw-semibold fs-7 d-block text-start text-gray-400 ps-0">$48.02</span>
											<!--end::Desc-->
										</div>
										<!--end::Content-->
									</div>
									<!--end::Section-->
									<!--begin::Wrapper-->
									<div class="d-flex align-items-center">
										<!--begin::Info-->
										<div class="d-flex flex-center">
											<!--begin::Action-->
											<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
												<i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
											</a>
											<!--end::Action-->
										</div>
										<!--end::Info-->
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Item-->
								<!--begin::Separator-->
								<div class="separator separator-dashed my-4"></div>
								<!--end::Separator-->
								<!--begin::Item-->
								<div class="d-flex flex-stack">
									<!--begin::Section-->
									<div class="d-flex align-items-center me-5">
										<!--begin::Symbol-->
										<div class="symbol symbol-40px me-3">
											<span class="symbol-label bg-light-primary">
												<i class="ki-duotone ki-abstract-47 fs-2x text-primary">
													<span class="path1"></span>
													<span class="path2"></span>
												</i>
											</span>
										</div>
										<!--end::Symbol-->
										<!--begin::Content-->
										<div class="me-5">
											<!--begin::Title-->
											<a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Team Members</a>
											<!--end::Title-->
											<!--begin::Desc-->
											<span class="fw-semibold fs-7 d-block text-start text-gray-400 ps-0">6</span>
											<!--end::Desc-->
										</div>
										<!--end::Content-->
									</div>
									<!--end::Section-->
									<!--begin::Wrapper-->
									<div class="d-flex align-items-center">
										<!--begin::Info-->
										<div class="d-flex flex-center">
											<!--begin::Action-->
											<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
												<i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
											</a>
											<!--end::Action-->
										</div>
										<!--end::Info-->
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Item-->
							</div>
							<!--end::Body-->
							<!--begin::Footer-->
							<div class="card-footer mx-auto pt-0">
								<!--begin::Actions-->
								<a href="#" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">Add PC</a>
								<a href="#" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Buy GPU</a>
								<!--end::Actions-->
							</div>
							<!--end::Footer-->
						</div>
						<!--end::List widget 22-->
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
			</div>
			<!--end::Content container-->
		</div>
		<!--end::Content-->
	</div>
	<!--end::Content wrapper-->
	<!--begin::Footer-->
	<div id="kt_app_footer" class="app-footer">
		<!--begin::Footer container-->
		<div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
			<!--begin::Copyright-->
			<div class="text-dark order-2 order-md-1">
				<span class="text-muted fw-semibold me-1">2023&copy;</span>
				<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
			</div>
			<!--end::Copyright-->
			<!--begin::Menu-->
			<ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
				<li class="menu-item">
					<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
				</li>
				<li class="menu-item">
					<a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
				</li>
				<li class="menu-item">
					<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
				</li>
			</ul>
			<!--end::Menu-->
		</div>
		<!--end::Footer container-->
	</div>
	<!--end::Footer-->
</div>
<!--end:::Main-->

<?php
$this->load->view('dashboard/dashboard_footer_v');
?>
<script type="text/javascript">
new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_date_only"), {
    display: {
        viewMode: "calendar",
        components: {
            decades: false,
            year: true,
            month: true,
            date: true,
            hours: false,
            minutes: false,
            seconds: false
        }
    }
});
</script>
<?php
$this->load->view('dashboard/dashboard_close_v');
?>