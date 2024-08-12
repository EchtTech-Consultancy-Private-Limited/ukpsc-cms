<?php //echo '<pre>'; print_r($admin);exit;?>

<!-- Content Wrapper. Contains page content -->

<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/jquery.collapsibleCheckboxTree.css" type="text/css" />

<script type="text/javascript">
jQuery(document).ready(function() {

    $('ul#example').collapsibleCheckboxTree();

});
</script>

<style type="text/css">
.container-fluid {

    padding: 2rem 5rem;

}

.table td,

.table th {

    vertical-align: middle;

    /* width: 50%; */

}

.custom-table td,

.custom-table th {

    width: 50%;

}

hr {

    margin-bottom: 1.8rem;

}

.login-img {
    margin-bottom: 10px !important;
}

.login-img,
.exam-name {
    width: 100%;
    text-align: center !important;
}




@media print {

    #info,
    .card--header {
        display: none;
    }


    .break-section {
        clear: both;
        page-break-after: always;
    }
}
</style>
<!-- Main content -->
<?php
if(count($info)>0){
?>
<div class="card--header" align="center">

    <button class="btn btn-light btn-lg" onclick="history.back()">Back</button>

    <button type="button" class="btn btn-secondary  Print_preview">Download Report</button>

</div>
<?php foreach ($info as $value) {?>

<section class="content break-section">

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">

                <div class="card" style="margin-bottom: 0 !important;">
                    <div class="card-header">
                        <div class="login-img" style="color:#fff;">
                            <img style="height: 100%; " src="<?= base_url(); ?>assets/dist/img/ukpsc_logo.jpg" />
                        </div>
                        <h2 class="text-center">
                            उत्तराखंड लोक सेवा आयोग,हरिद्वार
                            <br>
                            (ऑनलाइन भुगतान हेतू प्रारुप)
                        </h2>

                        <div class="d-inline-block exam-name">

                            <h3 class="card-title">
                                <?= $exam_name ?>
                            </h3>
                        </div>
                    </div>

                    <div class="card-body" style="">

                        <!-- For Messages -->

                        <div class="row">

                            <div class="col-md-12">
                                <div class="table-responsive">

                                    <table class="table table-bordered table-striped custom-table">
                                        <tbody>


                                            <tr>
                                                <th>परीक्षा केंद्र का नाम (अंग्रेजी में)
                                                </th>
                                                <td><?php echo isset($value['school_name'])?strtoupper($value['school_name']):"";  ?>
                                                </td>

                                            </tr>

                                            <tr>

                                                <th>

                                                    बैंक खाते में धारक का नाम

                                                    <br>

                                                    (अंग्रेजी के बड़े अक्षर में)

                                                </th>

                                                <td><?php echo isset($value['acc_holder_name'])?strtoupper($value['acc_holder_name']):"" ?>
                                                </td>

                                            </tr>

                                            <tr>

                                                <th>

                                                    बैंक का नाम

                                                    <br>

                                                    (बैंक सी.बी.एस होना आवश्यक है)

                                                </th>

                                                <td><?php echo isset($value['ban_name'])?strtoupper($value['ban_name']):"" ?>
                                                </td>

                                            </tr>

                                            <tr>

                                                <th>

                                                    शाखा का नाम/स्थान

                                                    <br>

                                                    (स्कूल/कॉलेज/विश्वविद्यालय पता)

                                                </th>

                                                <td><?php echo isset($value['branch_name'])?strtoupper($value['branch_name']):"" ?>
                                                </td>

                                            </tr>

                                            <tr>

                                                <th>

                                                    उक्त बैंक का IFSC कोड संख्या

                                                </th>

                                                <td><?php echo isset($value['ifsc'])?strtoupper($value['ifsc']):"" ?>
                                                </td>

                                            </tr>

                                            <tr>

                                                <th> बचत/चालू खाता संख्या<br>(बैंक सी.बी.एस खाता)</th>

                                                <td><?php echo isset($value['acc_num'])?strtoupper($value['acc_num']):"" ?>
                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                                <hr>


                            </div>

                        </div>



                    </div>

                </div>



            </div>

        </div>



    </div>

    <!-- /.box-body -->

</section>

<?php }?>
<?php }else{?>
<div class="card--header" align="center">
    <button class="btn btn-light btn-lg" onclick="history.back()">Back</button>
</div>
<h2 class="text-center">Record not found</h2>
<?php }?>






<script type="text/javascript" src="<?= base_url() ?>assets/dist/js/jquery.collapsibleCheckboxTree.js"></script>

<script>
$(document).ready(function() {





    $(".Print_preview").click(function() {

        window.print();

    });

})

function histr() {

    history.back();

}

$('document').ready(function() {
    $('textarea').each(function() {
        $(this).val($(this).val().trim());
    });
});
</script>