<div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <?php $status=$this->session->flashdata('error');?>
		    <?php if($status) { ?>
                    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><?php echo $status; ?></div>
		    <?php } ?>
                </div>
            </div>     