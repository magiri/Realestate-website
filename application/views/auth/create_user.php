<style type="text/css">
    body{
        background:#f5f5f5;

    }
    .form_add{

    }
</style>
<div class="container">
    <div class="row">
        <div class="well col-md-6 col-md-offset-3" style="margin-top:10%;background:#fff">
            <legend>Create User</legend>
            <?php if (isset($validation_errors)): ?>
                <div class="alert alert-danger">

                    <!--<a class="close" data-dismiss="alert" href="#">×</a>-->

                    <p>
                        <?php echo $validation_errors; ?>
                    </p>


                </div>
                <?php
            endif;
            echo form_open('auth/create_user', array('class' => 'form-horizontal'));
            ?>


            <div class="form-group form_add">
                <label for="username" class=" col-md-3 text text-capitalize text-bold">Username</label>
                <div class="col-md-9">
                    <input type="text" name="username" id="login_string" class=" form-control"  autocomplete="off" maxlength="255" />

                </div>
            </div>
            <div class="form-group form_add" >
                <label for="email" class=" col-md-3 text text-capitalize text-bold">Email</label>
                <div class="col-md-9">
                    <input type="email" name="email" id="login_string" class=" form-control" autocomplete="off" maxlength="255" />

                </div>
            </div>
            <div class="form-group form_add"  >
                <label for="passwd" class="col-md-3 form_label">Password</label>
                <div class="col-md-9">
                    <input type="password" name="passwd" id="login_pass" class=" password form-control" value="made1nKenya" maxlength="<?php echo config_item('max_chars_for_password'); ?>" autocomplete="off" readonly="readonly" onfocus="this.removeAttribute('readonly');" />

                </div>
            </div>
            <div class="form-group form_add"  >
                <label for="passwdconf" class="col-md-3 form_label">Confirm Pwd</label>
                <div class="col-md-9">
                    <input type="password" name="passwdconf" id="login_pass" class=" password form-control" value="made1nKenya" maxlength="<?php echo config_item('max_chars_for_password'); ?>" autocomplete="off" readonly="readonly" onfocus="this.removeAttribute('readonly');" />

                </div>
            </div>
            <div class=" form-group"  >
              


                    <input type="submit" class="btn btn-lg btn-success btn-block" name="submit" value="Save" id="submit_button"  />

              
            </div>

            </form>






        </div>
    </div>
</div>