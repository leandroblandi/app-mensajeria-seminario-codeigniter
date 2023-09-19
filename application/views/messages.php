<?php foreach($messages as $message): ?>

  <?php
    $additionalClass = '';
    if($message['user_name'] === $this->session->userdata('username')) {
      $additionalClass = 'me';
    }
  ?>

  <div class="message <?=$additionalClass;?>">
    <div class="message-header">
      <i class="fa-solid fa-circle-user"></i>
      <b class="username">
        <?=html_escape($message['user_name']);?>
      </b>
    </div>
    <div class="message-body">
      <p class="content">
        <?=html_escape($message['message_content']);?>
      </p>
    </div>
    <div class="message-footer">
      <i class="fa-regular fa-clock"></i>
      <span class="date">
        <?=$message['date'];?> 
      </span>
    </div>
  </div>
<?php endforeach; ?>