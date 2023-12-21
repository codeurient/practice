<div class="sidebar close">
    <header>
        <div class="logo-details">
            <i class="bx bxl-c-plus-plus"></i>
            <span class="logo_name text">Codeurient</span>
        </div>
        <i class='bx bx-chevron-right toggle'></i>
    </header>
    <ul class="nav-links">
<!--        isset($_SESSION['admin']) && $_SESSION['admin'] == 1-->
        <?php if( isset($_SESSION['id']) && getCurrentUserId($_SESSION['id'], 'admin') ): ?>
            <li>
                <a href="<?php echo BASE_URL .  "admin/posts/index.php"?>">
                    <i class="bx bx-history"></i>
                    <span class="link_name text">Admin Panel</span>
                </a>
                <!--            <ul class="sub-menu blank">-->
                <!--                <li><a class="link_name" href="#">History</a></li>-->
                <!--            </ul>-->
            </li>
        <?php endif; ?>

        <?php if(isset($_SESSION['id'])): ?>
            <li>
                <div class="icon-link">
                    <a href="">
                        <i class="bx bx-collection"></i>
                        <span class="link_name text">Status</span>
                    </a>
                    <i class="bx bxs-chevron-down arrow"></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name text no-drop-link" href="#">Status</a></li>
                    <li><a href="index.php?user_status=mentor&user_status_id=<?= $_SESSION['id'] ?>">Mentor</a></li>
                    <li><a href="index.php?user_status=mentee&user_status_id=<?= $_SESSION['id'] ?>">Mentee</a></li>
                </ul>
<!--                <form id="roleForm" action="index.php" method="post">-->
<!--                    <ul class="sub-menu">-->
<!--                        <li><a class="link_name text no-drop-link" href="">Status</a></li>-->
<!--                        <li>-->
<!--                            <label>-->
<!--                                <input type="radio" id="mentorRadio" name="status" value="mentor">-->
<!--                                <span class="custom-radio-label">Mentor</span>-->
<!--                            </label>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <label>-->
<!--                                <input type="radio" id="menteeRadio" name="status" value="mentee">-->
<!--                                <span class="custom-radio-label">Mentee</span>-->
<!--                            </label>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </form>-->
            </li>
        <?php endif; ?>

        <?php if( isset($_SESSION['id']) && getCurrentUserId($_SESSION['id'], 'status') == 'mentor' ): ?>
            <li>
                <div class="icon-link">
                    <a href="<?php echo BASE_URL .  "create.php"?>">
                        <i class="bx bx-book-alt"></i>
                        <span class="link_name text">Posts</span>
                    </a>
    <!--                <i class="bx bxs-chevron-down arrow"></i>-->
                </div>
    <!--            <ul class="sub-menu">-->
    <!--                <li><a class="link_name no-drop-link" href="#">Posts</a></li>-->
    <!--                <li><a href="#">Web Design</a></li>-->
    <!--                <li><a href="#">Login Form</a></li>-->
    <!--            </ul>-->
            </li>
        <?php endif; ?>
        <li>
            <a href="">
                <i class="bx bx-pie-chart-alt-2"></i>
                <span class="link_name text">Analytics</span>
            </a>
<!--            <ul class="sub-menu blank">-->
<!--                <li><a class="link_name" href="#">Analytics</a></li>-->
<!--            </ul>-->
        </li>
        <li>
            <a href="">
                <i class="bx bx-line-chart"></i>
                <span class="link_name text">Chart</span>
            </a>
<!--            <ul class="sub-menu blank">-->
<!--                <li><a class="link_name" href="#">Chart</a></li>-->
<!--            </ul>-->
        </li>
        <li>
            <div class="icon-link">
                <a href="">
                    <i class="bx bx-plug"></i>
                    <span class="link_name text">Plugins</span>
                </a>
<!--                <i class="bx bxs-chevron-down arrow"></i>-->
            </div>
<!--            <ul class="sub-menu">-->
<!--                <li><a class="link_name no-drop-link" href="#">Plugins</a></li>-->
<!--                <li><a href="#">Web Design</a></li>-->
<!--                <li><a href="#">Login Form</a></li>-->
<!--            </ul>-->
        </li>
        <li>
            <a href="">
                <i class="bx bx-compass"></i>
                <span class="link_name text">Explore</span>
            </a>
<!--            <ul class="sub-menu blank">-->
<!--                <li><a class="link_name" href="#">Explore</a></li>-->
<!--            </ul>-->
        </li>

        <li>
            <a href="">
                <i class="bx bx-cog"></i>
                <span class="link_name text">Setting</span>
            </a>
<!--            <ul class="sub-menu blank">-->
<!--                <li><a class="link_name" href="#">Setting</a></li>-->
<!--            </ul>-->
        </li>
        <li>
            <a href="<?php echo BASE_URL . "test_output_index.php" ?>">
                <i class="bx bx-plug"></i>
                <span class="link_name text">Test data output</span>
            </a>
        </li>
        <li>
            <?php if(isset($_SESSION['id'])): ?>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="logo.png" alt="profile">
                    </div>
                    <div class="name-job">
                        <div class="profile_name text"><?= $_SESSION['login'] ?></div>
                        <div class="job text"><?= $_SESSION['status'] ?></div>
                    </div>
                    <a href="<?php echo BASE_URL . "logout.php"; ?>">
                        <i class="bx bx-log-out text logout" style="color: #fff !important;"></i>
                    </a>
                </div>
            <?php else: ?>
                <div class="login-details">
                    <i class="bx bx-log-in login"></i>
                    <div class="login-name">
                        <a class="" href="<?php echo BASE_URL . "log.php"; ?>">Log in</a>
                    </div>
                </div>
            <?php endif; ?>

        </li>
    </ul>

</div>