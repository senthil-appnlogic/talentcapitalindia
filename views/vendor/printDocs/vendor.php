<?php $path=$this->config->item('base_urlcapital');?>
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
        </style>
    </head>
    <body>
     
	<div id="header">
           
             <p><img  style="width: 17%;position: fixed; right: 0px;" src="assets/images/pdf_logo.png"/></p> 
           
            </div>
        
        
     <div class="container" style="width: 100%;bottom: 7em; ">
	
	  <div class="table-container" style="padding-left: 4px;">
	                     <table style="border-collapse: collapse;">
                    <thead>
                        <tr class="ArabicHeadEnglish" style="width:100% !important;">
                            <th colspan="2">Name</th>
                            <th colspan="2">Mobile Number </th>
                            <th colspan="2">Email </th>
                            <th colspan="2">Pan Number</th>
                            <th colspan="2">Address</th>
                        </tr>
			
		    </thead>
			<tbody>
			    <?php foreach ($vendorPrintDetails as $row) { ?>
			    <tr class="tableLastTr" style="width:100% !important;">
			       <td colspan="2"><?php echo $row['candidate_name']; ?></td>
			       <td colspan="2"><?php echo $row['mobile_number']; ?></td>
			       <td colspan="2"><?php echo $row['mail_id']; ?></td>
			       <td colspan="2"><?php echo $row['pan_attach_no']; ?></td>
			       <td colspan="2"><?php echo $row['address_text']; ?></td>
			     </tr>
			    <tr>
			    <th colspan="4">Pan Address Image</th>
			    <th colspan="3">Address Image</th>
			    <th colspan="3">Bank Cheque Image</th>
			    </tr>
			    <tr>
				<td colspan="4"><center><img height="200px" width="150px" src="<?php echo $row['pan_attach_copy']?>"/></center></td>
				<td colspan="3"><center><img height="200px" width="150px" src="<?php echo $row['address_attach_proof']?>"/></center></td>
				<td colspan="3"><center><img height="200px" width="150px" src="<?php echo $row['bank_attach_cheque']?>"/></center></td>
			    </tr>
			     <?php } ?>
                        </tbody>
                               
                </table>


	     
	  </div>
     </div>
    </body>
</html>