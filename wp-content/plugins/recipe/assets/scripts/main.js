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

    let featured_frame = wp.media({
        title: 'Select or Upload Media',
        button: {
            text: 'Use this media'
        },
        multiple: false
    });

    $('#recipe-img-upload-btn').on('click', function (e) {
        e.preventDefault();
        featured_frame.open();
    });

    featured_frame.on('select', function () {
        let attachment = featured_frame.state().get('selection').first().toJSON();
        $('#recipe-img-preview').attr('src', attachment.url);
        $('#r_inputImgID').val(attachment.id);
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
            meal_type:              $("#r_inputMealType").val(),
            attachment_id:          $("#r_inputImgID").val()
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
                location.href = recipe_obj.about_us_url;
            } else {
                $('#register-status').html('<div class="alert alert-danger">Unsuccessful registration. Please fill out all the fields</div>');
                $('#register-form').show();
            }
        });
    });

    $('#login-form').on('submit', function (e) {
        e.preventDefault();

        $('#login-status').html('<div class="alert alert-info">Logging in...</div>');
        $(this).hide();

        let form = {
            action: 'recipe_user_login',
            username: $('#login-form-username').val(),
            pass: $('#login-form-password').val(),
            _wpnonce: $('#_wpnonce').val()
        };

        $.post(recipe_obj.ajax_url, form).always(function (response) {
            if(response.status === 2){
                $('#login-form').html('<div class="alert alert-success">Logged in!</div>');
                location.href = recipe_obj.about_us_url;
            } else {
                $('#login-status').html('<div class="alert alert-danger">Invalid password/username. Try again!</div>');
                $('#login-form').show();
            }
        });
    });
});