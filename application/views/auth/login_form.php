<div class="container">
    <div class="row">
        <div class="well col-md-4 col-md-offset-4 centred" style="margin-top:15%;">
            <legend>
                <?php
                if (!isset($optional_login)) {
                    echo 'Login';
                }
                ?>
            </legend>
            <?php
            if (!isset($on_hold_message))
                :
                if (isset($login_error_mesg))
                    :
                    ?>
                    <div class="alert alert-danger">

                        <a class="close" data-dismiss="alert" href="#">×</a>

                        <p>
                            <?php echo'	Login Error #:' . $this->authentication->login_errors_count . '/' . config_item('max_allowed_attempts') . ': Invalid Username, Email Address, or Password.'; ?>
                        </p>
                        <p>
                            Username, email address and password are all case sensitive.
                        </p>

                    </div>
                    <?php
                endif;
                if ($this->input->get('logout')):
                    ?>
                    <div class="alert alert-success">
                        <a class="close" data-dismiss="alert" href="#">×</a>

                        <p>
                            You have successfully logged out.
                        </p>
                    </div>

                    <?php
                endif;
                echo form_open($login_url, array('class' => 'form-horizontal'));
                ?>

                <div>
                    <div class="form-group" style="padding-left:10px;">
                         <label for="login_string" class="text text-capitalize text-bold">Username or Email</label>
                        <input type="text" name="login_string" id="login_string" class="form_input form-control" value="admin@admin.com" autocomplete="off" maxlength="255" />

                    </div>
                    <div class="form-group" style="padding-left:10px;" >
                         <label for="login_pass" class="form_label">Password</label>
                        <input type="password" name="login_pass" id="login_pass" class="form_input password form-control" value="made1nKenya" maxlength="<?php echo config_item('max_chars_for_password'); ?>" autocomplete="off" readonly="readonly" onfocus="this.removeAttribute('readonly');" />

                    </div>
                    <?php
                    if (config_item('allow_remember_me')) {
                        ?>

                        <br />

                        <label for="remember_me" class="form_label checkbox">Remember Me
                            <input type="checkbox" id="remember_me" name="remember_me" value="yes" />
                        </label>
                        <?php
                    }
                    ?>

                    <p>
                        <?php
                        $link_protocol = USE_SSL ? 'https' : NULL;
                        ?>
                        <a href="<?php echo site_url('auth/recover', $link_protocol); ?>">
                            Can't access your account?
                        </a>
                    </p>


                    <input type="submit" class="btn btn-success btn-block" name="submit" value="Login" id="submit_button"  />

                </div>
                </form>




                <!--
                                <input type="text" id="login_string" class="span4" name="login_string" autocomplete="off" placeholder="Username">
                                <input type="password" id="password" class="span4" name="password" placeholder="Password">
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" value="1"> Remember Me
                                </label>
                                <button type="submit" name="submit" class="btn btn-info btn-block">Sign in</button>
                                </form>   -->



            <?php else:
                ?>

                <!--EXCESSIVE LOGIN ATTEMPTS ERROR MESSAGE-->

                <div class="alert alert-error">
                    <p>
                        Excessive Login Attempts
                    </p>
                    <p>
                        You have exceeded the maximum number of failed login<br />
                        attempts that this website will allow.
                    <p>
                    <p>
                        Your access to login and account recovery has been blocked for ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes.
                    </p>
                    <p>
                        Please use the <a href="/auth/recover">Account Recovery</a> after ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes has passed,<br />
                        or contact us if you require assistance gaining access to your account.
                    </p>
                </div>
                ';
            <?php endif; ?> 


        </div>
    </div>
</div>