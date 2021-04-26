<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LegoCar- Список автомобилей</title>
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
            <h2> Автомобиль </h2>
            <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
            <tr>
                <td>ID</td>
                <td><?= $car['id'] ?></td>
                
            </tr>
            <tr>
                <td>Бренд</td>
                <td><?= $car['brand'] ?></td>
            </tr>
            <tr>
                <td>Модель</td>
                <td><?= $car['model'] ?></td>
            </tr>
            <tr>
                <td>Год выпуска</td>
                <td><?= $car['year'] ?></td>
            </tr>
            <tr>
                <td>Цвет</td>
                <td><?= $car['color'] ?></td>
            </tr>
            <tr>
                <td>Дата добавления</td>
                <td><?= $car['created_at'] ?></td>
            </tr>
            <tr>
                <td>Пользователь</td>
                <td><?= $car['user'] ?></td>
            </tr>
            <tr>
                <td>Изображение</td>
                <td><img src="images/cars/<?= $car['image_path'] ?>"  alt="car"></td>
            </tr>
            </table>
        </div>
        </div>
    </main>
    
</div>
</body>
</html>
