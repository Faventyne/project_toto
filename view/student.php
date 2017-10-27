

<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title"><?php echo $result['stu_firstname'].' '.$result['stu_lastname'] ?></h4>
    <p class="card-text">Détails</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">Sa ville : <?php echo $result['cit_name'] ?></li>
    <li class="list-group-item">Son email : <?php echo $result['stu_email'] ?></li>
    <li class="list-group-item">Sa date de naissance : <?php echo $result['stu_birthdate'] ?></li>
    <li class="list-group-item">Son age : <?php echo $age ?></li>
    <li class="list-group-item">Son numero de session :  <?php echo $result['ses_number'] ?></li>
    <li class="list-group-item">Son nom de session :  <?php echo $result['tra_name'] ?></li>
    <li class="list-group-item">Son niveau de sympathie :  <?php echo $result['stu_friendliness'] ?></li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
