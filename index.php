<?php
        $actividad = "Integradora Obligatoria Módulo 1";
        $apertura = "Lunes, 15/5";
        $cierre = "Jueves, 25/5";
        $preguntas = array(
            "Delimitadores php." ,
            "Respetar normas de sintaxis.",
            "Hacer uso de variables, constantes y operadores.",
        );

        session_start(); // Iniciar la sesión

        $tasks = array();
        if (isset($_SESSION['tasks'])) {
            $tasks = $_SESSION['tasks'];
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['task'])) {
                $newTask = $_POST['task'];
    
                // Añadir la nueva tarea al array existente
                $tasks[] = $newTask;
    
                // Actualizar la variable de sesión
                $_SESSION['tasks'] = $tasks;
            }
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['deleteIndex'])) {
                $deleteIndex = $_POST['deleteIndex'];
    
                // Eliminar la tarea correspondiente del array
                if (isset($tasks[$deleteIndex])) {
                    unset($tasks[$deleteIndex]);
    
                    // Actualizar la variable de sesión
                    $_SESSION['tasks'] = $tasks;
                }
            }
        }
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad Unidad 3 Introducción a PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <main>
        <section class="header">
            <h1>PHP y MySql Incial</h1> 
            <h3>Actividad <?php echo $actividad ?></h3>
            <div class="date">
                <p>Apertura: <?php echo $apertura ?></p>
                <p>Cierre: <?php echo $cierre ?></p>
            </div>
        </section>
        <section class="preguntas">
            <h3>La estructura debe contener:</h3>
            <ol>
                <?php
                    foreach($preguntas as $pregunta){
                        echo "<li>$pregunta</li>"; 
                    } 
                ?>
            </ol>
        </section>
        <section class="respuestas ">
            <h3>Ejercicio</h3>
            <h1>Lista de tareas</h1>

            <form method="POST" action="">
                <input type="text" name="task" class="add-task-name" placeholder="Ingrese una tarea" required>
                <button type="submit" class="add-task-button"><i class="fa-solid fa-plus fa-xl"></i></button>
            </form>
            
            <ul class="task-container">
            <?php foreach ($tasks as $index => $task): ?>
                <li class="task">
                    <?php echo $task; ?>
                    <form method="POST" action="">
                        <input type="hidden" name="deleteIndex" value="<?php echo $index; ?>">
                        <button type="submit" class="task-remove-button"><i class="fa-solid fa-x fa-xl"></i></button>
                    </form>
                </li>
            <?php endforeach; ?>
            </ul>
        </section>
    </main>
    <footer>
        <h1>Sitio realizado por Lucas Ferro en concepto de <br>"Ejercicio integrador obligatorio del curso PHP y MySQL nivel inicial UTN".</h1>
    </footer>
    <script src="https://kit.fontawesome.com/bcf13853e6.js" crossorigin="anonymous"></script>
</body>
</html>