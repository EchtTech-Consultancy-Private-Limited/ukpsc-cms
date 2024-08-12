<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!--print custom success message-->

    <?php if ($this->session->flashdata('registersuccess')): ?>
        <div class="m-b-15 flasremove" >
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <p>
                    <i class="icon fa fa-check"></i>
                    <?php echo $this->session->flashdata('registersuccess'); ?>
                </p>
            </div>
        </div>

    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>

        <div class="m-b-15 flasremove" >

            <div class="alert alert-success alert-dismissable">

                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>

                <p>

                    <i class="icon fa fa-check"></i>

                    <?php echo $this->session->flashdata('success'); ?>

                </p>

            </div>

        </div>

    <?php endif; ?>

<script>

    $(document).ready(function () {

        window.setTimeout(function() {

             $("#registersuccess").fadeTo(500, 0).slideUp(500, function(){

                $(this).remove();

                <?php unset($_SESSION['registersuccess'])?>

             });

          }, 4000);

          $(document).ready(function () {

        window.setTimeout(function() {

            $("#consent_recieved").fadeTo(500, 0).slideUp(500, function(){

                $(this).remove();

                    <?php unset($_SESSION['success'])?>

                });

            }, 4000);

        });  



  $(function () {



    $("#example1").DataTable();



  });



    });    

</script>