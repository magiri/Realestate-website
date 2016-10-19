<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
<?php echo   $this->load->view('edit_menu', TRUE); ?>
        </div>
        <div class="col-md-9">
            <?php
            if (!isset($edit_subview)) {
                $edit_subview = "";
            }
            if (!isset($module)) {
                $module = $this->uri->segment(1);
            }

            if ($module != "" && $edit_subview != "") {
                /* loads a module together with the subview accompanying it */
                $this->load->view($module . '/' . $edit_subview);
            } else {
                echo "*";
            }
            ?>
        </div>

    </div>
</div>