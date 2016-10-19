

<link rel="stylesheet" href="<?php echo site_url('assets/plugins/datatables/css/dataTables.bootstrap.css'); ?>"/>
<!--<link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css'); ?>"/>-->
<?php
if (isset($id_name)):
    $id_name = $id_name;
else:
    $id_name = 'check';
endif;
?>


<style>

    td.highhlight {
        background-color: whitesmoke !important;
    }
</style>

<div class="container-fluid">
    <!--    <form style="float:right">
            <input type="text" placeholder="Search" class=""  onkeyup="showHint(this.value)">
        </form>
    -->
    <div class="panel">
        <div class="panel-body">
            <div id="result">

                <table class="table table-bordered table-striped panel-info table-hover table-responsive" id="<?php echo $id_name; ?>">

                    <?php if (isset($rows)) : ?>
                        <thead>
                            <tr class="btn-info">
                                <?php
                                if (isset($display_cols)) :
                                    $cols = array_keys($display_cols);
                                    foreach ($display_cols as $header) :
                                        ?>

                                        <th> <?= $header ?></th>
                                    <?php endforeach; ?>
                                    <?php if (isset($links)): ?>
                                        <th> Actions</th>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <?php
                                if (isset($display_cols)) :
                                    $cols = array_keys($display_cols);
                                    foreach ($display_cols as $header) :
                                        ?>

                                        <th> <?= $header ?></th>
                                    <?php endforeach; ?>
                                    <?php if (isset($links)): ?>
                                        <th> Actions</th>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($rows as $row) : ?>
                                <tr>

                                    <?php foreach ($cols as $col) : ?>
                                        
                                        <td>
                                            <?= $row->$col; ?>
                                        </td>
                                    <?php endforeach; ?>
                                    <?php if (isset($links)): ?>
                                        <td>
                                            <?php
                                            foreach ($links as $key => $value):
                                                ?>



                                                <a href="<?= site_url($value . $row->$field) ?>" style="text-transform:capitalize;"><button class="btn btn-info"> <?php echo $key ?> </button></a> 

                                            <?php endforeach; ?>

                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                        <?php
                    endif;
                    ?>


                </table>
            </div>


        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo site_url('assets/plugins/datatables/js/jquery.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#<?php echo $id_name ?>').DataTable();
    });
    document.addEventListener('DOMContentLoaded', function () {
        $('#<?php echo $id_name ?>').DataTable();
    }, false);
</script>
<script type="text/javascript" src="<?php echo site_url('assets/plugins/datatables/js/jquery.dataTables.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/plugins/datatables/js/dataTables.bootstrap.js') ?>"></script>




