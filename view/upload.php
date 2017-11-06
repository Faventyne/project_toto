<!-- HTML heavily inspired by http://blueimp.github.io/jQuery-File-Upload/ -->

<p>Vous pouvez uploader un fichier d'etudiants en format CSV ci-dessous : </p>

<div class="table table-striped" class="files" id="previews">

  <div id="template" class="file-row">
    <!-- This is used as the file preview template -->
    <div>
        <span class="preview"><img data-dz-thumbnail /></span>
    </div>
    <div>
        <p class="name" data-dz-name></p>
        <strong class="error text-danger" data-dz-errormessage></strong>
    </div>
    <div>
        <p class="size" data-dz-size></p>
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
        </div>
    </div>
    <div>
        <div class="col-lg-7">
          <!-- The fileinput-button span is used to style the file input field as button -->


          <form action="" method="post" enctype="multipart/form-data">
              <fieldset>
              <input type="hidden" name="submitFile" value="1" />
              <label for="fileForm">Fichier</label>
              <input type="file" name="fileForm" id="fileForm" />
              <p class="help-block">toutes les extensions sont autorisées</p>
              <br />
              <!-- <input type="submit" class="btn btn-success btn-block" value="Téléverser" /> -->
              </fieldset>


              <input type="submit" name="upload" class="btn btn-success fileinput-button" value="Add files...">
              <!-- <button type="submit" class="btn btn-primary start">
                  <i class="glyphicon glyphicon-upload"></i>
                  <span>Start upload</span>
              </button>
              <button type="reset" class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Cancel upload</span>
              </button> -->
          </form>

          <form action="" method="post" enctype="multipart/form-data">



              <input type="submit" name="export" class="btn btn-primary" value="Export all students...">


              <!-- <button type="submit" class="btn btn-primary start">
                  <i class="glyphicon glyphicon-upload"></i>
                  <span>Start upload</span>
              </button>
              <button type="reset" class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Cancel upload</span>
              </button> -->
          </form>

        </div>

    </div>
  </div>

</div>
