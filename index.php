<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor</title>
</head>
<body>

<!-- 

DESCRIPCIÓN DE LA APLICACIÓN A DESARROLLAR
Crear una calculadora de conversión de unidades de medida, desarrollada en lenguaje PHP, haciendo uso de los conocimientos adquiridos a lo largo del bootcamp.

PUNTOS DE EVALUACIÓN (60%)
1.	Debe aplicar la Programación Orientada a Objetos. (30%)
a.	Clases y encapsulamiento.
b.	Abstracción.
c.	Herencia.
d.	Polimorfismo.

2.	Debe aplicar al menos 3 principios SOLID. (30%)


-->

    <header>

    </header>

    <main>

    <form method="POST" action="./conversores/longitud.php">

        <label for="inicial">Dato en:</label>
        <select name="inicial" id="">
            <option value="">Seleccione unidad</option>
            <option value="mm">Milimetros</option>
            <option value="cm">Centimetros</option>
            <option value="pl">Pulgada</option>
            <option value="yrd">Yarda</option>
            <option value="m">Metros</option>
            <option value="Km">Kilometros</option>
        </select>

        <input type="text" name="input1" placeholder="ingrese su numero en metros">

        <label for="resultado">Se convertira a:</label>
        <select name="resultado" id="">
            <option value="">Seleccione unidad</option>
            <option value="mm">Milimetros</option>
            <option value="cm">Centimetros</option>
            <option value="pl">Pulgada</option>
            <option value="yrd">Yarda</option>
            <option value="m">Metros</option>
            <option value="Km">Kilometros</option>
        </select>

        <!-- <label for="input2">Resultado:</label>
        <input type="text" name="input2" value="El resultado es:"> -->

        <input type="submit" value="Calcular">

    </form>

    </main>

    <footer>

    </footer>

</body>
</html>