<?php
    /* TODO:Cadena de Conexion */
    require_once("../config/conexion.php");
    /* TODO:Modelo aula */
    require_once("../models/Horarios.php");
    $horario = new Horarios();

    /*TODO: opciones del controlador aula*/
    switch($_GET["op"]){
        /* TODO: Guardar y editar, guardar si el campo cat_id esta vacio */
        case "guardaryeditar":
            /* TODO:Actualizar si el campo cat_id tiene informacion */
            if(empty($_POST["ID_horario"])){       
                $horario->insert_horario($_POST["ID_aula"],$_POST["ID_materia"], $_POST["ID_grupo"], $_POST["hora_inicio"],$_POST["hora_fin"],$_POST["dia_de_la_semana"]);     
            }
            else {
                $horario->update_horario($_POST["ID_horario"],$_POST["ID_aula"],$_POST["ID_materia"], $_POST["ID_grupo"], $_POST["hora_inicio"],$_POST["hora_fin"],$_POST["dia_de_la_semana"]);
            }
            break;

        /* TODO: Listado de aula segun formato json para el datatable */
        case "listar":
            $datos=$horario->get_horario();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["bloque"];
                $sub_array[] = $row["numero_de_aula"];
                $sub_array[] = $row["nombre"];
                $sub_array[] = $row["codigo"]; 
                $sub_array[] = $row["hora_inicio"]; 
                $sub_array[] = $row["hora_fin"];    
                $sub_array[] = $row["dia_de_la_semana"];           
                $sub_array[] = '<button type="button" onClick="editar('.$row["ID_horario"].');"  id="'.$row["ID_horario"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["ID_horario"].');"  id="'.$row["ID_horario"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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
            $horario->delete_horario($_POST["ID_horario"]);
            break;

        /* TODO: Mostrar en formato JSON segun cat_id */
        case "mostrar";
            $datos=$horario->get_horario_x_id($_POST["ID_horario"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["ID_horario"] = $row["ID_horario"];
                    $output["ID_aula"] = $row["ID_aula"];
                    $output["ID_materia"] = $row["ID_materia"];
                    $output["ID_grupo"] = $row["ID_grupo"];
                    $output["hora_inicio"] = $row["hora_inicio"]; 
                    $output["hora_fin"] = $row["hora_fin"];   
                    $output["dia_de_la_semana"] = $row["dia_de_la_semana"];                  
                }
                echo json_encode($output);
            }
            break;

        /* TODO: Formato para llenar combo en formato HTML */
        case "combo":
            $datos = $horario->get_horario();
            $html="";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['ID_horario']."'>".$row['codigo']."</option>";
                }
                echo $html;
            }
            break;
    }
?>