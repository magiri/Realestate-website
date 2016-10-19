


<?php
if (isset($id_name)):
    $id_name = '#' . $id_name;
else:
    $id_name = '#check';
endif;
?>

<script type="text/javascript">
//    $(document).ready(function () {
//        $('<?php echo $id_name ?>').DataTable();
//
//
//        $('<?php echo $id_name ?> tbody')
//                .on('mouseenter', 'td', function () {
//                    var colIdx = table.cell(this).index().column;
//
//                    $(table.cells().nodes()).removeClass('highlight');
//                    $(table.column(colIdx).nodes()).addClass('highlight');
//                });
//    });
</script>
<style>

    td.highhlight {
        background-color: whitesmoke !important;
    }
</style>
<!--<script src="<?php echo site_url('assets/scripts/jquery-2.1.1.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/plugins/dataTables/js/jquery.dataTables.js'); ?>"></script>-->
<!--<link type="text/css" rel="stylesheet" href="<?php echo site_url('assets/studentmodules/tables.css') ?>"/>-->
<div class="container-fluid">
    <!--    <form style="float:right">
            <input type="text" placeholder="Search" class=""  onkeyup="showHint(this.value)">
        </form>
    -->
    <div class="panel">
        <div class="panel-body">
            <div id="result">

                <table class="table table-bordered table-striped disdplay" id="<?php echo $id_name; ?>">

                    <?php if (isset($rows)) : ?>
                        <thead>
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



                                            <a href="<?= site_url($value . $row->$field) ?>" style="text-transform:capitalize;"><button> <?php echo $key ?> </button></a> 

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

