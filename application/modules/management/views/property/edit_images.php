<?php $this->load->helper('form_builder_helper') ?>

<div class="container-fluid">
    <?php if (isset($error)): ?>
        <div class="alert alert-warning">
            <?php echo $error ?>
        </div>

    <?php endif; ?>
    <div class="row">

        <div class="col-md" >
            <div class="" >

                <a href="#add-images" target="" class="btn btn-success btn-lg"> <i><span class="fa fa-plus"></span></i>Add Images</a>
            </div>
            <?php
            if (isset($images)) :
                foreach ($images as $image):
                    ?>
                    <?php echo form_open_multipart('management/property/edit_images') ?>
                    <?php echo form_hidden('field_id', set_value('field_id', $image->field_id)) ?>
                    <?php echo form_hidden('id', set_value('id', $image->id)) ?>

                    <div class="box box-default">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img class="img-responsive" src="<?php echo site_url('assets/uploads/' . $image->file_name) ?>" style="width: " >
                                    <div class="form-group bg-red-active">
                                        <label>
                                            Change Image
                                        </label>
                                        <?php echo form_upload('userfile', 'class="form-control"') ?>
                                    </div>
                                </div>
                                <div class="col-md-7">

                                    <?php
                                    b_form_input(array('placeholder' => 'Caption', 'name' => 'caption', 'setvalue' => $image->caption));
                                    ?>
                                    <div class="form-group">
                                        <label>
                                            Description 
                                        </label>
                                        <textarea class="form-control" name="description" rows="8" cols="80"><?php echo $image->description; ?></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-lg btn-primary pull-right" type="submit">Save Image Data</button>
                            <?php if ($image->main_image != 1): ?>
                                <a class="btn btn-lg btn-success" href="<?php echo site_url('management/property/default_image/' . $image->field_id . '/' . $image->id) ?>" >Make Default</a>
                            <?php else: ?>
                                <button class="btn btn-lg btn-warning">Default Image</button>
                            <?php endif; ?>
                            <?php if ($image->slider_image != 1): ?>
                                <a class="btn btn-lg btn-default" href="<?php echo site_url('management/images/make_slider/' . $image->id) ?>" >Home Slider</a>
                            <?php else: ?>
                                <a class="btn btn-lg btn-warning" href="<?php echo site_url('management/images/make_slider/' . $image->id.'/0') ?>">Remove from Slide</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>

                    <?php
                endforeach;
            endif;
            ?>

            <div class="box box-solid box-success"  id="add-images">
                <div class="box-header">
                    Upload Images
                </div>
                <div class="box-body">
                    <div class="text-info">
                        Tip!!  You Can select more than one image
                    </div>
                    <?php echo form_open_multipart('management/property/add_images'); ?>
                    <?php echo form_hidden('field_id', set_value('field_id', $p_id)) ?>
                    <div class="form-inline">
                        <div class="form-group">
                            <input type="file" name="userfile[]" id="js-upload-files" multiple>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>



