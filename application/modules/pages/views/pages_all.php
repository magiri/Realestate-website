<style type="text/css">
    .eb-page{
        background-color:#fff;
        /*padding:5px;*/

    }
    .eb-page-content{
        padding:5px;
    }
</style>

<div class="container-fluid eb-page" >
    <div class="row">
        <div class="page-header">
            <h3>
                Important Pages
            </h3>
        </div>
        <ol>
            <?php if (isset($pages)):foreach ($pages as $page): ?>

                    <li>
                        <a href="<?php echo site_url('pages/view/' . $page->slug) ?>"> <?php echo $page->name ?>
                        </a>
                    </li>


                <?php
                endforeach;
            endif;
            ?>
        </ol>
    </div>
</div>