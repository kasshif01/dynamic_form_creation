var forms = {

    xhrSubmit: function (){
        jQuery('body').on('click', '#submit-dynamic-form', async function(event){
            event.preventDefault();

            // validate the form
            let hasError = await forms.validateForm();
            if(hasError) return;

            // send ajax call to API to save form data

            jQuery.ajax({
                type: 'post',
                url: site.baseUrl+"/save-form",
                data: jQuery('#dynamic-form').serialize(),
                dataType: "json",
                success: function (response) {
                    if(response.status === 200){
                        jQuery('.form-holder').html("<div>"+response.message+"</div>")
                    }else if(response.status == 400 && response.errors){
                        forms.xhrResponseError(response.errors);
                    }
                },
                error: function (error) {
                    console.error('Error sending form data:', error);
                }
            });
        });
    },

    /**
     * Display error messages
     * @param errors
     */
    xhrResponseError: function(errors){
        Object.entries(errors).map(function(error){
            let field = jQuery("[data-id="+error[0]+"]");
            let messages = error[1];
            field.parents('.form-group').addClass('error');
            Object.entries(messages).map(function(message){
                field.parents('.form-group').find('.error-message').html(message[1]);
            })
        });
    },

    /**
     * Validate the dynamic form
     * @returns {jQuery}
     */
    validateForm: function(){

        // validationRules: Form-specific rules that are defined during form creation. This variable is defined in the form.php file.

        if(validationRules){
            let validationObj = Object.entries(JSON.parse(validationRules));
            validationObj.map(function (obj){
                let selector = obj[0];
                let rules = obj[1];
                Object.entries(rules).map(function(rule){
                    if(rule[1] && typeof forms[rule[0]] === 'function'){
                         forms[rule[0]](selector); // call the function dynamically based on the defined rule
                    }
                })
            });
        }

        return jQuery('.error').length;
    },

    /**
     * Validate required field
     * @param selector
     */
    required: function(selector){
        let field = jQuery("[data-id="+selector+"]");
        let val = "";
        if(field.attr("type") === "radio" || field.attr("type") === "checkbox"){
            val = jQuery("[data-id="+selector+"]:checked").val();
        }else{
            val = field.val();
        }
        field.parents('.form-group').removeClass('error');
        if(jQuery.trim(val) == ""){
            field.parents('.form-group').addClass('error');
            field.parents('.form-group').find('.error-message').html("This field is required.");
        }
    },

    /**
     * Validate email
     * @param selector
     */
    email: function(selector){
        let field = jQuery("[data-id="+selector+"]");
        let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        field.parents('.form-group').removeClass('error');
        if(!regex.test(field.val())){
            field.parents('.form-group').addClass('error');
            field.parents('.form-group').find('.error-message').html("This field is required.");
        }
    },

    /**
     * Remove the error message once user add value
     */
    events: function(){
      jQuery('body').on('keyup change', '.error input, .error textarea, .error select', function(){
          jQuery(this).parents('.error').removeClass('error');
      })
    },

    init: function(){
        forms.xhrSubmit();
        forms.events();
    }
}

jQuery(document).ready(function () {
    forms.init();
});
