<?php include('includes/header.php');
include('admin/includes/db.php');
?>



<!--container-->
<div class="page-heading">
</div>
<div class="content">
	<div class="top-cate">
		<div class="featured-pro container">
			<form id="deliveryForm">
				<h2>ORDER NOW</h2>
				<div id="checkout-step-billing" class="step a-item">
					<fieldset class="group-select">
						<ul class="">
							<li id="billing-new-address-form">
								<fieldset>
									<ul id="deliveryDetails" style="display:none;">
										<li class="wide">
											<div class="customer-name">
												<div class="input-box name-firstname">
													<div class="input-box1">
														<button type="button" class="button" id="btnLogin"
															name="btnLogin" title="Saved Addresses"><span>View Saved
																Addresses</span></button>
													</div>
												</div>
											</div>
										</li>
										<label for="searchDiv"> Street, Barangay./Subdivision, City/Municipality
										</label>
										<div id="searchDiv"></div>
										<label style="text-align: justify !important; font-size: 9px;">Note: If the
											address you typed is not recognized by our system, you may click USE CURRENT
											LOCATION or simply continue typing in your correct address and proceed with
											ordering. A customer service representative will assign your order to a
											store or call you, if your area is not serviceable.</label>
										<li class="wide" style="margin: 15px 0px 15px;">
											<label for="inpHouseNo"> House / Unit / Floor </label>
											<div class="input-box1">
												<input type="text" id="inpHouseNo" name="inpHouseNo" value=""
													title="First Name" class="input-text"
													placeholder="Type the House / Unit / Floor  of your delivery address.">
											</div>
										</li>
										<li class="wide" style="margin: 15px 0px 15px;">
											<input style="display: none;" type="text" name="placeSearch"
												id="placeSearch" title="Input delivery address" placeholder=""
												class="input-text required-entry">
											<!-- <div class="input-box name-firstname" id="firstnamediv">
													<label for="inpDescription"> House / Unit / Floor</label>
													<div class="input-box1">
														<input type="text" id="inpHouseNo" name="inpHouseNo" value="" title="First Name" class="input-text">
													</div>
												</div> -->
											<span id="error_address" class="lbl_error" style="display: none;">Please
												enter the delivery address to view the product price and availability in
												the area.</span>
											<input type="hidden" name="street_number" id="street_number" value="" />
											<input type="hidden" name="route" id="route" value="" />
											<input type="hidden" name="sublocality_level_1" id="sublocality_level_1"
												value="">
											<input type="hidden" name="locality" id="locality" value="" />
											<input type="hidden" name="administrative_area_level_1"
												id="administrative_area_level_1" value="" />
											<input type="hidden" name="postal_code" id="postal_code" />
											<input type="hidden" name="country" id="country" value="PH" />
											<input type="hidden" name="lat" id="lat" value="" />
											<input type="hidden" name="lng" id="lng" value="" />
										</li>
										<li class="wide" style="margin: 15px 0px 15px;">
											<div class="customer-name">
												<div class="input-box name-firstname">
													<label><span class="required">*</span> Who is this order for?
													</label>
													<div class="input-box1" id="ordering_for">
														<div class="input-box name-lastname" style="width: 45%">
															<input style="width: 45%" id="radOrderForfmo" type="radio"
																name="orderfor" value="fmo">
															<label style="width: 45%" for="radOrderForfmo"
																class="radio-custom-label"> For myself</label>
														</div>
														<div class="input-box name-lastname" style="width: 45%">
															<input style="width: 45%" id="radOrderForaag" type="radio"
																name="orderfor" value="aag">
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
													<label><span class="required">*</span> When do you want this order?
													</label>
													<div class="input-box1" id="transaction_Type">
														<div class="input-box name-lastname" style="width: 45%">
															<input style="width: 45%" id="raddeliveryNow" type="radio"
																name="trans_type" value="deliveryNow">
															<label style="width: 45%" for="raddeliveryNow"
																class="radio-custom-label"> Now</label>
														</div>
														<div class="input-box name-lastname" style="width: 45%">
															<input style="width: 45%" id="raddeliveryLater" type="radio"
																name="trans_type" value="deliveryLater">
															<label style="width: 45%" for="raddeliveryLater"
																class="radio-custom-label"> Deliver later</label>
														</div>
													</div>
													<span id="error_transtype" class="lbl_error"
														style="display: none;">Please choose your preferred online
														transaction.</span>
												</div>
											</div>
										</li>
										<li class="wide" style="margin: 15px 0px 15px;">
											<div class="customer-name">
												<div class="input-box name-firstname" style="width: 100% !important;">
													<label for="txtDeliveryDateTime"><span class="required">*</span>
														Delivery Date/Time</label>
													<div class="input-box1" id="delNowNote">
														Today (April 12, 2021 Philippine local date & time) expected
														delivery is within 1 hour and 30 minutes upon receipt of orders
														from the Dencios branch.
													</div>
													<div class="input-box1" id="otherTransNote" style="display: none;">
														<input type="hidden" id="curDate"
															value="Monday, April 12, 2021" />
														<input type="hidden" id="currentDateTime"
															value="2021, April, 12, 03, 02" />
														<input type="hidden" id="bID" value="9" />
														<input type="text" id="datepicker" name="deli_date"
															class="input-text required-entry"
															value="Monday, April 12, 2021" style="width: 27.7%;" /> /
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
															<option value="00">00</option>
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
									<ul id="pickUpDineInForm">
										<li class="wide" style="margin: 15px 0px 15px;">
											<div class="customer-name">
												<div class="input-box name-firstname">
													<label><span class="required">*</span> How do you want to pick up
														your order? </label>
													<div class="input-box1" id="transaction_Type">
														<input id="radpickup" type="radio" name="trans_type"
															value="pickup">
														<label for="radpickup" class="radio-custom-label"> Inside
															store</label>
														<input id="radcurbside" type="radio" name="trans_type"
															value="curbside">
														<label for="radcurbside" class="radio-custom-label"> Curbside®
															pick-up point</label>
													</div>
													<span id="error_transtype" class="lbl_error"
														style="display: none;">Please choose your preferred online
														transaction.</span>
												</div>
											</div>
										</li>
										<li class="wide" style="margin: 15px 0px 15px;">
											<div class="customer-name">
												<div class="input-box name-firstname" style="width: 100% !important;">
													<label for="txtDeliveryDateTime"><span class="required">*</span>
														Date/Time</label>
													<label id="lblPickUpDineIn"></label>
													<div class="input-box1">
														<input type="text" id="datepicker_2" name="date_pickdine"
															value="Monday, April 12, 2021"
															class="input-text required-entry" style="width: 27.5%;" />
														&nbsp;

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
														<select name="optStore" id="optStore" title="Stores or Branch"
															class="validate-select required-entry">
															<option value="DF0023-Bauan City">BAUAN CITY</option>
															<option value="DF0029-Carworld, Pampanga City">CARWORLD,
																PAMPANGA CITY</option>
															<option value="0175DK-Dencio's Pasig  kapitolyo">DENCIO'S
																PASIG KAPITOLYO</option>
															<option value=" DC00000001-FESTIVAL">FESTIVAL</option>
															<option value="0018CD-JUPITER, MAKATI">JUPITER, MAKATI
															</option>
															<option value="DF0030-La Union">LA UNION</option>
														</select>
													</div>
													<span id="error_pdstore" class="lbl_error"
														style="display: none;">Please select store or branch.</span>
												</div>
												<div class="input-box name-firstname" id="storeCurbside"
													style="display: none;">
													<label for="optStoreCurbside"><span class="required">*</span>
														Store/Branch</label>
													<div class="input-box1">
														<select name="optStoreCurbside" id="optStoreCurbside"
															title="Stores or Branch"
															class="validate-select required-entry">
															<option value="DF0030-La Union">LA UNION - </option>
														</select>
													</div>
													<span id="error_pdstoreCurb" class="lbl_error"
														style="display: none;">Please select store or branch.</span>
												</div>
											</div>
										</li>
									</ul>
								</fieldset>
							</li>
						</ul>
						<div class="buttons-set" id="billing-buttons-container">
							<button type="button" title="Proceed" class="button continue swalWait" onclick="add_cart(id);"
								id="btnProceed"><span>Proceed</span></button>
						</div>
					</fieldset>
				</div>
			</form>
		</div>
	</div>
</div>
    
<script> 

function add_cart(id) {
	
        $.ajax({
            type: "GET",
            url: 'cart/add.php',
            data:{id:id},
            success: function(response)
            {
   //   alert(response);
      swal({
  title:response,
 // text: response,
 buttons: {
        confirm : {text:'Close',className:'sweet-warning'},
        
    }
});
             get_cart();
           }
       });
    
  
    
        }
</script>

<?php include ('includes/footer.php'); ?>
<style>
  .sweet-warning {
    background-color:#022d62;
    border-radius:40px;
  }
  .sweet-warning:hover {
    background-color:#ef3139;
    border-radius:40px;
  }
  </style>