<div class="row"><?php
    if (isset($pagination)and $pagination != ''):
        ?>
        <style type="paginate">
            .my-pagination{
                width: 100%;
                margin:10px;
            }
        </style>
        <div class="my-pagination" >
            <?php echo($pagination); ?>
        </div>
        <?php
    endif;
    ?>
</div>