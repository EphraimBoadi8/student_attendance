<?php
// Generate Report component
?>
<div class="generate-report-container">
    <h2>Generate Attendance Report</h2>
    <div class="report-options">
        <form action="process_report.php" method="POST" class="report-form">
            <div class="form-group">
                <label for="course">Select Course:</label>
                <select name="course" id="course" required>
                    <option value="">Select a course</option>
                    <?php
                    // TODO: Add dynamic course options from database
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="date-range">Date Range:</label>
                <div class="date-inputs">
                    <input type="date" name="start_date" id="start_date" required>
                    <span>to</span>
                    <input type="date" name="end_date" id="end_date" required>
                </div>
            </div>

            <div class="form-group">
                <label for="report-type">Report Type:</label>
                <select name="report_type" id="report-type" required>
                    <option value="summary">Summary Report</option>
                    <option value="detailed">Detailed Report</option>
                    <option value="student">Individual Student Report</option>
                </select>
            </div>

            <div class="form-group">
                <label for="format">Export Format:</label>
                <select name="format" id="format" required>
                    <option value="pdf">PDF</option>
                    <option value="excel">Excel</option>
                    <option value="csv">CSV</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Generate Report</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
</div>

<style>
.generate-report-container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    width: 100vw;
    margin-left: 30px;
}

.report-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group label {
    font-weight: 600;
    color: #333;
}

.form-group select,
.form-group input {
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

.date-inputs {
    display: flex;
    align-items: center;
    gap: 10px;
}

.date-inputs input {
    flex: 1;
}

.form-actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}

.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.3s;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #545b62;
}
</style> 