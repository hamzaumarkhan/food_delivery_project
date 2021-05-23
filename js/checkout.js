/* Cart Javascript */
function month(m)
{
	var mArr = { 
			'January'   : 0,
			'February'  : 1,
			'March'     : 2,
			'April'     : 3,
			'May'       : 4,
			'June'      : 5,
	        'July'      : 6,
	        'August'    : 7,
	        'September' : 8,
	        'October'   : 9,
	        'November'  : 10,
	        'December'  : 11 
	};
	
	return mArr[m];
}

jQuery(document).ready(function() {
	jQuery('#btnContinue').click(function(evt) {
		evt.preventDefault();
		var error = false;
		var host = 'https://' + location.host;
        var urlPath = location.pathname;
        var prev = jQuery('#prevPage').val();
        var next = jQuery('#nextPage').val();
        var crnt = jQuery('#curPage').val();

        if(crnt == 1)
        {
        	var trans 		= jQuery('#trans_type').val(); 
        	var orderFor 	= jQuery("#orderfor").val();
        	var transcheck 	= jQuery('#trans_type').val(); 
        	var dpFirstname = jQuery("#inpFirstname").val()
        	var dpLastname 	= jQuery("#inpLastname").val();
        	var street 		= jQuery("#inpStreet").val();
        	var city 		= jQuery("#inpCity").val();
        	var province 	= jQuery("#inpProvince").val();
        	var dpMobile 	= jQuery("#inpMobile").val();
        	var cDate 		= jQuery("#currentDateTime").val();
        	var dLabel 		= jQuery("#inpDescription").val();
		
			if (trans == 'deliveryNow' || trans == 'deliveryLater')
			{
				
				if (street.length == 0)
				{
					error = true;
					jQuery('#error_street').show();
				}
				else
				{
					jQuery('#error_street').hide();
				}
				if (city.length == 0 )
				{
					error = true;
					jQuery('#error_city').show();
				}
				else
				{
					jQuery('#error_city').hide();
				}
				if (province.length == 0)
				{
					error = true;
					jQuery('#error_province').show();
				}
				else
				{
					jQuery('#error_province').hide();
				}

				if (dpMobile.length == 0)
				{
					error = true;
					jQuery('#error_contact').show();
				}
				else if(dpMobile.length < 10)
				{
					error = true;
					jQuery('#error_contact').show();
				}
				else
				{
					jQuery('#error_contact').hide();
				}

				if(dLabel.length == 0)
				{
					error = true;
					jQuery('#error_dEsc').show();
				}
				else
				{
					jQuery('#error_dEsc').hide();
				}

				
				if(orderFor == 'aag')
				{
					if (dpFirstname.length == 0)
					{
						error = true;
						jQuery('#error_dfirstname').show();
					}
					else
					{
						jQuery('#error_dfirstname').hide();
					}
					if (dpLastname.length == 0)
					{
						error = true;
						jQuery('#error_dlastname').show();
					}
					else
					{
						jQuery('#error_dlastname').hide();
					}
				}
			}			
			else if (trans == 'pickup')
			{
	        	var pdfirstname  = jQuery('#pdFirstname').val();
	        	var pdlastname   = jQuery('#pdLastname').val();
	        	var pdcontactNum = jQuery('#pdMobile').val();
	        	var bID = jQuery("#bID").val();

	        	if(pdcontactNum.length == 0)
		        {
		        	error = true;
		        	jQuery('#error_pdcontact').show();
		        }
		        else
		        {
		        	
		        	jQuery('#error_pdcontact').hide();
		        }

	        	if(pdfirstname.length == 0)
		        {
		        	error = true;
		        	jQuery('#error_pdfirstname').show();
		        }
		        else
		        {
		        	
		        	jQuery('#error_pdfirstname').hide();
		        }

		        if(pdlastname.length == 0)
		        {
		        	error = true;
		        	jQuery('#error_pdlastname').show();
		        }
		        else
		        {
		        	
		        	jQuery('#error_pdlastname').hide();
		        }

			}//pickup

        }
        
        
        if(error == true)
        {
            jQuery('#fillRequired').show();
            jQuery('#required').hide();
        }
        else
        {
            jQuery('#fillRequired').hide();
            jQuery('#required').show();
        }

        if(error == false)
        {	
        		jQuery.post(urlPath + '?/next/', jQuery('#stepForm').serialize(), function(data){	
	        	if(data.status == 'success') 
	        	{
	        		jQuery(window.location).attr('href', urlPath + '?/checkout');
	        	}
	        	else 
	        	{
	        		jAlert('<center>' + data.message + '<center>', 'Error!');
	        	}}, 'JSON');
	    }

	    jQuery("#inpContact").keydown(function() {
		jQuery("#error_contact").hide();
		});

		jQuery("#inpHouseNo").keydown(function() {
		jQuery("#error_houseno").hide();
		});

		jQuery("#inpContact").keydown(function() {
		jQuery("#error_contact").hide();
		});

		jQuery("#inpStreet").keydown(function() {
		jQuery("#error_street").hide();
		});

		jQuery("#inpAreaDistrict").keydown(function() {
		jQuery("#error_district").hide();
		});

		jQuery("#optStore").on("click", function () {
		   jQuery("#error_pdstore").hide();
		});

		jQuery("#pdFirstname").keydown(function() {
		jQuery("#error_pdfirstname").hide();
		});

		jQuery("#pdLastname").keydown(function() {
		jQuery("#error_pdlastname").hide();
		});

		jQuery("#pdHouseNo").keydown(function() {
		jQuery("#error_pdhouseno").hide();
		});

		jQuery("#pdStreet").keydown(function() {
		jQuery("#error_pdstreet").hide();
		});

		// jQuery("#pdCity").keydown(function() {
		// jQuery("#error_pdcity").hide();
		// });

		jQuery("#pdContact").keydown(function() {
		jQuery("#error_pdcontact").hide();
		});

		jQuery("#inpDescription").keydown(function() {
		jQuery("#error_description").hide();
		});

		jQuery("#inpFirstname").keydown(function() {
		jQuery("#error_dfirstname").hide();
		});

		jQuery("#inpLastname").keydown(function() {
		jQuery("#error_dlastname").hide();
		});

		jQuery("#inpContact").keydown(function() {
		jQuery("#error_dcontact").hide();
		});

		jQuery("#inpHouseNo").keydown(function() {
		jQuery("#error_dhouseno").hide();
		});

		jQuery("#inpStreet").keydown(function() {
		jQuery("#error_dstreet").hide();
		});

		jQuery("#inpAreaDistrict").keydown(function() {
		jQuery("#error_darea").hide();
		});

		jQuery("#seLCity").keydown(function() {
		jQuery("#error_dcity").hide();
		});




	});
	
	jQuery('#btnPrev').click(function() {
		var host = 'https://' + location.host;
        var urlPath = location.pathname;
        var prev = jQuery('#prevPage').val();
        var next = jQuery('#nextPage').val();
        var crnt = jQuery('#curPage').val();

        jQuery.post(urlPath + '?/previous', { curPage : crnt }, function(data) {
        	if(data.status == 'success') {
	        	jQuery(window.location).attr('href', urlPath + '?/checkout');
	        }
        },'JSON');
	});
	
	jQuery('#btnClearCart').click(function(){
		var host = 'https://' + location.host;
        var urlPath = location.pathname;
		
		jConfirm('Are you sure you want to remove your orders from the cart?', 'Message', function(r) {
			if(r == true) 
			{
				jQuery.post(urlPath + '?/clear-cart/', {}, function() {
					jQuery(window.location).attr('href', urlPath + '?/category'); 
				});
			} 
			else 
			{
				return false;
			}
		});

		return false;
	});

	jQuery("#btnCancelOrder").click(function() {
		var host = 'https://' + location.host;
        var urlPath = location.pathname;
		
		jConfirm('Are you sure you? You will no longer be able to retrieve your orders.', 'Are you sure?', function(r) {
			if(r == true) 
			{
				jQuery(window.location).attr('href', urlPath + '?/cancel-order'); 
			}
			else 
			{
				return false;
			}
		});

		return false;
	});

	jQuery('#btnUpdateCart').click(function() {
		var host = 'https://' + location.host;
        var urlPath = location.pathname;
        var temp_qty = jQuery('#checkqty').val();
        var bID = jQuery('#brand_id').val();
		var cartChecking = jQuery('#checkCartItems').val();

      	if (cartChecking == 0)
      	{
      		swalRedirect();
      	}
      	else
      	{
	        if (bID == 20)
	        {
	        	if(temp_qty >= 2)
	        	{
	        		swalAlert('You have reached the maximum quantity of orders.<br><br> Thank you.', 'Message');
	        	}
	        	else
	        	{
	        		jQuery.post(urlPath + '?/update-cart', jQuery('#cartForm').serialize(), function(data) {
			        	if(data.status == 'ok')
			        	{
			        		window.location.reload();
			        	}
		        	}, 'JSON');
	        	}
	        }
	        else
	        {
		        jQuery.post(urlPath + '?/update-cart', jQuery('#cartForm').serialize(), function(data) {
		        	if(data.status == 'ok')
		        	{
		        		window.location.reload();
		        	}
		        }, 'JSON');
	        	
	        } 
	    }
	});


	jQuery('#btnCheckOutCart').click(function() {
		var host = 'https://' + location.host;
        var urlPath = location.pathname;
      	var cartChecking = jQuery('#checkCartItems').val();
      	var remarks = jQuery('#dMessage').val();
      	var cloud_store = jQuery('#is_cloud').val();
      	var cloud_image = jQuery('#cloud_image').val();
      	var cloud_menu_cat = jQuery('#cloud_menu_cat').val();
      	
      	if (cartChecking == 0)
      	{
      		swalRedirect();
      	}
      	else if(cloud_store == 1)
      	{
      		swalMultiBrand(remarks,cloud_image,cloud_menu_cat);
      	}
      	else
      	{
	   		swalWait();
			jQuery.post(urlPath + '?/confirm', {remarks : remarks}, function(data) {
				if(data.status == 'fail')
				{
					swalMinimumDelivery(data.message, '');
				}
				else
				{
					swalClose();
					if (data.amount > 5000)
					{
						swalAsk('Message','Orders of at least Php 5000 are required to be settled via credit card payment online and still subject to the availability and capacity of a serving store. You will be notified regarding the status of your order.',data.urlRedirect);
					}
					else
					{
						jQuery(window.location).attr('href', urlPath + '?/' + data.urlRedirect); 
					}
					
				}
			}, 'JSON');
      	}
	});

	jQuery('#btnHeaderCheckOutCart').click(function() {
		var host = 'https://' + location.host;
        var urlPath = location.pathname;
        //jQuery(window.location).attr('href', urlPath + '?/cart');
		jQuery.post(urlPath + '?/confirm', {}, function(data) {
			if(data.status == 'fail')
			{
				swalAlert('<center>A minimum order of Php ' + data.amount + ' is required to proceed with the transaction.<center>', 'Warning!');
			}
			else
			{
				jQuery(window.location).attr('href', urlPath + '?/' + data.urlRedirect); 
			}
		}, 'JSON');
	});

	jQuery('#btnContinueCart').click(function() { 
		var cartChecking = jQuery('#checkCartItems').val();
		
      	if (cartChecking == 0)
      	{
      		swalRedirect();
      	}
      	else
      	{
			swalWait();
			var host = 'https://' + location.host;
		   	var urlPath = location.pathname;
		   	jQuery(window.location).attr('href', urlPath + '?/cart');
	   	}
		
	});

	jQuery('#btnProceed').click(function(){
		trans = jQuery("input[name='trans_type']:checked").val(); 
    	order = jQuery("input[name='orderfor']:checked").val();
	    var bID = jQuery("#bID").val();
    	var place = jQuery('.esri-input').val();
    	var placeSearch = jQuery("#placeSearch").val(place);
		var error = false;
    	var orderFor = jQuery("input[name='orderfor']").is(":checked");
    	var transcheck = jQuery("input[name='trans_type']").is(":checked"); 
    	var cDate = jQuery("#currentDateTime").val();
		var nDate = cDate.split(", ");
		var nd = nDate[1].split(" ");
		var dd = parseInt(nd[1]) + 1;
		var cDateTime = nDate[0] + ', ' + nd[0] + ', ' + nDate[2] + ', ' + nDate[3] + ', ' + nDate[4];
		
		var s2Hr = nDate[3];
		var s2Min = nDate[4];

		var d = new Date();
		var localTimeOffset = -480;
		var timeZoneOffset = d.getTimezoneOffset();
		
		var dToday = new Date();
		var getDateToday = dToday.getDate();
	

		if (transcheck)
		{	
			
			if (trans == 'deliveryLater')
			{

				if(place.length == 0)
				{
					error = true;
					jQuery('#error_address').show();
				}
				else
				{

					jQuery('#error_address').hide();
				}

				if (orderFor)
				{	
					jQuery('#error_orderfor').hide();
				}
				else
				{
					error = true;
					jQuery('#error_orderfor').show();
					 document.getElementById("error_orderfor").style.display="inline-block";
				}

				var sDate = jQuery("input[name='deli_date']").val();
				var myDate = new Date(sDate);
				var cYear = myDate.getFullYear();
				var myMonth = myDate.getMonth() + 1;
				var cMonth = ( myMonth < 10 ? "0" : "" ) + myMonth;
				var cDay = myDate.getDate();
				var newDate = cYear + '-' + cMonth + '-' + cDay;
				var yy = sDate.split(", ");
				var dd = yy[1].split(" ");
				var mo = month(dd[0]);
				var sHr  = parseInt(jQuery("#dHour").val());
				var sMin = jQuery("#dMin").val();
				var ampm = jQuery("#ampm").val();
				var sHours;

				if(ampm == 'PM' && sHr == 12)
				{
					sHours = sHr;
				}
				else if(ampm == 'PM' && sHr < 12)
				{
					sHours = sHr + 12;
				}
				else 
				{
					sHours = sHr;
				}

				var d1 = new Date(nDate[0], month(nDate[1]), nDate[2], nDate[3], nDate[4]);
				var d2 = new Date(yy[2], mo, dd[1], sHours, sMin); 
				var diff = d2.valueOf() - d1.valueOf();
				var diffInHours = diff/1000/60/60;

				if (bID == 1 || bID == 4 || bID == 5 || bID == 6 || bID == 9 )
				{
					if(diff <= 3600000)
					{
						error = true;
						swalAlert('Invalid Delivery Time.<br/>Delivery time is 2 hours advance from the current time.', 'Message');
					}
					else 
					{
						
					}
				       
		        }
		        else if (bID == 2)
		        {

					if(diff <= 5400000)
					{
						error = true;
						swalAlert('Invalid Delivery Time.<br>The selected time must be at least 1 and 1/2 hour from the current time', 'Message');
					}
					// else if(getDateToday === cDay)
					// {
					// 	error = true;
					// 	swalAlert('Invalid Delivery Date.<br/>Delivery date is 1 day advance from the current date', 'Message');
					// }
					else 
					{
						
					}
					
		        }
				else
				{
					// if(sHours < 1 || sHours > 23) 
					// {
					// 	swalAlert('Invalid Delivery Time.<br/>Delivery is available 10AM to 8PM.', 'Message');
					// 	error = true;
					// } 
					// if(sHours < 7 || sHours > 19) 
					// {
					// 	swalAlert('Invalid Delivery Time.<br/>Delivery is available 7AM to 7PM.', 'Message');
					// 	error = true;
					// }
					// else
					// {

					// } 
					if(diff <= 5400000)
					{
						swalAlert('Invalid Delivery Time.<br/>The selected delivery time must be at least 1 and 1/2 hour from the current time.', 'Message');
						error = true;
					}
					else
					{
						
					}

					// else if(getDateToday === cDay)
					// {
					// 	error = true;
					// 	swalAlert('Invalid Delivery Date.<br/>Delivery date is 1 day advance from the current date', 'Message');
					// }
				}
			}
			else if(trans == 'deliveryNow')
			{
				if(place.length == 0)
				{
					error = true;
					jQuery('#error_address').show();
				}
				else
				{

					jQuery('#error_address').hide();
				}

				if (orderFor)
				{	
					jQuery('#error_orderfor').hide();
				}
				else
				{
					error = true;
					jQuery('#error_orderfor').show();
					 document.getElementById("error_orderfor").style.display="inline-block";

				}
			}
			else
			{
				var sDate = jQuery("input[name='date_pickdine']").val();
				var yy = sDate.split(", ");
				var dd = yy[1].split(" ");
				var mo = month(dd[0]);
				var sHr  = parseInt(jQuery("#pHour").val());
				var sMin = jQuery("#pMin").val();
				var ampm = jQuery("#dampm").val();
				var sHours;
				var myDate = new Date(sDate);
				var cDay = myDate.getDate();

					if(ampm == 'PM' && sHr == 12)
					{
						sHours = sHr;
					}
					else if(ampm == 'PM' && sHr < 12)
					{
						sHours = sHr + 12;
					}
					else 
					{
						sHours = sHr;
					}

					var d1 = new Date(nDate[0], month(nDate[1]), nDate[2], nDate[3], nDate[4]);
					var d2 = new Date(yy[2], mo, dd[1], sHours, sMin); 
					var diff = d2.valueOf() - d1.valueOf();
					var diffInHours = diff/1000/60/60;
				
				var storereg  = jQuery('#optStore').val();
				var storecurb = jQuery('#optStoreCurbside').val();

	        	// if(storereg.length == 0)
		        // {
		        // 	error = true;
		        // 	jQuery('#error_pdstore').show();
		        // }
		        // else
		        // {
		        	
		        // 	jQuery('#error_pdstore').hide();
		        // }

		        if (bID == 4 || bID == 9)
		        {

		   			if(diff <= 5400000)
					{
						error = true;
						swalAlert('Invalid Pick - Up Time.<br/>The selected pick-up time must be at least 1 and 1/2 hours from the current time.', 'Message');
						
					}
					else 
					{
						
					}

		        }
		        else if(bID == 2)
		        {
		        	if(diff <= 5400000)
					{
						error = true;
						swalAlert('Invalid Pick - Up Time.<br/>Pick-up time willl be a miminum of 1 hour after order has been placed, between 10:00am to 4:00pm.', 'Message');
						
					}
					else 
					{
						
					}
		        } 
		        else
		        {

		        	if(diff <= 5400000)
					{
						error = true;
						swalAlert('Invalid Pick - Up Time.<br/>The selected pick-up time must be at least 1 and 1/2 hours from the current time.', 'Message');
						
					}
					else 
					{
						
					}
		        }
			}//pickup
			jQuery('#error_transtype').hide();
		}
		else
		{
			error = true;
			jQuery('#error_transtype').show();
			document.getElementById("error_transtype").style.display="inline-block";
		}
		
		if(error == false)
        {	
        	var urlPath = location.pathname;
			jQuery.post(urlPath + '?/delivery', jQuery('#deliveryForm').serialize(), function(data){	
        	if(data.status == 'success') 
        	{
        		if (data.message == ''){
        			jQuery(window.location).attr('href', urlPath + '?/' + data.params);
        		}
        		else
        		{
        			jConfirm(data.message,'Message', function(r) {
						if(r == true) 
						{
        					jQuery(window.location).attr('href', urlPath + '?/' + data.params); 
						} 
					}); 
        		}
        	}
        	else 
        	{
        		swalAlert(data.message, 'Alert!');
        	}}, 'JSON');
	    }

		jQuery("input:radio[name='orderfor']").keydown(function() {
			jQuery("#error_orderfor").hide();
		});

		jQuery("input:radio[name='trans_type']").keydown(function() {
			jQuery("#error_transtype").hide();
		});


		jQuery(".esri-input").keydown(function() {
			jQuery("#error_address").hide();
		});


	});

});

