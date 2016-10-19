<?php $this->load->helper('form_builder_helper') ?>
<?php if (isset($property_info)): ?>
    <div class="container-fluid ">
        <div class="panel panel-default">

            <div class="panel-body">
                <div class="row">
                    <?php // var_dump(strlen($validation_errors)) ?>
                    <?php if (isset($validation_errors) && strlen($validation_errors) > 1): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <?php echo($validation_errors) ?>
                        </div>
                    <?php endif; ?>
                    <?php echo form_open_multipart('management/property/edit_basic_info', 'role="form"') ?>
                    <?php echo form_hidden('id', $property_info->id) ?>
                    <div class="col-md-8">
                        <div class="box box-primary">

                            <div class="box-body">


                                <?php b_form_input(array('name' => 'name', 'placeholder' => "Name", 'setvalue' => $property_info->name)) ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php
                                        $options = array(
                                            '1' => 'Rent',
                                            '2' => 'For Sale',
                                        );
                                        b_form_dropdown(array('name' => 'rent_sale', 'options' => $options, 'placeholder' => 'For Rent/Sale', 'setvalue' => $property_info->rent_sale));
                                        ?>  
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        $cats = $this->Gen_model->get_categories();
                                        $options = array();
                                        foreach ($cats as $cat) {
                                            $options[$cat->id] = $cat->name;
                                        }

                                        b_form_dropdown(array('name' => 'category_id', 'placeholder' => "Category", 'options' => $options, 'placeholder' => 'Category', 'setvalue' => $property_info->category_id));
                                        ?> 
                                    </div>
                                </div>





                                <?php b_form_input(array('name' => 'price', 'placeholder' => "Price", 'setvalue' => $property_info->price)) ?>

                                <div class="col-md-form">
                                    <?php
                                    b_form_input(array('name' => 'no_of_units', 'placeholder' => 'Units', 'setvalue' => $property_info->no_of_units));
                                    ?>
                                </div>
<!--                                <div class="col-md-form">
                                    <?php
                                    b_form_input(array('name' => 'size', 'placeholder' => 'Size', 'setvalue' => $property_info->size));
                                    ?>
                                </div>

                                <div class="col-md-form">
                                    <?php
                                    $options = array(
                                        'Square M' => 'Square M',
                                        'Acre' => 'Acre',
                                    );
                                    b_form_dropdown(array('name' => 'size_unit', 'options' => $options, 'placeholder' => 'Measure', 'placeholder' => 'Measure', 'setvalue' => $property_info->size_unit));
                                    ?>
                                </div>-->
                                <div class="col-md-form">
                                    <?php
                                    b_form_input(array('name' => 'yearbuilt', 'placeholder' => 'Year Built', 'setvalue' => $property_info->yearbuilt));
                                    ?>
                                </div>

                            </div><!-- /.box-body -->




                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Address and Location <small></small></h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div><!-- /. tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body pad">
                                <textarea name="address" rows="4"cols="27" ><?php echo $property_info->address ?></textarea>
                                <div class="">
                                    <?php
                                    b_form_input(array('placeholder' => 'latitude', 'name' => 'latitude', 'setvalue' => $property_info->latitude));
                                    ?>
                                    <?php
                                    b_form_input(array('placeholder' => 'longitude', 'name' => 'longitude', 'setvalue' => $property_info->longitude));
                                    ?>

                                </div>


                            </div>
                        </div><!-- /.box -->
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

                            <textarea id="editor1" name="description" rows="10" cols="80"><?php echo $property_info->description ?></textarea>

                        </div>
                    </div><!-- /.box -->
                </div>



                <div class="col-md-3">
                    <div class="box box-default">
                        <div class="box-footer">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                        </div>
                    </div><!-- /.box -->
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
  




<?php else: ?>
    Something went wrong 
<?php endif; ?>

