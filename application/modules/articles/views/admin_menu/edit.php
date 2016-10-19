<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php
        if (strlen($menu->id) > 0) {
            $btntext = 'Edit Menu';
        } else {
            $btntext = 'Add Category';
        }
        ?>
        <h1>
            <?php echo empty($menu->id) ? 'Add Current Menu' : 'Edit menu '; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('sitemanagement'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('sitemanagement/menu'); ?>">Menu</a></li>
            <li class="active">
                <?php echo empty($menu->id) ? 'Add current menu' : 'Edit menu ' . '<small>' . $menu->title . '</small>'; ?>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">                        

                    <div class="box-body">
                        <!-- form start -->
                        <?php echo form_open('', array('id' => 'defaultForm', 'name' => 'defaultForm')); ?>

                        <div class="form-group col-md-5">
                            <label class="">Menu Title</label>
                            <div class="input-group col-md-12">
                                <?php echo form_input('title', set_value('title', $menu->title), 'class="form-control" placeholder="Enter menu title"'); ?> 
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="">
                                <button type="submit" class="btn btn-primary" name="stepthree" value="Submit"><?php echo $btntext; ?> <i class="fa fa-sign-in"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php echo form_close(); ?>
                        <div class="clearfix"></div>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
</div>   <!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
    $(function() {
        $('#datetimepicker1').datetimepicker({
            language: 'pt-BR'
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        // Generate a simple captcha
        function randomNumber(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        }
        ;
        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
        $('#defaultForm').bootstrapValidator({
            //        live: 'disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                title: {
                    validators: {
                        notEmpty: {
                            message: 'The menu can\'t be empty'
                        }
                    }
                },
                pubdate: {
                    validators: {
                        notEmpty: {
                            message: 'The menu publication date can\'t be empty'
                        }
                    }
                },
                body: {
                    validators: {
                        notEmpty: {
                            message: 'The menu body can\'t be empty'
                        }
                    }
                }
            }
        });
        // Validate the form manually
        $('#validateBtn').click(function() {
            $('#defaultForm').bootstrapValidator('validate');
        });
        $('#resetBtn').click(function() {
            $('#defaultForm').data('bootstrapValidator').resetForm(true);
        });
    });</script>