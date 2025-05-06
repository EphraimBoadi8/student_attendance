<?php
// Dashboard component
?>
<div class="dashboard-container">
    <h2>Welcome to Your Dashboard</h2>
    <div class="div_container">
                      <!-- Statistics Overview -->
    <div class="dashboard-stats">
        <div class="stat-card">
            <h3>Total Students</h3>
            <p class="stat-number">150</p>
        </div>
        <div class="stat-card">
            <h3>Present Today</h3>
            <p class="stat-number">120</p>
        </div>
        <div class="stat-card">
            <h3>Absent Today</h3>
            <p class="stat-number">30</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <h3>Quick Actions</h3>
        <div class="action-buttons">
            <a href="mark_attendance.php" class="action-btn">
                <i class="fas fa-check-circle"></i>
                Mark Attendance
            </a>
            <a href="view_attendance.php" class="action-btn">
                <i class="fas fa-list"></i>
                View Attendance
            </a>
        </div>
    </div>

    <!-- Recent Attendance Records -->
    <div class="recent-records">
        <h3>Recent Attendance Records</h3>
        <div class="records-table">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Class</th>
                        <th>Present</th>
                        <th>Absent</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo date('Y-m-d'); ?></td>
                        <td>Class A</td>
                        <td>25</td>
                        <td>5</td>
                        <td><a href="#" class="view-details">View Details</a></td>
                    </tr>
                    <tr>
                        <td><?php echo date('Y-m-d', strtotime('-1 day')); ?></td>
                        <td>Class B</td>
                        <td>28</td>
                        <td>2</td>
                        <td><a href="#" class="view-details">View Details</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    
  
</div>

<style>
.dashboard-container {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.dashboard-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.div_container{
    display:flex;
    gap: 10px;
}

.stat-number {
    font-size: 2em;
    font-weight: bold;
    color: #2c3e50;
    margin: 10px 0;
}

.quick-actions {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.action-buttons {
    display: flex;
    gap: 15px;
    margin-top: 15px;
}

.action-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    background: #3498db;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    transition: background 0.3s;
}

.action-btn:hover {
    background: #2980b9;
}

.recent-records {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.records-table {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background: #f8f9fa;
    font-weight: 600;
}

.view-details {
    color: #3498db;
    text-decoration: none;
}

.view-details:hover {
    text-decoration: underline;
}
</style> 