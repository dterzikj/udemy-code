jQuery(function($){
    $("#recipe_rating").bind( "rated", function(){
        $(this).rateit( "readonly", true );

        let form = {
            action: "r_rate_recipe",
            rid: $(this).data('rid'),
            rating: $(this).rateit( 'value' )
        };

        $.post(recipe_obj.ajax_url, form, function(data){

        });
    });

    $("#recipe-form").on( "submit", function(e){
        e.preventDefault();

        $(this).hide();
        $("#recipe-status").html('<div class="alert alert-info text-center">Please wait!</div>');

        let form                =   {
            action:                 "r_submit_user_recipe",
            content:                tinymce.activeEditor.getContent(),
            title:                  $("#r_inputTitle").val(),
            ingredients:            $("#r_inputIngredients").val(),
            time:                   $("#r_inputTime").val(),
            utensils:               $("#r_inputUtensils").val(),
            level:                  $("#r_inputLevel").val(),
            meal_type:              $("#r_inputMealType").val()
        };

        $.post( recipe_obj.ajax_url, form ).always(function(data){
            $("html, body").animate({ scrollTop: 0 }, 'slow');
            if( data.status === 2 ){
                $('#recipe-status').html('<div class="alert alert-success">Recipe submitted successfully!</div>');
            }else{
                $('#recipe-status').html(
                    '<div class="alert alert-danger">Unable to submit recipe. Please fill in all fields.</div>'
                );
                $("#recipe-form").show();
            }
        });
    });

    $('#register-form').on('submit', function (e) {
        e.preventDefault();

        $('#register-status').html('<div class="alert alert-info">Please wait while creating account.</div>');
        $(this).hide();

        let form = {
            action: 'recipe_create_account',
            name: $('#register-form-name').val(),
            username: $('#register-form-username').val(),
            email: $('#register-form-email').val(),
            pass: $('#register-form-password').val(),
            confirm_pass: $('#register-form-repassword').val(),
            _wpnonce: $('#_wpnonce').val()
        };

        $.post(recipe_obj.ajax_url, form).always(function (response) {
            if(response.status === 2){
                $('#register-status').html('<div class="alert alert-success">Account created successfully!</div>');
                location.href = recipe_obj.home_url;
            } else {
                $('#register-status').html('<div class="alert alert-danger">Unsuccessful registration. Please fill out all the fields</div>');
                $('#register-form').show();
            }
        });
    });
});