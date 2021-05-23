jQuery(document).ready(function() {
    "use strict";

    /** REGISTER NEW CUSTOMER **/
    jQuery('#btnRegister').click(function(evt) {
        evt.preventDefault();
        var error       = false;
        var host        = 'https://' + location.host;
        var urlPath     = location.pathname;
        var guest       = jQuery('#guest').val();
        var firstname   = jQuery('#inpFirstname').val();
        var lastname    = jQuery('#inpLastname').val();
        var mobile      = jQuery('#inpContactNo').val();
        var email       = jQuery('#inpEmail').val();
        var captcha     = jQuery('#inpCaptcha').val();
        var recaptcha   = jQuery('#inpReCaptcha').val();
        var country     = jQuery('#selCountry option:selected').val();
        var houseno     = jQuery('#inpHouseNo').val();
        var district    = jQuery('#inpAreaDistrict').val();
        var province    = jQuery('#selProvince option:selected').val();
        var city        = jQuery('#selCity option:selected').val();
        var password    = jQuery('#inpPassword').val();
        var repass      = jQuery('#inpRePassword').val();
        var otherCity   = jQuery("#inpOtherCity").val();
        var otherProv   = jQuery("#inpOtherProvince").val();
        var sameas      = jQuery('[name="samedel"]').is(':checked');
        var isRetrieve  = jQuery('#retrieve').val();

  
        if(firstname.length == 0)
        {
            error = true;
            jQuery('#error_firstname').show();
        }
        else
        {
            jQuery('#error_firstname').hide();
        }

        if(lastname.length == 0)
        {
            error = true;
            jQuery('#error_lastname').show();
        }
        else
        {
            jQuery('#error_lastname').hide();
        }
        if(!isEmail(email))
        {
            error = true;
            jQuery('#error_email').show();
        }
        else
        {
            
            jQuery('#error_email').hide();
        }
        if(mobile.length < 9 || mobile.length == 0)
        {
            error = true;
            jQuery('#error_contact').show();
        }
        else
        {
            jQuery('#error_contact').hide();
        }
        if(recaptcha.length == 0)
        {
            error = true;
            jQuery('#error_captcha').show();
            document.getElementById("error_captcha").style.display="inline-block";
        }
        else if(recaptcha != captcha)
        {
            error = true; 
            jQuery('#error_captcha').show();
            jQuery('#error_captcha').text("Captcha does not match (Captcha case sensitive)");
            document.getElementById("error_captcha").style.display="inline-block";
        }
        else
        {
            jQuery('#error_captcha').hide();
        }

        if(!jQuery("input[name='chkTerms']").is(':checked')) 
        {
            error = true;
            document.getElementById("error_terms").style.display="flex";
            jQuery('#error_terms').show();
        }
        else
        {
            
            jQuery('#error_terms').hide();
        }
        
       
        if(guest != 'yes')
        {
            var dobM        = jQuery('#month option:selected').val();
            var dobD        = jQuery('#day option:selected').val();

            if (dobM.length == 0 && dobD.length == 0) 
            {
                error = true;
                jQuery('#error_dob').show();
            }
            else
            {
                jQuery('#error_dob').hide();
            }

            if(password.length == 0)
            {
                error = true;
                jQuery('#error_password').show();
            }
            else if(password != repass)
            {
                error = true;
                jQuery('#error_repass').show();
            }
            else
            {
                
                jQuery('#error_password').hide();
                jQuery('#error_repass').hide();
            }

            if(houseno.length == 0)
            {
                error = true;
                jQuery('#error_houseno').show();
            }
            else
            {
                
                jQuery('#error_houseno').hide();
            }

            if(district.length == 0)
            {
                error = true;
                jQuery('#error_district').show();
            }
            else
            {
                
                jQuery('#error_district').hide();
            }

            if(country != 'PH')
            {
                if(otherCity.length == 0)
                {
                    error = true;
                    jQuery('#error_othercity').show();
                }
                else
                {
                    
                    jQuery('#error_othercity').hide();
                }
            }
            else
            {   
                if (sameas == false)
                {
                    if(isRetrieve == 'no')
                    {
                        if (province.length == 0) 
                        {
                            error = true;
                            jQuery('#error_province').show();
                        }
                        else
                        {
                            jQuery('#error_province').hide();
                        }

                        if (city.length == 0) 
                        {
                            error = true;
                            jQuery('#error_city').show();
                        }
                        else
                        {
                            jQuery('#error_city').hide();
                        }
                    }
                    else
                    {
                        if(otherProv.length == 0)
                        {
                            error = true;
                            jQuery('#error_province').show();
                        }
                        else
                        {
                            jQuery('#error_province').hide();

                        }
                        if(otherCity.length == 0)
                        {
                            error = true;
                            jQuery('#error_city').show();
                        }
                        else
                        {
                            jQuery('#error_city').hide();

                        }
                    }
                }
                else
                { 
                    if(otherProv.length == 0)
                    {
                        error = true;
                        jQuery('#error_province').show();
                    }
                    else
                    {
                        jQuery('#error_province').hide();

                    }
                    if(otherCity.length == 0)
                    {
                        error = true;
                        jQuery('#error_city').show();
                    }
                    else
                    {
                        jQuery('#error_city').hide();

                    }

                }
            }

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
            

            jQuery.post(urlPath + '?/create', jQuery('#customerRegistrationForm').serialize(), function(data) {
                if(data.status == 'success')
                {
                    jQuery('#btnRegister').attr({'disabled' : 'true'});
                    jQuery('#btnReset').attr({'disabled' : 'true'});
                    jAlert('<center>' + data.message + '</center>', 'Message', function() {
                        jQuery(window.location).attr('href', urlPath + '?/' + data.params);
                    });
                }
                else
                {
                    jAlert('<center>' + data.message + '</center>', 'Message', function() {
                    });
                }
            }, 'JSON');
        }
    });

    
    jQuery("#inpFirstname").keydown(function() {
        jQuery("#error_firstname").hide();
    });
    
    jQuery("#inpLastname").keydown(function() {
        jQuery("#error_lastname").hide();
    });

    jQuery("#inpContactNo").keydown(function() {
        jQuery("#error_contact").hide();
    });

    
    jQuery("#selGender").change(function() {
        jQuery("#error_gender").hide();
    });

    jQuery("#otherCity").keydown(function() {
     jQuery("#error_city").hide();
    });
    
    jQuery("#otherProv").keydown(function() {
        jQuery("#error_province").hide();
    });
    
    jQuery("#inpHouseNo").keydown(function() {
        jQuery("#error_houseno").hide();
    });
    
    jQuery("#inpStreet").keydown(function() {
        jQuery("#error_street").hide();
    });
    
    jQuery("#inpAreaDistrict").keydown(function() {
        jQuery("#error_district").hide();
    });
    
    jQuery("#inpOtherCity").keydown(function() {
        jQuery("#error_othercity").hide();
    });
    
    jQuery("#inpEmail").keydown(function() {
        jQuery("#error_email").hide();
    });
    
    jQuery("#inpPassword").keydown(function() {
        jQuery("#error_password").hide();
    });
    
    jQuery("#inpRePassword").keydown(function() {
        jQuery("#error_repass").hide();
    });
    jQuery("#inpReCaptcha").keydown(function() {
        jQuery("#error_captcha").hide();
    });

    jQuery("#chkTerms").click(function() {
        if(jQuery("#chkTerms").attr("checked", true)) {
            jQuery("#error_terms").hide();
        }
    });


    jQuery('#selProvince').change(function() {
        var urlPath ='https://' + location.host + location.pathname;
        var province = jQuery(this).val();
        var item = province.split("-");

        jQuery.post(urlPath + "?/get-city", { id : item[0] }, function(data){
            jQuery('#selCity').html(data);
        }, 'JSON');

    });


        /** EDIT PROFILE SECTION **/
    jQuery('#btnUpdate').click(function() {

        var host = 'https://' + location.host;
        var urlPath = location.pathname;
        var cID = jQuery('#cID').val();
        var error = false;
        //var dateOB = jQuery('#inpDOB').val();
        var mobileNo = jQuery('#inpContact').val();
        var cOuntry = jQuery('#selCountry').val();
       
        var streetS = jQuery('#inpStreet').val();
        var area = jQuery('#inpAreaDistrict').val();
        var city = jQuery('#selCity_change').val();
        var ocity = jQuery('#inpOtherCity').val();
        var city_region = jQuery('#selCity').val();
        var province = jQuery('#ph_province').val();
        var oprovice = jQuery('#otherProvince').val();
        // if(ValidateDOB(dateOB))
        // {
        //     jQuery('#error_dob').hide();
        // }
        // else
        // {
        //     error = true;
        //     jQuery('#error_dob').show();
        // }
        if(cOuntry == 'PH')
        {

            if(province.length == 0)
            {
                error = true;
                jQuery('#error_provice').show();
            }
            else
            {
                jQuery('#error_provice').hide();
            }
        }
        else
        {
            if(ocity.length == 0)
            {
                error = true;
                jQuery('#error_inpOtherCity').show();
            }
            else
            {
                jQuery('#error_inpOtherCity').hide();
            }


            if(oprovice.length == 0)
            {
                error = true;
                jQuery('#error_inpOtherProvice').show();
            }
            else
            {
                jQuery('#error_inpOtherProvice').hide();
            }

        }

        if(mobileNo.length < 9 || mobileNo.length == 0)
        {
            error = true;
            jQuery('#error_cNum').show();
        }
        else
        {
            jQuery('#error_cNum').hide();
        }
        
        if(streetS.length == 0)
        {
            error = true;
            jQuery('#error_street').show();
        }
        else
        {
            jQuery('#error_street').hide();
        }
         if(area.length == 0)
        {
            error = true;
            jQuery('#error_District').show();
        }
        else
        {
            jQuery('#error_District').hide();
        }

    if(error == false)
        {   
            jQuery.post(urlPath + '?/update', jQuery('#detailsForm').serialize(), function(data) {
                jAlert('<center>' + data.message + '</center>', 'Message', function() {
                    jQuery(window.location).attr('href', urlPath + '?/profile/' + data.params);
                });
            }, 'JSON');
        }

    });


    jQuery("#inpHouseNo").keydown(function() {
        jQuery("#error_houseNo").hide();
    });
    
    jQuery("#inpAreaDistrict").keydown(function() {
        jQuery("#error_District").hide();
    });
    
    jQuery("#inpOtherCity").change(function() {
        jQuery("#error_inpOtherCity").hide();
    });

});



function ValidateDOB(dtValue)
{
    var dtRegex = new RegExp(/\b\d{1,2}[\/-]\d{1,2}[\/-]\d{4}\b/);
    return dtRegex.test(dtValue);
}

function isEmail(email) 
{
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function isMobile(num)
{
    var phoneRegex = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    return phoneRegex.test(num);    
}

