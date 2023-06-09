<?php
    /* TODO:Cadena de Conexion */
    require_once("../config/conexion.php");
    /* TODO:Modelo materia */
    require_once("../models/Materia.php");
    $materia = new Materia();

    /*TODO: opciones del controlador materia*/
    switch($_GET["op"]){
        /* TODO: Guardar y editar, guardar si el campo cat_id esta vacio */
        case "guardaryeditar":
            /* TODO:Actualizar si el campo cat_id tiene informacion */
            if(empty($_POST["ID_materia"])){       
                $materia->insert_materia($_POST["id_grupo"],$_POST["nombre"],$_POST["docente_id"],$_POST["aula_id"]);     
            }
            else {
                $materia->update_materia($_POST["ID_materia"],$_POST["id_grupo"], $_POST["nombre"],$_POST["docente_id"],$_POST["aula_id"]);
            }
            break;

        /* TODO: Listado de materia segun formato json para el datatable */
        case "listar":
            $datos=$materia->get_materia();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["nombre"];
                $sub_array[] = $row["codigo"];
                $sub_array[] = $row["usu_nom"];
                $sub_array[] = $row["bloque"];
                $sub_array[] = $row["numero_de_aula"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["ID_materia"].');"  id="'.$row["ID_materia"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["ID_materia"].');"  id="'.$row["ID_materia"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

        /* TODO: Actualizar estado a 0 segun id de materia */
        case "eliminar":
            $materia->delete_materia($_POST["ID_materia"]);
            break;

        /* TODO: Mostrar en formato JSON segun cat_id */
        case "mostrar";
            $datos=$materia->get_materia_x_id($_POST["ID_materia"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["ID_materia"] = $row["ID_materia"];
                    $output["id_grupo"] = $row["id_grupo"]; 
                    $output["aula_id"] = $row["aula_id"];  
                    $output["nombre"] = $row["nombre"]; 
                    $output["docente_id"] = $row["docente_id"];                                       
                                     
                }
                echo json_encode($output);
            }
            break;
        /* TODO: Cantidad de materias en formato JSON */
        case "total";
        $datos=$materia->get_total_materias();  
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
            $datos = $materia->get_materia();
            $html="";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['ID_materia']."'>".$row['nombre']."</option>";
                }
                echo $html;
            }
            break;
    }
?>