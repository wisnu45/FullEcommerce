<script>
 var xmlhttp = false;

try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
    try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
        xmlhttp = false;
    }
}

if(!xmlhttp && typeof XMLHttpRequest != 'undefined'){
    xmlhttp = new XMLHttpRequest();
}

function checkemail(email, objID){
    serverPage = '<?php echo base_url()?>welcome/check_email_avaibility?email='+email;
    xmlhttp.open("GET", serverPage);
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            console.log(xmlhttp.responseText);
            //document.getElementById(objID).innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.send(null);
}
</script>

<section id="cart_items">
  <div class="container">   
    

    <div class="checkout-options">

        <div class="step-one">
            <h2 class="heading">Step 1: Checkout</h2>
        </div>
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-6">
                <h3>New Customer Registration</h3>
                <p>If you do not have an account, please register first.</p>
                    <div class="shopper-info">
                        <form action="<?php echo base_url('customer-registration');?>" method="post">
                            <input type="text" name="customer_name" placeholder="Enter your name">
                            <input type="email" id="email" name="email_address"placeholder="Enter Your Mail Address">
                            <span id="email_result"></span>
                            <input type="password" name="password" placeholder="Password">
                            <input type="password" name="password2" placeholder="Confirm password">
                            <button name="rbtn" class="btn btn-primary" type="submit">Register</button>
                        </form>
                        
                    </div>
                </div>

                <div class="col-sm-6">
                <h3>Customer Login</h3>
                <p>If you already have an account, please login.</p>
                    <div class="shopper-info">
                        <form>
                            <input type="email" placeholder="Mail Address">
                            <input type="password" placeholder="Enter Password">
                            <button name="btn" class="btn btn-primary" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/checkout-options-->
  </div>
</section>



<script>



    $(document).ready(function(){
        $('#email').keyup(function(){
            var email = $('#email').val();
            
            if(email != ''){
                $.ajax({
                    url: "<?php echo base_url();?>welcome/check_email_avaibility",
                    method: "POST",
                    data: {email:email},
                    success: function(data){
                        $('#email_result').html(data);
                    },
                });
            }
            
        });
    });

   


   
</script>





