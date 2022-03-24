<?php
class User extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('Users');
    }

    public function join()
    {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'joinMessage' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'joinMessage' => '',
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate email
            if (empty($data['email'])) {
                $data['joinMessage'] = "<script> toastr.warning('Please enter email address') </script>";
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['joinMessage'] = "<script> toastr.warning('Please enter the correct format.') </script>";
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['joinMessage'] = "<script> toastr.warning('Email is already taken.') </script>";
                }
            }

            //Validate username on letters/numbers
            if (empty($data['username'])) {
                $data['joinMessage'] = "<script> toastr.warning(Please enter a username.') </script>";
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['joinMessage'] = "<script> toastr.warning('Username can only contain letters and numbers.') </script>";
            }

            // Validate password on length, numeric values,
            if (empty($data['password'])) {
                $data['joinMessage'] = "<script> toastr.warning('Please enter a password.') </script>";
            } elseif (strlen($data['password']) < 6) {
                $data['joinMessage'] = "<script> toastr.warning('Password must be at least 8 characters.') </script>";
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['joinMessage'] = "<script> toastr.warning('Password must have at least one numeric value.') </script>";
            }

            //Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['joinMessage'] = "<script> toastr.warning('Please enter confirm password.') </script>";
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['joinMessage'] = "<script> toastr.warning('Password does not match, please try again.') </script>";
                }
            }

            // Make sure that errors are empty
            if (empty($data['joinMessage'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) {
                    $siteName = ucfirst(SITENAME);
                    $addr = URLROOT;

                    $emailSubject = "$siteName - Registration Complete ";
                    $emailMessage = "This is an automatic mail please don't reply to this message.


                    You just registered " . "\r\n" . "
                    Regards: TEAM ";
                    if ($this->sendEmail($emailMessage, $data['email'], $emailSubject)) {

                        $data['joinMessage'] = "<script> toastr.success('Registration Successful, Please Proceed To Login') </script>";
                        //Redirect to the login page

                        header('location: ' . URLROOT . '/user/login');
                    } else {

                    }
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('users/join', $data);
    }

    public function login()
    {
        

        //Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'title' => 'Login page',
                'username' => sanitize($_POST['username']),
                'password' => sanitize($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
                'error' => '',
            ];
            //Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = "<script> toastr.warning('Enter Your Username') </script>";

            } else {
                # code...
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = "<script> toastr.warning('Enter Your Password') </script>";

            }

            //Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['passwordError'] && empty($data['error']))) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {

                    $loginProcess = $this->userModel->loginprocess($data['username']);

                    if ($loginProcess !== true) {
                        $data['error'] = $loginProcess;
                    } else {
                        $this->createUserSession($loggedInUser);
                    }

                } else {
                    $data['error'] = "<script> toastr.error('Password or Password or  username is incorrect. Please try again.') </script>";

                }

            }

        } else {
            $data = [
                'title' => 'Login page',
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => '',
                'error' => '',
                'passAlert' => '',
            ];
        }
        $this->view('users/login', $data);
    }

    public function createUserSession($user)
    {
        $siteName = ucfirst(SITENAME);
        $addr = URLROOT;

        $emailSubject = "$siteName - You Just Logged In ";
        $emailMessage ="
        Hello, 

        You just signed into your account

        Regards: TEAM 

        NOTE : This is an automatic mail 
        please don't reply to this message.
        ";
        if ($this->sendEmail($emailMessage, $user->email, $emailSubject)) {
            $_SESSION['user_id'] = $user->uid;
            $_SESSION['username'] = $user->username;
            $_SESSION['email'] = $user->email;
            header('location:' . URLROOT . '/home');
        } else {
            return false;
        }
    }

    public function forgetpassword()
    {
        $data = [
            'title' => 'Reset Your Password',
            'passAlert' => '',
        ];

        //Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'email' => trim($_POST['email']),
                'passAlert' => '',
            ];
            //Validate username
            if (empty($data['email'])) {
                $data['passAlert'] = "<script> toastr.warning('Enter Your Registered Email Address') </script>";

            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['passAlert'] = "<script> toastr.warning('Enter A Valid Email Address') </script>";
            } else {}
            //Check if all errors are empty
            if (empty($data['passAlert'])) {

                if ($this->userModel->findUserByEmail($data['email'])) {
                    //send email
                    $doProcess = $this->doPasswordForgetProcess($data['email']);
                    if ($doProcess) {
                        $data['passAlert'] = "<script> toastr.success('Success : Password Reset Link Has Been Sent To The Email Address If It Exist In Our Database') </script>";
                    } else {
                        $data['passAlert'] = "<script> toastr.error('Error : An Error Occured, Try Again Later') </script>";
                    }
                } else {
                    $data['passAlert'] = "<script> toastr.success('Success : Password Reset Link Has Been Sent To The Email Address If It Exist In Our Database.. does not exist sha') </script>";
                }
            }

        } else {
            $data = [
                'title' => 'Reset Your Password',
                'passAlert' => '',
            ];
        }
        $this->view('users/login', $data);
    }

    public function doPasswordForgetProcess($email)
    {

        $randCode = bin2hex(openssl_random_pseudo_bytes(16));;
        $to = $email;
        $siteName = ucfirst(SITENAME);
        $addr = URLROOT;

        $emailSubject = "$siteName - Password Reset Link";
        $emailMessage = "
        Hello, You requested for a Password reset
            
        Click the link below to reset your password  or copy to your browser

        $addr/user/resetpassword/$randCode
        
        Regards: TEAM 

        NOTE : This is an automatic mail please don't reply to this message.
        ";

        if ($this->sendEmail($emailMessage, $email, $emailSubject)) {

            if ($this->userModel->updatePassResetCode($randCode, $email)) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    public function sendEmail($message, $to, $subject)
    {

        $headers = "From: '.NOREPLY_SITE_EMAIL.'";

        if (mail($to, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }

    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        header('location:' . URLROOT . '/user/login');
    }

    public function resetPassword($code = 'none')
    {

        //if no reset code provided, redirect to error page
        if ($code == 'none' && $_SERVER['REQUEST_METHOD'] != 'POST') {
            return $this->view('error', [
                'title' => 'Error',
                'reason' => 'The page does not exist',
            ]);
        }

        //connect to model, to check if code is assigned in database
        $checkResetCode = $this->userModel->checkPasswordResetCode($code);

        //verify code on ordinary page load
        if (!$checkResetCode && $_SERVER['REQUEST_METHOD'] != 'POST') {

            //reset code doesn't exist in database, redirect to error page
            return $this->view('error', [
                'title' => 'Error',
                'reason' => 'The page does not exist'
            ]);

        }

        //Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //pass code to hidden field in form
            $data = [
                'title' => 'Change Your Password',
                'alert' => '',
                'resetCode' => sanitize($_POST['resetCode']),
                'password' => sanitize($_POST['password']),
                'confirmPassword' => sanitize($_POST['confirmPassword']),
            ];

            //reset code check in database if valid on form submit
            $checkResetCodeOnSubmit = $this->userModel->checkPasswordResetCode($data['resetCode']);
            if (!$checkResetCodeOnSubmit) {

                //reset code doesn't exist in database, redirect to error page
                return $this->view('error', [
                    'title' => 'Error',
                    'reason' => 'The page does not exist,.  reset code no dey db',
                ]);

            } else {

                $email = $checkResetCodeOnSubmit->email;
            }

            // Validate password on length, numeric values,
            if (empty($data['password'])) {
                $data['alert'] = "<script> toastr.warning('Please enter a password.') </script>";
            } elseif (strlen($data['password']) < 8) {
                $data['alert'] = "<script> toastr.warning('Password must be at least 8 characters.') </script>";
            }

            //Validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['alert'] = "<script> toastr.warning('Please enter confirm password.') </script>";
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['alert'] = "<script> toastr.warning('Password does not match, please try again.') </script>";
                }
            }
            if (empty($data['alert'])) {

                //hash password, get a new code
                $password = password_hash($data['password'], PASSWORD_DEFAULT);
                $newCode = bin2hex(openssl_random_pseudo_bytes(16));;

                //update both to grabbed email

                $updateUser = $this->userModel->updateUserDetails($newCode, $password, $email);

                //if user details updated
                if ($updateUser) {

                    //send success email

                    $to = $email;
                    $siteName = ucfirst(SITENAME);
                    $addr = URLROOT;

                    $emailSubject = "$siteName - Password Changed Successfully";
                    $emailMessage = "This is an automatic mail please don't reply to this message.


                  your password has been changed" . "\r\n" . "
                   Regards: TEAM ";
                    //is email sent?
                    if ($this->sendEmail($emailMessage, $email, $emailSubject)) {

                        //return success message
                        $data['alert'] = "<script> toastr.success('Password Change Successful, Please Proceed To Login') </script>";
                        //Redirect to the login page

                        header('location: ' . URLROOT . '/user/login');

                    } else {
                        $data['alert'] = "<script> toastr.error('An Error Occured, Try Later.') </script>";
                    }
                } else {
                    //throw error
                    $data['alert'] = "<script> toastr.error('An Error Occured, Try Later.') </script>";
                }

            } else {
                $data = [
                    'title' => 'Change Your Password',
                    'alert' => $data['alert'],
                    'resetCode' => sanitize($_POST['resetCode']),
                    'password' => sanitize($_POST['password']),
                    'confirmPassword' => sanitize($_POST['confirmPassword']),
                ];
            }

        } else {
            $data = [
                'title' => 'Change Your Password',
                'alert' => '',
                'resetCode' => $code,
            ];
        }
        $this->view('users/resetpassword', $data);
    }

}
