<div class="content-wrapper">
	

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="consentTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Exam Name</th>
                                            <th>Total Candidates</th>
                                            <th>Start Date of exam</th>
                                            <th>End Date of exam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $key=>$row){ ?> 
                                        <tr>
                                           <td><?php echo $key+1?></td>
                                           <td><a href="<?php echo site_url("admin/allocation_admin/downreportbutton/".urlencrypt($row['id'])); ?>" class="btn btn-sec" ><?php echo get_exam_name($row['exam_name']);?></a></td>
                                           <td><?php echo get_exam_name_details($row['exam_name'])['no_of_cand'];?></td>
                                            <td><?=  date("d-m-Y", strtotime(get_exam_name_details($row['exam_name'])['start_date_exam']));?></td>
                                            <td><?=  date("d-m-Y", strtotime(get_exam_name_details($row['exam_name'])['end_date_exam']));?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>
</div>