function isMobile(num)
{
	var phoneRegex = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
  	return phoneRegex.test(num);	
}

function optChange(prod_id, opt_id, tp) 
{
	var opids = jQuery("#opIds_"+prod_id).val().split(',');
	var qty = jQuery("#qty").val();
	var c = '';
	var t = 0;
	
	jQuery.each(opids, function(key, value) {
		var data = jQuery("#option_"+prod_id+"_"+value).val();
		var p = data.split('-');
		var ids = value + ':' + p[0] + ',';
		t += parseFloat(p[1]);
		c += ids;
	});
	
	var param = c;
	var price = t + parseFloat(tp);
	var total_price = parseFloat(price) * qty;
	jQuery("#productPrice").html(total_price.toFixed(2));
	jQuery("#hProductPrice").val(price.toFixed(2));
	jQuery("#productTotalPrice").val(total_price.toFixed(2));
	jQuery("#opids_"+prod_id).val(param);
}

function qtyChangeAdd(bID,cQty)
{

	if(bID == 20)
	{
		if (cQty > 2)
		{
			jAlert('You have reached the maximum quantity of orders.<br><br> Thank you.', 'Message');

		}
		else
		{
			if (cQty == '')
			{
				var price = jQuery("#hProductPrice").val();
				var result = document.getElementById('qty'); 
				var qty = result.value;
				if (qty >= 2)
				{
					jAlert('You have reached the maximum quantity of orders.<br><br> Thank you.', 'Message');
					return false;
				}
				else
				{
					if( !isNaN( qty )) result.value++;
					var total =  result.value * parseFloat(price);
					jQuery("#productPrice").html(total.toFixed(2));
					jQuery("#productTotalPrice").val(total.toFixed(2));
					return false;
				}
			}
			else
			{
				var price = jQuery("#hProductPrice").val();
				var result = document.getElementById('qty'); 
				var qty = result.value;
				var totalQty = parseInt(qty) + parseInt(cQty);
				
				if (totalQty >= 2)
				{
					jAlert('You have reached the maximum quantity of orders.<br><br> Thank you.', 'Message');
					return false;
				}
				else
				{
					if( !isNaN( qty )) result.value++;
					var total =  result.value * parseFloat(price);
					jQuery("#productPrice").html(total.toFixed(2));
					jQuery("#productTotalPrice").val(total.toFixed(2));
					return false;
				}
			}
		}
	}else{

		var price = jQuery("#hProductPrice").val();
		var result = document.getElementById('qty'); 
		var qty = result.value; 
		if( !isNaN( qty )) result.value++;


		var total =  result.value * parseFloat(price);
		jQuery("#productPrice").html(total.toFixed(2));
		jQuery("#productTotalPrice").val(total.toFixed(2));

		return false;
	}
}

