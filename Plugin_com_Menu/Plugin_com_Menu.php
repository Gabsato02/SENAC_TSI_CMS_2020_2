<?php 
/*
* Plugin Name: Plugin_com_Menu
* Plugin URI: https://sp.senac.br
* Description: Este é um plug-in com menu lateral
* Version: 0.0.1
* Author: Gabriel Sato
* Author URI: https://sp.senac.br
* CC BY
*/

//Adiciona um item ao menu lateral do painel do Wordpress
add_action('admin_menu','menu_do_meu_plugin');

function menu_do_meu_plugin() {

    /* Plugin-In no PRIMEIRO nível do menu
    add_menu_page('Configurações do meu Plug-In', // Título da página de configuração do Plug-in
                  'Meu Plug-in', // Título do plug-in no menu
                  'administrator', // Quem pode acessar esse menu
                  'meu-plugin-config', // Qual vai ser o nome do menu enquanto elemento
                  'menu_configuracoes', // Qual função será executada na página do Plug-in
                  'dashicons-buddicons-activity' // O ícone do plug-in
                ); */

    // Plugin-In no SEGUNDO nível do menu
    add_submenu_page('options-general.php', // Em qual menu ele vai aparecer
                     'Configurações do meu Plug-In', // Título da página de configuração do Plug-in
                     'Meu Plug-in', // Título do plug-in no menu
                     'administrator', // Quem pode acessar esse menu
                     'meu-plugin-config', // Qual vai ser o nome do menu enquanto elemento
                     'menu_configuracoes', // Qual função será executada na página do Plug-in
    );
}

function menu_configuracoes() {
    require 'Plugin_com_Menu_TPL.php';
}