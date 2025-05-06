<?php
// View Attendance Page
?>
<div class="view-attendance-container">
    <h2>View Attendance Records</h2>
    
    <!-- Filters -->
    <div class="filters-section">
        <form action="" method="GET" class="filters-form">
            <div class="filter-group">
                <label for="class">Class:</label>
                <select name="class" id="class">
                    <option value="">All Classes</option>
                    <option value="class_a">Class A</option>
                    <option value="class_b">Class B</option>
                    <option value="class_c">Class C</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="date_from">From:</label>
                <input type="date" name="date_from" id="date_from">
            </div>
            
            <div class="filter-group">
                <label for="date_to">To:</label>
                <input type="date" name="date_to" id="date_to">
            </div>
            
            <button type="submit" class="filter-btn">Apply Filters</button>
        </form>
    </div>

    <!-- Attendance Records Table -->
    <div class="attendance-records">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Class</th>
                        <th>Total Students</th>
                        <th>Present</th>
                        <th>Absent</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo date('Y-m-d'); ?></td>
                        <td>Class A</td>
                        <td>30</td>
                        <td>25</td>
                        <td>5</td>
                        <td>
                            <a href="#" class="action-link view">View Details</a>
                            <a href="#" class="action-link export">Export</a>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo date('Y-m-d', strtotime('-1 day')); ?></td>
                        <td>Class B</td>
                        <td>30</td>
                        <td>28</td>
                        <td>2</td>
                        <td>
                            <a href="#" class="action-link view">View Details</a>
                            <a href="#" class="action-link export">Export</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
.view-attendance-container {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.filters-section {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

.filters-form {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    align-items: end;
}

.filter-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.filter-group label {
    font-weight: 600;
}

.filter-group select,
.filter-group input {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.filter-btn {
    padding: 8px 20px;
    background: #3498db;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.filter-btn:hover {
    background: #2980b9;
}

.attendance-records {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.table-container {
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

.action-link {
    color: #3498db;
    text-decoration: none;
    margin-right: 10px;
}

.action-link:hover {
    text-decoration: underline;
}

.action-link.export {
    color: #27ae60;
}
</style> 