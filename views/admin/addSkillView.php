<?php
$status = $this->session->flashdata('status');
?>
<div class="content" id="content">
			<!-- begin breadcrumb -->
			<!--<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Vendor</li>
				
			</ol>-->
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<!--<h1 class="page-header">user <small>details are here...</small></h1>-->
			<!-- end page-header -->
            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-12 ui-sortable">
                    <!-- begin panel -->
                    <div data-sortable-id="form-stuff-5" class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a data-click="panel-expand" class="btn btn-xs btn-icon btn-circle btn-default" href="javascript:;"><i class="fa fa-expand"></i></a>
                                <a data-click="panel-reload" class="btn btn-xs btn-icon btn-circle btn-success" href="javascript:;"><i class="fa fa-repeat"></i></a>
                                <a data-click="panel-collapse" class="btn btn-xs btn-icon btn-circle btn-warning" href="javascript:;"><i class="fa fa-minus"></i></a>
                                <a data-click="panel-remove" class="btn btn-xs btn-icon btn-circle btn-danger" href="javascript:;"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Skill Form</h4>
                        </div>
                        <div class="panel-body" id="form_validation">
                        <?php if($status)
			{?>
			    <div id="alert" class="alert alert-success outer"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
			    <?php
			} ?>
			     <p>
				<a class="btn btn-primary btn-sm " href="<?php echo site_url('admin/skills')?>"><i class="fa fa-plus fa-1x"></i> <span class="f-s-14 f-w-500">Add</span></a>
			    </p>
				<div class="table-responsive" style="border: none">
					<table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
					  <thead>
						<tr>
						    <th>Skills</th>
						    <th>Action</th>
						</tr>
						
					    </thead>
					    <tbody>
						<?php 
					     foreach($skillDetails as $row) {  ?>
					       
						<tr class="oddClass even gradeC" >
						<td><?php echo $row['skill']; ?></td>					    
						<td>
                                                    <a href="#" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> </a>
                                                    <a onclick="skillDelete();" id="delete_box" href="<?php echo site_url('admin/skillDelete/'.$row['id'])?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a></td>
						</tr>
                                                
					    <?php }?>
					    </tbody>
					</table>
		    
				</div>

                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
		</div>
	<script>
	function skillDelete(){
        
	$('#form_validation').on('click', '#delete_box', function(e) {
		//alert("test");
	e.preventDefault();
         var link = $(this).attr('href');
	 bootbox.confirm("Are you sure you want to delete?", function(confirmed) {   
               if (confirmed) {
                     window.location.href = link;     
                }    
            });
	});
	}

	</script>
