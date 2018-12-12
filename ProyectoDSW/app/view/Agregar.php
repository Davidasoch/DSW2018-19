<a href="<?php echo RUTA_URL; ?>/Productos" class="btn btn-light"><i class="fa fa-backward"> Volver</i></a>
<div class="card card-body bg-light mt-5">
    <h2>Agregar Productos</h2>
    <form action="<?php echo RUTA_URL; ?>/Productos/agregar" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre:></label>
            <input type="text" name="nombre" class="form-control form-control-lg" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio: </label>
            <input type="text" name="precio" class="form-control form-control-lg" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion: <sup>*</sup></label>
            <input type="text" name="descripcion" class="form-control form-control-lg" required>
        </div>
        <input type="submit" class="btn btn-success" value="Agregar producto">
    </form>
</div>    