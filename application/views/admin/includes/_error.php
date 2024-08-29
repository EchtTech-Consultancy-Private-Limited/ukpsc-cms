<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



    <?php if ($this->session->flashdata('errors')): ?>

        <div class="m-b-15 flasremove" >

            <div class="alert alert-error alert-dismissable">

                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>

                <p>

                    <i class="icon fa fa-check"></i>

                    <?php echo $this->session->flashdata('errors'); ?>

                </p>

            </div>

        </div>

    <?php endif; ?>

    <script>

    $(document).ready(function () {

        window.setTimeout(function() {

             $("#error").fadeTo(500, 0).slideUp(500, function(){

                $(this).remove();

                <?php unset($_SESSION['errors'])?>

             });

          }, 4000);

    });    

</script>
