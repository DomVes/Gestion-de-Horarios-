<?php
    /* TODO:Cadena de Conexion */
    require_once("../config/conexion.php");
    /* TODO:Modelo listarevento */
    require_once("../models/Inscrip_Evento.php");
    $inscrip = new Inscrip_Evento();

    /*TODO: opciones del controlador listarevento*/
    switch($_GET["op"]){
        /* TODO: Guardar y editar, guardar si el campo cat_id esta vacio */
        case "guardaryeditar":
            /* TODO:Actualizar si el campo cat_id tiene informacion */
            if(empty($_POST["ID_inscrip"])){       
                $inscrip->insert_inscrip_evento($_POST["evento_id"],$_POST["grupo_id"]);     
            }
            else {
                $inscrip->update_inscrip_evento($_POST["ID_inscrip"],$_POST["evento_id"],$_POST["grupo_id"]);
            }
            break;

        /* TODO: Listado de listarevento segun formato json para el datatable */
        case "listar":
            $datos=$inscrip->get_inscrip_evento();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["COD_EVENTO"];
                $sub_array[] = $row["COD_GRUPO"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["ID_inscrip"].');"  id="'.$row["ID_inscrip"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["ID_inscrip"].');"  id="'.$row["ID_inscrip"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

        /* TODO: Actualizar estado a 0 segun id de listarevento */
        case "eliminar":
            $inscrip->delete_inscrip_evento($_POST["ID_inscrip"]);
            break;

        /* TODO: Mostrar en formato JSON segun cat_id */
        case "mostrar";
            $datos=$inscrip->get_inscrip_evento_x_id($_POST["ID_inscrip"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["evento_id"] = $row["evento_id"];
                    $output["grupo_id"] = $row["grupo_id"]; 
                }   
                echo json_encode($output);                                                       
                }               
            break;    
    }             
    
?>