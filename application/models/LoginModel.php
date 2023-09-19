<?php
  class LoginModel extends CI_Model {

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function saveUser(array $data) {

      $query = null;
      $data['user_password'] = hash('sha256', $data['user_password']);

      if($data != null) {
        $query = $this->db->insert('users', $data);
      }
      return $query;
    }

    public function findUser(int $id) {
      $query = $this->db->get_where('users', array('user_id' => $id), 1);
      return $query->row_array();
    }

    public function getUserByUsername(string $username) {
      $query = $this->db->get_where('users', array('user_name' => $username), 1);
      return $query->row_array();
    }

    public function login(string $username, string $password): bool {

      $user_found = false;
      $enc_password = hash('sha256', $password);

      $query = $this->db->get_where('users', array('user_name' => $username, 'user_password' => $enc_password), 1);

      if($query->num_rows() === 1) {
        $user_found = true;
      }
      return $user_found;
    }
  }
?>