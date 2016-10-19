<style type="text/css">

</style>

<!-- It can be fixed with bootstrap affix http://getbootstrap.com/javascript/#affix-->
<div  class="sidemenu">
    <div class="">
        <div class="page-header">
            <h5 class="text-uppercase"><b> Properties </b></h5>
        </div>
        <?php
        $model = new Gen_model;
        $model->create_model('categories');
        $cats = $model->get_all();
        ?>
        <?php if ($cats !== NULL): ?>


            <div class="">

                <?php foreach ($cats as $cat):
                    ?>

                    <a class="color3"  href="<?php echo site_url('property/sort/' . $cat->id); ?>">
                        <button class="btn btn-sm btn-primary">
                            <?php echo ($cat->name); ?>
                        </button>
                    </a>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
        <div class="page-header">
            <h5 class="text-uppercase"><b> Pages </b></h5>
        </div>
        <div>
            <?php
            $pages_m = new Gen_model;
            $pages_m->create_model('pages');
            $pages = $pages_m->get_many_by(array('status' => 0));
            ?>

            <?php if (isset($pages)):foreach ($pages as $page): ?>


                    <a href="<?php echo site_url('pages/view/' . $page->slug) ?>">
                        <button class="btn btn-sm btn-default">
                            <?php echo $page->name ?>
                        </button>
                    </a>

                    <?php
                endforeach;
            endif;
            ?>



        </div>

    </div>
</div>





