<div class="center">
  <div class="form-container">
    <form action="/users/register" method="post" autocomplete="off">
      <div class="title">Register</div>

      <div class="split">
        <div class="form-row split">
          <span for="name">First name</span>
          <input type="text" name="firstName">
        </div>

        <div class="form-row split">
          <span for="name">Last name</span>
          <input type="text" name="lastName">
        </div>
      </div>

      <div class="form-row">
        <span for="name">Phone</span>
        <input type="phone" name="phone">
      </div>

      <div class="form-row">
        <span for="name">Email</span>
        <input type="email" name="email">
      </div>

      <div class="form-row">
        <span for="name">Password</span>
        <input type="password" name="password">
      </div>

      <div class="form-row">
        <span for="name">Confirm password</span>
        <input type="password" name="confirmPassword">
      </div>

      <div class="form-row">
        <input type="submit" class="button" value="Register" />
      </div>

      <div class="form-row">
        <a href="/users/login">Already a member? Login</a>
      </div>
    </form>
  </div>
</div>