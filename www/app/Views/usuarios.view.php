<!--Inicio HTML -->
<div class="row">
    <?php
    if (isset($exito) && $exito) {
        ?>
        <div class="col-12">
            <div class="alert alert-success">
                Usuario registrado con éxito.
            </div>
        </div>
        <?php
    }
    ?>
    <div class="col-12">
        <div class="card shadow mb-4">
            <form method="post" action="">
                <input type="hidden" name="order" value="1"/>
                <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Alta usuario</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        name="username"
                                        id="username"
                                        placeholder="my_username_23"
                                        value="<?php echo $input['username'] ?? ''; ?>"
                                />
                                <p class="small text-danger"><?php echo $errors['username'] ?? ''; ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        id="email"
                                        placeholder="my_email@email.com"
                                        value="<?php echo $input['email'] ?? ''; ?>"
                                />
                                <p class="small text-danger"><?php echo $errors['email'] ?? ''; ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tipo_suscripcion">Tipo suscripción:</label>
                                <select name="tipo_suscripcion" id="tipo_suscripcion" class="form-control">
                                    <option value="">-</option>
                                    <?php
                                    foreach ($tiposSuscripcion as $ts) {
                                        ?>
                                        <option value="<?php echo $ts ?>" <?php echo (isset($input['tipo_suscripcion']) && $ts == $input['tipo_suscripcion']) ? 'selected' : ''; ?>><?php echo ucfirst($ts); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <p class="small text-danger"><?php echo $errors['tipo_suscripcion'] ?? ''; ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="num_tarjeta">Num. tarjeta:</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        name="num_tarjeta"
                                        id="num_tarjeta"
                                        placeholder="4444333322221111"
                                        value="<?php echo $input['num_tarjeta'] ?? ''; ?>"
                                />
                                <p class="small text-danger"><?php echo $errors['num_tarjeta'] ?? ''; ?></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" id="acepto" type="checkbox" name="acepto"
                                       value="acepto"/>
                                <label for="acepto" class="form-check-label">Acepto los términos y condiciones</label>
                                <p class="small text-danger"><?php echo $errors['acepto'] ?? ''; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <a href="/usuarios/new" class="btn btn-danger">Cancelar</a>
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary ml-2"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Fin HTML -->