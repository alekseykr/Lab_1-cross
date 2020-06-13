<?php
session_start();
include "../head.php";
?>
    <form action="auth.php" method="POST" >
            <p>Логин</p>
            <input name="login" type="text"  placeholder="Введите логин" />
            <p>Пароль</p>
            <input name="password" type="password"  placeholder="Введите пароль" />
            <?php
            if (isset($_SESSION['message'])) {
                echo '<p>' . $_SESSION['message'] . '</p>';
                unset($_SESSION['message']);
            }
            ?>
            </br>
            <button type="submit">Войти</button>
    </form>
<?php
include "../footer.php";
