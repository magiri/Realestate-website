<?php $this->load->helper('form_builder_helper') ?>

    <div class="row">

        <div class="col-md" >
            <div class="" >

                <a href="<?php echo site_url('management/images/add_images') ?>" target="" class="btn btn-success btn-lg"> <i><span class="fa fa-plus"></span></i>Add Images</a>
            </div>
            <?php
            if (isset($image)) :
             
                    ?>
                    <?php echo form_open_multipart('management/images/edit') ?>
                
                    <?php echo form_hidden('id', set_value('id', $image->id)) ?>

                    <div class="box box-default">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img class="img-responsive" src="<?php echo site_url('assets/uploads/' . $image->file_name) ?>" style="width: " >
                                    
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
                            
                           
                            <?php if ($image->slider_image != 1): ?>
                                <a class="btn btn-lg btn-default" href="<?php echo site_url('management/images/make_slider/' . $image->id) ?>" >Home Slider</a>
                            <?php else: ?>
                                <a class="btn btn-lg btn-warning" href="<?php echo site_url('management/images/make_slider/' . $image->id.'/0') ?>">Remove from Slide</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>

                    <?php
             
            endif;
            ?>

         
        </div>
    </div>
</div>



