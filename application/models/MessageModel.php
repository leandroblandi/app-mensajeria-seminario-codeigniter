<?php

  class MessageModel extends CI_Model {

    public function __construct()
    {
      $this->load->database();
    }

    public function createMessage(int $user_id, string $message_content)
    {

      $data = array(
        'message_content' => $message_content
      );

      $this->db->insert('messages', $data);
      $message_id = $this->db->insert_id();

      $user_message_data = array(
        'users_user_id' => $user_id,
        'messages_message_id' => $message_id,
        'date' => date('Y-m-d H:i')
      );
      $this->db->insert('users_has_messages', $user_message_data);
    }

    public function getAllMessages() {

      $this->db->select('users.user_name, messages.message_content, users_has_messages.date');
      $this->db->from('messages');
      $this->db->join('users_has_messages', 'messages.message_id = users_has_messages.messages_message_id', 'left');
      $this->db->join('users', 'users_has_messages.users_user_id = users.user_id', 'left');
  
      $query = $this->db->get();
      return $query->result_array();
    }
  }
?>