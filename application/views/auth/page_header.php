<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8">
        <base href="<?php echo site_url(); ?>"
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site Management Login</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <style>
            /*		body{background:#fee;}*/
            #menu{float:left;width:100%;background:pink;}
            /*@media only screen and ( min-width:801px ){*/

            /*		}*/
            #menu{float:right;width:25%;}
        </style>
        <?php
        // Add any javascripts
        if (isset($javascripts)) {
            foreach ($javascripts as $js) {
                echo '<script src="' . $js . '"></script>' . "\n";
            }
        }

        if (isset($final_head)) {
            echo $final_head;
        }
        ?>
    </head>
    <body>
        
        
<!--        <div id="menu">
            <ul>
                <li><?php
        $link_protocol = USE_SSL ? 'https' : NULL;

        if (isset($auth_user_id)) {
            echo anchor(site_url('auth/logout', $link_protocol), 'Logout');
        } else {
            echo anchor(site_url(LOGIN_PAGE . '?redirect=examples', $link_protocol), 'Login', 'id="login-link"');
        }
        ?></li>
                    <?php
                    if (!isset($auth_user_id)) {
                        echo '<li>' . anchor(site_url('auth/ajax_login', $link_protocol), 'Ajax Login', 'id="ajax-login-link"') . '</li>';
                    }
                    ?>
                <li>
                <?php echo anchor(site_url('auth/optional_login_test', $link_protocol), 'Optional Login'); ?>
                </li>
                <li>
                    <?php echo anchor(site_url('auth/simple_verification', $link_protocol), 'Simple Verification'); ?>
                </li>
                <li>
                    <?php echo anchor(site_url('auth/create_user', $link_protocol), 'Create User'); ?>
                </li>
            </ul>
        </div>-->

<?php

/* End of file page_header.php */
/* Location: /community_auth/views/auth/page_header.php */