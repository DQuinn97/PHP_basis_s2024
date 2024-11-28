<?php
print '<pre>';
print_r($_POST);
print '</pre>';

session_start();
if (!@$_SESSION['loggedin']) {
    header("Location: login.php");
    exit;
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
                                <h3> Admin page</h3>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">

                        <div class="col-lg-6">

                            admin content
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require('footer.inc.php'); ?>