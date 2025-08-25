<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP Básicos</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 700px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
        h1 { text-align: center; color: #333; }
        form { margin-bottom: 30px; padding: 20px; background: #f9f9f9; border-radius: 6px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #007bff; color: #fff; border: none; padding: 10px 18px; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .resultado { background: #e9ffe9; border-left: 4px solid #4caf50; padding: 12px; margin-top: 10px; border-radius: 4px; }
        .seccion { margin-bottom: 40px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Ejercicios PHP Básicos</h1>

    <!-- Serie Fibonacci -->
    <div class="seccion">
        <form method="post">
            <label for="fibonacci_n">Serie Fibonacci: ¿Cuántos términos?</label>
            <input type="number" name="fibonacci_n" id="fibonacci_n" min="1" required>
            <button type="submit" name="fibonacci_btn">Generar</button>
        </form>
        <?php
        // Función para generar la serie Fibonacci
        function generarFibonacci($n) {
            $serie = [];
            if ($n >= 1) $serie[] = 0;
            if ($n >= 2) $serie[] = 1;
            for ($i = 2; $i < $n; $i++) {
                // Cada término es la suma de los dos anteriores
                $serie[] = $serie[$i-1] + $serie[$i-2];
            }
            return $serie;
        }
        if (isset($_POST['fibonacci_btn'])) {
            $n = intval($_POST['fibonacci_n']);
            $fibonacci = generarFibonacci($n);
            echo '<div class="resultado"><b>Serie Fibonacci (' . $n . ' términos):</b><br>';
            echo implode(', ', $fibonacci);
            echo '</div>';
        }
        ?>
    </div>

    <!-- Número Primo -->
    <div class="seccion">
        <form method="post">
            <label for="primo_num">¿Es un número primo?</label>
            <input type="number" name="primo_num" id="primo_num" min="1" required>
            <button type="submit" name="primo_btn">Verificar</button>
        </form>
        <?php
        // Función para determinar si un número es primo
        function esPrimo($num) {
            if ($num <= 1) return false;
            if ($num == 2) return true;
            if ($num % 2 == 0) return false;
            for ($i = 3; $i <= sqrt($num); $i += 2) {
                if ($num % $i == 0) return false;
            }
            return true;
        }
        if (isset($_POST['primo_btn'])) {
            $num = intval($_POST['primo_num']);
            $resultado = esPrimo($num) ? 'es primo' : 'no es primo';
            echo '<div class="resultado"><b>Resultado:</b> El número ' . $num . ' ' . $resultado . '.</div>';
        }
        ?>
    </div>

    <!-- Palíndromo -->
    <div class="seccion">
        <form method="post">
            <label for="palindromo_txt">¿Es un palíndromo?</label>
            <input type="text" name="palindromo_txt" id="palindromo_txt" required>
            <button type="submit" name="palindromo_btn">Verificar</button>
        </form>
        <?php
        // Función para determinar si una cadena es palíndromo
        function esPalindromo($texto) {
            // Limpiar la cadena: quitar espacios y pasar a minúsculas
            $limpio = strtolower(preg_replace('/[^a-z0-9]/i', '', $texto));
            // Comparar la cadena con su reverso
            return $limpio === strrev($limpio);
        }
        if (isset($_POST['palindromo_btn'])) {
            $txt = $_POST['palindromo_txt'];
            $resultado = esPalindromo($txt) ? 'es un palíndromo' : 'no es un palíndromo';
            echo '<div class="resultado"><b>Resultado:</b> "' . htmlspecialchars($txt) . '" ' . $resultado . '.</div>';
        }
        ?>
    </div>
</div>
</body>
</html>
