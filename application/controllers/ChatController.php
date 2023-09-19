<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChatController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
    $this->load->library('session');
	}

  public function message() {

    $this->load->model('messageModel');

    $user_id = $this->session->userdata('id');
    $message_content = $this->input->post('message', true);
    $this->messageModel->createMessage($user_id, $message_content);
    redirect('chat');

  }

  public function loadMessages() 
  {
    $this->load->model('messageModel');
    $data['messages'] = $this->messageModel->getAllMessages();
    $this->load->view('messages', $data);
  }

	public function index() 
	{
    // verify if logged
    if(!$this->session->userdata('id')) {
      redirect('login');
    }
		$this->load->view('chat');
	}

}