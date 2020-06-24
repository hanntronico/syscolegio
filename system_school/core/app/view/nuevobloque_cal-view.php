<?php
$bloques=CursosData::getAll();
?>
<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Bloque</h1>
	<br>
		<form class="form-horizontal" method="post" id="addcategory" action="./?action=agregarbloque_cal" role="form">

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Curso*</label>
    <div class="col-md-6">
      <select name="nom_cal" class="form-control">

        <option value="">selecione un curso</option>
        <?php foreach ($bloques as $bloq):
         ?>
        <option value="<?php echo utf8_decode($bloq->nombre) ?>"><?php echo $bloq->nombre ?></option>
      <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id_grado" value="<?php echo $_GET["id_grado"];?>">
      <button type="submit" class="btn btn-primary">Agregar Bloque</button>
       <button type="button" onclick = "location='./?view=bloques&id_grado=<?php echo $_GET["id_grado"];?>'" class="btn btn-warning">Cancelar</button>
    </div>
  </div>
</form>
	</div>
</div>