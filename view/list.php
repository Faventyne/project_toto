
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Email</th>
      <th scope="col">Date de naissance</th>
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
      </tr>
  <?php endforeach; ?>
  </tbody>
</table>
