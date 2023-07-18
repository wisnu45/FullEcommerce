<div style="color:green">
    <?php  
            // if(isset($success_message)){
            //     echo $success_message;
            // }

            $message = $this->session->message;
             if(isset($message)){
                 echo $message;
             }
             $this->session->unset_userdata('message');
    ?>
</div>
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                  <th>Product Image</th>
                                  <th>Product Name</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
						  </thead>   
						  <tbody>
                            <?php foreach($all_products as $product){?>
                                <tr>
								<td>
									<img src="<?php echo base_url().$product->product_image?>" alt="Product Image" width="100px" height="100px">
								</td>
								<td class="center"><?php echo $product->product_name?></td>
								<td class="center">
									<?php
										if($product->product_status == 1){
											echo "<span class='label label-success'>Active</span>";
										}elseif($product->product_status == 2){
											echo "<span class='label label-warning'>Inactive</span>";
										}elseif($product->product_status == 3){
											echo "<span class='label label-danger'>Deleted</span>";
										}
									?>
									<!-- <span class="label label-success">Active</span> -->
								</td>
								<td class="center">
								    <?php if($product->product_status == 1 ){?>
										<a class="btn btn-success" href="<?php echo base_url("change-product-status/$product->product_id/2");?>" title="Update Status">
										<i class="halflings-icon white thumbs-up"></i>                                            
									    </a>
									<?php }elseif($product->product_status == 2 || $product->product_status == 3){?>
										<a class="btn btn-danger" href="<?php echo base_url("change-product-status/$product->product_id/1");?>" title="Update Status">
										<i class="halflings-icon white thumbs-down"></i>                                            
										</a>
									<?php } ?>
									
									<a class="btn btn-info" href="<?php echo base_url("edit-product/$product->product_id");?>" title="Edit">
										<i class="halflings-icon white edit"></i>                                            
									</a>

									<?php if($product->product_status != 3){?>
										<a class="btn btn-danger" href="<?php echo base_url("change-product-status/$product->product_id/3");?>" title="Delete">
										<i class="halflings-icon white trash"></i> 
									</a>
									<?php } ?>
								</td>
								
                            </tr>
                            <?php } ?>
                            
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->