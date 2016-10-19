<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Current Menu List
        </h1>
        <h2><small>  <?php echo anchor('sitemanagement/menu/edit', '<i class="fa fa-plus">' . '</i>' . '  Add Category'); ?></small></h2>
        <div class="error">            
            <p><?php echo $this->session->flashdata('error'); ?></p>
        </div>
        <div class="success" style="color: green !important;">
            <p><?php echo $this->session->flashdata('success'); ?></p>
        </div>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('sitemanagement'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Menu List</li>
        </ol>
    </section>


    <?php
    if (count($menu)) {
        ?>
        <!-- Main content -->
        <section class="content">
            <!--row-->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Current Menu List</h3>
                            <div class="box-tools">
                                <div class="input-group">
                                    <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php foreach ($menu as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->id; ?></td>
                                        <td><?php echo $row->title; ?></td>
                                        <td>
                                            <?php echo $this->session->userdata('access_level') == 'super' ? anchor('sitemanagement/menu/edit' . '/' . $row->id, '<i class="fa fa-edit"></i>' . ' Edit', array('class' => 'btn btn-xs btn-info td-btn')) : anchor('', '<i class="fa fa-edit"></i>' . 'Edit', array('class' => 'btn btn-xs btn-info td-btn disabled')); ?>
                                        </td>
                                        <td>
                                            <?php echo $this->session->userdata('access_level') == 'super' ? anchor('sitemanagement/menu/delete' . '/' . $row->id, '<i class="fa fa-trash"></i>' . ' Delete', array('class' => 'btn btn-xs btn-danger td-btn btn-sm', 'onclick' => "return confirm('you are about to delete a record. this cannot be undone. Are you sure?');")) : anchor('', '<i class="fa fa-trash"></i>' . ' Delete', array('class' => 'btn btn-xs btn-danger td-btn disabled', 'onclick' => "return confirm('you are about to delete a record. this cannot be undone. Are you sure?');")); ?>
                                        </td>
                                    </tr> 
                                <?php }
                                ?>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
            <!-- row -->
        </section><!-- /.content -->
        <?php
    } else {
        echo '<p class="error">' . 'No user was found' . '</p>';
    }
    ?>
</div><!-- /.content-wrapper -->






