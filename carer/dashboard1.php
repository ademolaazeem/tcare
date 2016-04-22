<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once('head.php'); ?>
    <body>
<?php require_once('header.php'); ?>
    <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <?php require_once('sidebarIndex.php'); ?>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <?php include_once('inside.php') ?>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
<?php require_once('footer.php'); ?>
 </body>
