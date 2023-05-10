<div class="profile-sidebar">
<div class="widget-profile pro-widget-content">
    <div class="profile-info-widget">
        <a href="#" class="booking-doc-img">
            <img src="image/<?php echo$row['image']; ?>" alt="User Image">
        </a>
        <div class="profile-det-info">
            <h3>Dr. <?php echo $row['name']; ?></h3>
            
            <div class="patient-details">
                <h5 class="mb-0"><?php echo $row['education']; ?></h5>
            </div>
        </div>
    </div>
</div>
<div class="dashboard-widget">
    <nav class="dashboard-menu">
        <ul>
            <li class="active">
                <a href="doctor-dashboard.php">
                    <i class="fas fa-columns"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="appointments.php">
                    <i class="fas fa-calendar-check"></i>
                    <span>Appointments</span>
                </a>
            </li>
            <!-- <li>
                <a href="my-patients.html">
                    <i class="fas fa-user-injured"></i>
                    <span>My Patients</span>
                </a>
            </li> -->
            <li>
                <a href="schedule-timings.php">
                    <i class="fas fa-hourglass-start"></i>
                    <span>Schedule Timings</span>
                </a>
            </li>
            <!-- <li>
                <a href="invoices.html">
                    <i class="fas fa-file-invoice"></i>
                    <span>Invoices</span>
                </a>
            </li>
            <li>
                <a href="reviews.html">
                    <i class="fas fa-star"></i>
                    <span>Reviews</span>
                </a>
            </li> -->
            <!-- <li>
                <a href="chat-doctor.php">
                    <i class="fas fa-comments"></i>
                    <span>Message</span>
                    <small class="unread-msg"></small>
                </a>
            </li> -->
            <li>
                <a href="profile-settings.php">
                    <i class="fas fa-user-cog"></i>
                    <span>Profile Settings</span>
                </a>
            </li>
            <!-- <li>
                <a href="social-media.html">
                    <i class="fas fa-share-alt"></i>
                    <span>Social Media</span>
                </a>
            </li> -->
            <li>
                <a href="doctor-change-password.php">
                    <i class="fas fa-lock"></i>
                    <span>Change Password</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
</div>