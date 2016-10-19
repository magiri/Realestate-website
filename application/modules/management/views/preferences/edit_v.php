<?php $this->load->helper('form_builder_helper') ?>
<style>
    .top{
        /*        margin-top:10px;
                margin-bottom:10px;*/
    }
</style>
<div class="container-fluid top">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Preferences <small></small></h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body">

                <?php if (isset($pref)): ?>

                    <?php echo form_open('management/edit_pref/'.$pref_type, 'role="form"') ?>
                    <?php
                    echo form_hidden('id', $pref->id);
                    ?>
                    <div class="col-md-4">
                        <?php b_form_input(array('name' => 'name', 'placeholder' => 'Name', 'setvalue' => $pref->name)) ?>
                    </div>
                    <div class="col-md-5">
                        <?php b_form_input(array('name' => 'description', 'placeholder' => 'Description', 'setvalue' => $pref->description)) ?>
                    </div>
                    <div class="col-md-3">
                        </br>
                        <button class="btn btn-lg btn-success btn-block" type="submit">Save</button>
                    </div>
                    <?php echo form_close() ?>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </div>

</div>







