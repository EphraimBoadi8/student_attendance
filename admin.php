<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php
    require_once 'components/sidebar.php';
    require_once 'components/dashboard.php';
    require_once 'components/manage_students.php';
    require_once 'components/manage_lecturers.php';
    require_once 'components/view_attendance.php';
    require_once 'components/settings.php';

    renderSidebar();
    ?>

    <div class="main-content">
        <?php
        renderDashboard();
        renderManageStudents();
        renderManageLecturers();
        renderViewAttendance();
        renderSettings();
        ?>
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

                case 'manage_students':
                document.getElementById('manage_students').style.display='block';
                break;

                case 'manage_lecturers':
                document.getElementById('manage_lecturer').style.display='block';
                break;

                case 'view_attendance':
                document.getElementById('view_attendance').style.display='block';
                break;

                case 'settings':
                document.getElementById('settings').style.display='block';
                break;

                default:
                document.getElementById('dashboard').style.display='block';
            }
        } 
    </script>
</body>
</html> 