function qtyChangeDeduct()
{
	var price = jQuery("#hProductPrice").val();
	var totalProductPrice = jQuery("#productTotalPrice").val();
	var result = document.getElementById('qty'); 
	var qty = result.value; 
	if( !isNaN( qty ) && qty > 1) result.value--;

	var total = result.value * parseFloat(price);
	var deducted_price = parseFloat(total) - parseFloat(totalProductPrice);
	jQuery("#productPrice").html(total.toFixed(2));
	jQuery("#productTotalPrice").val(deducted_price.toFixed(2));
	return false;
}

function addToCart(uri, prod_id, urlPath, bid, btn, qnty) 
{	
	var options = jQuery("#opids_"+prod_id).val();
	var cQty = jQuery("#cQty").val();
	var name = 'qty_' + prod_id;
	var qty = jQuery("input[name='"+name+"']").val();
	var remarks = ""; 
	var vC = jQuery("#voucherCodeProduct").val();
	var quantity = jQuery(qnty).val();

	if (bid == 20)
	{
		if(cQty >= 2)
    	{
    		swalAlert('You have reached the maximum quantity of orders.<br><br> Thank you.', 'Message');
    	}
    	else
    	{

			swalWait();
			$.ajax({
				type: "POST",
				dataType: "json",
				data: {pid : prod_id, opt : options, q : quantity, r : remarks, brand : bid , voucher : vC},
		     	url: '?/add-to-cart',
				success: function(){
					swalCart('Item Added to Cart',uri);
				}
			});

    	}
	}else{
		
		swalWait();
		$.ajax({
			type: "POST",
			dataType: "json",
			data: {pid : prod_id, opt : options, q : quantity, r : remarks, brand : bid , voucher : vC},
	     	url: '?/add-to-cart',
			success: function(){
				swalCart('Item Added to Cart',uri);
			}
		});
	}
	

}

