<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    <?php
                    $contents = $this->cart->contents();
                    foreach($contents as $content){
                     ?>
						<tr>
							<td class="cart_product">
								<a href=""><img height="100px" width="100px" src="<?php echo base_url().$content['options']['image'];?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $content['name'];?></a></h4>
							</td>
							<td class="cart_price">
								<p>Tk. <?php echo $content['price'];?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
                                <form action="<?php echo base_url('update-cart-product-qty')?>" method="post">
                                    <input class="cart_quantity_input" type="text" name="qty" value="<?php echo $content['qty'];?>" autocomplete="off" size="2">
                                    <input type="hidden" name="rowid" value="<?php echo $content['rowid'];?>">
                                    <input type="submit" name="btn" value="Update">
                                </form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Tk. <?php echo $content['subtotal'];?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo base_url()?>delete-to-cart/<?php echo $content['rowid'];?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                    <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

    <section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>Tk. <?php echo $sub_total = $this->cart->total();?></span></li>
							<li>Vat (5%) <span>Tk. <?php echo $vat = ($sub_total*5)/100?></span></li>
							<li>Shipping Cost <span>Tk. <?php if ($sub_total == 0) {
                                echo $shipping_cost = 0;
                            } else {
                                echo $shipping_cost = 100;
                            }
                            ?></span></li>
							<li>Total <span>Tk. <?php echo $g_total = $sub_total+$vat+$shipping_cost;?></span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a href="<?php echo base_url('checkout');?>" class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
