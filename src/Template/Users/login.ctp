<?= $this->Form->create(null) ?>

    <div class="form-group mb-3">
        <!--<label for="emailaddress">Correo electrónico</label>-->
        <?= $this->Form->control('email', ["label" => false, "type " => "email", "class" => "form-control", "required" => "required", "placeholder" => "Ingrese su Correo electrónico"]);?>
        <!--<input class="form-control" type="email" id="emailaddress" required="" placeholder="Ingrese su Correo electrónico">-->
    </div>

    <div class="form-group mb-3">
        <!--<label for="password">Contraseña</label>-->
        <?= $this->Form->control('password', ["label" => false, "type " => "password", "class" => "form-control", "required" => "required", "placeholder" => "Contraseña su Contraseña"]);?>
        <!--<input class="form-control" type="password" required="" id="password" placeholder="Contraseña su Contraseña">-->
    </div>

    <!--<div class="form-group mb-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
        </div>
    </div>-->

    <div class="form-group mb-0 text-center">
        <button class="btn btn-primary btn-block" type="submit"> Iniciar Sesión </button>
    </div>

<?= $this->Form->end();?>