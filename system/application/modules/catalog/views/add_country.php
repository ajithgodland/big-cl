<div class="contentwrapper"><!--Content wrapper-->

    <div class="heading">

        <h3>Manage Country</h3>


    </div><!-- End .heading-->

    <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

    <div class="row-fluid">

        <div class="span6" style="width:70%; margin-left:15%;">

            <div class="box">

                <div class="title">

                    <h4>
                        <span>Add Country</span>
                    </h4>

                </div>
                <div class="content">

                    <form class="form-horizontal" action="<?php echo base_url() . 'catalog/addcountry/'; ?>"
                          method="post" enctype="multipart/form-data" id="form-validate"/>
                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <div class="error_messages">


                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="type" value="country">

                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <label class="form-label span4" for="normal">Country</label>
                                <input class="span8" id="location" type="text" name="location"
                                       value="<?php echo set_value('location'); ?>" required/>
                                                    <span class="error locationerror">
													<?php echo form_error('location'); ?>
                                                    </span>
                            </div>
                        </div>
                    </div>


                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">

                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-info">Submit</button>

                    </div>


                    </form>

                </div>

            </div><!-- End .box -->

        </div><!-- End .span6 --><!-- End .span6 --><!-- End .span6 -->


    </div><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid -->


</div><!-- End contentwrapper -->


<?php if ($this->session->flashdata('message')) {
    ?>
    <script type="application/javascript">
        $(document).ready(function () {
            //Regular success

            $.pnotify({
                type: 'success',
                title: '<?php echo $this->session->flashdata('message');?>',
                text: '',
                icon: 'picon icon16 iconic-icon-check-alt white',
                opacity: 0.95,
                history: false,
                sticker: false
            });

        });
    </script>
    <?php
}
?>


<script type="text/javascript"
        src="<?php echo base_url() . 'static/'; ?>adminpanel/plugins/forms/validate/jquery.validate.min.js"></script>
<script type="application/javascript">


    $("#form-validate").validate({
        ignore: null,
        ignore: 'input[type="hidden"]',
        rules: {

            country: "required",


        },
        messages: {
            required: "Please enter a something",
            required1: {
                required: "This field is required",
                minlength: "This field must consist of at least 4 characters"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address",
            agree: "Please accept our policy"
        },
        submitHandler: function (form) {

            var location = $("#location").val();


            var dataString = 'location=' + location;

            $.ajax
            ({
                type: "POST",
                url: "<?php echo base_url() . 'catalog/addcountry2'; ?>",
                data: dataString,
                cache: false,
                success: function (html) {

                    if (html == 'yes') {
                        $(".locationerror").html('This Country Already Added !..');
                    }
                    else {

                        $(".locationerror").html('');

                        $.pnotify({
                            type: 'success',
                            title: 'Country Added Successfully!..',
                            text: '',
                            icon: 'picon icon16 iconic-icon-check-alt white',
                            opacity: 0.95,
                            history: false,
                            sticker: false
                        });

                        $("#location").val('')


                    }


                }
            });


            //


            //end

        }

    });


</script>

