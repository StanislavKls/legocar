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
            <h2> Список автомобилей </h2>
            <table class="table mt-2">
                <thead>
                        <tr>
                            <th>ID</th>
                            <th>Бренд</th>
                            <th>Модель</th>
                            <th>Год выпуска</th>
                            <th>Цвет</th>
                            <th>Дата добавления</th>
                        </tr>
                </thead>
                <?php foreach ($cars as $car): ?>

                        <tr>
                            <td><?php echo $car['id'] ?></td>
                            <td><?php echo $car['brand'] ?></td>
                            <td><?php echo $car['model'] ?></td>
                            <td><?php echo $car['year'] ?></td>
                            <td><?php echo $car['color'] ?></td>
                            <td><?php echo $car['created_at'] ?></td>
                        </tr>
                   
                    
                <?php endforeach ?>
            </table>
        </div>
    </main>
    
</div>
</body>
</html>
