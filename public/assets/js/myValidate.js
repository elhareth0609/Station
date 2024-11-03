// for all form in my website

$(document).ready(function() {
    // Attach the dynamicValidate function to all forms on the page
    $('form.validate').each(function() {
        $(this).dynamicValidate();
    });

});


(function($) {
    $.fn.dynamicValidate = function() {
        var rules = {};
        var messages = {};

        // Loop through each input field in the form
        this.find('input, select, textarea').each(function() {
            var inputName = $(this).attr('name');
            var inputLabel = inputName.replace(/_/g, ' '); // Create a user-friendly name for messages
            var validation = $(this).data('v'); // Get data-v attribute

            if (validation) {
                var ruleSet = {}; // For storing rules for this field
                var messageSet = {}; // For storing messages for this field
                var validations = validation.split(' '); // Split the data-v rules

                // Loop through each validation rule
                validations.forEach(function(rule) {
                    if (rule === 'required') {
                        ruleSet.required = true;
                        messageSet.required = `Please enter a ${inputLabel}`;
                    } else if (rule === 'email') {
                        ruleSet.email = true;
                        messageSet.email = 'Please enter a valid email address';
                    } else if (rule.startsWith('min:')) {
                        var minLength = rule.split(':')[1];
                        ruleSet.minlength = minLength;
                        messageSet.minlength = `${inputLabel} must be at least ${minLength} characters long`;
                    } else if (rule.startsWith('max:')) {
                        var maxLength = rule.split(':')[1];
                        ruleSet.maxlength = maxLength;
                        messageSet.maxlength = `${inputLabel} must not exceed ${maxLength} characters`;
                    } else if (rule.startsWith('equals:')) {
                        var equals = rule.split(':')[1];
                        ruleSet.equals = equals;
                        messageSet.equals = `Please enter the same ${inputLabel}`;
                    } else if (rule.startsWith('not_equals:')) {
                        var notEquals = rule.split(':')[1];
                        ruleSet.notEquals = notEquals;
                        messageSet.notEquals = `Please enter a different ${inputLabel}`;
                    } else if (rule === 'numeric') {
                        ruleSet.numeric = true;
                        messageSet.numeric = 'Please enter a valid number';
                    } else if (rule === 'integer') {
                        ruleSet.integer = true;
                        messageSet.integer = 'Please enter a valid integer';
                    } else if (rule === 'decimal') {
                        ruleSet.decimal = true;
                        messageSet.decimal = 'Please enter a valid decimal number';
                    } else if (rule === 'url') {
                        ruleSet.url = true;
                        messageSet.url = 'Please enter a valid URL';
                    } else if (rule === 'date') {
                        ruleSet.date = true;
                        messageSet.date = 'Please enter a valid date';
                    } else if (rule === 'date_format') {
                        var dateFormat = rule.split(':')[1];
                        ruleSet.date_format = dateFormat;
                        messageSet.date_format = `Please enter a date in the format ${dateFormat}`;
                    }
                    // } else if (rule.startsWith('regex:')) {
                    //     var regex = rule.split(':')[1];
                    //     ruleSet.pattern = new RegExp(regex);
                    //     messageSet.pattern = `Please enter a valid ${inputLabel}`;
                    // } else if (rule.startsWith('unique:')) {
                    //     var unique = rule.split(':')[1];
                    //     ruleSet.remote = {
                    //         url: unique,
                    //         type: 'POST',
                    //         data: {
                    //             _token: $('meta[name="csrf-token"]').attr('content')
                    //         }
                    //     };
                    //     messageSet.remote = `Please enter a unique ${inputLabel}`;
                    // }
                });

                // Add the rules and messages to the main objects
                rules[inputName] = ruleSet;
                messages[inputName] = messageSet;
            }
        });

        // Apply validation to the form
        this.validate({
            rules: rules,
            messages: messages,
            errorPlacement: function(error, element) {
                // Check if the element is inside an input-group
                if (element.closest('.input-group').length) {
                    error.insertBefore(element.closest('.input-group')); // Place error after input-group
                } else if (element.closest('.form-floating').length) {
                    error.insertBefore(element.closest('.form-floating')); // Place error after input-group
                } else {
                    error.insertBefore(element); // Default placement
                }
            }
        });

    };
})(jQuery);
