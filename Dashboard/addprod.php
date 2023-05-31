<?php
session_start();
require_once('master2.php');
$master = new Master();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0) {
        $save = $master->update_json_data();
    } else {
        $save = $master->insert_to_json();
    }
    if (isset($save['status'])) {
        if ($save['status'] == 'success') {
            if (isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] > 0)
                $_SESSION['msg_success'] = 'Se ha agregado un nuevo producto al archivo JSON con éxito';
            else
                $_SESSION['msg_success'] = 'Los detalles del producto se han actualizado en el archivo JSON con éxito';
            header('location: ./');
            exit;
        }
    } else {
        $_SESSION['msg_error'] = 'Los detalles no se pudieron guardar debido a algún error del sistema.';
    }
}
$data = $master->get_data(isset($_GET['id']) ? $_GET['id'] : '');
?>
<?php require_once('vistas/superior.php')?>
<div class="container px-5 my-3">
        <h2 class="text-center">Formulario de Ingreso de Usuario</h2>
        <div class="row">
            <!-- Contenedor de contenido de página -->
            <div class="col-lg-10 col-md-11 col-sm-12 mt-4 pt-4 mx-auto">
                <div class="container-fluid">
                    <!-- Sesión de formulario de manejo de mensajes -->
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
                    <!--FIN de la Sesión del Formulario de Manejo de Mensajes -->

                    <div class="card rounded-0 shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <?php if (isset($data->id)) : ?>
                                    <p class="text-muted"><i>Actualizar los detalles de <b><?= isset($data->name) ? $data->name : '' ?></b></i></p>
                                <?php else : ?>
                                    <p class="text-muted"><i>Agregar Nuevo Producto</b></i></p>
                                <?php endif; ?>
                                <form id="addprod" action="" method="POST">
                                    <input type="hidden" name="id" value="<?= isset($data->id) ? $data->id : '' ?>">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre del producto</label>
                                        <input type="text" class="form-control rounded-0" id="name" name="name" required="required" value="<?= isset($data->name) ? $data->name : '' ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="desc" class="form-label">Descripción corta</label>
                                        <input type="text" class="form-control rounded-0" id="desc" name="desc" required="required" value="<?= isset($data->desc) ? $data->desc : '' ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="desc_l" class="form-label">Descripción larga</label>
                                        <textarea rows="3" class="form-control rounded-0" id="desc_l" name="desc_l" required="required"><?= isset($data->desc_l) ? $data->desc_l : '' ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="precio" class="form-label">Precio</label>
                                        <input type="text" class="form-control rounded-0" id="precio" name="precio" required="required" value="<?= isset($data->precio) ? $data->precio : '' ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoria" class="form-label">Categoria</label>
                                        <input type="text" class="form-control rounded-0" id="categoria" name="categoria" required="required" value="<?= isset($data->categoria) ? $data->categoria : '' ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="stock" class="form-label">Stock</label>
                                        <input type="text" class="form-control rounded-0" id="stock" name="stock" required="required" value="<?= isset($data->stock) ? $data->stock : '' ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="img" class="form-label">Img</label>
                                        <input type="text" class="form-control rounded-0" id="img" name="img" required="required" value="<?= isset($data->img) ? $data->img : '' ?>">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-danger rounded-0" form="addprod" href="crudprod.php" ><i class="fa-solid fa-save"></i> Guardar Producto</button>
                            <a class="btn btn-light border rounded-0" href="crudprod.php"><i class="fa-solid fa-times"></i> Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contenedor de contenido de fin de página -->
        </div>
    </div>
<?php require_once('vistas/inferior.php')?>