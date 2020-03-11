<div class="center">
  <div class="form-container">
    <form action="/users/login" method="post" autocomplete="off">
      <div class="title">Login</div>
      <div class="form-row">
        <span for="name">Email</span>
        <input type="email" name="email">
      </div>

      <div class="form-row">
        <span for="name">Password</span>
        <input type="password" name="password">
      </div>

      <div class="form-row">
        <input type="submit" class="button" value="Login" />
      </div>

      <div class="form-row">
        <a href="/users/register">No account? Register</a>
      </div>
    </form>
  </div>
</div>