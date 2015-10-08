$(function(){
    var root = document.location.hostname;
    var pathArray = window.location.pathname.split('/');
    var secondLevelLocation = pathArray[1];
    var thirdLevelLocation = pathArray[2];
    var base_url = 'http://' + root;
    $(".subscription_form_msg").empty();
    $('#golfkeeper_subscription_form').validate({
                rules: {
                        email: {
                            required: true,
                            email: true
                        }
                    },
                messages: {
                    email: "Please enter a valid email address",
                },      
            errorLabelContainer: '.auto-validate',

        submitHandler: function(form) {
            var email = $('#email').val();
            $.ajax({
              url:base_url +'/'+secondLevelLocation +'/'+ thirdLevelLocation +'/home/subscribe',
              data: {'email':email},
              dataType: 'json',
              method:'POST',
                success:function (data)
                {
                    if(data.email && data.euid && data.leid){
                        $(".subscription_form_msg").empty();
                        $( ".subscription_form_msg" ).append( "<label class='mailchimp-success'>Email subscribed successfully.</label>" );
                        $(".mailchimp-success").show().delay(5000).fadeOut();
                        $("#email").val('');
                    }
                    else if(data.code == -100){
                        $(".subscription_form_msg").empty();
                        $( ".subscription_form_msg" ).append( "<label class='mailchimp-error'>Domain portion of email address is invalid.</label>" );
                        $(".mailchimp-error").show().delay(5000).fadeOut();
                    }
                    else if(data.code == 214){
                        $(".subscription_form_msg").empty();
                        $( ".subscription_form_msg" ).append( "<label class='mailchimp-error'>Email already subscribed.</label>" );
                        $(".mailchimp-error").show().delay(5000).fadeOut();
                    }else{
                        $(".subscription_form_msg").empty();
                        $( ".subscription_form_msg" ).append( "<label class='mailchimp-error'>Sorry problem with email subscription.</label>" );
                        $(".mailchimp-error").show().delay(5000).fadeOut();
                    }
                },
            });
        }
    });
}); 

function toggleVideo(state) {
    // if state == 'hide', hide. Else: show video
    var div = document.getElementById("yTvid");
    var videoInfo = document.getElementById("videoInfo");
    var iframe = div.getElementsByTagName("iframe")[0].contentWindow;
    div.style.display = state == 'hide' ? 'none' : '';

    videoInfo.style.opacity = state == 'hide' ? '1' : '0';
    videoInfo.style.zIndex = state == 'hide' ? '9' : '-1';

    closeYT.style.opacity = state == 'hide' ? '0' : '1';
    closeYT.style.zIndex = state == 'hide' ? '-1' : '9';

    func = state == 'hide' ? 'pauseVideo' : 'playVideo';
    iframe.postMessage('{"event":"command","func":"' + func + '","args":""}','*');
}