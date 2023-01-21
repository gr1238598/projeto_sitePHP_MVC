<?php
    $estadoId = $_POST["estado"];
    $cidades = "";

    try {
        $pdo = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=instituicaodeensino", "postgres", "root");
        
        $sql = "SELECT * FROM cidades where estados_id = " . $estadoId;
        $resultado = $pdo->query($sql);
        if ($resultado != null && $resultado->rowCount() > 0) {
            while ($row = $resultado->fetch()) {
                $cidades.="<option value=\"" . $row['id'] . "\">" . $row['nome'] . "</option>";
            }
        }
        unset($resultado);
    }catch(PDOException $e){
        die("Não foi possível conectar. " . $e->getMessage());
    }
    echo $cidades;
?>