<?php
    /* TODO:Cadena de Conexion */
    require_once("../config/conexion.php");
    /* TODO:Modelo aula */
    require_once("../models/Aula.php");
    $aula = new Aula();

    /*TODO: opciones del controlador aula*/
    switch($_GET["op"]){
        /* TODO: Guardar y editar, guardar si el campo cat_id esta vacio */
        case "guardaryeditar":
            /* TODO:Actualizar si el campo cat_id tiene informacion */
            if(empty($_POST["ID_aula"])){       
                $aula->insert_aula($_POST["numero_de_aula"],$_POST["bloque"], $_POST["descripcion"]);     
            }
            else {
                $aula->update_aula($_POST["ID_aula"],$_POST["numero_de_aula"],$_POST["bloque"], $_POST["descripcion"]);
            }
            break;

        /* TODO: Listado de aula segun formato json para el datatable */
        case "listar":
            $datos=$aula->get_aula();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["bloque"];
                $sub_array[] = $row["numero_de_aula"];
                $sub_array[] = $row["descripcion"];                
                $sub_array[] = '<button type="button" onClick="editar('.$row["ID_aula"].');"  id="'.$row["ID_aula"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["ID_aula"].');"  id="'.$row["ID_aula"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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
            $aula->delete_aula($_POST["ID_aula"]);
            break;

        /* TODO: Mostrar en formato JSON segun cat_id */
        case "mostrar";
            $datos=$aula->get_aula_x_id($_POST["ID_aula"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["ID_aula"] = $row["ID_aula"];
                    $output["bloque"] = $row["bloque"];
                    $output["numero_de_aula"] = $row["numero_de_aula"];
                    $output["descripcion"] = $row["descripcion"];                    
                }
                echo json_encode($output);
            }
            break;

        /* TODO: Formato para llenar combo en formato HTML */
        case "combo":
            $datos = $aula->get_aula();
            $html="";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['ID_aula']."'>".$row['numero_de_aula']."</option>";
                }
                echo $html;
            }
            break;
    }
?>