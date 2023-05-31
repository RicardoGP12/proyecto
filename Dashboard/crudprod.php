
<?php
session_start();
require_once('master2.php');
$master = new Master();
$json_data = $master->get_all_data();
?>
<?php require_once('vistas/superior.php')?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                <?php if (isset($_SESSION['msg_success']) || isset($_SESSION['msg_error'])) : ?>
                        <?php if (isset($_SESSION['msg_success'])) : ?>
                            <div class="alert alert-success rounded-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="col-auto flex-shrink-1 flex-grow-1"><?= $_SESSION['msg_success'] ?></div>
                                    <div class="col-auto">
                                        <a href="#" onclick="$(this).closest('.alert').remove()" class="text-decoration-none text-reset fw-bolder mx-3">
                                            <i class="fa-solid fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php unset($_SESSION['msg_success']); ?>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['msg_error'])) : ?>
                            <div class="alert alert-danger rounded-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="col-auto flex-shrink-1 flex-grow-1"><?= $_SESSION['msg_error'] ?></div>
                                    <div class="col-auto">
                                        <a href="#" onclick="$(this).closest('.alert').remove()" class="text-decoration-none text-reset fw-bolder mx-3">
                                            <i class="fa-solid fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php unset($_SESSION['msg_error']); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
                            <a class="btn btn-danger btn-sm btn-flat" href="addprod.php"><i class="fa fa-plus-square"></i> Agregar Producto</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Descripción corta</th>
                                            <th>Descripción larga</th>
                                            <th>Precio</th>
                                            <th>Categoria</th>
                                            <th>Stock</th>
                                            <th>Img</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Descripción corta</th>
                                            <th>Descripción larga</th>
                                            <th>Precio</th>
                                            <th>Categoria</th>
                                            <th>Stock</th>
                                            <th>Img</th>
                                            <th>Acción</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($json_data as $data) : ?>
                                            <tr>
                                                <td class="text-center"><?= $data->id ?></td>
                                                <td><?= $data->name ?></td>
                                                <td><?= $data->desc ?></td>
                                                <td><?= $data->desc_l ?></td>
                                                <td><?= $data->precio ?></td>
                                                <td><?= $data->categoria ?></td>
                                                <td><?= $data->stock ?></td>
                                                <td><?= $data->img ?></td>
                                                <td class="text-center">
                                                    <a href="addprod.php?id=<?= $data->id ?>" class="btn btn-sm btn-outline-info rounded-0">
                                                        <i class="fa-solid fa-edit"></i>
                                                    </a>
                                                    <a href="delete_data2.php?id=<?= $data->id ?>" class="btn btn-sm btn-outline-danger rounded-0" onclick="if(confirm(`¿Deseas eliminar del registro a <?= $data->name ?>?`) === false) event.preventDefault();">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
<?php require_once('vistas/inferior.php')?>
