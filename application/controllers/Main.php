<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
		$this->load->view('web');
	}
  
  public function sendEmail(){
         $from_email = "sisca356@gmail.com"; 
         $to_email = $this->input->post('Email Address'); 
   
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'Sisca'); 
         $this->email->to($to_email);
         $this->email->subject('Email Test'); 
         $this->email->message('Testing the email class.'); 
   
         //Send mail 
         if($this->email->send()) 
         $this->session->set_flashdata("email_sent","Email sent successfully."); 
         else 
         $this->session->set_flashdata("email_sent","Error in sending Email."); 
         $this->load->view('email_form'); 
  }
}