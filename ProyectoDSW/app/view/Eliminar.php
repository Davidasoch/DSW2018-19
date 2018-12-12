<html>
<body>

    <form action="<?php echo RUTA_URL."/Productos/eliminar/".$datos?>" method="POST">
        <div class="form-group">
            <label for="delprod"></label>
            <input type="hidden" name="delprod" value="<?php echo $datos?>" class="form-control form-control-lg" required>
        </div>
        <input type="submit" class="btn btn-danger" value="Eliminar">
    </form>
</html>