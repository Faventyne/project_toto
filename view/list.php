<?= $offset ?>

<form action=""  method="post">
    <div class="form-group col-md-4">
      <label for="city">Nombre de résultats par page :</label>
      <select name="nbResults" class="form-control">
        <option value="5" selected> 5</option>
        <option value="20"> 20</option>
        <option value="50"> 50</option>
        <option value="100"> 100</option>
      </select>
    </div>

    <button class="btn btn-primary" type="submit">Rafraichir la page</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Email</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">Plus...</th>
    </tr>
  </thead>
 <tbody>
  <?php foreach ($results as $key => $value): ?>
      <tr>
        <th scope="row"> <?php echo $results[$key]['stu_id'] ?></th>
        <td><?php echo $results[$key]['stu_lastname'] ?></td>
        <td><?php echo $results[$key]['stu_firstname'] ?></td>
        <td><?php echo $results[$key]['stu_email'] ?></td>
        <td><?php echo $results[$key]['stu_birthdate'] ?></td>
        <td><a href="<?php echo '/student.php?id=' . $results[$key]['stu_id'] ?>" class="btn btn-info btn-sm all" role="button">Details</a></td>
      </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo 'list.php?page=' . (($offset>=2) ? ($offset-1) : 1) ?>" class="btn btn-info btn-sm all" role="button"> Précédent </a>
<a href="<?php echo 'list.php?page=' . ($offset+1) ?>" class="btn btn-info btn-sm all" role="button"> Suivant </a>
