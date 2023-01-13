<form class="myred" action="?login=yes" method="post">
    <div class="mb-3">
        <label for="exampleInputLogin1" class="form-label">Логин</label>
        <input type="text" class="form-control" name="login" required id="exampleInputLogin1" value="<?=htmlspecialchars($_POST['login'] ?? cookieLogin($logins))?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" class="form-control" name="password" required id="exampleInputPassword1" aria-describedby="passwordHelp" value="<?=htmlspecialchars($_POST['password'] ?? '')?>">
        <div id="passwordHelp" class="form-text">We'll never share your password with anyone else.</div>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Оставаться в сети</label>
    </div>
    <div class="mb-3">У вас нет аккаунта? - <a href="/register.php">Зарегистрируйтесь</a></div>
    <button type="submit" class="btn btn-primary">Вход</button>
</form>