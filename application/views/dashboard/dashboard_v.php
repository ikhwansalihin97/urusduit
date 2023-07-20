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
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">My Balance: RM <?php echo isset($account['balance']) && $account['balance'] != '' ? number_format($account['balance'],2) :'';?></h1>
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
										<!--begin::Form-->
										<form class="form" method="POST" action="<?php echo base_url() .'account/in_records';?>" id="js_record_in">
											<!--begin::Input group-->
											<div class="form-floating border border-gray-300 rounded mb-7">
												<select class="form-select form-select-transparent" name="account_token" id="kt_forms_widget_1_select_1">
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
												<label for="floatingInputValue">Account</label>
											</div>
											<!--end::Input group-->
											<!--begin::Row-->
											<!--begin::Input group-->
											<div class="form-floating rounded mb-7">
												<select class="form-select form-control" name="category" data-control="select2" data-placeholder="Select an option">
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
												<select class="form-select form-control type-select" name="type" data-control="select2" data-placeholder="Select an option">
													<option></option>
													<option value="Recurring Weekly">Recurring (Weekly)</option>
													<option value="Recurring Monthly">Recurring (Monthly)</option>
													<option value="Recurring Anually">Recurring (Anually)</option>
													<option value="One Time">One Time</option>
												</select>
												<label for="floatingInputValue">Type</label>
											</div>
											<!--end::Input group-->
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7 d-none recurring-monthly-type">
												<div class="form-floating input-group" name="monthly_recurring_date" id="kt_td_picker_date_only" data-td-target-input="nearest" data-td-target-toggle="nearest">
													<select class="form-select form-control type-select" name="recurring_date_monthly" data-control="select2" data-placeholder="Select an option">
														<option></option>
														<?php
														for($x = 1; $x <=31; $x++)
														{
															echo '<option value="'.$x.'">'.$x.'</option>';
														}
														?>
													</select>
													<label for="floatingInputValue">Recurring Dates</label>
												</div>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7 d-none recurring-anually-type">
												<div class="form-floating input-group" name="anually_recurring_date" id="kt_td_picker_date_only_anual" data-td-target-input="nearest" data-td-target-toggle="nearest">
													<input name="recurring_date_anually" id="kt_td_picker_date_only_input" type="text" class="form-control text-gray-800 fw-bold" data-td-target="#kt_td_picker_date_only_anual"/>
													<span class="input-group-text" data-td-target="#kt_td_picker_date_only" data-td-toggle="datetimepicker">
														<i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
													</span>
													<label for="floatingInputValue">Recurring Dates</label>
												</div>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7 d-none normal-type">
												<div class="form-floating input-group" name="date" id="kt_td_picker_date_only_normal" data-td-target-input="nearest" data-td-target-toggle="nearest">
													<input name="date" id="kt_td_picker_date_only_input" type="text" class="form-control text-gray-800 fw-bold" data-td-target="#kt_td_picker_date_only_normal"/>
													<span class="input-group-text" data-td-target="#kt_td_picker_date_only" data-td-toggle="datetimepicker">
														<i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
													</span>
													<label for="floatingInputValue">Date</label>
												</div>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7 d-none recurring-weekly-type">
												<!--begin::Default example-->
												<select class="form-select form-control" name="weekly_recurring_date" data-control="select2" data-placeholder="Select an option">
													<option></option>
													<option value="Monday">Monday</option>
													<option value="Tuesday">Tuesday</option>
													<option value="Wednesday">Wednesday</option>
													<option value="Thursday">Thursday</option>
													<option value="Friday">Friday</option>
													<option value="Saturday ">Saturday </option>
													<option value="Sunday">Sunday</option>
												</select>
												<label for="floatingInputValue">Frequency Date</label>
												<!--end::Default example-->
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7">
												<input type="number" class="form-control " name="amount" placeholder="0" id="floatingInputValue" value="0.00" step="any" />
												<label for="floatingInputValue">Amount</label>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7">
												<input type="file" name="file" class="form-control" />
												<label for="floatingInputValue">File</label>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7">
												<input type="text" name="remarks" class="form-control " placeholder="Any Remarks " id="remarksInput" />
												<label for="remarksInput">Comments</label>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="d-flex align-items-end">
												<input type="submit" class="btn btn-primary fs-3 w-100" value="Record">
											</div>
											<!--end::Row-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Tap pane-->
									<!--begin::Tap pane-->
									<div class="tab-pane fade" id="kt_forms_widget_1_tab_content_2">
										<!--begin::Form-->
										<form class="form" method="POST" action="<?php echo base_url() .'account/out_records';?>" id="js_record_out">
											<!--begin::Input group-->
											<div class="form-floating border border-gray-300 rounded mb-7">
												<select class="form-select form-select-transparent" name="account_token" id="kt_forms_widget_1_select_2">
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
												<label for="floatingInputValue">Account</label>
											</div>
											<!--end::Input group-->
											<!--begin::Row-->
											<!--begin::Input group-->
											<div class="form-floating rounded mb-7">
												<select class="form-select form-control" name="category" data-control="select2" data-placeholder="Select an option">
													<optgroup label="Food">
														<option value="Groceries">Groceries</option>
														<option value="Dine">Dine</option>
														<option value="Bakery">Bakery</option>
														<option value="Fast Food">Fast Food</option>
														<option value="Other F&B Expenses">Other F&amp;B Expenses</option>
													</optgroup>
													<optgroup label="Personal Care">
														<option value="Toiletries">Toiletries</option>
														<option value="Beauty Products">Beauty Products</option>
														<option value="Cosmetics">Cosmetics</option>
														<option value="Haircuts">Haircuts</option>
														<option value="Salon">Salon</option>
														<option value="Spa">Spa</option>
														<option value="Massage">Massage</option>
														<option value="Gym">Gym</option>
														<option value="Other Personal Care Expenses">Other Personal Care Expenses</option>
													</optgroup>
													<optgroup label="Clothing and Accessories">
														<option value="Clothing">Clothing</option>
														<option value="Undergarments">Undergarments</option>
														<option value="Shoes">Shoes</option>
														<option value="Accessories">Accessories</option>
														<option value="Jewellery">Jewellery</option>
														<option value="Watches">Watches</option>
														<option value="Alterations">Alterations</option>
														<option value="Other Clothing Expenses">Other Clothing Expenses</option>
													</optgroup>
													<optgroup label="Housing">
														<option value="Rent">Rent</option>
														<option value="Mortgage">Mortgage</option>
														<option value="Furniture">Furniture</option>
														<option value="Decorations">Decorations</option>
														<option value="Housing Maintenance">Housing Maintenance</option>
														<option value="Housing Repairs">Housing Repairs</option>
														<option value="Other Housing Expenses">Other Housing Expenses</option>
													</optgroup>
													<optgroup label="Transportation">
														<option value="Fuel">Fuel</option>
														<option value="Public Transport">Public Transport</option>
														<option value="Vehicle Maintenance">Vehicle Maintenance</option>
														<option value="Vehile Repairs">Vehile Repairs</option>
														<option value="Parking">Parking</option>
														<option value="Tolls">Tolls</option>
														<option value="Airlines">Airlines</option>
														<option value="Carwash">Carwash</option>
														<option value="Other Transportation Expenses">Other Transportation Expenses</option>
													</optgroup>
													<optgroup label="Healthcare">
														<option value="Health Insurance">Health Insurance</option>
														<option value="Pharmacy">Pharmacy</option>
														<option value="Doctor Visits">Doctor Visits</option>
														<option value="Prescription Medications">Prescription Medications</option>
														<option value="Over-The-Counter Drugs">Over-The-Counter Drugs</option>
														<option value="Medical Treatments">Medical Treatments</option>
														<option value="Dental Care">Dental Care</option>
														<option value="Vision Care">Vision Care</option>
														<option value="Other Healthcare Expenses">Other Healthcare Expenses</option>
													</optgroup>
													<optgroup label="Debt Payments">
														<option value="Credit Card">Credit Card</option>
														<option value="Student Loans">Student Loans</option>
														<option value="Electronic Loans">Electronic Loans</option>
														<option value="Furniture Loans">Furniture Loans</option>
														<option value="Mobile Loans">Mobile Loans</option>
														<option value="Personal Loans">Personal Loans</option>
														<option value="Vehicle Loans">Vehicle Loans</option>
														<option value="Other Debts">Other Debts</option>
													</optgroup>
													<optgroup label="Insurance">
														<option value="Life Insurance">Life Insurance</option>
														<option value="Medical Insurance">Medical Insurance</option>
														<option value="Car Insurance">Car Insurance</option>
														<option value="Home Insurance">Home Insurance</option>
														<option value="Takaful">Takaful</option>
														<option value="Hibah">Hibah</option>
														<option value="Other Insurance">Other Insurance</option>
													</optgroup>
													<optgroup label="Education">
														<option value="School Fees">School Fees</option>
														<option value="Tuition Fees">Tuition Fees</option>
														<option value="College Fees">Tuition Fees</option>
														<option value="University Fees">Tuition Fees</option>
														<option value="Textbooks">Textbooks</option>
														<option value="Stationery">Stationery</option>
														<option value="Educational Supplies">Educational Supplies</option>
														<option value="Educational Materials">Educational Materials</option>
														<option value="Extracuricullar Activities">Extracuricullar Activities</option>
														<option value="Other Education Expenses">Other Education Expenses</option>
													</optgroup>
													<optgroup label="Entertainment">
														<option value="Movies">Movies</option>
														<option value="Magazines">Magazines</option>
														<option value="Music">Music</option>
														<option value="Gaming">Gaming</option>
														<option value="Amusement Parks">Amusement Parks</option>
														<option value="Concerts">Concerts</option>
														<option value="Sports">Sports</option>
														<option value="Vacations">Vacations</option>
														<option value="Hobbies">Hobbies</option>
														<option value="Streaming Services">Streaming Services</option>
														<option value="Recreational Services">Recreational Services</option>
														<option value="Accommodation">Accommodation</option>
														<option value="Other Entertainment Expenses">Other Entertainment Expenses</option>
													</optgroup>
													<optgroup label="Childcare">
														<option value="Daycare">Daycare</option>
														<option value="Nursery">Nursery</option>
														<option value="Diapers">Diapers</option>
														<option value="Formula">Formula</option>
														<option value="Baby Clothing">Baby Clothing</option>
														<option value="Baby Supplies">Baby Supplies</option>
														<option value="Other Childcare Expenses">Other Childcare Expenses</option>
													</optgroup>
													<optgroup label="Savings and Investments">
														<option value="Savings Contribution">Savings Contribution</option>
														<option value="ASNB">ASNB</option>
														<option value="Unit Trust">Unit Trust</option>
														<option value="Investment">Investment</option>
														<option value="Crypto">Crypto</option>
														<option value="Stocks">Stocks</option>
														<option value="REITs">REITs</option>
														<option value="ETFs">ETFs</option>
														<option value="Sukuk">Sukuk</option>
														<option value="Gold">Gold</option>
														<option value="Comodities">Comodities</option>
														<option value="Other Savings Expenses">Other Savings Expenses</option>
														<option value="Other Investment Expenses">Other Investment Expenses</option>
													</optgroup>
													<optgroup label="Electronics">
														<option value="Household Appliances">Household Appliances</option>
														<option value="Computer">Computer</option>
														<option value="Digital Appliances">Digital Appliances</option>
														<option value="Electronics">Electronics</option>
														<option value="Other Electronics Expenses">Other Electronics Expenses</option>
													</optgroup>
													<optgroup label="Bills & Utilities">
														<option value="Electric">Electric</option>
														<option value="Water">Water</option>
														<option value="Gas">Gas</option>
														<option value="Mobile">Mobile</option>
														<option value="Internet">Internet</option>
														<option value="Other Utilities">Other Utilities</option>
													</optgroup>
													<optgroup label="Others">
														<option value="Fines">Fines</option>
														<option value="Donations">Donations</option>
														<option value="Food Delivery">Food Delivery</option>
														<option value="Associations">Associations</option>
														<option value="Charity">Charity</option>
														<option value="Laundry">Laundry</option>
														<option value="Postage Fee">Postage Fee</option>
														<option value="Gifts">Gifts</option>
														<option value="Tobacco">Tobacco</option>
														<option value="Taxes">Taxes</option>
														<option value="Money Transfers">Money Transfers</option>
														<option value="ATM Withdrawals">ATM Withdrawals</option>
														<option value="Other Expenses">Other Expenses</option>
													</optgroup>
												</select>
												<label for="floatingInputValue">Category</label>
											</div>
											<!--end::Input group-->
											<!--end::Row-->
											<!--begin::Row-->
											<!--begin::Input group-->
											<div class="form-floating rounded mb-7">
												<select class="form-select form-control out-type-select" name="type" data-control="select2" data-placeholder="Select an option">
													<option></option>
													<option value="Recurring Weekly">Recurring (Weekly)</option>
													<option value="Recurring Monthly">Recurring (Monthly)</option>
													<option value="Recurring Anually">Recurring (Anually)</option>
													<option value="One Time">One Time</option>
												</select>
												<label for="floatingInputValue">Type</label>
											</div>
											<!--end::Input group-->
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7 d-none out-recurring-monthly-type">
												<div class="form-floating input-group" name="monthly_recurring_date" id="kt_td_picker_date_only_out" data-td-target-input="nearest" data-td-target-toggle="nearest">
													<select class="form-select form-control type-select" name="recurring_date_monthly" data-control="select2" data-placeholder="Select an option">
														<option></option>
														<?php
														for($x = 1; $x <=31; $x++)
														{
															echo '<option value="'.$x.'">'.$x.'</option>';
														}
														?>
													</select>
													<label for="floatingInputValue">Recurring Dates</label>
												</div>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7 d-none out-recurring-anually-type">
												<div class="form-floating input-group" name="anually_recurring_date" id="kt_td_picker_date_only_anual_out" data-td-target-input="nearest" data-td-target-toggle="nearest">
													<input name="recurring_date_anually" id="kt_td_picker_date_only_input" type="text" class="form-control text-gray-800 fw-bold" data-td-target="#kt_td_picker_date_only_anual_out"/>
													<span class="input-group-text" data-td-target="#kt_td_picker_date_only" data-td-toggle="datetimepicker">
														<i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
													</span>
													<label for="floatingInputValue">Recurring Dates</label>
												</div>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7 d-none out-normal-type">
												<div class="form-floating input-group" name="date" id="kt_td_picker_date_only_normal_out" data-td-target-input="nearest" data-td-target-toggle="nearest">
													<input name="date" id="kt_td_picker_date_only_input" type="text" class="form-control text-gray-800 fw-bold" data-td-target="#kt_td_picker_date_only_normal_out"/>
													<span class="input-group-text" data-td-target="#kt_td_picker_date_only_out" data-td-toggle="datetimepicker">
														<i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
													</span>
													<label for="floatingInputValue">Date</label>
												</div>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7 d-none out-recurring-weekly-type">
												<!--begin::Default example-->
												<select class="form-select form-control" name="weekly_recurring_date" data-control="select2" data-placeholder="Select an option">
													<option></option>
													<option value="Monday">Monday</option>
													<option value="Tuesday">Tuesday</option>
													<option value="Wednesday">Wednesday</option>
													<option value="Thursday">Thursday</option>
													<option value="Friday">Friday</option>
													<option value="Saturday ">Saturday </option>
													<option value="Sunday">Sunday</option>
												</select>
												<label for="floatingInputValue">Frequency Date</label>
												<!--end::Default example-->
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7">
												<input type="number" class="form-control " name="amount" placeholder="0" id="floatingInputValue" value="0.00" step="any" />
												<label for="floatingInputValue">Amount</label>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7">
												<input type="file" name="file" class="form-control" />
												<label for="floatingInputValue">File</label>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="form-floating rounded mb-7">
												<input type="text" name="remarks" class="form-control " placeholder="Any Remarks " id="remarksInput" />
												<label for="remarksInput">Comments</label>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="d-flex align-items-end">
												<input type="submit" class="btn btn-primary fs-3 w-100" value="Record">
											</div>
											<!--end::Row-->
										</form>
										<!--end::Form-->
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
						<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
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
									$col_size = '4';
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
											<!--<img src="<?php echo base_url();?>metronic/dist/assets/media/icons/duotune/finance/fin008.svg" class="h-125px mb-5" alt="" style="filter: opacity(0.3);" /> -->
											<!--end::Image-->
											<!--begin::Section-->
											<div class="text-start">
												<span class="d-block fw-bold fs-1 text-gray-800"><?php echo isset($row_account['amount_total']) && $row_account['amount_total'] != '' ? 'RM ' . number_format($row_account['amount_total'],2) : 'RM 0.00';?></span>
												<span class="mt-1 fw-semibold fs-3" style="color:">Latest Update : <?php echo isset($row_account['update_date']) && $row_account['update_date'] != '' ? date("d F Y", $row_account['update_date']) : 'Update Date Missing';?></span>
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
						<!--begin::Row-->
						<div class="row ">
							<!--begin::Col-->
							<div class="col-xl-12">
								<!--begin::Table widget 7-->
									<div class="card card-flush h-xl-100">
										<!--begin::Header-->
										<div class="card-header pt-7">
											<!--begin::Title-->
											<h4 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold text-gray-800">Latest Transactions</span>
												<span class="text-gray-400 mt-1 fw-semibold fs-7">Updated 
													<?php
													if(isset($account['update_date']) && $account['update_date'] != '')
													{
														echo $account['update_date'];
													}
													?> 
													</span>
											</h4>
											<!--end::Title-->
											<!--begin::Toolbar-->
											<div class="card-toolbar">
												<!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
												<div class="btn btn-sm btn-light d-flex align-items-center px-4">
													<!--begin::Display range-->
													<div class="text-gray-600 fw-bold">
													<?php
													if(isset($account['last_update_date']) && $account['last_update_date'] != '')
													{
														echo $account['last_update_date'];
													}
													?>
													</div>
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
											<?php 
											//ad($account['last_update_date']);
											//ad($account['transactions']);
											?>
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
													<?php 
													foreach($account['transactions'] as $key_transactions=>$row_transactions)
													{
														
														foreach($row_transactions as $row)
														{
															if($row['record'] == 'Deposit')
															{
																$icon = 'ki-chart-line-up';
																$text = 'text-success';
															}
															else
															{
																$icon = 'ki-chart-line-down';
																$text = 'text-danger';
															}
													?>													
														<tr>
															<td>
																<div class="symbol symbol-40px">
																	<span class="symbol-label bg-light-info">
																		<i class="ki-duotone <?php echo $icon . ' ' . $text;?> fs-2x">
																			<span class="path1"></span>
																			<span class="path2"></span>
																		</i>
																	</span>
																</div>
															</td>
															<td class="ps-0">
																<a href="<?php echo $row['id'];?>" class="text-dark fw-bold text-hover-primary mb-1 fs-6"><?php echo $row['category'];?></a>
																<span class="text-muted fw-semibold d-block fs-7"><?php echo $row['record'];?></span>
															</td>
															<td>
																<span class="text-dark fw-bold d-block fs-6"><?php echo $row['account_name'] . ' Wallet';?></span>
																<span class="text-gray-400 fw-semibold d-block fs-7"><?php echo $row['type'];?></span>
															</td>
															<td>
																<span class="text-dark fw-bold d-block fs-6"><?php echo $row['exact_record_date'];?></span>
															</td>
															<td>
																<span class="text-dark fw-bold d-block fs-6"><?php echo 'RM ' . $row['amount'];?></span>
															</td>
															<td class="text-end">
																<a href="<?php echo $row['id'];?>" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
																	<i class="ki-duotone ki-arrow-right fs-2">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</a>
															</td>
														</tr>
													<?php
														}
													}
													?>
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
						<!--begin::Chart widget 24-->
							<div class="card card-flush overflow-hidden h-xl-100">
								<!--begin::Header-->
								<div class="card-header py-5">
									<!--begin::Title-->
									<h3 class="card-title align-items-start flex-column">
										<span class="card-label fw-bold text-dark">Human Resources</span>
										<span class="text-gray-400 mt-1 fw-semibold fs-6">Reports by states and ganders</span>
									</h3>
									<!--end::Title-->
									<!--begin::Toolbar-->
									<div class="card-toolbar">
										<!--begin::Menu-->
										<button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
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
												<a href="javascript:void(0)" class="menu-link px-3 downloadsvg">Download SVG</a>
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
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<!--begin::Chart-->
									<div id="chart_11" class="d-flex justify-content-center"></div>
									<!--end::Chart-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Chart widget 24-->
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
new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_date_only_anual"), {
    display: {
        viewMode: "calendar",
		components: {
            decades: false,
            year: false,
            month: true,
            date: true,
            hours: false,
            minutes: false,
            seconds: false
        }
    }
});
</script>

