<form action=""  method="post">
  <div class="row">
    <div class="form-group col-md-6 mb-3">
      <label for="fname">Prénom</label>
      <input type="text" class="form-control is-valid" name="fname" placeholder="Jean" value="" required>
    </div>
    <div class="form-group col-md-6 mb-3">
      <label for="lname">Nom</label>
      <input type="text" class="form-control is-valid" name="lname" placeholder="Dupont" value="" required>
    </div>

    <div class="form-group col-md-4">
      <label for="bdate">Date de naissance</label>
      <input type="date" class="form-control is-valid" name="bdate" placeholder="" value="" required>
    </div>

    <div class="form-group col-md-4">
      <label for="usermail">Email</label>
      <input type="mail" class="form-control is-valid" name="usermail" placeholder="" value="" required>
    </div>

    <div class="form-group col-md-4">
      <label for="friendly">Niveau de sympathie</label>
      <input type="text" class="form-control is-valid" name="friendly" placeholder="" value="" required>
    </div>

    <div class="form-group col-md-4">
      <label for="city">Ville</label>
      <select name="city" class="form-control">
        <option selected> Choose... </option>
        <?php foreach ($allcities as $key => $value): ?>
        <option value="<?= $allcities[$key]['cit_id'] ?>"> <?php echo $allcities[$key]['cit_name'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-group col-md-8">
        <label for="session">Session</label>
        <select name="session" class="form-control">
          <option selected> Choose... </option>
          <?php foreach ($allsessions as $key => $value): ?>
          <option value="<?= $allsessions[$key]['tra_id'] ?>">
              <?php  ?>
              <?php echo "S" . $allsessions[$key]['ses_id']. " - " . $allsessions[$key]['tra_name']. " - du ".$allsessions[$key]['ses_start_date']." au ". $allsessions[$key]['ses_end_date'] ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>

  </div>

  <!--
  <div class="row">

    <div class="col-md-6 mb-3">
      <label for="validationServer03">City</label>
      <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="City" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer04">State</label>
      <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="State" required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer05">Zip</label>
      <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
  </div>
  -->

  <button class="btn btn-primary" type="submit">Inserer la valeur</button>
</form>
