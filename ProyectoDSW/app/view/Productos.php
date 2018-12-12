<html>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">Productos</a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo RUTA_URL."/Productos" ?>">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo RUTA_URL."/Productos/Agregar" ?>">Insertar</a>
    </li>
  </ul>
</nav>

 <table class="table">
    <thead class="thead-light">
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Descripcion</th>
        <th>Acciones</th>
      </tr>
    </thead>

  
</tr>
    <?php foreach($datos as $r): ?>
    <tbody>
        <tr>
            <td><?php echo $r->id_producto; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->precio; ?></td>
            <td><?php echo $r->descripcion; ?></td>
            <td><a href="<?php echo RUTA_URL."/Productos/Editar/".$r->id_producto?>">Editar </a>/
            <a href="<?php echo RUTA_URL."/Productos/Eliminar/".$r->id_producto?> ">Borrar</a></td>
        </tr>
        </tbody>
    <?php endforeach;?>
    
    </table>
  
  

</html>