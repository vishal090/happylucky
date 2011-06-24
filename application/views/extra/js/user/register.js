$(document).ready(function() {
    $('#register_form').validate({
        rules: {
               username: {
                     required: true,
                     minlength: 3
                 },
               password: {
                     required: true,
                     minlength: 5
                 },
               confirm_password: {
                     required: true,
                     minlength: 5,
                     equalTo: '#password',
                 },
               first_name: {
                     required: true
                 },
               last_name: {
                     required: true
                 },
               address: {
                     required: true,
                     minlength: 3
                 },
               town: {
                     required: true,
                     minlength: 3
                 },
               postcode: {
                     required: true,
                     minlength: 3
                 },
               state: {
                     required: true,
                     minlength: 3
                 },
               contact_no: {
                     required: true,
                     minlength: 8
                 },
               email: {
                     required: true,
                     email: true 
                 },
         },
         message: {
               username: {
                     required: true,
                     minlength: 3
                 },
               password: {
                     required: true,
                     minlength: 5
                 },
               confirm_password: {
                     required: true,
                     minlength: 5,
                     equalTo: '#password',
                 },
               first_name: {
                     required: true
                 },
               last_name: {
                     required: true
                 },
               address: {
                     required: true,
                     minlength: 3
                 },
               town: {
                     required: true,
                     minlength: 3
                 },
               postcode: {
                     required: true,
                     minlength: 3
                 },
               state: {
                     required: true,
                     minlength: 3
                 },
               contact_no: {
                     required: true,
                     minlength: 8
                 },
               email: {
                     required: true,
                     email: true 
                 },
         }
    });

    $('#username').alphanumeric({allow: '_.'});
    $('#first_name').alpha();
    $('#last_name').alpha();
});
