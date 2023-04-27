<?php
    /* TODO:Cadena de Conexion */
    require_once("../config/conexion.php");
    /* TODO:Modelo aula */
    require_once("../models/Grupo.php");
    $grupo = new Grupo();

    /*TODO: opciones del controlador aula*/
    switch($_GET["op"]){
        /* TODO: Guardar y editar, guardar si el campo cat_id esta vacio */
        case "guardaryeditar":
            /* TODO:Actualizar si el campo cat_id tiene informacion */
            if(empty($_POST["ID_grupo"])){       
                $grupo->insert_grupo($_POST["codigo"],$_POST["numero_de_grupo"], $_POST["cantidad_de_estudiantes"]);     
            }
            else {
                $grupo->update_grupo($_POST["ID_grupo"],$_POST["codigo"],$_POST["numero_de_grupo"], $_POST["cantidad_de_estudiantes"]);
            }
            break;

        /* TODO: Listado de aula segun formato json para el datatable */
        case "listar":
            $datos=$grupo->get_grupo();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["codigo"];
                $sub_array[] = $row["numero_de_grupo"];
                $sub_array[] = $row["cantidad_de_estudiantes"];                
                $sub_array[] = '<button type="button" onClick="editar('.$row["ID_grupo"].');"  id="'.$row["ID_grupo"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["ID_grupo"].');"  id="'.$row["ID_grupo"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

        /* TODO: Actualizar estado a 0 segun id de aula */
        case "eliminar":
            $grupo->delete_grupo($_POST["ID_grupo"]);
            break;

        /* TODO: Mostrar en formato JSON segun cat_id */
        case "mostrar";
            $datos=$grupo->get_grupo_x_id($_POST["ID_grupo"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["ID_grupo"] = $row["ID_grupo"];
                    $output["codigo"] = $row["codigo"];
                    $output["numero_de_grupo"] = $row["numero_de_grupo"];
                    $output["cantidad_de_estudiantes"] = $row["cantidad_de_estudiantes"];                    
                }
                echo json_encode($output);
            }
            break;

        /* TODO: Formato para llenar combo en formato HTML */
        case "combo":
            $datos = $grupo->get_grupo();
            $html="";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['ID_grupo']."'>".$row['codigo']."</option>";
                }
                echo $html;
            }
            break;
    }
?>