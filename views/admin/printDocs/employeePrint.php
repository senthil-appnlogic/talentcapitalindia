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
                            <th colspan="2">Client Comp</th>
                            <th colspan="2">Pay Roll</th>
                            <th colspan="2">Designation</th>
                            <th colspan="2">Emp From</th>
                            <th colspan="2">Emp To</th>
                            <th colspan="2">Location</th>
                      
                        </tr>
			
		    </thead>
			<tbody>
			    <?php foreach ($employeeDetails as $row) { ?>
			    <tr class="tableLastTr" style="width:100% !important;">
			       <td colspan="2"><?php echo $row['client_comp']; ?></td>
			       <td colspan="2"><?php echo $row['payroll_comp']; ?></td>
			       <td colspan="2"><?php echo $row['designation']; ?></td>
			       <td colspan="2"><?php echo $row['emp_duration_from']; ?></td>
                               <td colspan="2"><?php echo $row['emp_duration_to'];?></td>
			      <td colspan="2"><?php echo $row['location']?></td>
			     </tr>
			  
			     <?php } ?>
                        </tbody>
                               
                </table>
            <table style="border-collapse: collapse;">
                    <thead>
                        <tr class="ArabicHeadEnglish" style="width:100% !important;">
                            <th colspan="2">Degree</th>
                            <th colspan="2">Specialisation</th>
                            
                            <th colspan="2">Edu From</th>
                            <th colspan="2">Edu To</th>
                            <th colspan="2">Unversity</th>
                            <th colspan="2">Percentage</th>
                            
                            
                      
                        </tr>
			
		    </thead>
			<tbody>
			    <?php foreach ($employeeCandiateDetails as $row) { ?>
			    <tr class="tableLastTr" style="width:100% !important;">
			       <td colspan="2"><?php echo $row['degree']; ?></td>
			       <td colspan="2"><?php echo $row['specialisation']; ?></td>
			      
			       <td colspan="2"><?php echo $row['edu_duration_from']; ?></td>
                               <td colspan="2"><?php echo $row['edu_duration_to'];?></td>
			      <td colspan="2"><?php echo $row['university']?></td>
                              <td colspan="2"><?php echo $row['percentage']?></td>
			     </tr>
			  
			     <?php } ?>
                        </tbody>
                               
                </table>
	  </div>
     </div>
    </body>
</html>