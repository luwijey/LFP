<?php
include '../actions/sessionChecker_action.php';
include '../components/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/lfp.css">
    <script src="../js/script.js"></script>
    <title>L&F Platform</title>
</head>
<body>
<div class="page-wrapper d-flex flex-column ">
    <!-- header -->
    <div class="custom-header container-fluid">
        <nav class="navbar p-1.5">
            <a class= "navbar-brand custom-logo" tabindex="-1" href="../main/lfp.php">
                <img src="../uploads/circle_logo.png" style="width:45px; height:auto; margin-right: 10px;" alt="logo">
                Lost & Found  
            </a>    

            <ul class="nav nav-pills gap-1 custom-list " id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button 
                        class="nav-link active" 
                        id="dashboard-tab" 
                        data-bs-toggle="pill" 
                        type="button" role="tab"
                        aria-selected="true">
                        Dashboard
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button 
                        class="nav-link" 
                        id="reports-tab" 
                        data-bs-toggle="pill" 
                        type="button" role="tab" 
                         aria-selected="false">
                        Reports
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button 
                        class="nav-link" 
                        id="profile-tab" 
                        data-bs-toggle="pill" 
                        type="button" role="tab" 
                        aria-selected="false">
                        Profile
                    </button>
                </li>

                <li class="nav-item">
                    <a href="../actions/logout.php" class="btn" id="logout">
                        Log Out
                    </a>
                </li>
            </ul>       
        </nav>
    </div>
    
     <!--main --> 
    <main class="main-container tab-content d-flex flex-column container-fluid p-1 mt-2">
        <!--dashboard-->
        <div class="dashboard tab d-none p-2 flex-column" role="tabpanel">
                <!--search-->
            <div class="search-container container-fluid mb-4 d-flex justify-content-between align-items-center">
                <span class="userName" role="UsernameDisplay">Welcome, <?php echo htmlspecialchars($name);?></span>
                <form class="d-flex gap-1" action="" method="get">
                    <input class="search-bar form-control border-1 border-dark mx-1" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
                    <select class="sort p-2" name="sort" id="sort">
                        <option value="all">All</option>
                        <option value="lost">Lost</option>
                        <option value="found">Found</option>
                    </select>
                </form>
            </div>

            <!--content-->
            <div class="dashboard-content d-flex container-fluid border rounded-1">
                <div class="column-wrapper col p-3 d-flex flex-column gap-3 text-center">
                    <div class="recent-wrapper row border border-2 rounded-2 p-3 ">
                        <h6>Recent Found</h6>
                    </div>

                    <div class="recent-wrapper row border border-2 rounded-2 p-3 ">
                        <h6>Recent Lost</h6>
                    </div>
                </div>
            </div>
        </div>
        
        <!--reports-->
        <div class="reports tab p-2 d-flex" role="tabpanel">
            <div class="reports-container p-2 d-flex flex-column container-xxl border border-2 rounded-1">
                <div class="container-xxl p-3">
                    <button class="btn fs-6 border border-3" type="button">
                        <i class="fa-solid fa-plus"></i>
                        Create Report
                    </button>
                </div>
                <div class="reports-content p-2 d-flex gap-3 justify-content-between container-xxl">
                    <div class="my-reports r-cards p-3 container border rounded-2">
                        <h6>My Reports</h6>
                    </div>
                    <div class="possible-matches r-cards p-3 container border rounded-2">
                        <h6>Possible Matches</h6>
                    </div>
                </div>
            </div>
        </div>

        <!--profile-->
        <div class="profile tab d-none"role="tabpanel">
            <h6>profile </h6>
        </div>
    </main>
</div>
</body>
</html>