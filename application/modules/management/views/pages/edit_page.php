<?php $this->load->helper('form_builder_helper') ?>
<div class="container-fluid ">
    <?php if (isset($page_info)): ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php if (isset($validation_errors) && strlen($validation_errors) > 1): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <?php echo($validation_errors) ?>
                    </div>
                <?php endif; ?>
                <?php echo form_open_multipart('management/pages/edit_page', 'role="form"') ?>
                <?php echo form_hidden('id', $page_info->id) ?>
                <div class="row">

                    <div class="col-md-8">
                        <?php b_form_input(array('name' => 'name', 'placeholder' => "Name", 'setvalue' => $page_info->name)) ?>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">  Page Image</h3>
                            </div>
                            <div class="box-body">

                                <img class="img-responsive" src="<?php echo site_url('assets/uploads/' . $page_info->image) ?>" alt="Upload an Image">

                                <?php echo form_upload('userfile'); ?>




                            </div>
                        </div>
                    </div>






                </div>
                <div class="row">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Description <small></small></h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div><!-- /. tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body pad">

                            <textarea id="editor1" name="content" rows="10" cols="80"><?php echo $page_info->content ?></textarea>

                        </div>
                    </div><!-- /.box -->
                </div>
                <div class="box-footer">
                    <button class="btn btn-lg btn-success pull-right" type="submit">Save</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    <?php endif; ?>
</div>

