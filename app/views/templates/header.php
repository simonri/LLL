<html>

<head>
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <nav>
    <a href="/" class="logo">
      <img src="https://i.pinimg.com/originals/1f/85/97/1f8597ba23d72417c3f0ebee00a28236.png" />
    </a>
    <a href="/">
      <div cass="logo"><img href="https://i.pinimg.com/originals/1f/85/97/1f8597ba23d72417c3f0ebee00a28236.png" /></div>
      <div class="title">BurgerBoys</div>
    </a>
    <a href="/">
      <div class="tab">HOME</div>
    </a>
    <?php if (isLoggedIn()) : ?>
      <a href="/users/me">
        <div class="tab">PROFILE</div>
      </a>
      <a href="/burgers/add">
        <div class="tab">ADD BURGER</div>
      </a>
      <a href="/users/logout">
        <div class="tab">LOGOUT</div>
      </a>
    <?php else : ?>
      <a href="/users/register">
        <div class="tab">REGISTER</div>
      </a>
      <a href="/users/login">
        <div class="tab">LOGIN</div>
      </a>
    <?php endif; ?>
  </nav>
  <div class="page">
    <div class="content">