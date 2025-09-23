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
    <script defer src="../js/script.js"></script>
    <title>L&F Platform</title>
</head>

<body>
    <div class="page-wrapper d-flex flex-column position-relative">
        <!-- header -->
        <div class="custom-header container-fluid">
            <nav class="navbar p-1.5">
                <a class="navbar-brand custom-logo" tabindex="-1" href="../main/lfp.php">
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
                    <span class="userName" role="UsernameDisplay">Welcome, <?php echo htmlspecialchars($name); ?></span>
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
                        <button class="btn fs-6 border border-3" type="button" id="createReport">
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
            <div class="reportModal container-fluid d-none mx-auto p-5 z-3 position-absolute top-50 start-50 translate-middle vh-100">
                <form action=" " method="POST" enctype="multipart/form-data">

                    <!--choose the type of report -->
                    <div class="entryForm container d-flex p-4 w-50 border border-2 rounded-2 shadow flex-column position-absolute top-50 start-50 translate-middle">
                        <div class="d-flex justify-content-end">
                            <i class="fa-solid fa-xmark fs-6" id="close-modal" style="cursor: pointer;"></i>
                        </div>
                        <h6 class="modal-title mx-auto mb-3 fs-5">
                            Choose the type of report
                        </h6>
                        <div class="btn-wrapper w-100 p-2 mx-auto d-flex justify-content-between gap-4">
                            <button class="btn w-50 fw-semibold text-white" type="button" id="lost">Lost</button>
                            <button class="btn w-50 fw-semibold text-white" type="button" id="found">Found</button>
                        </div>
                    </div>

                    <!--Lost report -->
                    <div class="lostForm container d-none p-4 w-50 border border-2 rounded-2 shadow flex-column position-absolute top-50 start-50 translate-middle">
                        <div class="d-flex justify-content-between">
                            <i class="fa-solid fa-arrow-left" id="return" style="cursor: pointer;"></i>
                            <i class="fa-solid fa-xmark fs-6" id="close-modal" style="cursor: pointer;"></i>
                        </div>
                        <h6 class="modal-title mx-auto mb-3 fs-5">
                            Lost Item
                        </h6>

                        <div class="input-wrapper d-flex flex-column mb-2 w-75 mx-auto gap-2">
                            <input type="text" class="form-control" placeholder="Item Name (e.g., Black Wallet)" name="item-name" required>
                            <select class="form-select rounded-2" name="category" required>
                                <option selected disabled>Category</option>
                                <option value="electronic">Electronics</option>
                                <option value="wallet">Wallet</option>
                                <option value="bag">Bag</option>
                                <option value="clothing">Clothing</option>
                                <option value="accessories">Accessories</option>
                                <option value="jewelry">Jewelry</option>
                                <option value="documents">ID / Documents</option>
                                <option value="others">Others</option>
                            </select>
                            <textarea class="form-control text-area" rows="3" placeholder="Description (color, brand, etc...)" name="description" required></textarea>
                            <input type="file" class="form-control" name="item_photo" accept="image/*" required> 
                            <label for="date">Date of Found / Lost </label>
                            <input type="date" class="form-control" name="date" required>
                            <input type="text" class="form-control" placeholder="Location (e.g., Library, Gym, Parking Lot)" name="location" required>
                            <div class="form-check mt-2 mx-auto">
                                <input class="form-check-input" type="checkbox" id="agreement" required>
                                <label class="form-check-label" class="text-white" for="agreement">
                                    I confirm that the information provided is true.
                                </label>
                            </div>
                            <div class="d-flex mt-2 justify-content-end gap-2">
                                <button type="reset" class="btn btn-danger" id="clear">Clear</button>
                                <button type="submit" class="btn btn-primary" id="submit-report">Submit Report</button>
                            </div>
                        </div>
                    </div>
                    
                    <!--Found Report-->
                    <div class="foundForm container d-none p-4 w-50 border border-2 rounded-2 shadow flex-column position-absolute top-50 start-50 translate-middle">
                        <div class="d-flex justify-content-between">
                            <i class="fa-solid fa-arrow-left" id="return" style="cursor: pointer;"></i>
                            <i class="fa-solid fa-xmark fs-6" id="close-modal" style="cursor: pointer;"></i>
                        </div>
                        <h6 class="modal-title mx-auto mb-3 fs-5">
                            Found Item
                        </h6>

                        <div class="input-wrapper d-flex flex-column mb-2 w-75 mx-auto gap-2">
                            <input type="text" class="form-control" placeholder="Item Name (e.g., Black Wallet)" name="item-name" required>
                            <select class="form-select rounded-2" name="category" required>
                                <option selected disabled>Category</option>
                                <option value="electronic">Electronics</option>
                                <option value="wallet">Wallet</option>
                                <option value="bag">Bag</option>
                                <option value="clothing">Clothing</option>
                                <option value="accessories">Accessories</option>
                                <option value="jewelry">Jewelry</option>
                                <option value="documents">ID / Documents</option>
                                <option value="others">Others</option>
                            </select>
                            <label for="date">Date of Found / Lost </label>
                            <input type="date" class="form-control" name="date" required>
                            <input type="text" class="form-control" placeholder="Location (e.g., Library, Gym, Parking Lot)" name="location" required>
                            <input type="file" class="form-control" name="item_photo" accept="image/*" required>     
                            <div class="form-check mt-2 mx-auto">
                                <input class="form-check-input" type="checkbox" id="agreement" required>
                                <label class="form-check-label" class="text-white" for="agreement">
                                    I confirm that the information provided is true.
                                </label>
                            </div>
                            <div class="d-flex mt-2 justify-content-end gap-2">
                                <button type="reset" class="btn btn-danger" id="clear">Clear</button>
                                <button type="submit" class="btn btn-primary" id="submit-report">Submit Report</button>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>

            <!--profile-->
            <div class="profile tab d-none" role="tabpanel">
                <h6>profile </h6>
            </div>
        </main>
    </div>
</body>

</html>