<script type="text/javascript">
new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_date_only_normal"), {
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

<script type="text/javascript">
new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_date_only_anual_out"), {
    display: {
        viewMode: "calendar",
		components: {
            decades: false,
            year: false,
            month: true,
            date: true,
            hours: false,
            minutes: false,
            seconds: false
        }
    }
});
</script>

<script type="text/javascript">
new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_date_only_normal_out"), {
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

<script type="text/javascript">
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';

var KTApexChartsDemo = function () {
	var _demo11 = function () {
		const apexChart = "#chart_11";
		var options = {
			series: [44, 55, 41, 17, 15],
			chart: {
				width: 380,
				type: 'donut',
				selection: {
					enabled: true
				},
				toolbar: {
				show: true,
				tools: {
				  download: true,
				  selection: true,
				  zoom: true,
				  zoomin: true,
				  zoomout: true,
				  pan: true,
				  reset: true | '<img src="/static/icons/reset.png" width="20">',
				  customIcons: []
				},
				export: {
				  csv: {
					filename: undefined,
					columnDelimiter: ',',
					headerCategory: 'category',
					headerValue: 'value',
					dateFormatter(timestamp) {
					  return new Date(timestamp).toDateString()
					}
				  },
				  svg: {
					filename: 'urusduit',
				  },
				  png: {
					filename: 'urusduit',
				  }
				},
				autoSelected: 'zoom',
		  }
			},
			responsive: [{
				breakpoint: 480,
				options: {
					chart: {
						width: 200
					},
					legend: {
						position: 'left'
					}
				}
			}],
			colors: [primary, success, warning, danger, info]
		};

		var chart = new ApexCharts(document.querySelector(apexChart), options);
		chart.render();
	}
	
	return {init: function () {
			_demo11();
		}
	};
}();

