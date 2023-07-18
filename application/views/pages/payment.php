<section id="cart_items">
		<div class="container">
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
			<div class="row">
				<div class="col-sm-6">
					<div class="heading">
						<h3>Cost List (including vat)</h3>
					</div>
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
							<?php 
								$sdata = array(
									'g_total' => $g_total
								);
								$this->session->set_userdata($sdata);
							?>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="heading">
						<h3>Select Payment Method</h3>
					</div>
					<div class="chose_area">
                        <form action="<?php echo base_url('place-order')?>" method="post">
						<ul class="user_option">
							<li>
								<input type="radio" id="cash" name="payment_type" value="cash">
								<label for="cash">Cash on delevery</label>
							</li>
							<li>
								<input type="radio" id="ssl_commerz" name="payment_type" value="ssl_commerz">
								<label for="ssl_commerz">SSL COMMERZ</label>
                            </li>
                            <li>
								<input type="radio" id="paypal" name="payment_type" value="paypal">
								<label for="paypal">Paypal</label>
                            </li>
						</ul>
						
                        <input type="submit" class="btn btn-default update" value="Place Order">
                    </form>
					</div>
				</div>                
			</div>
		</div>
	</section><!--/#do_action-->
