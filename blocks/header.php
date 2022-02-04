<div class="d-flex flex-column flex-md-row justify-content-between align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal justiry-content-start">Company name</h5>
    <div class="d-flex p-2">
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="btn btn-outline-primary mr-2" href="../projectItProger">Главная страница</a>
        </nav>

        <?php
            if(!isset($_COOKIE['login'])):
        ?>

        <a class="btn btn-outline-primary mr-2" href="../projectItProger/auth.php">Войти</a>
        <a class="btn btn-outline-primary mr-3" href="../projectItProger/reg.php">Регистрация</a>
        
        <?php
            else:
        ?>

        <a class="btn btn-outline-primary mr-2" href="../projectItProger/article.php">Добавить статью</a>
        <a class="btn btn-outline-primary mr-3" href="../projectItProger/auth.php">Личный кабинет</a>
        
        <?php
            endif;
        ?>
    </div>
</div>