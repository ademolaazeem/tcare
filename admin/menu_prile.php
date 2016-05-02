<div class="profile">
    <div class="profile_pic">
        <?php
            if(isset($_SESSION['imagepath'])){
                if($_SESSION['imagepath'] != "")
                   $pix = $_SESSION['imagepath'];
                else
                    $pix = "images/avatars/user.png";
            }
            else
            $pix = "images/avatars/user.png";
        ?>
        <img src="<?php echo $pix; ?>" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2>
            <?php
            if(isset($_SESSION['userfullname']))
             echo $_SESSION['userfullname'];
            else
             echo 'Not Logged in';
            ?>
        </h2>
    </div>
</div>