<h1 class="page-header">Coches</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=coches&a=Crud">Nuevo Coche</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th >Make</th>
            <th>Year</th>
            <th>Mileage</th>
            <th ></th>
            <th ></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->make; ?></td>
            <td><?php echo $r->year; ?></td>
            <td><?php echo $r->mileage; ?></td>
            <td>
                <a href="?c=coches&a=Crud&auto_id=<?php echo $r->auto_id; ?>">Editar</a>
            </td>
            <td>
                <a href="?c=coches&a=Eliminar&auto_id=<?php echo $r->auto_id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

 