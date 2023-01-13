<?php



include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'?>
<form class="myred">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Логин</label>
    <input type="email" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Введите логин</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" class="form-control" required id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
    <input type="password" class="form-control" required id="exampleInputPassword1">
  </div>
  <div class="mb-3">Вы уже зарегистрированы? - <a href="/?login=yes">Авторизация</a></div>
  <button type="submit" class="btn btn-primary">Регистрация</button>
</form>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'?>