<!DOCTYPE html>
<html lang="en">
<head>
  <title>WEB4014.01</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>PHP3 - WEB4014.01</h1>
        <p>Resize this responsive page to see the effect!</p> 
    </div>
    
    <div class="container mt-5">
        <!-- phần nội dung thay đổi khi chuyển trang -->
        @yield('content')
    </div>

    <footer class="container-fluid p-5 bg-secondary text-white text-center">
        <p>FPoly - Trịnh Văn Bô</p>
    </footer>
</body>
</html>