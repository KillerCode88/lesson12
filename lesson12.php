<?php
include_once 'config.php';
?>

<html lang="ru">
<head>
    <style>
        h1 {
            text-align: center;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
        }

        table td, table th {
            border: 1px solid #508183;
            padding: 5px;
        }

        table th {
            background: #99b4af;
        }

        .search {
            margin-left: 28%;
        }
    </style>
    <meta charset="UTF-8">
    <title>MyDataBase#1</title>
</head>
<body>

<h1>Библиотека книг</h1>

<div class="search">
    <form method="GET">
        <input type="text" name="isbn" placeholder="ISBN" value=""/>
        <input type="text" name="name" placeholder="Название книги" value=""/>
        <input type="text" name="author" placeholder="Автор книги" value=""/>
        <input type="submit" value="Поиск"/>
    </form>
</div>

<table>
    <tr>
        <th>№</th>
        <th>Название</th>
        <th>Автор</th>
        <th>Год выпуска</th>
        <th>Жанр</th>
        <th>ISBN</th>
    </tr>

    <?php
    $where = [];
    if (isset($_GET['author'])) {
        $where[] = "`author` LIKE '%{$_GET['author']}%'";
    }
    if (isset($_GET['name'])) {
        $where[] = "`name` LIKE '%{$_GET['name']}%'";
    }

    if (isset($_GET['isbn'])) {
        $where[] = "`isbn` LIKE '%{$_GET['isbn']}%'";
    }
    $where_str = (COUNT($where) > 0) ? implode(" && ", $where) : "";

    if ($where_str == null) {
        $sql = "SELECT * FROM books";
    } else {
        $sql = "SELECT * FROM books WHERE $where_str";
    }


    foreach ($db->query($sql) as $row) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['author'] ?></td>
            <td><?= $row['year'] ?></td>
            <td><?= $row['genre'] ?></td>
            <td><?= $row['isbn'] ?></td>
        </tr>
    <?php } ?>
</body>
</html>