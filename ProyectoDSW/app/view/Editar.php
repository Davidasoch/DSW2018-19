<a href="<?php echo RUTA_URL; ?>/Usuarios" class="btn btn-light"><i class="fa fa-backward"> Volver</i></a>
<div class="card card-body bg-light mt-5">
    <h2>Editar Producto</h2>
    <form action="<?php echo RUTA_URL."/Productos/Editar/".$datos->id_producto ?>" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre"  value="<?php echo $datos->nombre; ?>" class="form-control form-control-lg" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" name="precio" value="<?php echo $datos->precio; ?>" class="form-control form-control-lg" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion: </label>
            <input type="text" name="descripcion" value="<?php echo $datos->descripcion; ?>" class="form-control form-control-lg" required>
        </div>
                <div class="form-group">
            <input type="hidden" name="id_producto" value="<?php echo $datos->id_producto; ?>" class="form-control form-control-lg" required>
        </div>
        <input type="submit" class="btn btn-success" value="Actualizar Producto">
    </form>
</div> 


 