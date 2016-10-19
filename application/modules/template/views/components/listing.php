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
<div class="row">
    <?php
    if (isset($properties) and count($properties)): foreach ($properties as $property): {
                
            }
            ?>
            <div class="col-md-4 col-md-mine" style="margin-top:20px; min-width:203px; ">
                <div style=" border:1px  #74451B solid;" >
                    <?php
                    $model = new Gen_model;
                    $image = $model->get_property_image($property->id, true);
                    ?>

                    <?php if ($image == NULL): ?>
                        <img class="" style="height:200px;width:100%; max-width:100%; min-width:200px" src='<?php echo site_url('assets/uploads/logowb.png') ?>'>
                    <?php else: ?>
                        <img class="" style="height:200px;width:100%; max-width:100%; min-width:200px" src='<?php echo site_url('assets/uploads/' . $image->file_name) ?>'>
                    <?php endif; ?>
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

                            <?php
                            $modelf = new Gen_model;
                            $modelf->create_model('eb_property_features');
                            $modelf->limit(3);
                            $p_features = $modelf->get_many_by(array('property_id' => $property->id));
                            
                            $i= count($p_features);
                            if ($p_features != NULL):foreach ($p_features as $feature):
                                    $feature_details = $this->Gen_model->get_feature_name($feature->feature_id);
                                    ?>
                                    <tr>              
                                        <td class="text text-capitalize">
                                            <?php echo $feature_details->name ?>
                                        </td> 
                                        <td><?php echo $feature->value ?></td>
                                    </tr>
                                    <?php
                                endforeach;
                           endif;
                                ?>
                                <?php for ($i ; $i <= 3; $i++): ?>

                                    <tr>              
                                        <td>
                                            .
                                        </td> 
                                        <td>
                                            .
                                        </td>
                                    </tr> 
                                    <?php
                                endfor;
                            
                            ?>



                        </table>

                    </div>
                    <div class="stats wb-ebony-bg">
                        <!--<span class="fa fa-heart-o" rel="tooltip" title="Liked"> <strong>47</strong></span>-->
                        <span class="fa fa-eye" rel="tooltip" title="Viewed"> <strong><?php echo $property->views; ?> views</strong></span>

                        <span class="fa fa-photo pull-right" rel="tooltip" title="Photos"> <strong>12</strong></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php
        echo $this->load->view('components/pagenation_v', TRUE);
    else:
        ?>
        <div class="alert alert-danger">
            Coming Soon
        </div>

    <?php endif; ?>
</div>