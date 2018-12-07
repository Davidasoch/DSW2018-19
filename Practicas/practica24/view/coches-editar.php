<h1 class="page-header">
    <?php echo $alm->auto_id != null ? $alm->make : 'Editar Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=coches">Coches</a></li>
  <li class="active"><?php echo $alm->auto_id != null ? $alm->make : 'Nuevo Coche'; ?></li>
</ol>

<form action="?c=coches&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="auto_id" value="<?php echo $alm->auto_id; ?>" />
    
    <div class="form-group">
        <label>Marca</label>
        <input type="text" name="make" value="<?php echo $alm->make; ?>" class="form-control" placeholder="Ingrese la marca" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>A&ntildeo</label>
        <input type="text" name="year" value="<?php echo $alm->year; ?>" class="form-control" placeholder="Ingrese el a&ntildeo" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Kilometraje</label>
        <input type="text" name="mileage" value="<?php echo $alm->mileage; ?>" class="form-control" placeholder="Ingrese el kilometraje" data-validacion-tipo="requerido|email" />
    </div>
   
   
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>