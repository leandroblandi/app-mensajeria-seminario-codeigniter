<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=base_url('assets/css/chat.css');?>">
  <link rel="shortcut icon" href="<?=base_url('assets/img/favicon.ico');?>" type="image/x-icon">
  <title><?=$this->session->userdata('username')?> | WhatsMessage!</title>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>
        <i class="fa-solid fa-comments"></i>
        <span class="first">
          Whats
        </span> 
        <span class="second">
          Message!
        </span>
      </h1>
    </div>
    <div class="messages">
      <!-- Recarga asincronica de mensajes -->
    </div>
    <div class="send-message-form">
      <?=form_open('chat/message');?>
        <div class="form-group">
          <input placeholder="Type something..." type="text" name="message" class="message" autocomplete="off" required>
          <button type="submit">
            <i class="fa-solid fa-paper-plane"></i>
          </button>
        </div>
      <?=form_close();?>
    </div>
  </div>
  <script src="<?=base_url('assets/js/request.js');?>"></script>
  <script src="https://kit.fontawesome.com/eb66d747aa.js" crossorigin="anonymous"></script>
</body>
</html>