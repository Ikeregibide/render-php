<html>
    <body>
        <h1>Ejercicio 1:</h1><br>
   
        <h5>Lista de la compra</h5>
        <?php 
        select();
        ?>
        

        <h5>Añadir elemento</h5>

        <form action="ejer1.php" method="GET">

            <input type="text" name="producto"/>
            <input type="submit" value="anadir"/>
            <a href="ejer1.php?accion=borrarTodo"> Borrar Todo </a>

        </form>
    </body>
    
</html>
