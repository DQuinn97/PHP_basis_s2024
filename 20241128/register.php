<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


print '<pre>';
print_r($_POST);
print '</pre>';


require('funcs.inc.php');
require('db.inc.php');

requiredLoggedOut();



$errors = [];



if (isset($_POST['registersubmit'])) {
    $nameRegex = "/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i";
    $passwordRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";

    if (!strlen($_POST['inputfn'])) $errors[] = "Please enter first name...";
    elseif (strlen($_POST['inputfn']) < 1) $errors[] = "First name too short...";
    elseif (preg_match($nameRegex, $_POST['inputfn'])) $errors[] = "First name cannot contain weird characters...";
    if (!strlen($_POST['inputln'])) $errors[] = "Please enter last name...";
    elseif (strlen($_POST['inputln']) < 1) $errors[] = "Last name too short...";
    elseif (preg_match($nameRegex, $_POST['inputln'])) $errors[] = "Last name cannot contain weird characters...";
    if (!strlen($_POST['inputmail'])) $errors[] = "Please enter email...";
    elseif (!filter_var($_POST['inputmail'], FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email address...";
    elseif (checkEmail($_POST['inputmail'])) $errors[] = "Email already registered, <a href='login.php'>log in</a> instead...";
    if (!strlen($_POST['inputpass'])) $errors[] = "Please enter password...";
    elseif (!preg_match($passwordRegex, $_POST['inputpass'])) $errors[] = "Password not secure enough...";


    if (!count($errors)) {
        $newId = register($_POST['inputfn'], $_POST['inputln'], $_POST['inputmail'], $_POST['inputpass'], (int)@$_POST['inputoptin']);
        if (!$newId) $errors[] = "Something went wrong...";
        else {
            logIn($newId);

            header("Location: admin.php");
            exit;
        }
    }
}



require('head.inc.php'); ?>
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3> Register</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p><a href="index.html">Dashboard</a> <i class="fas fa-caret-right"></i> Register</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">

                        <div class="col-lg-6">
                            <!-- sign_in  -->
                            <div class="modal-content cs_modal">
                                <div class="modal-header justify-content-center theme_bg_1">
                                    <h5 class="modal-title text_white">Register</h5>
                                </div>

                                <?php if (count($errors) > 0): ?>
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li><?= $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <div class="modal-body">
                                    <form method="post" action="register.php">
                                        <div class="">
                                            <input name="inputfn" id="inputfn" type="text" class="form-control" placeholder="Enter your first name" value='<?= @$_POST['inputfn'] ?>'>
                                        </div>
                                        <div class="">
                                            <input name="inputln" id="inputln" type="text" class="form-control" placeholder="Enter your last name" value='<?= @$_POST['inputln'] ?>'>
                                        </div>
                                        <div class="">
                                            <input name="inputmail" id="inputmail" type="text" class="form-control" placeholder="Enter your email" value='<?= @$_POST['inputmail'] ?>'>
                                        </div>
                                        <div class="">
                                            <input name="inputpass" id="inputpass" type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class=" cs_check_box">
                                            <input type="checkbox" id="inputoptin" name="inputoptin" class="common_checkbox" value=1 <?= !@$_POST['inputoptin'] ?: 'checked' ?>>
                                            <label class="form-label" for="inputoptin">
                                                Keep me up to date
                                            </label>
                                        </div>
                                        <button name="registersubmit" id="registersubmit" class="btn_1 full_width text-center" value=1>Sign up</button>
                                    </form>
                                    <p>Already have an account? <a data-bs-toggle="modal" data-bs-target="#sing_up" data-bs-dismiss="modal" href="login.php"> Sign In</a></p>
                                    <div class="text-center">
                                        <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal" class="pass_forget_btn">Forget Password?</a> -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




<?php require('footer.inc.php'); ?>