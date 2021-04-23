<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LegoCar - Админка</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"></head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                <li class="nav-item">
                        <a class="nav-link" href="/index.php">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cars">Список автомобилей</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin_panel"> Админка</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        <div class="container">
            <h1> Hello! </h1>
            <form method="POST" action="./login" accept-charset="UTF-8" class="w-50">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input class="form-control" name="name" type="text" id="name">
                </div>
                <div class="form-group">
                    <label for="description">Пароль</label>
                    <input class="form-control" type="password" name="pass" id="pass">
                </div>
                <input class="btn btn-primary" type="submit" value="Войти">
            </form>
        </div>
    </main>
    
</div>
</body>
</html>
