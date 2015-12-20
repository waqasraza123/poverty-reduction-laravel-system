$(function(){

    //route protection
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //delete the cookie on page refresh
    if(window.location.pathname == "/donner") {

        $.ajax({
            url: 'remove-cookie',
            method: 'post',
            success: function () {
                console.log("cookie deleted");
            }
        });
    }


    //hide the success message
    //first check if the div.alert exist in the body
    setInterval(function(){ if($("div.alert").length!=0)
    {
        $('div.alert').delay(5000).slideUp(300);
    } }, 3000);


    /**
     * donate money form *************************************************************
     */

    //if(window.location.pathname == '/donate-money-req*'){

        $(".stripe-button-el").hide();

        $(".donate-money-main").click(function(event){
            event.preventDefault();
            //alert('clicked');
            var count = 0;
            $.each($('.center-form :input:not(:submit, :hidden)'), function()
            {
                if( !$(this).val() ) {
                    count++;
                }
            });
            console.log(count);
            if(count!=0){
                $(".necessary-fields").show();
                $('.necessary-fields').html('All Fields are necessary');
            }
            else if(count==0){

                if($("[name=amount]").val()<50){
                    $(".necessary-fields").show();
                    $('.necessary-fields').html('Amount must be greater than 50 Rs');
                }
                else{

                    /**
                     * start the ajax request to store the information
                     * than show the payment button
                     */

                    $(".donate-money-main").val('Please wait...');
                    console.log('here');

                    //send complete form data
                    var dataToSend = $(".donate-money-form form").serialize();

                    $.ajax({
                        url: '/donate-money-main',
                        data: dataToSend,
                        method: 'post',
                        success: function(data){
                            console.log(data);
                            $(".donate-money-main").hide();
                            $(".necessary-fields").html("Your Payment was successful. Thank you for Donating!");
                            $(".stripe-button-el").css('display', 'block !important').slideDown();

                        }

                    });
                }
            }
        });
    //}

    /**
     * donate money form ########################################
     */




    /**
     * update the donner dashboard with new requests of help
     */
    if(window.location.pathname == "/donner") {
        (function poll(){

            var timeOut = 5000;

            //animated loader
            $(".problems h2 span").html('<img src="../images/ripple.gif" width="32px" height="32px" style="margin-left: 10px; margin-top: 5px;">');
            $(".unsolved h2 span").html('<img src="../images/ripple.gif" width="32px" height="32px" style="margin-left: 10px; margin-top: 5px;">');
            $(".solved h2 span").html('<img src="../images/ripple.gif" width="32px" height="32px" style="margin-left: 10px; margin-top: 5px;">');

            //check if problems are already listed
            document.cookie="length="+($(".problems-text").length);
            console.log("I am called");

            setTimeout(function(){
                $.ajax({
                    url: "update-donner-dashboard",
                    data: $("input[name=_token]").val(),
                    method: 'post',
                    success: function(data){
                        //remove the loading icon
                        $(".panel-heading h2 span").toggle();
                        //Update your dashboard gauge
                        /*console.log(data);*/

                        if(data == "No New Problems"){
                            /*alert(JSON.stringify(data));*/
                        }
                        else{
                            var labelClassName;
                            var labelText;

                            $.each(data, function(i, obj) {
                                if(obj.severity == "extreme"){
                                    labelClassName = "label-danger";
                                    labelText = "Very Urgent";
                                }
                                if(obj.severity == "high"){
                                    labelClassName = "label-warning";
                                    labelText = "Urgent";
                                }
                                if(obj.severity == "low"){
                                    labelClassName = "label-default";
                                    labelText = "Normal";
                                }

                                if(obj.solved == 0){
                                    $(".unsolved h2").after('<a href="'+"/problems/"+obj.id+'"><span class="label pull-right '+ labelClassName+'" >'+labelText+'</span><div class="well well-lg problems-text" style="border-radius: 0px; color: #337ab7;">"'+obj.problem+'"</div></a>');
                                }
                                else if(obj.solved == 1){
                                    $(".solved h2").after('<a href="'+"/problems/"+obj.id+'"><span class="label pull-right '+ labelClassName+'" >'+labelText+'</span><div class="well well-lg problems-text" style="border-radius: 0px; color: #337ab7;">"'+obj.problem+'"</div></a>');
                                }


                                $(".problems h2").after('<a href="'+"/problems/"+obj.id+'"><span class="label pull-right '+ labelClassName+'" >'+labelText+'</span><div class="well well-lg problems-text" style="border-radius: 0px; color: #337ab7;">"'+obj.problem+'"</div></a>');

                            });
                        }


                        //Setup the next poll recursively
                        poll();
                    },error: function(xhr, ajaxOptions, thrownError){
                        console.log(xhr.status+" ,"+" "+ajaxOptions+", "+thrownError);
                    }
                    /*, dataType: "json"*/});
            }, timeOut);
        })();
    }
    /** ################# END ######################
     * update the donner dashboard with new requests of help
     */


    /**
     * send the request to save the needy form
     */

    $(".submit-needy-form").click(function(event){

        event.preventDefault();
        $(this).html('<img src="../images/ripple.gif" width="32px" height="32px" style="margin-bottom: 3px;transform: translateY(-20%);border-radius: 100%; z-index: 1000;">');
        $.ajax({
            url: "/needy",
            type: 'post',
            data: $("#needy-form").serialize(),
            success: function(){
                console.log("success");
                $(".submit-needy-form").html("Submit Another Problem");
            }
        });

    });

    /**
     * #################### needy form request ################
     */


    /**
     * send the request to save the things form
     */

    $(".submit-things").click(function(event){

        event.preventDefault();
        $(".submit-things").html('<img src="../images/ripple.gif" width="32px" height="32px" style="margin-bottom: 3px;transform: translateY(-20%);border-radius: 100%; z-index: 1000;">');
        $.ajax({
            url: "/submit-things",
            type: 'post',
            data: $("#things-form").serialize(),
            success: function(){
                console.log("success");
                $(".submit-things").text("Submit Things");
                $(".necessary-fields").show();
                $('.necessary-fields').html('Thank you!');
            },
            error: function(){
                $(".necessary-fields").show();
                $('.necessary-fields').html('Token Mismatch Exception!');
            }
        });

    });

    /**
     * #################### things form request ################
     */



    /**
     * store the cookie when the user clicks on the needy button on index.php
     * to track that user is needy so register in db by setting donner = 0
     */

    $(".needy").click(function(){
        document.cookie="username=needy";
    });


    /**
     * ************************************************************
     * send the register request
     */
    $(".register-needy").click(function(event){

        /*$.removeCookie("username");*/
        var delete_cookie = function(name) {
            document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        };
        delete_cookie('username');

    });
    /**
     * end register ajax request #############################################
     */


});