function reorderAddToCart(rnum, urlPath, bid, isorderd) 
{	
	jQuery.post(urlPath + "?/reorder", { cid : rnum }, function(data) {
			if(data.status == "ok") {
				jQuery(window.location).attr('href', urlPath + '?/category/');  
			} 
		}, 'JSON');
}

function deleteItemsOnTray(prod_id, qty, bid, uri, action, urlPath, comboCode)
{
	var opt_id = comboCode;

	var qt = '-'+ qty;
	var remarks = "";
	
	jConfirm('You will not recover this item once deleted.', 'Are you sure?', function(r) {
		if(r == true) 
		{
			jQuery.post(urlPath + "?/add-to-cart", { pid : prod_id, opt : opt_id, q : qt, r : remarks, brand : bid }, function(data) {
				if(data.status == "ok") 
				{
					jQuery(window.location).attr('href', urlPath + '?/'+ action +'/'+ uri); 
				} 
			}, 'JSON'); 
		} 
		else 
		{
			return false;
		}
	}); 
}

function qtyCartAdd(bID,cQty,pID,iID,ccD)
{
	swalWait();
	var order_id 		= jQuery('#order_id').val();
	var trans_id 		= jQuery("#tid").val();
	var pricelist_id 	= jQuery("#plid").val();
	var action 			= jQuery("#action").val();
	var param 			= jQuery("#param").val();

	// if(bID == 2)
	// {
	// 	if (cQty > 2)
	// 	{
	// 		jAlert('You have reached the maximum quantity of orders.<br><br> Thank you.', 'Message');

	// 	}
	// 	else
	// 	{
	// 		if (cQty == '')
	// 		{
	// 			var price = jQuery("#hProductPrice_"+pID).val();
	// 			var result = document.getElementById('qty_'+pID); 
	// 			var qty = result.value;
	// 			if (qty >= 2)
	// 			{
	// 				jAlert('You have reached the maximum quantity of orders.<br><br> Thank you.', 'Message');
	// 				return false;
	// 			}
	// 			else
	// 			{
	// 				if( !isNaN( qty )) result.value++;
	// 				var total =  result.value * parseFloat(price);
	// 				jQuery("#"+pID).html(total.toFixed(2));
	// 				jQuery("#productTotalPrice_"+pID).val(total.toFixed(2));

	// 				$.ajax({
	// 					type: "POST",
	// 					dataType: "JSON",
	// 					data: {order_id : order_id, pid : pID, action : action, param : param, tid : trans_id , plid : pricelist_id, ['qty_'+pID] : result.value  },
	// 			     	url: '?/update-cart',
	// 					success: function(){
	// 						swalDelivery();
	// 					}
	// 				});

	// 				return false;
	// 			}
	// 		}
	// 		else
	// 		{
	// 			var price = jQuery("#hProductPrice_"+pID).val();
	// 			var result = document.getElementById('qty_'+pID); 
	// 			var qty = result.value;
	// 			var totalQty = parseInt(qty) + parseInt(cQty);
				
	// 			if (totalQty >= 2)
	// 			{
	// 				jAlert('You have reached the maximum quantity of orders.<br><br> Thank you.', 'Message');
	// 				return false;
	// 			}
	// 			else
	// 			{
	// 				if( !isNaN( qty )) result.value++;
	// 				var total =  result.value * parseFloat(price);
	// 				jQuery("#"+pID).html(total.toFixed(2));
	// 				jQuery("#productTotalPrice_"+pID).val(total.toFixed(2));

	// 				$.ajax({
	// 					type: "POST",
	// 					dataType: "json",
	// 					data: {order_id : order_id, pid : pID, action : action, param : param, tid : trans_id , plid : pricelist_id, ['qty_'+pID] : result.value},
	// 			     	url: '?/update-cart',
	// 					success: function(){
	// 						swalDelivery();
	// 					}
	// 				});

	// 				return false;
	// 			}
	// 		}
	// 	}
	// }else{
		var price = jQuery("#hProductPrice_"+pID+'_'+iID).val();
		var result = jQuery('#qty_'+pID+'_'+iID).val();
		
		var qty = result; 
		if( !isNaN( qty )) result++;

		var total =  result * parseFloat(price);
		jQuery("#productPrice_"+pID+'_'+iID).html(total.toFixed(2));
		jQuery("#productTotalPrice_"+pID+'_'+iID).val(total.toFixed(2));
		jQuery('#qty_'+pID+'_'+iID).val(result);

		$.ajax({
			type: "POST",
			dataType: "json",
			data: {order_id : order_id, pid : pID, action : action, param : param, tid : trans_id , plid : pricelist_id, ['qty_'+pID] : result, itemID : iID, combocode : ccD },
	     	url: '?/update-cart',
			success: function(){
				swalDelivery();
				// location.reload();
			}
		});

		return false;

	//}

}

