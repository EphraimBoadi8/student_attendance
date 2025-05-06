<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lecturer dashboard</title>
    <link rel="stylesheet" href="lecturer.css">
</head>
<body>
    <div class="sidebar">
        <h2>Lecturer Dashboard</h2>
        <ul>
            <li onclick="showContent('dashboard')"><a href="#">Dashboard</a></li>
            <li onclick="showContent('mark')"><a href="#">Mark Students attendance</a></li>
            <li onclick="showContent('generate')"><a href="#">generate report</a></li>
            <li onclick="showContent('view')"><a href="#">View and edit Attendance</a></li>
        </ul>
        <div>
            <button onclick="window.location.href='index.php'">Logout</button>
        </div>
    </div>
    <div class="mainContent">
        <div class="content" id="dashboard" style="display:block;">
            <?php include 'lec_components/dashboard.php'; ?>
        </div>
        <div class="content" id="mark" style="display:none;">
            <?php include 'lec_components/mark_attendance.php'; ?>
        </div>
        <div class="content" id="generate" style="display:none;">
            <?php include 'lec_components/generate_report.php'; ?>
        </div>
        <div class="content" id="view" style="display:none;">
            <?php include 'lec_components/view_attendance.php'; ?>
        </div>
    </div>
    <script>
        function showContent(section){
            const pages=document.getElementsByClassName('content');
            for(let i=0; i<pages.length; i++){
                pages[i].style.display='none';
            }

            switch(section){
                case 'dashboard':
                document.getElementById('dashboard').style.display='block';
                break;

                case 'mark':
                document.getElementById('mark').style.display='block';
                break;

                case 'generate':
                document.getElementById('generate').style.display='block';
                break;

                case 'view':
                document.getElementById('view').style.display='block';
                break;
                default:
                document.getElementById('dashboard').style.display='block';
            }
        } 
    </script>
</body>
</html>