<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LegoCar - Создать пользователя</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"></head>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
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
                        <a class="nav-link" href="/cars/page/1">Список автомобилей</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin_panel"> Админка</a>
                    </li>
                <?php endif; ?>
                    <li class="nav-item">
                        <form method="POST" action="/login/exit">
                            <input type="submit" value="Выйти">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        <div class="container">
            <h3> Создать пользователя </h3>
            <form method="POST" action="./add_user" accept-charset="UTF-8" class="w-50">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input class="form-control" name="name" type="text" id="name">
                </div>
                <div class="form-group">
                <label for="description">Пароль</label>
                <input class="form-control" type="password" name="pass" id="pass">
                
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="admin" value="admin">
                    <label class="form-check-label" for="admin">
                        Администратор
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="role" id="user" value="user" checked>
                    <label class="form-check-label" for="user">
                        Пользователь
                    </label>
                    </div>
                </div>
                <input class="btn btn-primary" type="submit" value="Создать">
            </form>
        </div>
    </main>
</div>
</body>
</html>
