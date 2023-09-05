<?php
    require_once("c://xampp/htdocs/Login/view/head/head.php");
?>

<div class="fondo-login">
    <div class="icon">
        <a href="/Login/index.php">
            <i class="fa-solid fa-tooth diente-icon"></i>
        </a>

    </div>
    <div class="titulo">
        Registrate a Novateeth
    </div>
    <form action ="store.php" method= "POST"class="col-3 login" autocomplete="off">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
            <input type="email" name="correo" value = "<?= (!empty($_GET['correo'])) ? $_GET ['correo'] : "" ?>"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            
            
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <input type="password" name="contraseña" value = "<?= (!empty($_GET['contraseña'])) ? $_GET ['contraseña'] : "" ?>" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Repita su Contraseña</label>
            
            <input type="password" name="confirmarContraseña" value = "<?= (!empty($_GET['confirmarContraseña'])) ? $_GET ['confirmarContraseña'] : "" ?>" class="form-control" id="password2">
        <div>
        <br />
        <?php if(!empty($_GET['error'])):?>
            <div id="alertError" style="margin: auto;" class="alert alert-danger mb-2" role= "alert">
                <?= !empty($_GET['error'])? $_GET['error'] : "" ?>

            </div>
        <?php endif;?>


        <div class="d-grid gap-2 ">
            <button type="submit" class="btn btn-primary">Crear Cuenta</button>
         </div>
       
    </form>
    <!--<div class="login col-3 mt-3">
        ¿Eres Nuevo en Novateeth? <a href="signup.php" style="text-decoration: none;">Crear una cuenta </a>
    </div>
</div>
<?php
    require_once("c://xampp/htdocs/Login/view/head/footer.php");
?>