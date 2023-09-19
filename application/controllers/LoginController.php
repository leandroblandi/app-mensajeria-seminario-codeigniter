<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}

	public function register() {

		$this->load->model('loginModel');

		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		$data = array(
			"user_name" => $username,
			"user_password" => $password
		);

		$this->loginModel->saveUser($data);
		redirect('login');
	}

	public function login() 
	{
		$this->load->model('loginModel');

		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);


		if($this->loginModel->login($username, $password)) {

			$id = $this->loginModel->getUserByUsername($username)['user_id'];
			
			$data = array(
				'id' => $id,
				'username' => $username
			);

			$this->session->set_userdata($data);
			redirect('chat');
		}
		$this->loginView('Invalid credentials');
	}

	public function registerView(string $message = '')
	{
		$data['url'] = 'new';
		$data['form_type'] = 'Register';
		$data['message'] = $message;
		$this->load->view('form', $data);
	}

	public function loginView(string $message = '')
	{
		$data['url'] = 'auth';
		$data['form_type'] = 'Login';
		$data['message'] = $message;
		$this->load->view('form', $data);
	}

	public function index() 
	{
		$this->loginView();
	}

}
