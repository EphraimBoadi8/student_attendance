<?php
function renderDashboard() {
    ?>
    <div class="content" id="dashboard" style="display:block; width: 80vw;">
        <div class="dashboard-container">
            <h2>Dashboard Overview</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">👨‍🏫</div>
                    <div class="stat-info">
                        <h3>Total Lecturers</h3>
                        <p class="stat-number">0</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">👨‍🎓</div>
                    <div class="stat-info">
                        <h3>Total Students</h3>
                        <p class="stat-number">0</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">📚</div>
                    <div class="stat-info">
                        <h3>Total Classes</h3>
                        <p class="stat-number">0</p>
                        <div class="class-status">
                            <span class="status active">Active: 0</span>
                            <span class="status completed">Completed: 0</span>
                        </div>
                    </div>
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

        .dashboard-container h2 {
            color: #333;
            margin-bottom: 30px;
            font-size: 24px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 40px;
            margin-right: 20px;
        }

        .stat-info h3 {
            color: #666;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin: 0;
        }

        .class-status {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .status {
            font-size: 14px;
            padding: 4px 8px;
            border-radius: 4px;
        }

        .status.active {
            background: #e3f2fd;
            color: #1976d2;
        }

        .status.completed {
            background: #e8f5e9;
            color: #2e7d32;
        }
    </style>
    <?php
}
?> 