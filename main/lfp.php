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
<div class="page-container d-flex flex-column border border-danger">
    <!-- header -->
    <div class="custom-header container-fluid">
        <nav class="navbar p-1.5">
            <a class= "navbar-brand custom-logo" tabindex="-1" href="../main/lfp.php">
                <img src="../uploads/circle_logo.png" style="width:45px; height:auto; margin-right: 10px;" alt="logo">
                Lost & Found  
            </a>    
            <ul class="nav nav-pills gap-1 custom-list " id="pills-tab" role="tablist">
                <li class="nav-item " role="presentation">
                    <button class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#pills-dashboard" type="button" role="tab" aria-controls="pills-dashboard" aria-selected="true">Dashboard</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-reports-tab" data-bs-toggle="pill" data-bs-target="#pills-reports" type="button" role="tab" aria-controls="pills-reports" aria-selected="false">Reports</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
                </li>

                <li class="nav-item">
                    <button class="btn" id="logout" type="button">Log Out</button>
                </li>
            </ul>       
        </nav>
    </div>

     <!--main -->    <!--TODO: CREATE A SHADOW FOR BORDER STYLES AND FIX THE STYLE OF RECENTS  -->
    <main class=" main-container d-flex flex-column container-fluid p-2 mt-3 border border-dark">
        <!--search-->
        <div class="search-container container-fluid mb-4 d-flex justify-content-between align-items-center">
            <span class="userName" role="UsernameDisplay">Welcome, <?php echo htmlspecialchars($name);?></span>
            <form class="d-flex gap-1" action="" method="get">
                <input class="search-bar form-control border-1 border-dark" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
                <select class="sort p-2" name="sort" id="sort">
                    <option value="all">All</option>
                    <option value="lost">Lost</option>
                    <option value="found">Found</option>
                </select>
            </form>
        </div>

        <!--content-->
        <div class="content-container container-fluid border border-dark">
            <div class="col d-flex flex-column gap-3">
                <div class="row border p-3 ">
                    <h5>Recent Found</h5>
                </div>

                <div class="row border p-3 ">
                    <h5>Recent Lost</h5>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>