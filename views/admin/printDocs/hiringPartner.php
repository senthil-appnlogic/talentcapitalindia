<?php $path=$this->config->item('base_urlwebsite');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">    
        <style>      
       body{
            width: 100%;
           /* background-color: #fffdf0;*/
            font-family: "Helvetica";
            margin-top: 10.5em;
        }            
        #header,#footer {
              position: fixed;
              overflow: hidden;
              width: 100%;
        }
	#header {
	    top: -25px;
            left: 0;
            height: 20em;
        }
	#footer {
	    bottom: 560px;
            left: 0;
        }
	#header table,
	#footer table {
	    width: 100%;
        }
        
        table{
            width: 100%;
        }
      td{
            font-size: 15px;
            font-weight: bold;
            
        }        
        
        .table-container th{
            border: 1px solid #72706A;
            font-size: 12px;
            font-weight: bold;
            text-align:center;
            background-color: #E4E1D4;
            font-family: "Helvetica";
        }            
        .table-container td{
            border: 1px solid #72706A;
            /*padding: 5px;*/
            text-align: right;
            font-weight: normal!important;
            font-family: "Helvetica";
            font-size:12px;
        }
	.imageAdjust{
	    padding:30px 10px;
	}
	.imageAdjust1{
	    padding-top:-25px;
	}
	.newStyle{
	    margin-left:14px !important;
	    padding:10px 10px 10px 10px !important;
	    border-style: groove !important;
	}
        </style>
    </head>
    <body>
     
	<div id="header">
           
             <p><img  style="width: 17%;position: fixed; right: 0px;" src="assets/images/pdf_logo1.png"/></p> 
           
            </div>
        
        
     <div class="container" style="width: 100%;bottom: 7em; ">
	
	  <div class="table-container" style="padding-left: 4px;">
	                     <table style="border-collapse: collapse;">
  
			<tbody>
			    <?php foreach ($vendorPrintDetails as $row) { ?>
			    <tr class="tableLastTr" style="width:100% !important;">
				<th width="2%">Vendor Code</th>
				<th width="2%">Name</th>
				<th width="2%">Mobile Number </th>
				<th width="2%">Email </th>
				<th width="2%">Pan Card Number </th>
				<th width="2%">Address</th>
			     </tr>
			    <tr>
				<td width="2%"><?php echo $row['vendor_code']; ?></td>
				<td width="2%"><?php echo $row['name']; ?></td>
				<td width="2%"><?php echo $row['mobile_number']; ?></td>
				<td width="2%"><?php echo $row['email']; ?></td>
				<td width="2%"><?php echo $row['pan_attach_no']; ?></td>
				<td width="2%"><?php echo $row['address_text']; ?></td>
			    </tr>
			   
			     <?php } ?>
                        </tbody>
                               
                </table>
		<div class="imageAdjust">
		    <!--<p class="newStyle1"> Pan Card Image Address Image Bank Image</p>-->
		   <div class="table-container" style="padding-left: 4px;">
			<table style="border-collapse: collapse;">
			    <tbody>
				<tr class="tableLastTr">
				    <th width="3%">Pan Card Image</th>
				    <th width="3%">Address Image</th>
				    <th width="3%">Bank Image</th>
				 </tr>
			    </tbody>
			</table>
		    </div>
		</div>
		<div class="imageAdjust1">
		    <?php foreach ($vendorPrintDetails as $row) { ?>
		    <img class="newStyle" height="200" width="200" src="<?php echo $path.$row['pan_attach_copy'];?>">
		    <img class="newStyle" height="200" width="200" src="<?php echo  $path.$row['address_attach_proof']; ?>">
		    <img class="newStyle" height="200" width="200" src="<?php echo  $path.$row['bank_attach_cheque']; ?>">
		    <?php } ?>
		</div>
	     
	  </div>
     </div>
    </body>
</html>