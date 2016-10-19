<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->load->view('components/main_head'); ?>

    </head>
    <body class="">
        <div class="container-fluid">

            <?php echo $this->load->view('components/nav_header'); ?>
        </div><!-- ./wrapper -->
        <!-- Content Wrapper. Contains page content -->
        <div class="">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <div class="">

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
                    $this->load->view($module . '/' . $subview);
                } else {
                    
                }
                if (isset($subview_string)) {
                    echo $subview_string;
                }
                ?>
            </div><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <?php echo $this->load->view('components/footer'); ?>



        <?php echo $this->load->view('components/gen_js'); ?>
    </body>
</html>
