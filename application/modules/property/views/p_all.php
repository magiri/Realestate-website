<style type="text/css">
    .stats {
        display: block;
        padding: 10px;
        color: white;
    }
    .wb-ebony-bg { background-color: #74451B; }
    .wb-red { color: #822433;}
    .white { color: #fff!important; }
    .row .col-md-mine {
        padding-left:5px;
        padding-right:5px;
    }
</style>

<div class="page-header">
    <h1><?php
        if (isset($cat_name)):echo $cat_name;
        else: echo 'All Properties';
        endif;
        ?>
    </h1>
</div>
<div class="container-fluid">



    <div class="row">
        <div class="col-md-12">


            <?php
            echo($this->load->view('template/components/listing', TRUE))
            ?>

        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>