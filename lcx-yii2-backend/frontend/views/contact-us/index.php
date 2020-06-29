<!-- BANNER -->
<div class="section banner-page" data-background="<?=$banner['img']?>">
    <div class="content-wrap pos-relative">
        <div class="d-flex justify-content-center bd-highlight mb-3">
            <div class="title-page"></div>
        </div>
    </div>
</div>

<!-- CONTENT -->
<div class="section">
    <div class="content-wrap">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-md-12 col-lg-8">

                    <h2 class="section-heading text-left mb-5">
                        SEND A LETTER
                    </h2>
                    <p class="subheading text-left">We provide good product for your !</p>
                    <form action="www.baidu.com" class="form-contact" id="contactForm">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="p_name" placeholder="Enter Name" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="p_email" placeholder="Enter Email" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="p_subject" placeholder="Subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="p_phone" placeholder="Enter Phone Number">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea id="p_message" class="form-control" rows="6" placeholder="Enter Your Message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <div class="text-left">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>


                </div>

                <div class="col-sm-12 col-md-12 col-lg-4">
                    <h2 class="section-heading text-left mb-5">
                        CONTACT DETAILS
                    </h2>
                    <!-- Item 1 -->
                    <div class="rs-icon-info-2">
                        <div class="info-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="body-text">
                            <h4>Address</h4>
                            <p><?= $this->params['company']['address'] ?></p>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="rs-icon-info-2">
                        <div class="info-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="body-text">
                            <h4>Phone</h4>
                            <p><?= $this->params['company']['phone'] ?></p>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="rs-icon-info-2">
                        <div class="info-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="body-text">
                            <h4>Email</h4>
                            <p><?= $this->params['company']['email'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA -->
<div class="section bg-primary">
    <div class="content-wrap py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-12">
                    <div class="cta-1">
                        <div class="body-text text-white mb-3">
                            <h3 class="my-1">Grow Up Your Business With Us</h3>
                            <p class="uk18 mb-0">We provide good product for your !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$js = <<<JS
$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
    // Initiate Variables With Form Content
    var name = $("#p_name").val();
    var email = $("#p_email").val();
    var subject = $("#p_subject").val();
    var phone = $("#p_phone").val();
    var message = $("#p_message").val();

    $.ajax({
        type: "POST",
        url: "do-save",
        data: "name=" + name + "&email=" + email + "&subject=" + subject + "&phone=" + phone + "&message=" + message,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

function formSuccess(){
    $("#contactForm")[0].reset();
    submitMSG(true, "Message Submitted!")
}

function formError(){
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#success").removeClass().addClass(msgClasses).text(msg);
}
JS;

$this->registerJs($js);

?>