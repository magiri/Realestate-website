<?php $this->load->helper('form_builder_helper') ?>
<div class="container-fluid">
    <div class="box box-primary">

        <div class="box-body">
            <div class="row">
                <?php if (isset($property_features)): foreach ($property_features as $property_feature): ?>
                        <div class="col-md-6">
                            <?php echo form_open_multipart('management/property/edit_features', 'role="form"') ?>
                            <?php
                            echo form_hidden('id', $property_feature->id);
                            $feature_name = $this->Gen_model->get_feature_name($property_feature->feature_id);
                            ?>
                            <?php b_form_input(array('name' => 'value', 'placeholder' => $feature_name->name, 'setvalue' => $property_feature->value, 'readonly' => 'readonly')) ?>

                            <?php echo form_close() ?>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
            <div class="row">
                <?php echo form_open_multipart('management/property/edit_features', 'role="form"') ?>
                <?php echo form_hidden('property_id', $property_id) ?>
                <div class="col-md-5">
                    <?php
                    $features = $this->Gen_model->get_features();
                    $options = array();
                    foreach ($features as $feature) {
                        $options[$feature->id] = $feature->name;
                    }
                    b_form_dropdown(array('name' => 'feature_id', 'options' => $options, 'placeholder' => 'Select a feature', 'setvalue' => ''));
                    ?>   
                </div>
                <div class="col-md-5">
                    <?php b_form_input(array('name' => 'value', 'placeholder' => "Value", 'setvalue' => '')) ?>
                </div>
                <div class="col-md-2">
                    </br>
                    <button class="btn btn-primary btn-block" type="submit">Save</button>
                </div><!-- /.box -->


                <?php echo form_close() ?>
            </div>
        </div>
    </div>


</div>



