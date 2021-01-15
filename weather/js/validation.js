$( document ).ready( function (){
$( "#pi_contact" ).validate({
        rules: {
            name:{
                required:true,
                nameCheck :true
            },
            email: {
                required: true,
                email: true,
                emailcheck:true
            },
            mobile:{
                required: true,
                digits: true,
                maxlength: 10,
                minlength: 10,
                mocheck: true
            },
        },
        messages: {
            name:{
                required: "fill the First Name field",
                 nameCheck : "only characters"
            },
            email: "Please enter a valid email address",
            mobile: {
                required: "Empty fill Mobile Number field",
                minlength: "You entered minimum length of mobile number.",
                maxlength: "You entered maximum length of mobile number.",

            },
        },
errorElement: "em",
errorPlacement: function ( error, element ) {
error.addClass( "invalid-feedback" );

if ( element.prop( "type" ) === "checkbox" ) {
error.insertAfter( element.next( "label" ) );
} else {
error.insertAfter( element );
}
},
highlight: function ( element, errorClass, validClass ) {
$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
},
unhighlight: function (element, errorClass, validClass) {
$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
},
// submitHandler: function () {
// alert( "submitted!" );
// }
});

$.validator.addMethod("nameCheck", function(value, element) {
    return this.optional(element) || value == value.match(/^[a-zA-Z ]*$/);
});

$.validator.addMethod("mocheck", function(value, element) {
    return this.optional(element) || value == value.match(/^[0-9 ]*$/);
});
jQuery.validator.addMethod("emailcheck", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address.');

});
