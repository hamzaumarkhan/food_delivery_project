
  $('.swalWait').on('click', function(){
    swalWait();
  })

  function swalClose(){
    swal.close();
  }

  function swalBox(title, text, type){
    swal({
      title: title,
      text: text,
      type: type,
      confirmButtonText: 'Ok',
      allowOutsideClick: false
    })
  }

  function swalWait(){
  	swal({
      	title : 'Please wait...',
        	allowOutsideClick : false,
        	onOpen: () => {
           	swal.showLoading()
        	}
      });
  }

  function swalDelivery(){
    swal({
        title : 'Item updated successfully!',
        type: 'success',
        allowOutsideClick : false,
        timer: 1500
      });
  }

  function swalRedirect() {
    swal({
        title: 'Alert!',
        text: 'Your cart is empty.',
        type: 'warning',
        confirmButtonText: 'Okay',
          customClass: 'sweetalert-lg',
          allowOutsideClick: false
      }).then((result) => {
        if(result.value){
          swalWait();
          window.location.href = '?/category';
        }
    })
  }

  function swalChange(){
    swal({
      title: 'Are you sure?',
      text: "Changing this may delete the current cut off details!",
      type: 'warning',
      confirmButtonText: 'Yes',
      confirmButtonColor: '#d33',
      customClass: 'sweetalert-md',
      showCancelButton: true,          
      allowOutsideClick: false
    })
  }

  function swalCart(title,uri){
    swal({
        title: title,
        type: 'success',
        confirmButtonText: 'Checkout',
        confirmButtonColor: '#df4c43',
        customClass: 'sweetalert-lg',
        showCancelButton: true, 
        cancelButtonText: 'Continue Order',         
        cancelButtonColor: '#126736',
        allowOutsideClick: false
      }).then((result) => {

        if(result.value){

          swalWait();

          window.location.href = '?/cart'
        }else{
          swalWait();

          window.location.href = '?/category/'+uri
        }
    })

    $('.popup1').hide();
    $('.fade').hide();
  }

  function swalAsk(title, text, redirect) {
    swal({
        title: title,
        text: text,
        type: 'warning',
        confirmButtonText: 'Yes',
          customClass: 'sweetalert-lg',
          showCancelButton: true,          
          allowOutsideClick: false
      }).then((result) => {
        if(result.value){

          swalWait();

          window.location.href = '?/'+redirect;
        }
    })
  }

  
  function swalSubmitText(title, text, form){
    swal({
        title: title,
        text: text,
        type: 'warning',
        confirmButtonText: 'Yes',
          customClass: 'sweetalert-lg',
          showCancelButton: true,          
          allowOutsideClick: false
      }).then((result) => {
        if(result.value){

          swalWait();

          form.submit();
        }
    })
  }

  function swalSubmit(form){
    swal({
        title: 'Feeling excited?',
        text: 'You can now track your order from our store to your doorstep.',
        confirmButtonText: 'TRACK ORDER',   
        allowOutsideClick: true
      }).then((result) => {
        if(result.value){

          swalWait();

          form.submit();
        }
    })
  }

  function swalAlert(text,title){
    swal({ 
        title : title,
        html : text,
        allowOutsideClick : true
      });
  }

  function swalMinimumDelivery(text,title){
    swal({ 
        title : title,
        html : text,
        type: 'warning',
        allowOutsideClick : true
      }).then((result) => {

        if(result.value){

          swalWait();

          window.location.href = '?/category'
        }
    });
  }

  function swalMultiBrand(remarks,image,cloudCategory){
    var base_url = window.location.origin;
    var host = 'https://' + location.host;
    var urlPath = location.pathname;

    swal({
        text: 'Would you like to order from other available brands in your area?',
        imageUrl : 'https://mgi-deliveryportal.s3.amazonaws.com/assets/'+image+'',
        imageSize : '180x180',
        confirmButtonText: 'View Menu',
        confirmButtonColor: '#df4c43',
        showCancelButton: true, 
        cancelButtonText: 'Proceed to checkout',         
        cancelButtonColor: '#126736',
        allowOutsideClick: false
      }).then((result) => {

        if(result.value){
          
          swalWait();
          window.location.href = '?/category/'+cloudCategory;

        }else{
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
                swalAsk('Message','Orders of at least Php 5000 are required to be settled via credit card payment online.',data.urlRedirect);
              }
              else
              {
                jQuery(window.location).attr('href', urlPath + '?/' + data.urlRedirect); 
              }
            }
          }, 'JSON');
        }
    })

    $('.popup1').hide();
    $('.fade').hide();
  }