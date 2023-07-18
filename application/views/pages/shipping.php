<section id="cart_items">
  <div class="container">   
    

    <div class="checkout-options">

        <div class="step-one">
            <h2 class="heading">Step 3: Shipping</h2>
        </div>
        <div class="shopper-informations">
            <div class="row" >
                <div class="col-sm-12 clearfix">                     
                        <div class="form-two">
                            <form action="<?php echo base_url('save-shipping');?>" method="POST" name="shipping_form">
                                <input type="text" name="customer_name"  placeholder="Name">
                                <input type="hidden" name="customer_id" >
                                <input type="text" name="email_address"  placeholder="Email*">
                                <input type="number" name="mobile_number" placeholder="Mobile">
                                <input type="text" name="address" placeholder="Address...">
                                <select name="country">
                                    <option>-- Country --</option>
                                    <option value="United States">United States</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="UK">UK</option>
                                    <option value="India">India</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Ucrane">Ucrane</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Dubai">Dubai</option>
                                </select>

                                <select name="city">
                                    <option>-- City --</option>
                                    <option value="Chattogram">Chattogram</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Sylhet">Sylhet</option>
                                    <option value="Barishal">Barishal</option>
                                    <option value="Khulna">Khulna</option>
                                </select>

                                <input type="text" name="zip_code"  placeholder="Zip / Postal Code *">
                                <input type="submit" name="bbtn" value="Save & Continue" class="btn btn-primary">
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div><!--/checkout-options-->
  </div>
</section>


<script>
    document.forms['billing_info'].elements['country'].value = <?php echo $customer_info->country;?>;
    document.forms['billing_info'].elements['city'].value = <?php echo $customer_info->city;?>;
</script>