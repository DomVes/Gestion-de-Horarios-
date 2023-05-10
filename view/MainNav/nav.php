<?php
    /* TODO: Rol 1 es de Usuario */
    if ($_SESSION["rol_id"]==1){
        ?>
            <nav class="side-menu">
                <ul class="side-menu-list">
                    <li class="blue-dirty">
                        <a href="..\Home\">
                            <span class="glyphicon glyphicon-home"></span>
                            <span class="lbl">Inicio</span>
                        </a>
                    </li>
                    <li class="blue-dirty">
                        <a href="..\InscribirEvento\">
                            <span class="glyphicon glyphicon-send"></span>
                            <span class="lbl">Inscribir a Evento</span>
                        </a>
                    </li> 
                </ul>                
            </nav>
        <?php
    }else{
        ?>
            <nav class="side-menu">
                <ul class="side-menu-list">
                    <li class="blue-dirty">
                        <a href="..\Home\">
                            <span class="glyphicon glyphicon-home"></span>
                            <span class="lbl">Inicio</span>
                        </a>
                    </li>
                    <li class="blue-dirty">
                        <a href="..\Aula\">
                            <span class="glyphicon glyphicon-book"></span>
                            <span class="lbl">Aulas</span>
                        </a>
                    </li>                 
                    <li class="blue-dirty">
                        <a href="..\Grupo\">
                            <span class="glyphicon glyphicon-education"></span>
                            <span class="lbl">Grupos</span>
                        </a>
                    </li>
                    <li class="blue-dirty">
                        <a href="..\Evento\">
                            <span class="glyphicon glyphicon-bullhorn"></span>
                            <span class="lbl">Eventos</span>
                        </a>
                    </li>
                    <li class="blue-dirty">
                        <a href="..\Materia\">
                            <span class="glyphicon glyphicon-blackboard"></span>
                            <span class="lbl">Materias</span>
                        </a>
                    </li>
                    <li class="blue-dirty">
                        <a href="..\Horario\">
                            <span class="glyphicon glyphicon-time"></span>
                            <span class="lbl">Horarios</span>
                        </a>
                    </li>
                    <li class="blue-dirty">
                        <a href="..\MntUsuario\">
                            <span class="glyphicon glyphicon-user"></span>
                            <span class="lbl">Usuarios</span>
                        </a>
                    </li>
                    <li class="blue-dirty">
                        <a href="..\InscribirEvento\">
                            <span class="glyphicon glyphicon-send"></span>
                            <span class="lbl">Inscribir a Evento</span>
                        </a>
                    </li>                    
                </ul>
            </nav>
        <?php
    }
?>
