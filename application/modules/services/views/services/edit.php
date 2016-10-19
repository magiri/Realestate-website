<section>
    <div class="container">
        <div class="row">
            <!--        <div class="col-md-2"> &nbsp;</div>-->

            <div class="col-md-12">


                <?php
                if (strlen($services->id) > 0) {
                    $headingtext = 'Edit Service';
                    $btntext = 'Edit Service';
                } else {
                    $headingtext = 'Add Service';
                    $btntext = 'Add Service';
                }
                ?>
                <h2 class="page-header text-center"><?php echo $headingtext ?></h2>



                <div class="row">


                    <div class="text-center text-danger">
                        <?php
                        echo validation_errors('<p><b>', '</b></p>');

                        if (strlen($uploaderror['error']) > 0) {
                            echo $uploaderror['error'];
                        }
                        ?>    

                    </div> 

                    <?php echo form_open_multipart('services/admin/edit', 'class="form-horizontal" role="form"') ?>

                    <?php if (strlen($services->id) < 1): ?>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Service Image:</label>
                            <div class="col-md-10">
                                <?php echo form_upload('userfile', 'Browse'); ?> 
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">

                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Title:</label>
                                <div class="col-md-10">
                                    <?php echo form_input('title', set_value('title', $services->title), 'class="form-control"'); ?> 
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Summary:</label>
                                <div class="col-sm-10">
                                    <?php echo form_textarea('summary', set_value('summary', $services->summary), 'class="form-control"')
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <?php if (strlen($services->id) > 0): ?>
                                <!-------------------------------image here incase editing--------------------------------------------------------------------------------------------------------------------->
                                <div class="row-fluid" style="margin-bottom:5%">
                                    <div class="row text-center">
                                        <img class="img-responsive" src="<?php echo site_url($services->img_url); ?>" alt="<?php echo $services->title ?>"/>
                                    </div>
                                    <div class="row text-center" style="margin-top:3%;">
                                        <a href="<?php echo site_url('services/admin/replace_image/' . $services->id) ?>"> <button class="btn btn-primary">Replace Image</button> </a>
                                    </div>
                                </div>
                                <!---------------------------------------------------------------------------------------------------------------------------------------------------->
                            <?php else: ?>
                                No Image New Service
                            <?php endif; ?>
                        </div>
                 
                    <div class="col-md-10">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Body:</label>
                            <div class="col-sm-10">
                                <?php echo form_textarea('body', set_value('body', $services->body), 'class="form-control" id="editorTextArea"')
                                ?>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php if (isset($type)):
                       echo form_hidden('type',$type);
                       else:
                         echo form_hidden('type',0);  
                       endif;
                            ?>
                    <?php if (strlen($services->id) > 0): ?>
                        <?php echo form_hidden('uploadimage', false) ?>
                    <?php else: ?>
                        <?php echo form_hidden('uploadimage', true) ?>
                       
                    <?php endif; ?>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <?php echo form_submit('submit', $btntext, 'class="btn btn-primary"') ?>
                        </div>
                    </div>

                    <?php echo form_close() ?>
                </div>
            </div>

            <!--        <div class="col-md-2"> &nbsp;</div>-->
        </div>
    </div>

    <script>
        CKEDITOR.replace('editorTextArea');
        //$(function() {
        //		$( "#pubdate" ).datepicker({
        //                    format:'yyyy-mm-dd'
        //                });
        //	});
    </script>
</section>
