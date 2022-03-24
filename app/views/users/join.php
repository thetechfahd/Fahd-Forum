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


<div class="panel panel-default">
    <h2>
        Complete Registration
    </h2>
    <span class="invalidFeedback">
          <?php echo $data['joinMessage'] ?? ''; ?>
        </span>
    <div class="panel-heading">

        <form action="<?php echo URLROOT; ?>/user/join" method="post">

            <table summary="profile editing form">
            <tr>
                    <td valign="top"><b>Email</b>: <input type="email" name="email" 
                            class="form-control" placeholder=""> </td>
                </tr>

                <tr>
                    <td valign="top"><b>Username</b>: <input type="text"
                            id="username" name="username" class="form-control" placeholder=""><br>
                        
                    </td>
                </tr>


                <tr>
                    <td valign="top"><b>Password</b>: <input type="password" name="password" 
                            class="form-control" placeholder=""> </td>
                </tr>

                <tr>
                    <td valign="top"><b>Confirm Password</b>: <input type="password" name="confirmPassword"
                            class="form-control" placeholder=""> </td>
                </tr>

            </table>
            <p><button type="submit" name="regSubmit" class="btn btn-primary">Complete Registration</button> </p>
        </form>
    </div>
</div>



<?php



include_once APPROOT."/views/includes/inc_footer_stat.php";

echo '<p class="small">(<a href="#up"><b>Go Up</b></a>)</p>';

include_once APPROOT."/views/includes/inc_footer.php";

?>

</div>
<!-- GOOGLE ANALYSTIC GOES HERE -->

</body>

</html>