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
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product Form</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<!-- <form class="form-horizontal"> -->
                            <?php echo form_open_multipart('update-product', 'class="form-horizontal" name="edit_product"')?>
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Product Name </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="product_name" value="<?php echo $product_info->product_name;?>" id="typeahead"  data-provide="typeahead" data-items="4" required>
								<input type="hidden" class="span6 typeahead" name="product_id" value="<?php echo $product_info->product_id;?>" id="typeahead"  data-provide="typeahead" data-items="4">
                              </div>
                              <?php echo form_error('product_name');?>
                            </div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Product Price </label>
							  <div class="controls">
								<input type="number" class="span6 typeahead" name="product_price" value="<?php echo $product_info->product_price;?>" id="typeahead"  data-provide="typeahead" data-items="4" required>
                              </div>
                              <?php echo form_error('product_price');?>
                            </div>

                            <div class="control-group">
							  <label class="control-label" for="typeahead">Product Short Description</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="product_short_desc" value="<?php echo $product_info->product_short_desc;?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]' required>								
                              </div>
                              <?php echo form_error('product_short_desc');?>
                            </div>
                            
                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_desc" id="textarea2" rows="3"><?php echo $product_info->product_long_desc;?></textarea>
							  </div>
                            </div>
                            
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Product Quantity</label>
							  <div class="controls">
								<input type="number" class="span6 typeahead" name="product_qty" value="<?php echo $product_info->product_qty;?>" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]' required>
                              </div>
                            </div>

                            <div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>
								<div class="controls">
								  <select id="selectError3" name="category_id" value="<?php echo $product_info->category_id;?>">
                                    <option>Select a category</option>
                                    <?php foreach($category_info as $category){?>
                                    <option value="<?php echo $category->category_id;?>"><?php echo $category->category_name;?></option>
                                    <?php } ?>
								  </select>
								</div>
                              </div>
                              
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Product Image</label>
							  <div class="controls">
								<input type="file" class="span6 typeahead" name="product_image" id="typeahead"  data-provide="typeahead" data-items="4" >
								<input type="hidden" class="span6 typeahead" name="product_old_image" value="<?php echo $product_info->product_image;?>" id="typeahead"  data-provide="typeahead" data-items="4" >
                                <img src="<?php echo base_url().$product_info->product_image?>" alt="Product Image" width="50px" height="50px">
                              </div>
                            </div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Top Product</label>
							  <div class="controls">
								<?php if($product_info->top_product == 1){?>
                                    <input type="checkbox" class="span6 typeahead" name="top_product" checked>
                                <?php } else{?>
                                    <input type="checkbox" class="span6 typeahead" name="top_product">
                                <?php } ?>
                              </div>
                            </div>

							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
                          </fieldset>
                          <?php echo form_close()?>
						<!-- </form>    -->

					</div>
				</div><!--/span-->

			</div><!--/row-->

<script>
    document.forms['edit_product'].elements['category_id'].value = <?php echo $product_info->category_id;?>;
</script>