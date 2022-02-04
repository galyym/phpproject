<?php
    if(!isset($_COOKIE['login'])){
        header('Location:../projectITProger/reg.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <?php 
        $website_title = "Добавление статьи";
        require '../projectITProger/blocks/head.php';
    ?>
</head>
<body>

    <?php require './blocks/header.php' ?>

    <main class="container mt-5">
      <div class="row">
        <div class="col-md-8 mb-3">
            <h4>Добавление статьи</h4>
            <form action="" method="POST">

                <label for="title">Заголовок статьи</label>
                <input type="text" name='title' id="title" class="form-control"> 
                
                <label for="title">Интро статьи</label>
                <textarea name="intro" id='intro' class="form-control"></textarea>
                
                <label for="text">Текст статьи</label>
                <textarea name="text" id='text' class="form-control"></textarea>


                <div class="alert alert-danger mt-3" id="errorBlock"></div>
                
                <button type="button" id="article_send" class="btn btn-success mt-5">Добавить</button>
            </form>
        </div>
         
        <?php require './blocks/aside.php' ?>
        
      </div>
    </main>
    
    <?php require './blocks/footer.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
      $("#article_send").click(function(){
        var title = $('#title').val();
        var text = $('#text').val();
        var intro = $('#intro').val();
        
        $.ajax({
          url: '../projectItProger/reg/add_article.php',
          type: 'POST',
          cache: false,
          data: {'title':title, 'text':text, 'intro':intro},
          dataType: 'html',
          success: function(data){
            if(data == 'Готово'){
              $('#article_send').text('Все готово');
              $('#errorBlock').hide();
            }else{
              $('#errorBlock').show();
              $('#errorBlock').text(data);
            }
          }
        });
      });
    </script>



</body>
</html>