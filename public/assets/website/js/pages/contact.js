/*
 *  Document   : contact.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Contact page
 */

var Contact = function() {

    return {
        init: function() {
            /*
             * With Gmaps.js, Check out examples and documentation at http://hpneo.github.io/gmaps/examples.html
             */

            // Initialize map
            var contactMap = new GMaps({
                div: '#gmap',
                lat: 4.136281,
                lng: -73.634163,
                zoom: 16,
                disableDefaultUI: true,
                scrollwheel: false
            });

            contactMap.addMarkers([
                {
                    lat: 4.136281,
                    lng: -73.634163,
                    infoWindow: {content: '<strong>Alba Boutique</strong> - Cra 37 # 23 - 68 San Benito'},
                    animation: google.maps.Animation.DROP
                }
            ]);

            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Initialize Form Validation */
            $('#form-contact').validate({
                errorClass: 'help-block animation-pullUp', // You can change the animation class for a different entrance animation
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block').remove();
                },
                rules: {
                    'name': {
                        required: true,
                        minlength: 3
                    },
                    'email': {
                        required: true,
                        email: true
                    },
                    'text': {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    'name': {
                        required: 'Por favor escribe tu nombre completo!',
                        minlength: 'Por favor escribe tu nombre completo!'
                    },
                    'tel': {
                        required: 'Por favor escribe un teléfono donde te contactemos!',
                        minlength: 'Por favor escribe un teléfono donde te contactemos!'
                    },
                    'email': 'Por favor escribe un correo electrónico valido!',
                    'text': {
                        required: 'Por favor escribenos cómo podemos ayudarte',
                        minlength: 'Por favor escribenos cómo podemos ayudarte'
                    }
                }
            });
        }
    };
}();