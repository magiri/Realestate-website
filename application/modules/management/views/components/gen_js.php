 

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<?php  if (!isset($enable_tables) or $enable_tables == FALSE):  ?>
<script src="<?php echo site_url('assets/plugins/jQuery/jQuery-2.1.4.min.js') ?>"></script>
<?php endif; ?>
<!-- Bootstrap 3.3.5 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/adminlte/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<?php $ckeditor = FALSE ?>
<?php if (isset($ckeditor)): ?>
    <?php if ($ckeditor = TRUE): ?>
        <script src="<?php echo site_url('/assets/plugins/ckeditor/ckeditor.js') ?>" type="text/javascript"></script>
        <script type="text/javascript">

            $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>


    <?php endif; ?>
<?php endif; ?>

<script type="text/javascript">
    // handle links with @href started with '#' only
    $(document).on('click', 'a[href^="#"]', function (e) {
        // target element id
        var id = $(this).attr('href');

        // target element
        var $id = $(id);
        if ($id.length === 0) {
            return;
        }

        // prevent standard hash navigation (avoid blinking in IE)
        e.preventDefault();

        // top position relative to the document
        var pos = $(id).offset().top;

        // animated top scrolling
        $('body, html').animate({scrollTop: pos});
    });

</script>