function qtyCartDeduct(pID,iID, ccD)
{
	swalWait();
	var order_id 		= jQuery('#order_id').val();
	var trans_id 		= jQuery("#tid").val();
	var pricelist_id 	= jQuery("#plid").val();
	var action 			= jQuery("#action").val();
	var param 			= jQuery("#param").val();

	var price = jQuery("#hProductPrice_"+pID+'_'+iID).val();
	var totalProductPrice = jQuery("#productTotalPrice_"+pID+'_'+iID).val();
	var result = jQuery('#qty_'+pID+'_'+iID).val();
	var qty = result; 
	if( !isNaN( qty ) && qty > 1) result--;

	var total = result * parseFloat(price);
	var deducted_price = parseFloat(total) - parseFloat(totalProductPrice);
	jQuery("#productPrice_"+pID+'_'+iID).html(total.toFixed(2));
	jQuery("#productTotalPrice_"+pID+'_'+iID).val(deducted_price.toFixed(2));
	jQuery('#qty_'+pID+'_'+iID).val(result);

	$.ajax({
		type: "POST",
		dataType: "json",
		data: {order_id : order_id, pid : pID, action : action, param : param, tid : trans_id , plid : pricelist_id, ['qty_'+pID] : result, itemID : iID, combocode : ccD },
     	url: '?/update-cart',
		success: function(){
			swalDelivery();
			// location.reload();

		}
	});

	return false;
}

