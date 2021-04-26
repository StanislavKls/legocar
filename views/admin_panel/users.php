<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LegoCar - Создать пользователя</title>
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
            <a href="/create_user"> Создать пользователя </a>
        </div>
        <table class="table mt-2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя пользователя</th>
                            <th>Роль</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                <?php foreach ($users as $user): ?>

                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['role'] ?></td>
                            <td>
                                <form method="POST" action="/users/<?= $user['id'] ?>">
                                    <input type="submit" value="Удалить">
                                </form>
                            </td>
                        </tr>
                <?php endforeach ?>
            </table>
    </main>
</div>
</body>
</html>
