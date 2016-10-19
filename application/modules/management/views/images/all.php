<div class="container-fluid">


    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo site_url('management/images/add_images') ?>"><button class="btn btn-info btn-lg"><i><span class="fa fa-plus"></span></i> Add Image </button></a>
            <a href="<?php echo site_url('management/images/add_slider_images') ?>"><button class="btn btn-info btn-lg"><i><span class="fa fa-plus"></span></i> Add slider Image </button></a>
            <a href="<?php echo site_url('management/images/view_all') ?>"><button class="btn btn-info btn-lg"> All Images </button></a>
            <a href="<?php echo site_url('management/images/view_all_sort/slider_image') ?>"><button class="btn btn-info btn-lg"> All Slider Images </button></a>

        </div>
    </div>
    <?php if (isset($images)): foreach ($images as $image): ?>
            <div class="col-md-4">
                <div class="box box-primary">

                    <div class="box-body">
                        <h3>    Caption :<?php echo $image->caption ?> 


                        </h3>


                        <img class="" style="height:200px;width:100%; max-width:100%; min-width:200px" src='<?php echo site_url('assets/uploads/' . $image->file_name) ?>'>


                        <br/>

                        <propertyvalue><a href="<?php echo site_url('management/images/edit/'.$image->id); ?>"><button class="btn btn-primary">Edit</button></a></propertyvalue>




                        


                        <?php if ($image->slider_image != 1): ?>
                            <a class="btn btn-default" href="<?php echo site_url('management/images/make_slider/' . $image->id) ?>" >Home Slider</a>
                        <?php else: ?>
                            <a class="btn btn-warning" href="<?php echo site_url('management/images/make_slider/' . $image->id . '/0') ?>">Remove from Slide</a>
                        <?php endif; ?>

                        <?php if ($image->status == 0): ?>
                            <a href="<?php echo site_url('management/images/blockopt/block/' . $image->id); ?>"> <button class="btn btn-warning">Block Image</button> </a>
                        <?php else: ?>
                            <a href="<?php echo site_url('management/images/blockopt/unblock/' . $image->id); ?>"> <button class="btn btn-success">Unblock image</button> </a>
                        <?php endif; ?>




                    </div>



                </div>
            </div>
            <?php
        endforeach;

        echo $this->load->view('components/pagenation_v', TRUE);
    endif;
    ?>
</div>