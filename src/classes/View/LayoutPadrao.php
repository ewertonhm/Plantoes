<?php


namespace View;


class LayoutPadrao
{
    public function inicio($title,$addButton = '')
    {
        echo <<<TAG
<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Agenda automática de plantões da Justiça Federal.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>
TAG;
    echo $title;
    echo <<<TAG
    </title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="assets/images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="assets/images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="assets/images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="assets/images/favicon-32x32.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=pt-br">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="assets/css/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="assets/styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <!-- BARRA SUPERIOR INICIO -->
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">
TAG;
        echo $title;
        echo <<<TAG
        </span>
          <div class="mdl-layout-spacer"></div>
         <!-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Buscar...</label>
            </div>
          </div>-->
TAG;
        if($addButton != NULL){
            echo "<div id='add'><a class='mdl-navigation__link' href='";
            echo $addButton;
            echo "'>";
            echo "
          <button class='mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon'>                        
            <i class='material-icons'>add</i>
          </button>
          </a>
          </div>
          <div class='mdl-tooltip' data-mdl-for='add'>Inserir</div>";
        }
        echo <<<TAG
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <a class="mdl-navigation__link" href="sobre.php"><li class="mdl-menu__item">Sobre</li></a>
              <a class="mdl-navigation__link" href="contato.php"><li class="mdl-menu__item">Contato</li></a>
              <a class="mdl-navigation__link" href="informacoeslegais.php"><li class="mdl-menu__item">Informações Legais</li></a>
          </ul>
        </div>
        <!-- BARRA SUPERIOR FIM -->
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50"><!-- DIV DA AREA LATERAL INICIO-->
        <header class="demo-drawer-header"><!-- USER CARD INICIO -->
          <!--<img src="assets/images/user.jpg" class="demo-avatar">-->
          <div class="demo-avatar-dropdown">
            <span>
TAG;
        if(isset($_SESSION['user_id'])){
            $usuario = \UsuariosQuery::create()->findOneById($_SESSION['user_id']);
            echo $usuario->getNome();
        } else {
            echo "";
        }
        echo <<<TAG
            </span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Accounts</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
TAG;
        if(isset($_SESSION['user_id'])){
            $usuarios = \UsuariosQuery::create()->find();
            foreach ($usuarios as $usuario){
                echo "<a class='mdl-navigation__link' href='change-user.php?id=";
                echo $usuario->getId();
                echo"'> ";
                echo "<li class='mdl-menu__item'>";
                echo $usuario->getNome();
                echo "</li></a>";
            }
            echo "<a class='mdl-navigation__link' href='cadastrar-usuario.php'><li class='mdl-menu__item'><i class='material-icons'>add</i>Adicionar usuário</li></a>";
        } else {
            echo "<a class='mdl-navigation__link' href='#'><li disabled class='mdl-menu__item'><i class='material-icons'>add</i>Adicionar usuário</li></a>";
        }
        echo <<<TAG
            </ul>
          </div>
        </header><!-- USER CARD FIM -->
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800"><!-- BARRA LATERAL INICIO -->
TAG;
        if(isset($_SESSION['user_id'])){
            echo <<<TAG
          <a class="mdl-navigation__link" href="index.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Inicio</a>
          <a class="mdl-navigation__link" href="plantoes.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">calendar_today</i>Plantões</a>
          <a class="mdl-navigation__link" href="juizes.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">portrait</i>Juízes</a>
          <a class="mdl-navigation__link" href="cidades.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">location_city</i>Cidades</a>
          <a class="mdl-navigation__link" href="feriados.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>Feriados</a>
          <a class="mdl-navigation__link" href="relatorios.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">insert_chart</i>Relatórios</a>
          <a class="mdl-navigation__link" href="usuarios.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Usuários</a>
          <a class="mdl-navigation__link" href="configuracoes.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">build</i>Configurações</a>
TAG;
        }
        echo <<<TAG
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href="logout.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">exit_to_app</i><span class="visuallyhidden">Sair</span></a>
        </nav><!-- BARRA LATERAL FIM -->
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid content"><!-- DIV DA AREA LATERAL FIM -->
        <!-- CONTUDO INICIO -->
TAG;
    }

    public function fim(){
        echo <<<TAG
        <!-- CONTEUDO FIM  -->
        </div>
      </main>
    </div>
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <mask id="piemask" maskContentUnits="objectBoundingBox">
            <circle cx=0.5 cy=0.5 r=0.49 fill="white" />
            <circle cx=0.5 cy=0.5 r=0.40 fill="black" />
          </mask>
          <g id="piechart">
            <circle cx=0.5 cy=0.5 r=0.5 />
            <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)" />
          </g>
        </defs>
      </svg>
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 250" style="position: fixed; left: -1000px; height: -1000px;">
        <defs>
          <g id="chart">
            <g id="Gridlines">
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="27.3" x2="468.3" y2="27.3" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="66.7" x2="468.3" y2="66.7" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="105.3" x2="468.3" y2="105.3" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="144.7" x2="468.3" y2="144.7" />
              <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="184.3" x2="468.3" y2="184.3" />
            </g>
            <g id="Numbers">
              <text transform="matrix(1 0 0 1 485 29.3333)" fill="#888888" font-family="'Roboto'" font-size="9">500</text>
              <text transform="matrix(1 0 0 1 485 69)" fill="#888888" font-family="'Roboto'" font-size="9">400</text>
              <text transform="matrix(1 0 0 1 485 109.3333)" fill="#888888" font-family="'Roboto'" font-size="9">300</text>
              <text transform="matrix(1 0 0 1 485 149)" fill="#888888" font-family="'Roboto'" font-size="9">200</text>
              <text transform="matrix(1 0 0 1 485 188.3333)" fill="#888888" font-family="'Roboto'" font-size="9">100</text>
              <text transform="matrix(1 0 0 1 0 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">1</text>
              <text transform="matrix(1 0 0 1 78 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">2</text>
              <text transform="matrix(1 0 0 1 154.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">3</text>
              <text transform="matrix(1 0 0 1 232.1667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">4</text>
              <text transform="matrix(1 0 0 1 309 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">5</text>
              <text transform="matrix(1 0 0 1 386.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">6</text>
              <text transform="matrix(1 0 0 1 464.3333 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">7</text>
            </g>
            <g id="Layer_5">
              <polygon opacity="0.36" stroke-miterlimit="10" points="0,223.3 48,138.5 154.7,169 211,88.5
              294.5,80.5 380,165.2 437,75.5 469.5,223.3 	"/>
            </g>
            <g id="Layer_4">
              <polygon stroke-miterlimit="10" points="469.3,222.7 1,222.7 48.7,166.7 155.7,188.3 212,132.7
              296.7,128 380.7,184.3 436.7,125 	"/>
            </g>
          </g>
        </defs>
      </svg>
    <script src="assets/js/material.min.js"></script>
  </body>
</html>
TAG;

}

}