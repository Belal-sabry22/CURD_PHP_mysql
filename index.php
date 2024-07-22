
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Database Practice</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="bg-light py-3">
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">University Database Practice</a>
    </nav>
</div>
</header>
<div class="container mt-5">
    <?php
    $pages = ['major', 'edit_major'];
    if (isset($_GET['page'])) {
        $page =$_GET['page'];
        if (in_array($page, $pages)) {
            include 'header.php'; 
            include $page . ".php";            
        }else{
            include "e404.php";
    }}else{
        include "major.php";
    }
    ?>
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>