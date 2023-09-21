/*----------------------------------------------
*
* [Main Scripts]
*
* Theme    : Nexgen
* Version  : 1.0
* Author   : Codings
* Support  : codings.dev
* 
----------------------------------------------*/

/*----------------------------------------------

[ALL CONTENTS]

1. General

----------------------------------------------*/

/*----------------------------------------------
1. General
----------------------------------------------*/

jQuery(function ($) {

  'use strict';

  function sendForm(ID) {

    var form              = $(ID);
    var input_status      = $(ID+' .nxg-input.status');
    var input_code        = $(ID+' .nxg-input.purchase-code');
    var input_domain      = $(ID+' .nxg-input.site-domain');
    var alert_code        = $(ID+' .nxg-alert.purchase-code');
    var alert_domain      = $(ID+' .nxg-alert.site-domain');
    var licence_info      = $(ID+' .nxg-licence-info');
    var button_activate   = $(ID+' .nxg-button.status');

    $(document).on('click', ID+' .nxg-button.status', function() {
      form.submit();
    })

    form.submit(function(e) {
      e.preventDefault();

      var url = form.attr('action');

      $.ajax({
        type: 'POST',
        url: url,
        data: form.serialize(),
        success: function(response) {

          try {
            JSON.parse(response);
            var obj = JSON.parse(response);

            if (obj.status !== 'error' ) {

              if (obj[0] === 'active') {
                setTimeout(function() {
                  input_code.removeClass('invalid').addClass('valid').attr('readonly', 'readonly');
                  input_domain.removeClass('invalid').addClass('valid');
                  alert_code.text(alert_code.data('success')).removeClass('invalid').addClass('valid').fadeIn();
                  alert_domain.text(alert_domain.data('success')).removeClass('invalid').addClass('valid').fadeIn();
                  licence_info.text(licence_info.data('text-active'));
                  button_activate.text(button_activate.data('text-deactivate'));
                  input_status.val('deactivate');

                }, 1200);

              } else if (obj[0] === 'inactive') {
                setTimeout(function() {
                  input_code.val('').removeClass('invalid').removeClass('valid').removeAttr('readonly').attr('type', 'text');
                  input_domain.removeClass('invalid').removeClass('valid');
                  alert_code.text('').removeClass('invalid').removeClass('valid').fadeOut();
                  alert_domain.text('').removeClass('invalid').removeClass('valid').fadeOut();
                  licence_info.text(licence_info.data('text-inactive'));
                  button_activate.text(button_activate.data('text-activate'));
                  input_status.val('activate');

                }, 1200);

              } else if (obj[0] === 'exist') {
                setTimeout(function() {
                  input_code.removeClass('valid').addClass('invalid');
                  alert_code.text(alert_code.data('exist')).removeClass('valid').addClass('invalid').fadeIn();

                }, 1200);

              } else {
                input_code.removeClass('valid').addClass('invalid');
                alert_code.text(alert_code.data('invalid')).removeClass('valid').addClass('invalid').fadeIn();
              } 
            
            } else {
              input_code.val('').removeClass('invalid').removeClass('valid');
              alert_code.text(alert_code.data('error')).removeClass('valid').addClass('invalid').fadeIn();
            }

          } catch (e) {
            input_code.val('').removeClass('invalid').removeClass('valid');
            alert_code.text(alert_code.data('error')).removeClass('valid').addClass('invalid').fadeIn();
          }
        }
      })
    })
  }

  sendForm('#nexgen-register');
})