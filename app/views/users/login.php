<?php

$category_id = 'index';

require_once APPROOT."/views/includes/theme/head_open.php";
require_once APPROOT."/views/includes/theme/metatag.php";
// open body tag

require_once APPROOT."/views/includes/theme/body_open.php";

include_once APPROOT."/views/includes/inc_header.php";

echo '<a id="top" name="top"></a>'; // anchor

##################### login form ########################



?>
<h2>Login To <?php echo SITENAME; ?></h2>
    <table>
      <tr>
        <th>Login With Password:</th>
        <span class="invalidFeedback">
          <?php echo $data['error'] ?? ''; ?>
        </span>
      </tr>


      <tr>
        <td class="w">
          <form action="<?php echo URLROOT; ?>/user/login" method="post">
            User Name: <input name="username" id="qsearch" type="text" value="<?php echo $data['username'] ?? '' ?>">
            <span class="invalidFeedback">
                <?php echo $data['usernameError'] ?? ''; ?>
            </span>

            Password: <input name="password" id="qsearch" type="password">
            <span class="invalidFeedback">
                <?php echo $data['passwordError'] ?? ''; ?>
            </span>

            <button class="btn btn-primary" id="submit" type="submit" value="submit">Login</button>
          </form>
          <p class="options">Not registered yet? <a href="<?php echo URLROOT; ?>/user/join">Create an account!</a></p>
        </td>
      </tr>
    </table>

  <table>
    <tr>
      <th>Reset Your Password:</th>
    </tr>


    <tr>
      <td class="w">
        <p>Please enter your email address and a link allowing you to reset your password will be email to you.</p>
      </td>
      <span class="invalidFeedback">
              <?php echo $data['passAlert'] ?? ''; ?>
          </span>
    </tr>
    <tr>
      <td class="w">
        <form action="<?php echo URLROOT; ?>/user/forgotpassword" method="post">
          Email: <input name="email" id="qsearch" type="email">
          <button class="btn btn-primary" id="submitforgetpassword" type="submit" value="submit">Reset Password</button>
        </form>
       </td>
    </tr>
  </table>
<?php



include_once APPROOT."/views/includes/inc_footer_stat.php";

echo '<p class="small">(<a href="#up"><b>Go Up</b></a>)</p>';

include_once APPROOT."/views/includes/inc_footer.php";

?>

	</div>
<!-- GOOGLE ANALYSTIC GOES HERE -->

</body>
</html>
