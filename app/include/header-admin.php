<div class="sidebar close">
    <header>
        <div class="logo-details">
            <i class="bx bxl-c-plus-plus"></i>
            <span class="logo_name text">Codeurient</span>
        </div>
        <i class='bx bx-chevron-right toggle'></i>
    </header>
    <ul class="nav-links">
        <li>
            <div class="icon-link">
                <a href="<?php echo BASE_URL ?>">
                    <i class="bx bx-book-alt"></i>
                    <span class="link_name text">Blog</span>
                </a>
            </div>
        </li>
        <li>
            <a href="<?php echo BASE_URL . "admin/posts/index.php" ?>">
                <i class="bx bx-grid-alt"></i>
                <span class="link_name text">Record</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL . "admin/topics/index.php" ?>">
                <i class="bx bx-compass"></i>
                <span class="link_name text">Category</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL . "admin/users/index.php" ?>">
                <i class="bx bx-plug"></i>
                <span class="link_name text">Users</span>
            </a>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="../../logo.png" alt="profile">
                </div>
                <div class="name-job">
                    <div class="profile_name text"><?= $_SESSION['login'] ?></div>
                    <div class="job text">Admin</div>
                </div>
                <a href="<?php echo BASE_URL . "logout.php"; ?>">
                    <i class="bx bx-log-out text logout" style="color: #fff !important;"></i>
                </a>
            </div>
        </li>
    </ul>

</div>