jQuery(document).ready(function () {
	KTApexChartsDemo.init();
});
</script>

<script type="text/javascript">
$(document).ready(function() {
	
	$('.downloadsvg').on('click',function(e){
		const cardBodyDiv = $(this).closest('.card-body');
		const chartElement = cardBodyDiv.find('#chart_11');
		
		const exportSVGElement = chartElement.find('.exportSVG');
		
		exportSVGElement.click();
		
	});
	
	$('.type-select').on('change',function(e){
		e.preventDefault();
		
		var select_val = $(this).val();
		
		if(select_val == 'Recurring Monthly')
		{
			$('.recurring-monthly-type').removeClass('d-none');
			$('.normal-type').removeClass('d-none');
			$('.normal-type').addClass('d-none');
			$('.recurring-weekly-type').removeClass('d-none');
			$('.recurring-weekly-type').addClass('d-none');
			$('.recurring-anually-type').removeClass('d-none');
			$('.recurring-anually-type').addClass('d-none');
			$('.recurring-monthly-type').addClass('animate__animated animate__fadeIn');
			
		}
		else if(select_val == 'One Time')
		{
			$('.normal-type').removeClass('d-none');
			$('.recurring-weekly-type').removeClass('d-none');
			$('.recurring-weekly-type').addClass('d-none');
			$('.recurring-monthly-type').removeClass('d-none');
			$('.recurring-monthly-type').addClass('d-none');
			$('.recurring-anually-type').removeClass('d-none');
			$('.recurring-anually-type').addClass('d-none');
			$('.normal-type').addClass('animate__animated animate__fadeIn');
		}
		else if(select_val == 'Recurring Weekly')
		{
			$('.recurring-weekly-type').removeClass('d-none');
			$('.normal-type').removeClass('d-none');
			$('.normal-type').addClass('d-none');
			$('.recurring-monthly-type').removeClass('d-none');
			$('.recurring-monthly-type').addClass('d-none');
			$('.recurring-anually-type').removeClass('d-none');
			$('.recurring-anually-type').addClass('d-none');
			$('.recurring-weekly-type').addClass('animate__animated animate__fadeIn');
		}
		else if(select_val == 'Recurring Anually')
		{
			$('.recurring-anually-type').removeClass('d-none');
			$('.normal-type').removeClass('d-none');
			$('.normal-type').addClass('d-none');
			$('.recurring-monthly-type').removeClass('d-none');
			$('.recurring-monthly-type').addClass('d-none');
			$('.recurring-weekly-type').removeClass('d-none');
			$('.recurring-weekly-type').addClass('d-none');
			$('.recurring-anually-type').addClass('animate__animated animate__fadeIn');
		}
	});
	
	$('.out-type-select').on('change',function(e){
		e.preventDefault();
		
		var select_val = $(this).val();
		
		if(select_val == 'Recurring Monthly')
		{
			$('.out-recurring-monthly-type').removeClass('d-none');
			$('.out-normal-type').removeClass('d-none');
			$('.out-normal-type').addClass('d-none');
			$('.out-recurring-weekly-type').removeClass('d-none');
			$('.out-recurring-weekly-type').addClass('d-none');
			$('.out-recurring-anually-type').removeClass('d-none');
			$('.out-recurring-anually-type').addClass('d-none');
			$('.out-recurring-monthly-type').addClass('animate__animated animate__fadeIn');
			
		}
		else if(select_val == 'One Time')
		{
			$('.out-normal-type').removeClass('d-none');
			$('.out-recurring-weekly-type').removeClass('d-none');
			$('.out-recurring-weekly-type').addClass('d-none');
			$('.out-recurring-monthly-type').removeClass('d-none');
			$('.out-recurring-monthly-type').addClass('d-none');
			$('.out-recurring-anually-type').removeClass('d-none');
			$('.out-recurring-anually-type').addClass('d-none');
			$('.out-normal-type').addClass('animate__animated animate__fadeIn');
		}
		else if(select_val == 'Recurring Weekly')
		{
			$('.out-recurring-weekly-type').removeClass('d-none');
			$('.out-normal-type').removeClass('d-none');
			$('.out-normal-type').addClass('d-none');
			$('.out-recurring-monthly-type').removeClass('d-none');
			$('.out-recurring-monthly-type').addClass('d-none');
			$('.out-recurring-anually-type').removeClass('d-none');
			$('.out-recurring-anually-type').addClass('d-none');
			$('.out-recurring-weekly-type').addClass('animate__animated animate__fadeIn');
		}
		else if(select_val == 'Recurring Anually')
		{
			$('.out-recurring-anually-type').removeClass('d-none');
			$('.out-normal-type').removeClass('d-none');
			$('.out-normal-type').addClass('d-none');
			$('.out-recurring-monthly-type').removeClass('d-none');
			$('.out-recurring-monthly-type').addClass('d-none');
			$('.out-recurring-weekly-type').removeClass('d-none');
			$('.out-recurring-weekly-type').addClass('d-none');
			$('.out-recurring-anually-type').addClass('animate__animated animate__fadeIn');
		}
	});
	
	$('#js_record_in').submit(function(event){	
		event.preventDefault();
		// var values = $(this).serialize();
		var formData = new FormData($(this)[0]);
		
		$.ajax({
			url: baseUrl + 'account/in_records',
			method: "POST",
			data: formData,
			dataType:'json',
			async: false,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(response){
				if(response['result'] == 'success')
				{
					Swal.fire({
						text: response['msg'],
						icon: "success",
						buttonsStyling: !1,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary"
						}
					}).then((function() {
						location.href = baseUrl + 'dashboard';
					}));
				}
				else
				{
					Swal.fire({
						// text: "Sorry, looks like there are some errors detected, please try again.",
						text: response['msg'],
						icon: "error",
						buttonsStyling: !1,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary"
						}
					});
				}
			}
		});
	});
	
	$('#js_record_out').submit(function(event){	
		event.preventDefault();
		// var values = $(this).serialize();
		var formData = new FormData($(this)[0]);
		
		$.ajax({
			url: baseUrl + 'account/out_records',
			method: "POST",
			data: formData,
			dataType:'json',
			async: false,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(response){
				if(response['result'] == 'success')
				{
					Swal.fire({
						text: response['msg'],
						icon: "success",
						buttonsStyling: !1,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary"
						}
					}).then((function() {
						location.href = baseUrl + 'dashboard';
					}));
				}
				else
				{
					Swal.fire({
						// text: "Sorry, looks like there are some errors detected, please try again.",
						text: response['msg'],
						icon: "error",
						buttonsStyling: !1,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary"
						}
					});
				}
			}
		});
	});
});
</script>



<?php
$this->load->view('dashboard/dashboard_close_v');
?>