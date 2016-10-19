<style type="text/css">
    .eb-page{
     background-color:#fff;
     /*padding:5px;*/
  
    }
    .eb-page-content{
        padding:5px;
    }
    .page-header{
        margin-left:7px;
    }
</style>

<div class="container-fluid eb-page" >
    <div class="row">
        <?php if (isset($page)): ?>
            <div class="page-header">
                <h3>
                    <?php echo $page->name; ?>
                </h3>
            </div>
        <div class="eb-page-content">
                <?php echo $page->content ?>

            </div>
        <?php endif; ?>

    </div>
</div>