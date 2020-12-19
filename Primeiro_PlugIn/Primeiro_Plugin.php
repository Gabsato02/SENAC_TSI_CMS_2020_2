<?php 
/*
* Plugin Name: Primeiro_Plugin
* Plugin URI: https://sp.senac.br
* Description: Este é um lindo plug-in desenvolvido por mim
* Version: 0.0.1
* Author: Gabriel Sato
* Author URI: https://sp.senac.br
* CC BY
*/

/* HOOKS
// Gancho de filtro - Altera uma funcionalidade existente

PARÂMETROS
add_filter(Em qual filtro de gancho a função será incluída, Qual função será chamada quando o gancho for ativado) 

No caso abaixo, está fazendo a alteração da mensagem que aparecem quando a tentativa de login é inválida*/

add_filter('login_errors','changeLoginMessage');

function changeLoginMessage() {
    return 'Credenciais inválidas!';
}

/*
Gancho de ação - Insere nova funcionalidade ao Wordpress

PARÂMETROS
add_action(Em qual filtro de gancho a função será incluída, Qual função será chamada quando o gancho for ativado)

No caso abaixo, está incluindo as Open Graph tags quando o cabeçalho do tema WordPress for carregado */

add_action ('wp_head', 'includeOpenGraphTags');

function includeOpenGraphTags() {
    // Se for uma single post page
    if (is_single()) {

        // Vai atribuir os valores as meta tags abaixo.

        // Pegando informações do post
        $post_information = get_post(get_the_ID());
        // Coletando informações sobre o site
        $site_name = get_bloginfo();
        
        $title = $post_information->post_title;
        $post_description = $post_information->post_excerpt;

        echo "\n
        <meta property='og:title' content='" . $title . "'> \n
        <meta property='og:site_name' content='" . $site_name . "'> \n
        <meta property='og:url_name' content='" . get_permalink(). "'> \n
        <meta property='og:description' content='" . $post_description . "'> \n
        ";
    }
}
