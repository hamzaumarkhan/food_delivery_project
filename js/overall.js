jQuery(document).ready(function() {
    "use strict";

    jQuery('.colorbox').colorbox({
        overlayClose: true,
        opacity: 1
    }); 

    /** REDIRECT TO REGISTRATION PAGE **/
    jQuery('#registerBtn').click(function() {
    	var host = 'https://' + location.host;
        var urlPath = location.pathname;


        jQuery(window.location).attr('href', urlPath + '?/register');
    });

    jQuery('#btnGuestReg').click(function() {
        var host = 'https://' + location.host;
        var urlPath = location.pathname;


        jQuery(window.location).attr('href', urlPath + '?/guest');
    });

   jQuery('#btnLogin').click(function(){

        var host = 'https://' + location.host;
        var urlPath = location.pathname;
        jQuery(window.location).attr('href', urlPath + '?/login');
    });
    /** SEARCH **/
    //  jQuery('#btnSearch').click(function(evt) {
    //     evt.preventDefault();
    //     var error = false;
    //     var host = 'https://' + location.host;
    //     var urlPath = location.pathname;
    //     var searchKey = jQuery('#searchKey').val();
        
    //         jQuery.post(urlPath + '?/search', jQuery('#formSearch').serialize(), function(data) {
    //             jAlert('<center>' + data.message + '</center>', 'Message', function() {
    //                 jQuery(window.location).attr('href', urlPath + '?/search');
    //             });
    //         }, 'JSON');
        
    // });
        

    /** CUSTOMER CHANGE PASSWORD **/
    jQuery('#btnChangePass').click(function(evt) {
        evt.preventDefault();
        var error = false;
        var host = 'https://' + location.host;
        var urlPath = location.pathname;
        var customerID = jQuery('#customerID').val();
        var pass   = jQuery('#inpPassword').val();
        var repass = jQuery('#inpRePassword').val();

        if(pass.length == 0) 
        {
            var error = true;
            jQuery("#error_user_pass").show();
        } 
        else if(repass != pass) 
        {
            var error = true;
            jQuery("#error_user_repass").show();
        }

        if(error == false)
        {
            jQuery.post(urlPath + '?/change-pass', jQuery('#changePassForm').serialize(), function(data) {
                jAlert('<center>' + data.message + '</center>', 'Message', function() {
                    jQuery(window.location).attr('href', urlPath + '?/login');
                });
            }, 'JSON');
        }
    });


    jQuery('#send2').click(function(evt) {
        evt.preventDefault();
        var error   = false;
        var host    = 'https://' + location.host;
        var urlPath = location.pathname;
        var pass    = jQuery('#email').val();
        var user    = jQuery('#inpRePassword').val();

        if(pass.length == 0) 
        {
            var error = true;
            jQuery("#error_login").show();
        } 
        if(user) 
        {
            var error = true;
            jQuery("#error_login").show();
        }

        if(error == false)
        {
            jQuery("#login-form").submit();
        }
    });

    jQuery("#login").click(function() {
        jQuery("#loginForm").show();
        jQuery("#lostPasswordForm").hide();
        $('#emptyEmail').hide();
        jQuery("#lost_email").val("");
    });

    jQuery("#lost_pass").click(function() {
        jQuery("#loginForm").hide();
        jQuery("#lostPasswordForm").show();
        $('#emptyEmail').hide();
        jQuery("#lost_email").val("");
    });

    jQuery("#btnSend").click(function(evt) {
        evt.preventDefault();
        var error = false;
        var host = 'https://' + location.host;
        var urlPath = location.pathname;
        var email = jQuery("#lost_email").val();

        if(error == false) {
            jQuery.post(urlPath + "?/lostpass",  { evt : email } ,function(data) {
                if(data.status == 'sent') 
                {
                    jQuery("#lost_email").val("");
                    $('#emptyEmail').show();
                    $('#emptyEmail').html(data.message);
                } 
                else 
                {
                    jQuery("#lost_email").val("");
                    $('#emptyEmail').show();
                    $('#emptyEmail').html(data.message);
                }
            }, 'JSON'); 
        }
    });

    jQuery("#selCountry").change(function() {
        var cntry = jQuery(this).val();

        if(cntry == 'PH') {
            jQuery("#phProvince").show(); 
            jQuery("#otherCountryProvince").hide();
            jQuery("#selCity").show();  
            jQuery("#inpOtherCity").hide();
            jQuery("#postalOption").show();
            jQuery("#uStatesOption").hide();
            jQuery("#mobileLable").show();
            jQuery("#mobileLablePlus").hide();
        }
        else if(cntry == 'US') {
            jQuery("#selCity").hide();
            jQuery("#phProvince").hide();   
            jQuery("#inpOtherCity").show();
            jQuery("#otherCountryProvince").hide();
            jQuery("#uStatesOption").show();
            jQuery("#postalOption").hide();
            jQuery("#mobileLable").hide();
            jQuery("#mobileLablePlus").show();
        }
        else {
            jQuery("#selCity").hide();
            jQuery("#inpOtherCity").show();
            jQuery("#phProvince").hide(); 
            jQuery("#otherCountryProvince").show();
            jQuery("#uStatesOption").hide();
            jQuery("#postalOption").hide();
            jQuery("#mobileLable").hide();
            jQuery("#mobileLablePlus").show();
        }   

    });

 });


function redirectLink(param)
{
    var host = 'https://' + location.host;
    jQuery(window.location).attr('href', host + '?/product/' + param);
}


 
