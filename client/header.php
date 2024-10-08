<nav id="navbar" class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container d-flex flex-row justify-content-between align-items-center">
        <!-- Left side: Toggle button and Theme mode switch -->
        <div class="d-flex align-items-center">
            <a class="navbar-brand ms-auto" href="#">
                <span class="header-title">Discussion</span>
                <img class="img-fluid title-image" src="./public/assets/images/neptune.png" alt="Logo">
            </a>
        </div>

        <!-- Middle: Navbar links -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <!-- Home link -->
                <li class="nav-item">
                    <a class="nav-link active" href="./">Home</a>
                </li>

                <!-- PHP logic for session handling -->
                <?php
                // Check if 'user_info' session is set and the user is logged in
                if (isset($_SESSION['user_info']['username'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./server/requests.php?logout=true">Log out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?ask=true">Ask A Question</a>
                    </li>
                <?php } else { ?>
                    <!-- Login/SignUp Links for guests -->
                    <li class="nav-item">
                        <a class="nav-link" href="?login=true">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?signup=true">SignUp</a>
                    </li>
                <?php } ?>

                <!-- Static links for category and latest questions -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Latest Questions</a>
                </li>
            </ul>
        </div>

        <!-- Right side: Brand and logo -->

        <div class="d-flex justify-content-center align-items-center gap-2">

            <!-- Navbar Toggler with default icon class -->
            <button class="navbar-toggler" id="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>


            <!-- Theme mode switch -->
            <li class="nav-link ml-2" id="theme-mode">
                <i class="bx bx-moon font-size-24"></i>
            </li>
        </div>


    </div>
</nav>