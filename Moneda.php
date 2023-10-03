    <?php 
    include "./modulos/header.php"; 
    require "./conversores/conversorMoneda.php"; 

    if(isset($_POST['cantidadUsuario'], $_POST['unidadOrigen'], $_POST['unidadDestino'])){
        $cantidadUsuario = $_POST['cantidadUsuario'];
        $unidadOrigen = $_POST['unidadOrigen'];
        $unidadDestino = $_POST['unidadDestino'];
    
        $capturaDatos = new CapturaDatos();
        $capturaDatos->setCantidadUsuario($cantidadUsuario);
        $capturaDatos->setUnidadOrigen($unidadOrigen);
        $capturaDatos->setUnidadDestino($unidadDestino);

        $conversorController = new ConversorMoneda();
        $resultado = $conversorController->convertir($capturaDatos);
    } 
    ?>

    <main class="content-wrapper">

        <div class="container">

            <section>
                <div>
                    <p>
                    En esta sección podrás realizar las conversiones que necesites introduciendo el dato que quieres convertir y seleccionando la unidad en la que se encuentra y a la cual lo quieres convertir
                    </p>
                </div>

            </section>

            <ul class="nav nav-tabs nav-fill">
                <li class="nav-item">
                    <a class="nav-link text-body-tertiary" href="./index.php">Longitud</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-body-tertiary" href="./Masa.php">Masa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-body-tertiary" href="./Volumen.php">Volumen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-body-tertiary" href="./Datos.php">Datos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-success" aria-current="page" href="./Moneda.php">Moneda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-body-tertiary" href="./Tiempo.php">Tiempo</a>
                </li>
            </ul>

            <section>

                <form class="celdas" method="POST" action="">

                    <input class="form-control text-center" type="number" step="any" name="cantidadUsuario" placeholder="Ingrese el numero" required>

                    <select class="form-control text-center" name="unidadOrigen" id="" required>
                        <option value="">Seleccione unidad</option>
                        <option value="USD">USD</option>
                        <option value="CAD">CAD</option>
                        <option value="AUD">AUD</option>
                        <option value="MXN">MXN</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                    </select>

                    <input class="form-control text-center" type="text" value="<?= isset($resultado) ? $resultado . htmlspecialchars($_POST['unidadDestino']) : 'Esperando Informacion' ?>" disabled>

                    <select class="form-control text-center" name="unidadDestino" id="" required>
                        <option value="">Seleccione unidad</option>
                        <option value="USD">USD</option>
                        <option value="CAD">CAD</option>
                        <option value="AUD">AUD</option>
                        <option value="MXN">MXN</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                    </select>

                    <input class="btn btn-dark mb-3  fw-bold" type="submit" value="Calcular">

                </form>

            </section>
        </div>

    </main>

    <?php include "./modulos/footer.php"?>