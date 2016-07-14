<div class="container" style="padding-top: 80px;">
    <?php $status=$this->session->flashdata('status');?>
        <?php if($status) { ?>
            <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
        <?php } ?>
        
</div>


<script>
    $(document).ready(function(){
        setTimeout(function(){ $('.alert').remove(); 
        window.location.href = '<?php echo base_url();?>';
        }, 4000);
        
    });
 </script>

