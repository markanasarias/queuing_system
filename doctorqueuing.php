<!DOCTYPE html>
<html lang="en">
    <head>
       <?php include 'header.php';?>
    </head>
    <body class="sb-nav-fixed">
    <?php include 'topbar.php';?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include 'doctorsidebar.php'; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <?php include 'DOCTOR/queuing.php';?>
                </main>
            </div>
        </div>
    <?php include 'script.php';?>
    </body>
</html>
