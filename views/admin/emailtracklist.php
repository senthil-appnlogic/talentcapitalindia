<?php
//$session_data=$this->session->userdata('login_type');
//exit;


$status = $this->session->flashdata('status');
?>
<div class="content" id="content">
			<!-- begin breadcrumb -->
			
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			
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
                            <h4 class="panel-title">Hiring Partner View</h4>
                        </div>
                        <div class="panel-body" id="form_validation">
                        <?php if($status)
			{?>
			    <div id="alert" class="alert alert-success outer"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
			    <?php
			} ?>
			    <p>
				<!--<a class="btn btn-primary btn-sm " href="<?php echo site_url('admin/vendorAdd')?>"><i class="fa fa-plus fa-1x"></i> <span class="f-s-14 f-w-500">Add Vendor</span></a>-->
				<button class="btn btn-danger btn-sm" id="removeBtn"><i class="glyphicon glyphicon-trash"></i>&nbsp;Delete selected rows</button>
			    </p>
				<div class="table-responsive" style="border: none">
					<table id="data-table" class="table table-bordered display dataTable" width="100%">
					  <thead>
						<tr>
						    <th data-class="row_selected">S.No</th>
						    <th data-class="hidden">Id</th>
						    <th data-class="expand">Created date</th>
                                                    <th data-class="expand">Reference Code / Referred By</th>
						    <th data-class="expand">Email</th>
						    <!--<th data-class="expand">Action</th>-->
						</tr>
					    </thead>
					    <tfoot>
						<tr>
						    <th>S.No</th>
						    <th data-class="hidden">Id</th>
						    <th data-class="expand">Created date</th>
						    <th data-class="expand">Reference Code / Referred By</th>
						    <th data-class="expand">Email</th>
						   <!-- <th data-class="expand">Action</th>-->
						</tr>
					    </tfoot>
					    <tbody>
						
					    </tbody>
					</table>
		    
				</div>
				<!--PDF STARTS-->
				<div class="modal fade" id="printPreview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				    <div class="modal-dialog modal-lg">
					<div class="modal-content">
					    <form  id="category-form" class="smart-form" >
						<div class="modal-header" style="border-bottom: 1px solid #e5e5e5; min-height: 16.4286px; padding: 15px;">   
						    <b><img alt="" data-id="login-cover-image" height="50px" width="100px" src="http://localhost/talentCapitalAdmin/assets/images/logo.png"></b>
						    <button aria-hidden="true" data-dismiss="modal" class="close" type="button onClick="onClickHandler(this)"><i class="fa  fa-times-circle "></i></button>
						    			
						</div>
						<div class="model-body">
						    <iframe class="responsiveiframe table-responsive" width="900px" id="previewiframe" height="1000px"></iframe>
						</div>
					    </form>
					    <input type="hidden" id="emailSystemId">
					</div>
				    </div>
				</div>
				<!--PDF ENDS-->
				
				<!-- EMAIL TRACKING STARTS -->
				<div id="myModal" class="modal fade" role="dialog">
				    <div class="modal-dialog modal-lg">
				      <!-- Modal content-->
					<div class="modal-content">
					    <div class="modal-header">
					      <button type="button" class="close" data-dismiss="modal">&times;</button>
					      <h4 class="modal-title">Change Candidate Status</h4>
					    </div>
					    <div class="modal-body">
						<div class="table-responsive" style="border: none">
						    <table id="data-tableemail" class="table table-striped table-bordered nowrap" width="100%">
						      <thead>
							    <tr>
								<th data-class="expand">Created date</th>
								<!--<th data-class="expand">Name</th>-->
								<th data-class="expand">Hiring Partner code</th>
								<th data-hide="phone,tablet">Email</th>
							    </tr>
							</thead>
							<tbody class="track">
							   <!-- <tr class="oddClass even gradeC">
								<td id="crDate"></td>								
								<td id="hiringCode"></td>
								<td id="hiringEmail"></td>
							    </tr>-->
							</tbody>
						    </table>
						</div>
					    </div>
					    <!--<div class="modal-footer">
					  <button type="button" class="btn btn-default" >Close</button>
					</div>-->
				      </div>
				  
				    </div>
				</div>
				<!-- EMAIL TRACKING ENDS-->
				

                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
		</div>
	<script>
	  
	 
	$('#form_validation').on('click', '#delete_box', function(e) {
		
	e.preventDefault();
	
         var link = $(this).attr('href');
	 bootbox.confirm("Are you sure you want to delete?", function(confirmed) {   
               if (confirmed) {
                     window.location.href = link;     
                }    
            });
	});
	
	$('#data-table tfoot th').each( function () {
	    var title = $(this).text();
	    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	} );
	
	$(document).ready(function() {
	    
	    switcherRefresh();
	 setTimeout(function(){ $('#alert').remove();}, 5000);
	 
	  //datatable functionality begin
		var t = $('#data-table').DataTable( {
		//    dom: 'Bfrtip',
		//    "pageLength": 100,
		//    //"scrollX": 100,
		//    "scrollY": 350,
		//    "ordering":false,
		//    buttons: [
		//  
		//    ,{
		//	extend: 'excel',
		//	text: 'excel all'
		//    },
		//    {
		//	extend: 'excel',
		//	text: 'excel selected',
		//	exportOptions: {
		//	    modifier: {
		//		selected: true
		//	    }
		//	}
		//    }
		//	
		//    ],
		    //select: true,  //if it is enabled means datatable select working on doubleclick
		    //"sDom": "<'row'<'col-md-4 no 'f><'col-md-6 trcalign' TRC><'col-md-2 yes'l>r><t><'row'<'col-md-6'i><'col-md-6'p>>",
		    "sDom": "<'row'<'col-md-4 pull-right 'f>><t><'row'<'col-md-6'i><'col-md-6'p>>",
		    "bServerSide": true,
		    "bProcessing": false,
		    "sAjaxSource": '<?php echo site_url('admin/Fetchallemailtracklists'); ?>',
		    'responsive': true,
		    "bStateSave": false,
		    "lengthMenu": [
			[10, 20, 50, -1],
			[10, 20, 50, "All"] // change per page values here
		    ],
		    "order": [[ 1, "desc" ]],
		    "language": {
		    "sLengthMenu": "_MENU_",
		    "lengthMenu": " _MENU_ records",
		    },
		    columns: [
			{ data: 'id',"visible": false, "orderable": false},
			{ data: 'id', "orderable": true},
			{ data: 'cr_date1', "orderable": false},
			{ data: 'name', "orderable": false},
			{ data: 'email', className: "all", "orderable": false,},
		    ],
		    'fnServerData': function(sSource, aoData, fnCallback){
			$.ajax({
			    'dataType': 'json',
			    'type'    : 'POST',
			    'url'     : sSource,
			    'data'    : aoData,
			    'success' : fnCallback
			});
		    },
		    "tableTools": {
			"sSwfPath": "<?php echo site_url()?>assets/plugins/DataTables/swf/copy_csv_xls_pdf.swf",
			"aButtons": [{"sExtends":"xls","sFileName": "EmailTracking.xls","sTitle": "Email Tracking List","mColumns": [0, 1, 2, 3,4]}]
		    }
		} );
		
		
		$('#data-table tbody').on( 'click', 'tr', function () {
		    $(this).toggleClass('selected');
		} );
		
		var line_id=[];
		$("#removeBtn").click(function(){
		    //alert();
			$('.selected').each(function(){
				var lineid=$(this).find('td:eq(1)').text();
				line_id.push(lineid);
			});
			//alert(line_id);
			console.log(line_id);
			if (line_id.length==0) {
			alert("Please Select Atleast one row");
			}
			
			else if (confirm("Are you sure you want to delete this?")) {
			    $.ajax({   
				type: "POST",  
				url: "<?php echo base_url('admin/deleteselectedrow');?>",  
				cache:false,  
				data: {line_id:line_id},  
				success: function(res)  
				{   
				    $('#data-table').dataTable().fnDraw(true);
				}  
			    });
			}
		})
		
		t.on( 'order.dt search.dt processing.dt page.dt', function () {
		    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
			cell.innerHTML = i+1;
			var info = t.page.info();
			var page = info.page+1;             
			if (page >'1') { 
			    hal = (page-1) *10;  // u can change this value of ur page
			    cell.innerHTML = hal+i+1;
			} 
		    } );
		} ).draw();
		
		//t.on( 'order.dt search.dt', function () {
		//    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		//	cell.innerHTML = i+1;
		//    } );
		//} ).draw();
		   
		t.columns().every( function () {
		    var that = this;
		    $( 'input', this.footer() ).on( 'keyup change', function () {
			if ( that.search() !== this.value ) {
			    that
				.search( this.value )
				.draw();
			}
		    } );
		} );
	    
	    //datatable functionality end
	
