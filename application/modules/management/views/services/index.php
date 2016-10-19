<div class="container-fluid">


    <div class="row">
        <div class="col-md-12 bodyfont">
            <a href="<?php echo site_url('management/services/add/serv') ?>"><i><span class="fa fa-plus"></span></i><button class="btn btn-info btn-lg"> Add Service </button></a>

        </div>
    </div>


    <div class="row">
        <?php if (count($services)):foreach ($services as $service): ?>


                <div class="col-md-4">
                    <div class="box box-primary">
                          <div class="box-header">
                                <h3>    Title :  <propertyvalue><?php echo $service->title ?> 


                                </h3></propertyvalue>

                            </div>
                        <div class="box-body">

                          
                            <div class="row-fluid">
                                <img src="<?php echo site_url('assets/uploads/'.$service->img_url); ?>" width="100%" height="191px" alt="<?php echo $service->title ?>">
                            </div>

                            <br/>

                            <propertyvalue><a href="<?php echo site_url('management/services/edit/' . $service->id); ?>"><button class="btn btn-primary">Edit</button></a></propertyvalue>




                            <propertyvalue><a href="<?php echo site_url('management/services/delete/' . $service->id); ?>"> <button class="btn btn-danger" 
                                                                                                                                    onclick = "return confirm('You are about to delete this Service Permanently.This action is irreversible.Are you sure?')">Delete</button> </a>
                            </propertyvalue>




                            <?php if ($service->blocked == 0): ?>
                                <a href="<?php echo site_url('management/services/blockopt/block/' . $service->id); ?>"> <button class="btn btn-warning">Block Service</button> </a>
                            <?php else: ?>
                                <a href="<?php echo site_url('management/services/blockopt/unblock/' . $service->id); ?>"> <button class="btn btn-success">Unblock Service</button> </a>
                            <?php endif; ?>




                        </div>



                    </div>
                </div>
                <?php
            endforeach;
        else:
            ?>

            <!---------error message--------------->
            <div class="row unavailableinfo">
                <propertyvalue> Sorry Services currently unavailable!</propertyvalue>
            </div>
            <!--------- end of error message--------------->


        <?php endif; ?>


    </div>

    <!---------pagination comes here--------------->
    <div class="row ">

        <!-----------pagination start here-------------->
        <?php
        if (strlen($pagination) > 0) {
            echo $data_info_string = count($services) == 1 ? ($offset_data + 1) . ' OF ' . $noOfservices :
            ($offset_data + 1) . ' TO ' . ($offset_data + count($services)) . ' OF ' . $noOfservices;
        } else {
            //echo $noOfservices;
        }
        ?><br/>
        <?php if (strlen($pagination) > 0): ?>
            <?php echo $pagination ?>
        <?php endif; ?>
        <!----------------pagination ends here------------------------->

    </div>
    <!--------- pagination ends here--------------->


</div>
</div>


</div>




