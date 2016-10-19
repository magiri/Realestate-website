<?php $this->load->helper('form_builder_helper') ?>

<div class="container-fluid">
    <?php if (isset($error)): ?>
        <div class="alert alert-warning">
            <?php echo $error ?>
        </div>

    <?php endif; ?>
    <div class="row">
        <div class="box box-solid box-success"  id="add-images">
            <div class="box-header">
                Upload Images
            </div>
            <div class="box-body">
                <div class="text-info">
                    Tip!!  You Can select more than one image
                </div>
                <?php echo form_open_multipart('management/images/add_slider_images'); ?>
                <?php echo form_hidden('field_id', set_value('field_id', 0)) ?>
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