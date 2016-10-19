<style type="text/css">
    /*    body{
            background-color: #fff;
        }*/
    .content-wrapper{
        background-color:#fff;
        color:#000;
        padding:10px;
        border-radius: 9px;
    }  

    .content-wrapper input{
        background-color: #fff;
        border:  1px solid #000;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="contentdwrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php
        if (strlen($articles->id) > 0) {
            $btntext = 'Edit Article';
        } else {
            $btntext = 'Add New Article';
        }
        ?>
        <h1>
            <?php echo empty($articles->id) ? 'Add Current Article' : 'Edit article '; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('articles/admin'); ?>">Articles</a></li>
            <li class="active">
                <?php echo empty($articles->id) ? 'Add current article' : 'Edit article ' . '<small>' . $articles->title . '</small>'; ?>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="d">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">                        

                    <div class="box-body">
                        <?php echo form_error(); ?>

                        <!-- form start -->
                        <?php echo form_open('', array('id' => 'defaultForm', 'name' => 'defaultForm')); ?>
                        <?php echo form_hidden('id', $articles->id) ?>
                        <div class="form-group col-md-8">
                            <label class="">Article Title</label>
                            <div class="input-group col-md-12">
                                <?php echo form_input('title', set_value('title', $articles->title), 'class="form-control" placeholder="Enter article title"'); ?> 
                            </div>
                        </div>

                        <!--                        <div class="form-group col-md-3">
                                                    <label class="">Article Category</label>
                                                    <div class="input-group col-md-12">
                        <?php
                        echo form_dropdown('category', set_value('category', $category), $this->input->post('id') ?
                                        $this->input->post('id') : $articles->category, 'class="form-control form-area dropdown-toggle"')
                        ?>
                                                    </div>
                                                </div>-->

                        <div class="form-group col-md-4">
                            <label class="control-label">Publication Date</label>
                            <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <?php echo form_input('pubdate', set_value('pubdate', $articles->pubdate), 'class="form-control" type="text" size="16" readonly'); ?> 
<!--                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>-->
                            </div>
                            <div class="clearfix"></div>
                        </div>


                        <div class="form-group col-md-12">
                            <label class="control-label">Article Content</label>
                            <?php echo form_textarea('body', set_value('body', $articles->body), 'class="ckeditor form-control" id="editor1" rows="10" cols="80"'); ?> 
                            <div class="clearfix"></div>
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
    $(function () {
        $('#datetimepicker1').datetimepicker({
            language: 'pt-BR'
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
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
                            message: 'The article can\'t be empty'
                        }
                    }
                },
                pubdate: {
                    validators: {
                        notEmpty: {
                            message: 'The article publication date can\'t be empty'
                        }
                    }
                },
                body: {
                    validators: {
                        notEmpty: {
                            message: 'The article body can\'t be empty'
                        }
                    }
                }
            }
        });
        // Validate the form manually
        $('#validateBtn').click(function () {
            $('#defaultForm').bootstrapValidator('validate');
        });
        $('#resetBtn').click(function () {
            $('#defaultForm').data('bootstrapValidator').resetForm(true);
        });
    });</script>