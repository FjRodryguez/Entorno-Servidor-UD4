<!--Inicio HTML -->
<div class="row">
    <?php
    if (isset($anagrama)) {
        if($anagrama){?>
            <div class="col-12">
                <div class="alert alert-success">
                    Son anagramas
                </div>
            </div>
        <?php
        }else{?>
            <div class="col-12">
                <div class="alert alert-danger">
                    No son anagramas
                </div>
            </div>
        <?php }
    }?>
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="">
                <input type="hidden" name="order" value="1"/>
                <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Formulario anagrama</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--<form action="./?sec=formulario" method="post">                   -->
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nombre">Palabra 1:</label>
                                <input type="text" class="form-control" name="palabra1" id="palabra1" value="<?php echo $input['palabra1'] ?? ''; ?>" />
                                <p class="small text-danger"><?php echo $errors['palabra1'] ?? ''; ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nombre">Palabra 2:</label>
                                <input type="text" class="form-control" name="palabra2" id="palabra2" value="<?php echo $input['palabra2'] ?? ''; ?>" />
                                <p class="small text-danger"><?php echo $errors['palabra2'] ?? ''; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <a href="/test" class="btn btn-danger">Cancelar</a>
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Fin HTML -->