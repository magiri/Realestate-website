<div class="container-fluid">
    <div class="box box-default">
        <div class="box-body">



            <div class="row">
                <div class="col-md-2"> &nbsp;</div>

                <div class="col-md-8">

                    <h2 class="page-header text-center"><?php echo 'Replace Image' ?></h2>



                    <div class="row">
                        <div class="text-center text-danger">
                            <?php
                            echo validation_errors('<p><b>', '</b></p>');

                            if (strlen($uploaderror) > 0) {
                                echo $uploaderror;
                            }
                            ?>    

                        </div> 


                        <!-------------------------------image here incase editing--------------------------------------------------------------------------------------------------------------------->
                        <div class="row text-center" style="margin-top:3%">
                            Previous Image
                        </div>
                        <div class="row-fluid" style="margin-bottom:5%">
                            <div class="row text-center">
                                <img src="<?php echo site_url('assets/uploads/' . $services->img_url); ?>" alt="<?php echo $services->title ?>" width="431px" height="291px" />
                            </div>

                        </div>
                        <!---------------------------------------------------------------------------------------------------------------------------------------------------->


                        <?php echo form_open_multipart('management/services/replace_image', 'class="form-horizontal" role="form"') ?>
                        <?php echo form_hidden('id', $services->id) ?>
                        <div class="form-group ">
                            <label class="col-md-2 control-label">New Image:</label>
                            <div class="col-md-10">
                                <?php echo form_upload('userfile', 'Browse'); ?> 
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="col-md-2 control-label">Title:</label>
                            <div class="col-md-10">
                                <propertyvalue> <?php echo $services->title; ?> </propertyvalue>
                                <?php echo form_hidden('title', $services->title) ?>
                            </div>
                        </div>


                        <?php
//                    echo form_hidden('relatedproperty', $services->relatedproperty);
                        echo form_hidden('replaceinspector', true);
                        ?>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <?php echo form_submit('submit', 'Replace Image', 'class="btn btn-primary"') ?>
                                <a class="btn btn-danger" href="<?php echo site_url('management/services/edit/' . $services->id) ?>">Cancel </a>
                            </div>
                        </div>

                    </div>

                    <?php echo form_close() ?>   








                </div>
            </div>


        </div>
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