//	    var t = $('#data-table').DataTable( {
//		dom: 'Bfrtip',
//		"pageLength": 100,
//		//"scrollX": 100,
//		"scrollY": 350,
//		"ordering":false,
//		buttons: [
//
//                ,{
//                    extend: 'excel',
//                    text: 'excel all'
//                },
//                {
//                    extend: 'excel',
//                    text: 'excel selected',
//                    exportOptions: {
//                        modifier: {
//                            selected: true
//                        }
//                    }
//                }
//		    
//		],
//                select: true,
//	    } );
//	    
//	    t.on( 'order.dt search.dt', function () {
//		t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
//		    cell.innerHTML = i+1;
//		} );
//	    } ).draw();
//	    
//	    t.columns().every( function () {
//		var that = this;
//		$( 'input', this.footer() ).on( 'keyup change', function () {
//		    if ( that.search() !== this.value ) {
//			that
//			    .search( this.value )
//			    .draw();
//		    }
//		} );
//	    } );
	    
	} );
	
	
		 
		function printVendorDetails(systemId)
		
		{
		    var data = "admin/hiringPartnerPrint/"+systemId;
		    var preview = "<?php echo site_url()?>"+data;
		    $('#previewiframe').attr('src',preview);
		    var dataURL = "admin/hiringPartnerPrint/"+systemId;
		   
		   
		}
	        
	    $(document).ready(function($) {
		
	    $(".clickable-row").click(function() {
	     window.document.location = $(this).data("href");
	    });
	});
	    
	function showingModal(vendor_code){
	    $('#myModal').modal({show:true});
	    //$("#candidate_id").val(id);
	    $.ajax({
		type: "POST",
		url: "<?=site_url('admin/emailtracklist')?>",
		dataType:"json",
		data:{vendor_code:vendor_code} ,                    
		success: function (json) {
		    console.log(json.emailtrack.length);
		    $('tbody.track').empty();
		    for (var i=0; i<json.emailtrack.length; i++) {
		    //alert(json.emailtrack[i].cr_date);
		    //$('.track').remove();
		    $('.track').append('<tr class="oddClass even gradeC"><td id="crDate">'+json.emailtrack[i].cr_date+'</td><td id="hiringCode">'+json.emailtrack[i].refer_code+'</td><td id="hiringEmail">'+json.emailtrack[i].email+'</td></tr>')
		   // $('#crDate').text(json.emailtrack[i].cr_date);
		   // //$('#hiringName').val(json.emailtrack[i].);
		   // $('#hiringCode').text(json.emailtrack[i].refer_code);
		   // $('#hiringEmail').text(json.emailtrack[i].email);
		   
		   }
		},
	    });
	}
	</script>
    <script type="text/javascript">
	function switcherRefresh()
	{
	    $('.lcs_check').lc_switch('Y','N');
	    $('.lcs_check').lc_switch();
	    $('.lcs_wrap').delegate('#approvedYN', 'lcs-statuschange',function() {
		if($(this).is(":checked")){
		    var $row = $(this).parents('.oddClass');
		    bootbox.confirm("Are you sure you want to Aprove?", function(confirmed) {
			if(confirmed){
			    var statusYN = 'Y';
			    var userEmail = $row.find('[id="EMAIL"]').text();
			    var userName = $row.find('[id="USER_NAME"]').text();
			    $.ajax({
				type: "POST",
				url: "<?=site_url('admin/sendCredential')?>",
				dataType:"json",
				data:{userEmail:userEmail,userName:userName,statusYN:statusYN} ,                    
				success: function (json) {
				    window.location.reload();
				},
			    });
			}
		    });				
		}
		else{
		    var $row = $(this).parents('.oddClass');
		    bootbox.confirm("Are you sure you want to Reject?", function(confirmed) {
			if(confirmed){
			    var statusYN = 'N';
			    var userEmail = $row.find('[id="EMAIL"]').text();
			    var userName = $row.find('[id="USER_NAME"]').text();
			    $.ajax({
				type: "POST",
				url: "<?=site_url('admin/sendCredential')?>",
				dataType:"json",
				data:{userEmail:userEmail,userName:userName,statusYN:statusYN} ,                    
				success: function (json) {
				    window.location.reload();
				},
			    });
			}
		    });		    
		}
	    });	
	}
    </script>