<!DOCTYPE html>
<html lang="ru">
<head>
        <?php 
            $website_title = "PHP блок";
            require './blocks/head.php';
        ?>
</head>
<body>

    <?php require './blocks/header.php' ?>

    <main class="container mt-5">
      <div class="row">
        <div class="col-md-8 mb-3">
          <?php
            $user = "root";
            $password = "";
            $host = "localhost";
            $db = "users";
        
            $dsn = "mysql:host=" . $host . ";dbname=" . $db;
            $pdo = new PDO($dsn, $user, $password);

            $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
            $query = $pdo->query($sql);
            $articles = $query->fetchAll(PDO::FETCH_OBJ);
            foreach($articles as $row){
              echo "<h2>$row->title</h2>
              <p>Интро статьи: $row->intro</p> 
              <p>Автор статьи: $row->author</p>
              <a href='/projectITProger/news.php?id=$row->id' title='$row->title'>
                <button class='btn btn-warning mb-5'>Прочитать больше</button>
              </a>";
            }
          ?>
        </div>
         
        <?php require './blocks/aside.php' ?>
        
      </div>
    </main>
    
    <?php require './blocks/footer.php' ?>
</body>
</html>