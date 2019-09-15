<?php


namespace App\View;


class Navbar
{
    public function __construct()
    {
        echo <<<TAG
<body>
    <nav class="navbar navbar-light navbar-expand-md" style="height: 90px;">
        <div class="container-fluid"><a class="navbar-brand" href="index.php">Agenda</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown" id="1-columna"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Plantões&nbsp;</a>
                        <div class="dropdown-menu" role="menu" style="background-color: rgb(255,255,255);"><a class="dropdown-item" role="presentation" href="#">Marcar</a><a class="dropdown-item" role="presentation" href="#">Editar</a><a class="dropdown-item" role="presentation" href="#">Desmarcar</a></div>
                    </li>
                    <li class="nav-item dropdown" id="2-columnas"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Juízes&nbsp;</a>
                        <div class="dropdown-menu multi-column columns-2" role="menu" style="background-color: rgb(255,255,255);">		            <div class="row">
			            <div class="col-sm-6">
				            <ul class="multi-column-dropdown">
					            <li><a class="dropdown-item" role="presentation" href="#">Relatório de Horas</a></li>
					            <li><a class="dropdown-item" role="presentation" href="#">Cadastrar dia Indisponível</a></li>
					            <li><a class="dropdown-item" role="presentation" href="#">Listar dias Indisponíveis</a></li>
					            <li class="divider"></li>
					            <li><a class="dropdown-item" href="#">Cadastrar dia disponível</a></li>
					            <li class="divider"></li>
					            <li><a class="dropdown-item" href="#">Listar dia disponível</a></li>
				            </ul>
			            </div>
			            <div class="col-sm-6">
				            <ul class="multi-column-dropdown">
					            <li><a class="dropdown-item" href="#">Cadastrar</a></li>
					            <li><a class="dropdown-item" href="#">Listar</a></li>
					            <li><a class="dropdown-item" href="#">Editar</a></li>
					            <li class="divider"></li>
					            <li><a class="dropdown-item" href="#">Deletar</a></li>
					            <li class="divider"></li>
					            <li><a class="dropdown-item" href="#">Coeficiente de Plantões</a></li>
				            </ul>
			            </div>
		            </div></div>
                    </li>
                    <li class="nav-item dropdown" id="1-columna"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Cidades&nbsp;</a>
                        <div class="dropdown-menu" role="menu" style="background-color: rgb(255,255,255);"><a class="dropdown-item" role="presentation" href="#">Cadastrar</a><a class="dropdown-item" role="presentation" href="#">Listar</a><a class="dropdown-item" role="presentation" href="#">Deletar</a></div>
                    </li>
                    <li class="nav-item dropdown" id="1-columna"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Feriados&nbsp;</a>
                        <div class="dropdown-menu" role="menu" style="background-color: rgb(255,255,255);"><a class="dropdown-item" role="presentation" href="#">Cadastrar</a><a class="dropdown-item" role="presentation" href="#">Listar</a><a class="dropdown-item" role="presentation" href="#">Deletar</a></div>
                    </li>
                    
                    <!---<li class="nav-item dropdown" id="3-columnas" style="background-color: rgba(255,255,255,0);"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="background-color: #ffffff;">Three Column&nbsp;</a>
                        <div class="dropdown-menu multi-column columns-3" role="menu" style="background-color: rgb(255,255,255);">		            <div class="row">
			            <div class="col-sm-4">
				            <ul class="multi-column-dropdown">
					            <li><a href="#">Action</a></li>
					            <li><a href="#">Another action</a></li>
					            <li><a href="#">Something else here</a></li>
					            <li class="divider"></li>
					            <li><a href="#">Separated link</a></li>
					            <li class="divider"></li>
					            <li><a href="#">One more separated link</a></li>
				            </ul>
			            </div>
			            <div class="col-sm-4">
				            <ul class="multi-column-dropdown">
					            <li><a href="#">Action</a></li>
					            <li><a href="#">Another action</a></li>
					            <li><a href="#">Something else here</a></li>
					            <li class="divider"></li>
					            <li><a href="#">Separated link</a></li>
					            <li class="divider"></li>
					            <li><a href="#">One more separated link</a></li>
				            </ul>
			            </div>
			            <div class="col-sm-4">
				            <ul class="multi-column-dropdown">
					            <li><a href="#">Action</a></li>
					            <li><a href="#">Another action</a></li>
					            <li><a href="#">Something else here</a></li>
					            <li class="divider"></li>
					            <li><a href="#">Separated link</a></li>
					            <li class="divider"></li>
					            <li><a href="#">One more separated link</a></li>
				            </ul>
			            </div>
		            </div></div>
                    </li>--->
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>
TAG;

    }

}