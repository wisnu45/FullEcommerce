<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
						<?php $top_products = $this->products_model->select_top_products();?>
						<?php $i=1; foreach($top_products as $top_product){
								if ($i==1) {
									echo "<div class='item active'>";
								} else {
									echo "<div class='item'>";
								}
									
						?>
							
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2><?php echo $top_product->product_name;?></h2>
									<p><?php echo $top_product->product_short_desc;?></p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url().$top_product->product_image;?>" class="girl img-responsive" alt="" />
									<img src="asset/images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
						<?php $i++; } ?>							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>