function popMessage() {
	var messageError = 'You are not allowed to order multiple brands at once. Please clear your cart before leaving this page. Thank you.';
	jAlert('<center>' + messageError + '</center>', 'Warning!');
							
	return false;
}

function deleteCard(cardDetails)
{
  var host = 'https://' + location.host;
  var urlPath = location.pathname;
  var ccD = cardDetails.split("-");
  var ccNumber = ccD[0];
  var ccName = ccD[1];
  
  jConfirm('You will not recover this card once deleted '+ '<br>(' + ccNumber + ' ' + ccName +').', 'Are you sure?', function(r) {
	if(r == true) 
	{
	     jQuery.post(urlPath + "?/delete-card", { accountId : ccD[2]}, function(data) {
	        if(data.status == "ok") 
	        {
	            jQuery(window.location).attr('href', urlPath + '?/checkout');
	        } 
	    }, 'JSON'); 
	} 
	else 
	{
	      return false;
	}
  }); 
}

function changeT() {
  	var host = 'https://' + location.host;
   	var urlPath = location.pathname;
  
  	jConfirm('Your cart will be emptied once you click "OK", since the product price and availability will depend on the given delivery address', 'Are you sure?', function(r) {
		if(r == true) 
		{
			jQuery.post(urlPath + '?/changetranstype/', {}, function() {
				jQuery(window.location).attr('href', urlPath + '?'); 
			});
		} 
	});

}




