var formErrorClass = 'form-control--error';

$(document).ready(function() {
  $('input[type="tel"]').mask('(000) 000 0000');
  $('.date').mask('0000/00/00');
  $('.date-order-1').mask('00/0000');

  $("#loginForm").validate({
    rules: {
      loginInput: {
        required: true,
        minlength: 5
      },
      
      loginPassword: {
        required: true,
        minlength: 5
      }
    },
  });

  $("#SMSForm").validate({
    rules: {
      signupSms: {
        required: true,
        minlength: 3
      }
    }
  });

  $("#signupForm").validate({
    rules: {
      signupPhone: {
        required: true,
        minlength: 14
      },
    }
  });

  $('#profileForm').validate({
    rules: {
      fullName: {
        required: true,
        minlength: 3
      },

      gender: {
        required: true,
      },

      birthday: {
        required: true,
        dateISO: true
      },

      country: {
        required: true,
      },

      city: {
        required: true,
      },

      reasonForRegistration: {
        required: true,
      }
    }
  });

  $('#profilePasswordForm').validate({
    rules: {
      currentPassword: {
        required: true,
        minlength: 3
      },

      newPassword: {
        required: true,
        minlength: 3
      },

      newPasswordAgain: {
        required: true,
        minlength: 3,
        equalTo: "#newPassword"
      }
    }
  });

  $('#checkoutForm').validate({
    rules: {
      cardName: {
        required: true,
        minlength: 3
      },
      
      cardNumber: {
        required: true,
        creditcard: true,
        minlength: 13,
        maxlength: 16
      },

      cardDate: {
        required: true,
        minlength: 4
      },

      cardCvc: {
        required: true,
        minlength: 3
      }
    }
  });
});