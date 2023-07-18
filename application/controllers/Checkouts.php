<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkouts extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('cart_model');
    }


    public function index(){
        $data=array();
		$data['title'] = 'Checkout';
		$data['slider'] = '';
		
        $data['featured_product'] = $this->load->view('pages/checkout','',true);
        $data['category_tab'] = '';
		$data['recommended_items'] = '';
		$this->load->view('master',$data);
    }

    public function customer_registration(){
        
        //send email start

        $to =  $this->input->post('email_address');  // User email pass here
        $subject = 'Welcome To Cherished Dream';
    
        $from = 'wizardwireshark1023@gmail.com';              // Pass here your mail id
    
        $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://codingmantra.co.in/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
        $emailContent .='<tr><td style="height:20px"></td></tr>';
    
    
        $emailContent .= 'Thanks for Registaring. Click the link below to verify your account.';  //   Post message available here
        //$emailContent .= $this->input->post('message');  //   Post message available here
    
    
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://codingmantra.co.in/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.codingmantra.co.in</a></p></td></tr></table></body></html>";
                    
    
    
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '60';
    
        $config['smtp_user']    = 'wizardwireshark1023@gmail.com';    //Important
        $config['smtp_pass']    = '2313090948qwerty.';  //Important
    
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 
    
         
    
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContent);
        $this->email->send();


        //send email close




       $customer_id = $this->checkout_model->save_customer_info();
       $sdata = array();
       $sdata['customer_id'] = $customer_id;
       $sdata['customer_name'] = $this->input->post('customer_name',true);
       $this->session->set_userdata($sdata);
       redirect('billing');
    }

    public function billing(){
        $data=array();
		$data['title'] = 'Billing';
		$data['slider'] = '';
        $customer_id = $this->session->userdata('customer_id');
        $data['customer_info'] = $this->checkout_model->select_customer_info_by_id($customer_id);
        $data['featured_product'] = $this->load->view('pages/billing',$data,true);
        $data['category_tab'] = '';
		$data['recommended_items'] = '';
		$this->load->view('master',$data);
    }

    public function update_billing(){
        $this->checkout_model->update_billing_info();
        $shipping_id = $this->session->userdata('shipping_id');
        if ($shipping_id != NULL) {
            redirect('payment');
        } else {
            redirect('shipping');
        }
        
    }

    public function shipping(){
        $data=array();
		$data['title'] = 'Shipping';
		$data['slider'] = '';
        $data['featured_product'] = $this->load->view('pages/shipping','',true);
        $data['category_tab'] = '';
		$data['recommended_items'] = '';
		$this->load->view('master',$data);
    }

    public function payment(){
        $data=array();
		$data['title'] = 'Payment';
		$data['slider'] = '';
        $data['featured_product'] = $this->load->view('pages/payment','',true);
        $data['category_tab'] = '';
		$data['recommended_items'] = '';
		$this->load->view('master',$data);
    }

    public function place_order(){
        $payment_type = $this->input->post('payment_type', true);
        if($payment_type == 'cash'){

        }
        if($payment_type == 'ssl_commerz'){
            $data=array();
            $data['title'] = 'SSL Commerz';
            $data['slider'] = '';
            $data['featured_product'] = $this->load->view('pages/ssl_commerz','',true);
            $data['category_tab'] = '';
            $data['recommended_items'] = '';
            $this->load->view('master',$data);

        }
        if($payment_type == 'paypal'){

        }
    }

    public function success(){
        $data=array();
            $data['title'] = 'Success Url';
            $data['slider'] = '';
            $data['featured_product'] = $this->load->view('pages/success','',true);
            $data['category_tab'] = '';
            $data['recommended_items'] = '';
            $this->load->view('master',$data);
    }

    public function fail(){
        $data=array();
            $data['title'] = 'Fail Url';
            $data['slider'] = '';
            $data['featured_product'] = $this->load->view('pages/fail','',true);
            $data['category_tab'] = '';
            $data['recommended_items'] = '';
            $this->load->view('master',$data);
    }

    public function cancel(){
        $data=array();
            $data['title'] = 'Cancel Url';
            $data['slider'] = '';
            $data['featured_product'] = $this->load->view('pages/cancel','',true);
            $data['category_tab'] = '';
            $data['recommended_items'] = '';
            $this->load->view('master',$data);
    }
    

    


   
}
