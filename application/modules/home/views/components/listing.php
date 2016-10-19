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


<div class="container-fluid">
    <div class="page-header">
        <h1>Selected Properties</h1>
    </div>


    <div class="row-fluid">
        <?php
        if (isset($properties)): foreach ($properties as $property): {
                    
                }
                ?>
                <div class="col-md-4 col-md-mine" style="margin-top:20px; min-width:203px; ">
                    <div style=" border:1px  #74451B solid;" >

                        <img class="" style="height:200px; max-width:100%; min-width:200px" src='<?php echo site_url('assets/uploads/' . $property->image) ?>'>
                        <div style="border:1px  #74451B solid;">
                            <a href="<?php echo site_url('property/view_details/' . $property->id) ?>">
                                <h3 class="text  text-center" style="color: #74451B;height:113px; overflow:hidden ;" >
                                    <?php echo $property->name; ?>
                                </h3>
                            </a>
                        </div>
                        <div style="background: #74451B; border:1px  #74451B solid;">
                            <h3 class="text text-center text-sm" style="color:#fff">
                                Ksh.  <?php echo $property->price; ?>
                            </h3>
                        </div>
                        <div>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td>Bed</td>
                                    <td><?php echo $property->bedroom; ?></td>

                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td><?php echo $property->size . ' ' . $property->size_unit; ?></td>

                                </tr>



                            </table>

                        </div>
                        <div class="stats wb-ebony-bg">
                            <!--<span class="fa fa-heart-o" rel="tooltip" title="Liked"> <strong>47</strong></span>-->
                            <span class="fa fa-eye" rel="tooltip" title="Viewed"> <strong><?php echo $property->views; ?></strong></span>

                            <span class="fa fa-photo pull-right" rel="tooltip" title="Photos"> <strong>12</strong></span>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        endif;
        ?>
    </div>
</div>