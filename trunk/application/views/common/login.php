<div class="grid_6" id="login-container">
  <div id="login-topnav" class="topnav"><a href="login" class="signin"><span><?php echo lang('user_signin');?></span></a> </div>
  <fieldset id="login-signin_menu">
      <form method="post" id="login-signin" action="<?php echo site_url($page);?>">
      <label for="username"><?php echo lang('user_username_or_email');?></label>
      <input id="username" name="username" value="" title="<?php echo lang('user_username_or_email');?>" tabindex="4" type="text">
      </p>
      <p>
        <label for="password"><?php echo lang('user_password');?></label>
        <input id="password" name="password" value="" title="<?php echo lang('user_password');?>" tabindex="5" type="password">
      </p>
      <p class="remember">
        <input id="login-signin_submit" value="<?php echo lang('user_signin');?>" tabindex="6" type="submit">
        <input id="remember" name="remember_me" value="1" tabindex="7" type="checkbox">
        <label for="remember"><?php echo lang('user_remember_me');?></label>
      </p>
      <p class="forgot"> <a href="#" id="resend_password_link"><?php echo lang('user_forgot_password');?>?</a> </p>
      <p class="forgot-username">
        <a id="forgot_username_link"
            title="<?php echo lang('user_forgot_username_tooltip');?>" 
            href="#"><?php echo lang('user_forgot_username');?>?
        </a>
      </p>
    </form>
  </fieldset>
</div>

