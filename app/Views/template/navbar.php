<div class="fixed-navbar">
    <div class="pull-left">
        <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
        <h1 class="page-title">Home</h1>
        <!-- /.page-title -->
    </div>
    <!-- /.pull-left -->
    <div class="pull-right">
        <!-- /.ico-item -->
        <div class="ico-item fa fa-arrows-alt js__full_screen"></div>
        <div class="ico-item">
            <input type="hidden" id="user_id" id="user_id" value="<?= user()->id ?>">
            <input type="hidden" id="username" value="<?= user()->username ?>">
            <input type="hidden" id="group" value="<?= array_values(user()->getRoles())[0] ?>">
            <!-- <img src="http://placehold.it/80x80" alt="" class="ico-img"> -->
            <i class="ico-img ico mdi mdi-account-circle"></i>
            <ul class="sub-ico-item">
                <!-- <li><a href="#">Settings</a></li>
                <li><a href="#">Blog</a></li> -->
                <li><a class="js__logout" href="#">Log Out</a></li>
            </ul>
            <!-- /.sub-ico-item -->
        </div>
        <!-- /.ico-item -->
    </div>
    <!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->