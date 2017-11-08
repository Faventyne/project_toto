

<?php if($mailExists == false) : ?>
    <?php if($trig==1) : ?>
    <p>User correctement inséré</p>
    <?php elseif($pwd1!=$pwd2) : ?>
    <p>Erreur : mot de passe différents</p>
<?php elseif(( strlen($pwd1)<8 || preg_match($pattern,$pwd1)==0) && $pwd1!='' ) : ?>
    <p>Veuillez saisir un password de 8 caractère avec au moins une majuscule et une minuscule </p>
    <?php endif; ?>
<?php else : ?>
    <p>Désolé, ce mail existe déjà en base !</p>
<?php endif; ?>



<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="pwd1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword2">Confirm Password</label>
    <input type="password" class="form-control" name="pwd2" placeholder="Password">
  </div>

  <input type="submit" class="btn btn-primary" name="insert" value="Submit">
</form>
