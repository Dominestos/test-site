<form action="?login=yes" method="post">
    <div class="mb-3">
        <label for="exampleInputLogin1" class="form-label">Login*</label>
        <input type="text" class="form-control" name="login" id="exampleInputLogin1" value="<?=$_POST['login'] ?? ''?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password*</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" aria-describedby="passwordHelp" value="<?=$_POST['password'] ?? ''?>">
        <div id="passwordHelp" class="form-text">We'll never share your password with anyone else.</div>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
