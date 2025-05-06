<?php
function renderSidebar() {
    ?>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a onclick="showContent('dashboard')" href="#">Dashboard</a></li>
            <li><a onclick="showContent('manage_students')" href="#">manage students</a></li>
            <li><a onclick="showContent('manage_lecturer')" href="#">manage lecturer</a></li>
            <li><a onclick="showContent('view_attendance')" href="#">view attendance</a></li>
            <!-- <li><a onclick="showContent('settings')" href="#">settings</a></li> -->
        </ul>
        <div>
            <button onclick="window.location.href='index.php'">Logout</button>
        </div>
    </div>
    <?php
}
?> 