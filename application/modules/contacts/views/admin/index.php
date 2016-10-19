
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?Php
            $noofcontactsprefix = 's';
            if (!empty($contacts)) {
                $noofcontactsprefix = ($noOfcontacts < 1 || $noOfcontacts > 1) ? 's' : '';
            }
            ?>

            <h1 class="page-header"><?php echo $noOfcontacts ?> Contact<?php echo $noofcontactsprefix ?></h1>

            <!-----------pagination start here-------------->
            <?php
            if (strlen($pagination) > 0) {
                echo $data_info_string = count($contacts) == 1 ? ($offset_data + 1) . ' OF ' . $noOfcontacts :
                ($offset_data + 1) . ' TO ' . ($offset_data + count($contacts)) . ' OF ' . $noOfcontacts;
            } else {
                //echo $noOfcontacts;
            }
            ?><br/>
            <?php if (strlen($pagination) > 0): ?>
                <?php echo $pagination ?>
            <?php endif; ?>
            <!----------------pagination ends here------------------------->

            <!--contacts table-->

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th> Phone Number(s)</th>
                            <th>location</th>
                            <th> Display on</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>  
                    </thead>

                    <tbody>
                        <?php if (count($contacts)): foreach ($contacts as $contact): ?> 
                                <tr>
                                    <td><?php echo anchor('contacts/admin/edit/' . $contact->id, $contact->name); //$contact->title        ?></td>
                                    <td><?php echo $contact->email ?></td>
                                    <td><?php echo $contact->phone_numbers ?></td>

                                    <td><?php echo $contact->location ?></td>
                                    <td><?php echo $contact->display_on ?></td>
                                    <td><?php echo $contact->status ?></td>
                                    <td><a class="btn btn-warning" href="<?php echo site_url('contacts/admin/edit/' . $contact->id) ?>">Edit</a></td>

                                </tr>
                                <?php
                            endforeach;
                        else:
                            ?>
                            <tr>
                                <td colspan="4">No contacts found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
