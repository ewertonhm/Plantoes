<?php


namespace App\View;


class LayoutPadrao
{
    public function inicio()
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
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Agenda - Inicio</title>

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
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
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
          <span class="mdl-layout-title">Inicio</span>
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
        $user = new \App\Model\UsuarioDao();
        $usuario = $user->readFirst($_SESSION['user_id']);
        echo $usuario['login'];
        echo <<<TAG
            </span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Accounts</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
TAG;
        $usuarios = $user->read();
        foreach ($usuarios as $usuario){
            echo "<a class='mdl-navigation__link' href='change-user.php?id=";
            echo $usuario['id'];
            echo"'> ";
            echo "<li class='mdl-menu__item'>";
            echo $usuario['login'];
            echo "</li></a>";
        }
        echo <<<TAG
              <a class="mdl-navigation__link" href="cadastrar-usuario.php"><li class="mdl-menu__item"><i class="material-icons">add</i>Adicionar usuário</li></a>
            </ul>
          </div>
        </header><!-- USER CARD FIM -->
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800"><!-- BARRA LATERAL INICIO -->
          <a class="mdl-navigation__link" href="index.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Inicio</a>
          <a class="mdl-navigation__link" href="plantoes.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">calendar_today</i>Plantões</a>
          <a class="mdl-navigation__link" href="juizes.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">portrait</i>Juízes</a>
          <a class="mdl-navigation__link" href="cidades.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">location_city</i>Cidades</a>
          <a class="mdl-navigation__link" href="feriados.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i>Feriados</a>
          <a class="mdl-navigation__link" href="relatorios.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">insert_chart</i>Relatórios</a>
          <a class="mdl-navigation__link" href="usuarios.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Usuários</a>
          <a class="mdl-navigation__link" href="configuracoes.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">build</i>Configurações</a>
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href="logout.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">exit_to_app</i><span class="visuallyhidden">Sair</span></a>
        </nav><!-- BARRA LATERAL FIM -->
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid content"><!-- DIV DA AREA LATERAL FIM -->
        <!-- CONTUDO INICIO -->
TAG;
    }

}