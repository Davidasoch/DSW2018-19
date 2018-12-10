<html>
<body>
<h1>La vista Paginas esta cargada correctamente</h1>
<h2>El framework de David</h2>
<p><?php echo RUTA_APP?></p>
<p><?php echo RUTA_URL?></p>
<p><?php echo NOMBRE_SITIO?></p>

<table>
<tr>
<th>Id</th>
<th>Titulo</th>
</tr>
    <?php foreach($datos[0] as $r): ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><?php echo $r->titulo; ?></td>
        </tr>
    <?php endforeach;?>
    
    <?php echo "<p> Total de filas: ".$datos[1]."</p>"?>
    </table>
    
</body>
</html>