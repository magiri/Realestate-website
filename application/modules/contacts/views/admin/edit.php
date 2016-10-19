<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="text-center">
                <?php
                echo validation_errors('<p class="text-danger"><b>', '</b></p>');
                ?>    
            </div> 
            <?php
            if (strlen($contacts->name) > 0) {
                $headingtext = 'Update Contact';
                $btntext = 'Update Contact';
            } else {
                $headingtext = 'Add New Contact';
                $btntext = 'Add Contact';
            }
            ?>
            <h2 class="page-header text-center"><?php echo $headingtext ?></h2>

            <div class="row">
                <?php echo form_open('', 'class="form-horizontal" role="form"') ?>
                <?php echo form_hidden('id', $contacts->id) ?>
                <div class="form-group">
                    <label class="col-md-2 control-label">Name</label>
                    <div class="col-md-10">
                        <?php echo form_input('name', set_value('name', $contacts->name), 'class="form-control"') ?>
                    </div>
                </div>

               

                    <div class="form-group">
                        <label class="col-md-2 control-label">Email:</label>
                        <div class="col-md-10">
                            <?php echo form_input('email', set_value('email', $contacts->email), 'class="form-control"') ?>
                        </div>
                    </div>




                <div class="form-group">
                    <label class="col-md-2 control-label">Phone Number(s):</label>
                    <div class="col-md-10">
                        <?php echo form_input('phone_numbers', set_value('phone_numbers', $contacts->phone_numbers), 'class="form-control"') ?>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-2 control-label">Location:</label>
                    <div class="col-md-10">
                        <?php echo form_input('location', set_value('location', $contacts->location), 'class="form-control"') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Display on:</label>
                    <div class="col-md-10">
                        <select name="display_on" class="form-control">
                            <option value="0">None</option>
                            <option value="Footer">Footer</option>

                        </select>


                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label"> Status:</label>
                    <div class="col-md-10">
                        <select name="status" class="form-control">
                            <option value="1">Show</option>
                            <option value="0" >Blocked</option>

                        </select>


                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <?php echo form_submit('submit', $btntext, 'class="btn btn-primary"') ?>
                    </div>
                </div>  

                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>


