<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>PetBook</title>
</head>

<body background="img/MascotasCollage.png">
    <div class="container text-center ">
        <div class="row align-items-center" style="height: 45rem;">
            <div class="col-6 ">
                <div class="card border" style="width: 24rem;">
                    <div class="imagen-logo">
                        <img src="img/mascota2.jpg" class="rounded-circle w-25" alt="Logo">
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="" class="form-control input_user" value="" placeholder="Usuario">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="" class="form-control input_pass" value="" placeholder="password">
                            </div>
                            <div class="input-group mb-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Recordarte</label>
                                </div>
                            </div>
                            <div class="justify-content-center mt-3">
                                <a href="/" class="btn btn-primary">Login</a>
                            </div>
                        </form>

                        <div class="mt-4">
                            <div>
                                <p>Aún no tienes cuenta para tu mascota? </p>
                            </div>
                            <div>
                                <a href="/pet/create">Crear cuenta</a>
                            </div>
                            <div>
                                <a href="#">Olvidaste tu contraseña?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>