<?php
    /* TODO:Cadena de Conexion */
    require_once("../config/conexion.php");
    /* TODO:Modelo aula */
    require_once("../models/Evento.php");
    $evento = new Evento();

    /*TODO: opciones del controlador aula*/
    switch($_GET["op"]){
        /* TODO: Guardar y editar, guardar si el campo cat_id esta vacio */
        case "guardaryeditar":
            /* TODO:Actualizar si el campo cat_id tiene informacion */
            if(empty($_POST["ID_evento"])){       
                $evento->insert_evento($_POST["codigo"],$_POST["fecha"], $_POST["duracion"], $_POST["objetivo"]);     
            }
            else {
                $evento->update_evento($_POST["ID_evento"],$_POST["codigo"],$_POST["fecha"], $_POST["duracion"], $_POST["objetivo"]);
            }
            break;

        /* TODO: Listado de aula segun formato json para el datatable */
        case "listar":
            $datos=$evento->get_evento();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["codigo"];
                $sub_array[] = $row["fecha"];
                $sub_array[] = $row["duracion"];
                $sub_array[] = $row["objetivo"];                
                $sub_array[] = '<button type="button" onClick="editar('.$row["ID_evento"].');"  id="'.$row["ID_evento"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["ID_evento"].');"  id="'.$row["ID_evento"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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
            $evento->delete_evento($_POST["ID_evento"]);
            break;

        /* TODO: Mostrar en formato JSON segun cat_id */
        case "mostrar";
            $datos=$evento->get_evento_x_id($_POST["ID_evento"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["ID_evento"] = $row["ID_evento"];
                    $output["codigo"] = $row["codigo"];
                    $output["fecha"] = $row["fecha"];
                    $output["duracion"] = $row["duracion"];
                    $output["objetivo"] = $row["objetivo"];                    
                }
                echo json_encode($output);
            }
            break;
        /* TODO: Cantidad de eventos en formato JSON */
        case "total";
        $datos=$evento->get_total_eventos();  
        if(is_array($datos)==true and count($datos)>0){
            foreach($datos as $row)
            {
                $output["TOTAL"] = $row["TOTAL"];
            }
            echo json_encode($output);
        }
         break;

        /* TODO: Formato para llenar combo en formato HTML */
        case "combo":
            $datos = $evento->get_evento();
            $html="";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['ID_evento']."'>".$row['codigo']."</option>";
                }
                echo $html;
            }
            break;
    }
?>