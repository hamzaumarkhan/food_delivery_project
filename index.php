<?php
include('admin/includes/db.php');
include('includes/header.php');?>

<?php
  session_start();         
include('admin/includes/db.php');
$_SESSION['myip']=$_SERVER['REMOTE_ADDR']; 
if(isset($_GET['action'])) {
  $action='<div class="alert alert-success text-center border-0" role="alert">
  <h4 class="alert-heading">Transaction  Successful!</h4>
  <p>You will be contacted by Admin </p>
  <hr>
  <p class="mb-0">Thank you for Purchasing.Go to <a href="index.php">home<a></p>
  </div>';   
  
  }
  
          ?>
	
		
		<!--container-->
		<div class="page-heading">
		</div>
		<div class="content">
			<div class="top-cate">
				<div class="featured-pro container">
					<form id="deliveryForm">
						<h2>ORDER NOW</h2>
						<ul id="trans_button">
							<h5>Choose your transaction</h5>
							<li>
								<div class="blog-img col-sm-6 col-xs-6">
									<div class="page-not-found img">
										<a id="btnDelivery" name="btnDelivery" title="Delivery"
											href="delivery.php" class="swalWait order-now-cards">
											<img class="page-not-found img"
												src="images/img-1.png" alt="blog image">
										</a>
									</div>
								</div>
							</li>
							<li>
								<div class="blog-img col-sm-6 col-xs-6">
									<div class="page-not-found img">
										<a id="btnPickup" name="btnPickup" title="Pickup"
											href="pickup.php" class="swalWait order-now-cards">
											<img class="page-not-found img"
												src="http://localhost/food_delivery/images/img-2.jpg" alt="blog image">
										</a>
									</div>
								</div>
							</li>
						</ul>
						<div id="checkout-step-billing" class="step a-item">
							<fieldset class="group-select">
								<ul class="">
									<li id="billing-new-address-form">
										<fieldset>
											<ul id="deliveryDetails" style="display: none;">
												<li class="wide">
													<div class="customer-name">
														<div class="input-box name-firstname">
															<div class="input-box1">
																<button type="button" class="button" id="btnLogin"
																	name="btnLogin" title="Saved Addresses"><span>View
																		Saved Addresses</span></button>
															</div>
														</div>
													</div>
												</li>
												<div id="searchDiv"></div>
												<li class="wide" style="margin: 15px 0px 15px;">
						                  		<input style=" display: none;" type="text" name="placeSearch" id="placeSearch"
													title="Input delivery address" placeholder=""
													class="input-text required-entry">
													<label style="text-align: justify !important; font-size: 9px;">Note:
														If the address you typed is not recognized by our system, you
														may click USE CURRENT LOCATION or simply continue typing in your
														correct address and proceed with ordering. A customer service
														representative will assign your order to a store or call you, if
														your area is not serviceable.</label>
													<span id="error_address" class="lbl_error"
														style="display: none;">Please enter the delivery address to view
														the product price and availability in the area.</span>
													<input type="hidden" name="street_number" id="street_number" />
													<input type="hidden" name="route" id="route" />
													<input type="hidden" name="sublocality_level_1"
														id="sublocality_level_1">
													<input type="hidden" name="locality" id="locality" />
													<input type="hidden" name="administrative_area_level_1"
														id="administrative_area_level_1" />
													<input type="hidden" name="postal_code" id="postal_code" />
													<input type="hidden" name="country" id="country" />
													<input type="hidden" name="lat" id="lat" />
													<input type="hidden" name="lng" id="lng" />
												</li>
												<li class="wide" style="margin: 15px 0px 15px;">
													<div class="customer-name">
														<div class="input-box name-firstname">
															<label><span class="required">*</span> Who is this order
																for? </label>
															<div class="input-box1" id="ordering_for">
																<div class="input-box name-lastname" style="width: 45%">
																	<input style="width: 45%" id="radOrderForfmo"
																		type="radio" name="orderfor" value="fmo">
																	<label style="width: 45%" for="radOrderForfmo"
																		class="radio-custom-label"> For myself</label>
																</div>
																<div class="input-box name-lastname" style="width: 45%">
																	<input style="width: 45%" id="radOrderForaag"
																		type="radio" name="orderfor" value="aag">
																	<label style="width: 45%" for="radOrderForaag"
																		class="radio-custom-label"> As a gift</label>
																</div>
															</div>
															<span id="error_orderfor" class="lbl_error"
																style="display: none;">Please choose who is this order
																for.</span>
														</div>
													</div>
												</li>
												<li class="wide" style="margin: 15px 0px 15px;">
													<div class="customer-name">
														<div class="input-box name-firstname">
															<label><span class="required">*</span> When do you want this
																order? </label>
															<div class="input-box1" id="transaction_Type">
																<div class="input-box name-lastname" style="width: 45%">
																	<input style="width: 45%" id="raddeliveryNow"
																		type="radio" name="trans_type"
																		value="deliveryNow">
																	<label style="width: 45%" for="raddeliveryNow"
																		class="radio-custom-label"> Now</label>
																</div>
																<div class="input-box name-lastname" style="width: 45%">
																	<input style="width: 45%" id="raddeliveryLater"
																		type="radio" name="trans_type"
																		value="deliveryLater">
																	<label style="width: 45%" for="raddeliveryLater"
																		class="radio-custom-label"> Deliver
																		later</label>
																</div>
															</div>
															<span id="error_transtype" class="lbl_error"
																style="display: none;">Please choose your preferred
																online transaction.</span>
														</div>
													</div>
												</li>
												<li class="wide" style="margin: 15px 0px 15px;">
													<div class="customer-name">
														<div class="input-box name-firstname"
															style="width: 100% !important;">
															<label for="txtDeliveryDateTime"><span
																	class="required">*</span> Delivery Date/Time</label>
															<div class="input-box1" id="delNowNote">
																Today (April 12, 2021 Philippine local date & time)
																expected delivery is within 1 hour and 30 minutes upon
																receipt of orders from the Dencios branch.
															</div>
															<div class="input-box1" id="otherTransNote"
																style="display: none;">
																<input type="hidden" id="curDate"
																	value="Monday, April 12, 2021" />
																<input type="hidden" id="currentDateTime"
																	value="2021, April, 12, 03, 01" />
																<input type="hidden" id="bID" value="9" />
																<input type="text" id="datepicker" name="deli_date"
																	class="input-text required-entry"
																	value="Monday, April 12, 2021"
																	style="width: 27.7%;" /> /
																<select name="dHour" id="dHour" style="width: 9%;"
																	class="validate-select required-entry">
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																	<option value="5">5</option>
																	<option value="6">6</option>
																	<option value="7">7</option>
																	<option value="8">8</option>
																	<option value="9">9</option>
																	<option value="10">10</option>
																	<option value="11">11</option>
																	<option value="12">12</option>
																</select> :
																<select name="dMin" id="dMin" style="width: 9%;"
																	class="validate-select required-entry">
																	<option value="00" selected='selected'>00</option>
																	<option value="15">15</option>
																	<option value="30">30</option>
																	<option value="45">45</option>
																</select>&nbsp;
																<select name="ampm" id="ampm" style="width: 9%;"
																	class="validate-select required-entry">
																	<option value="AM">AM</option>
																	<option value="PM">PM</option>
																</select>
															</div>
														</div>
													</div>
												</li>
											</ul>
											<ul id="pickUpDineInForm" style="display: none">
												<li class="wide" style="margin: 15px 0px 15px;">
													<div class="customer-name">
														<div class="input-box name-firstname">
															<label><span class="required">*</span> How do you want to
																pick up your order? </label>
															<div class="input-box1" id="transaction_Type">
																<input id="radpickup" type="radio" name="trans_type"
																	value="pickup">
																<label for="radpickup" class="radio-custom-label">
																	Inside store</label>
																<input id="radcurbside" type="radio" name="trans_type"
																	value="curbside">
																<label for="radcurbside" class="radio-custom-label">
																	Curbside® pick-up point</label>
															</div>
															<span id="error_transtype" class="lbl_error"
																style="display: none;">Please choose your preferred
																online transaction.</span>
														</div>
													</div>
												</li>
												<li class="wide" style="margin: 15px 0px 15px;">
													<div class="customer-name">
														<div class="input-box name-firstname"
															style="width: 100% !important;">
															<label for="txtDeliveryDateTime"><span
																	class="required">*</span> Date/Time</label>
															<label id="lblPickUpDineIn"></label>
															<div class="input-box1">
																<input type="hidden" id="curDate"
																	value="Monday, April 12, 2021" />
																<input type="text" id="datepicker_2"
																	name="date_pickdine" value="Monday, April 12, 2021"
																	class="input-text required-entry"
																	style="width: 27.5%;" /> &nbsp;

																<select name="pHour" id="pHour" style="width: 7%;"
																	class="validate-select required-entry">
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																	<option value="5">5</option>
																	<option value="6">6</option>
																	<option value="7">7</option>
																	<option value="8">8</option>
																	<option value="9">9</option>
																	<option value="10">10</option>
																	<option value="11">11</option>
																	<option value="12">12</option>
																</select>
																<select name="pMin" id="pMin" style="width: 9%;"
																	class="validate-select required-entry">
																	<option value="00" selected='selected'>00</option>
																	<option value="15">15</option>
																	<option value="30">30</option>
																	<option value="45">45</option>
																</select>&nbsp;
																<select name="dampm" id="dampm" style="width: 9%;"
																	class="validate-select required-entry">
																	<option value="AM">AM</option>
																	<option value="PM">PM</option>
																</select>
															</div>
														</div>
													</div>
												</li>
												<li class="fields">
													<div class="customer-name">
														<div class="input-box name-firstname" id="storeRegular">
															<label for="optStore"><span class="required">*</span>
																Store/Branch</label>
															<div class="input-box1">
																<select name="optStore" id="optStore"
																	title="Stores or Branch"
																	class="validate-select required-entry">
																	<option value="DF0023-Bauan City">BAUAN CITY
																	</option>
																	<option value="DF0029-Carworld, Pampanga City">
																		CARWORLD, PAMPANGA CITY</option>
																	<option value="0175DK-Dencio's Pasig  kapitolyo">
																		DENCIO'S PASIG KAPITOLYO</option>
																	<option value=" DC00000001-FESTIVAL">FESTIVAL
																	</option>
																	<option value="0018CD-JUPITER, MAKATI">JUPITER,
																		MAKATI</option>
																	<option value="DF0030-La Union">LA UNION</option>
																</select>
															</div>
															<span id="error_pdstore" class="lbl_error"
																style="display: none;">Please select store or
																branch.</span>
														</div>
														<div class="input-box name-firstname" id="storeCurbside"
															style="display: none;">
															<label for="optStoreCurbside"><span
																	class="required">*</span> Store/Branch</label>
															<div class="input-box1">
																<select name="optStoreCurbside" id="optStoreCurbside"
																	title="Stores or Branch"
																	class="validate-select required-entry">
																	<option value="DF0030-La Union">LA UNION - </option>
																</select>
															</div>
															<span id="error_pdstoreCurb" class="lbl_error"
																style="display: none;">Please select store or
																branch.</span>
														</div>
													</div>
												</li>
											</ul>
										</fieldset>
									</li>
								</ul>
								<div class="buttons-set" id="billing-buttons-container">
									<button type="button" title="Proceed" class="button continue" id="btnProceed"
										style="display: none;"><span>Proceed</span></button>&nbsp&nbsp&nbsp
									<button type="button" title="Cancel" class="button cancel" id="btnCancel"
										style="display: none;"><span>Cancel</span></button>
								</div>
							</fieldset>
						</div>
					</form>
				</div>
			</div>
			<div class="block">
				<div class="product-collateral container explore_menu">
					<h2 style="margin-left: 0px"> &nbsp&nbsp EXPLORE MENU </h2>
					
					<div id="productTabContent" class="tab-content">
						<div class="tab-pane tablepane active" id="porkSisig">
							<div class="col-main col-sm-12 product-grid product-grid">
								<div class="pro-coloumn">
									<div class="block">
										<article class="col-main">
											<div class="category-products" id="cat_product379">
												<ul class="products-grid col-lg-3" id="product_ul_379">
													<?php
												$sql="SELECT id, title,price FROM product  LIMIT 8";
												$run=mysqli_query($conn,$sql);
												while ($row=mysqli_fetch_assoc($run)) {
												echo '
														<div class= "category_cover">
														<div class="category_img-cover">
															<img src="images/pork sisig.jpg">
														</div>
														<div class="price_content-cover">
															<div class="sp-simpleportfolio-info">
																<h3 class="sp-simpleportfolio-title">
																	<a href="product.php">
																	'.$row['title'].'
																	</a>
																</h3>
																<div class="sp-simpleportfolio-tags">
																'.$row['price'].'
																</div>
															</div>
														</div>
													</div>
													';
												}
											?>
													
												</ul>
												<div class="input-box1 my-btn" id="billing-buttons-container">
													<button  type="button" title="Proceed" class="button continue swalWait menu-btn"
														id="btnProceed"><a href="explore.php">Explore Menu</a></button>
												</div>
											</div>
										</article>
									</div>
								</div>
							</div>
						</div>
						
				</div>
			</div>
			<!-- Testimonial Slider -->
			<section class="happyclints">				
				<div class="block testimonial-block">
				<div class="product-collateral container">
					<div class="text-center testimonial-header">
						<h1 class="text-center font-weight-bold">OUR HAPPY CLIENTS</h1>
						<p class="text-capitalize pt-1">Our satisfide Customer Says</p>
					</div>

				<div id="testimonial">
					<div class="item">
						<div class="box">
							<a href="#"><img src="images/6.jpg" class="img-fluid img-thumbnail"></a>
							<p class="m-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</p>
							<h5>Sisig Pancit</h5>
						</div>
					</div>
					<div class="item">
						<div class="box">
							<a href="#"><img src="images/4.jpg" class="img-fluid img-thumbnail"></a>
							<p class="m-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</p>
							<h5>Sisig Pizza</h5>
						</div>
					</div>
					<div class="item">
						<div class="box">
							<a href="#"><img src="images/9.jpg" class="img-fluid img-thumbnail"></a>
							<p class="m-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</p>
							<h5>tofu sisig</h5>
						</div>
					</div>
					<div class="item">
						<div class="box">
							<a href="#"><img src="images/7.jpg" class="img-fluid img-thumbnail"></a>
							<p class="m-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</p>
							<h5>Sisig Pancit</h5>
						</div>
					</div>
					<div class="item">
						<div class="box">
							<a href="#"><img src="images/9.jpg" class="img-fluid img-thumbnail"></a>
							<p class="m-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</p>
							<h5>Sisig Pancit</h5>
						</div>
					</div>
					<div class="item">
						<div class="box">
							<a href="#"><img src="images/5.jpg" class="img-fluid img-thumbnail"></a>
							<p class="m-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</p>
							<h5>tofu sisig</h5>
						</div>
					</div>
				</div>
				</div>
				</div>
			</section>			
		</div>

<?php include('includes/footer.php');?>
