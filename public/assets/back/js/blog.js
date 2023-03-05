var APP = function() {
    return
    {
        validacionGeneral: function $( id, reglas, mensajes) {
            const formulario = $('#', + id);
            formulario.validate({
                rules: reglas,
                messages: mensajes,
                errorElement: 'div', //default input error message container
                errorClass: 'invalid-feedback', // default input error message class
                focusInvalid: false,
                ignore: "", //validate all fields including form hidden input
                highlight: function (element, errorClass, validClass) { //highlight error inputs
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) { //highlight error inputs
                    $(element).removeClass('is-invalid');
                },
                success: function (element) { //highlight error inputs
                    $(element).removeClass('is-invalid');
                },
                errorPlacement: function (error, element) {
                    if (element.closest('.bootstrap-select').length > 0) {
                        element.closest('.bootstrap-select').find('.bs-placeholder').after(error);
                    } else if ($(element).is('select') && element.hasClass('select2-hidden-accessible')) {
                        element.next().after();
                    } else {
                        error.insertAfter(element);
                    }
                },
                invalidHandler: function (event, validator) {

                },
                submitHandler: function (form) {
                    
                },

            });
        }
    }
}();
