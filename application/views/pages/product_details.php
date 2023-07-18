<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product">
				<img src="<?php echo base_url().$product_info->product_image;?>" alt="Product Image" />
				<h3>ZOOM</h3>
			</div>
			<div id="similar-product" class="carousel slide" data-ride="carousel">
				
				  <!-- Wrapper for slides -->
					<!-- <div class="carousel-inner">
						<div class="item active">
						  <a href=""><img src="<?php echo base_url()?>asset/images/product-details/similar1.jpg" alt=""></a>
						  <a href=""><img src="<?php echo base_url()?>asset/images/product-details/similar2.jpg" alt=""></a>
						  <a href=""><img src="<?php echo base_url()?>asset/images/product-details/similar3.jpg" alt=""></a>
						</div>
						<div class="item">
						  <a href=""><img src="<?php echo base_url()?>asset/images/product-details/similar1.jpg" alt=""></a>
						  <a href=""><img src="<?php echo base_url()?>asset/images/product-details/similar2.jpg" alt=""></a>
						  <a href=""><img src="<?php echo base_url()?>asset/images/product-details/similar3.jpg" alt=""></a>
						</div>
						<div class="item">
						  <a href=""><img src="<?php echo base_url()?>asset/images/product-details/similar1.jpg" alt=""></a>
						  <a href=""><img src="<?php echo base_url()?>asset/images/product-details/similar2.jpg" alt=""></a>
						  <a href=""><img src="<?php echo base_url()?>asset/images/product-details/similar3.jpg" alt=""></a>
						</div>
						
					</div> -->

				  <!-- Controls -->
				  <a class="left item-control" href="#similar-product" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				  </a>
				  <a class="right item-control" href="#similar-product" data-slide="next">
					<i class="fa fa-angle-right"></i>
				  </a>
			</div>

		</div>
		<div class="col-sm-7">
			<div class="product-information"><!--/product-information-->
				<img src="<?php echo base_url()?>asset/images/product-details/new.jpg" class="newarrival" alt="" />
				<h2><?php echo $product_info->product_name;?></h2>
				<p>Web ID: <?php echo time().$product_info->product_id;?></p>
				<img src="<?php echo base_url()?>asset/images/product-details/rating.png" alt="" />
				<span>
					<span>Tk. <?php echo $product_info->product_price;?></span>
					<label>Quantity:</label>
					<form action="<?php echo base_url('add-to-cart');?>" method="post">
						<input type="number" value="1" name="qty"/>
						<input type="hidden" value="<?php echo $product_info->product_id;?>" name="product_id"/>
						<button type="submit" class="btn btn-fefault cart">
							<i class="fa fa-shopping-cart"></i>
							Add to cart
						</button>
					</form>
				</span>
				<p><b>Availability:
					<?php if($product_info->product_qty > 0){?>
					</b> In Stock</p>
					<?php }else{?>
					</b> Out of Stock</p>
					<?php } ?>
				<p><b>Condition:</b> New</p>
				<p><b>Category:</b> <?php echo $product_info->category_name;?></p>
				<a href=""><img src="<?php echo base_url()?>asset/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
			</div><!--/product-information-->
		</div>
	</div><!--/product-details-->