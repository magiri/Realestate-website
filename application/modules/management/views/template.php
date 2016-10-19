
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->load->view('components/main_head'); ?>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php echo $this->load->view('components/nav_header'); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <?php if (isset($page_title)): ?>
                        <h1>
                            <?php echo $page_title; ?>
                            <small>    <?php echo $page_desc; ?></small>
                        </h1>
                    <?php endif; ?>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li class="active">Here</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <!-- Your Page Content Here -->

                        <?php
                        if (!isset($subview)) {
                            $subview = "";
                        }
                        if (!isset($module)) {
                            $module = $this->uri->segment(1);
                        }

                        if ($module != "" && $subview != "") {
                            /* loads a module together with the subview accompanying it */
                            echo $this->load->view($module . '/' . $subview, TRUE);
                        } else {
                            echo "*";
                        }
                        ?>
                    </div>
                    <div class="row">
                        <?php
                        if (isset($subview_string)) {
                            echo $subview_string;
                        }
                        ?>
                    </div>
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php echo $this->load->view('components/footer'); ?>
            <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <?php echo $this->load->view('components/gen_js'); ?>
    </body>
</html>
