





<section>

    <div class="col-md-6 bodyfont">
        <a href="<?php echo site_url('services/admin/add/serv') ?>"><i><span class="fa fa-plus"></span></i><button class="btn btn-info btn-lg"> Add Service </button></a>
        <a href="<?php echo site_url('services/admin/add/loan') ?>"><i><span class="fa fa-plus"></span></i><button class="btn btn-info btn-lg"> Add loan Products </button></a>
    </div>

    <div class="row" style="margin-bottom:3%;">

        <?php if (count($services) > 1): ?>
            <a href="<?php echo site_url('services/admin/deleteall') ?>"> <button class="btn btn-danger btn-lg" 
                                                                                  onclick = "return confirm('You are about to delete All Services.This action is irreversible.Are you sure?')">Delete All</button> </a>
            <?php endif; ?>
    </div>

    <div class="row">
        <?php if (count($services)):foreach ($services as $service): ?>
                <div class="sliderimagesbackend">

                    <div class="col-md-3">


                        <div class="row">
                            <h3>    Title :  <propertyvalue><?php echo $service->title ?> 
                                    <span style="font-size:0.6em">
                                        <?php
                                        if ($service->type == 1) :
                                            echo 'Service';
                                        elseif ($service->type == 2):
                                            echo 'Loan';
                                        endif; ?>
                                    </span>

                            </h3></propertyvalue>

                        </div>
                        <div class="row-fluid">
                            <img src="<?php echo site_url($service->img_url); ?>" width="100%" height="191px" alt="<?php echo $service->title ?>">
                        </div>

                        <br/>

                        <propertyvalue><a href="<?php echo site_url('services/admin/edit/' . $service->id); ?>"><button class="btn btn-primary">Edit</button></a></propertyvalue>




                        <propertyvalue><a href="<?php echo site_url('services/admin/delete/' . $service->id); ?>"> <button class="btn btn-danger" 
                                                                                                                           onclick = "return confirm('You are about to delete this Service Permanently.This action is irreversible.Are you sure?')">Delete</button> </a>
                        </propertyvalue>




                        <?php if ($service->blocked == 0): ?>
                            <a href="<?php echo site_url('services/admin/blockopt/block/' . $service->id); ?>"> <button class="btn btn-warning">Block Service</button> </a>
                        <?php else: ?>
                            <a href="<?php echo site_url('services/admin/blockopt/unblock/' . $service->id); ?>"> <button class="btn btn-success">Unblock Service</button> </a>
        <?php endif; ?>




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


</section>




