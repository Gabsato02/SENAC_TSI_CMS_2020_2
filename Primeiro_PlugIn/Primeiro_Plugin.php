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
Gancho de ação - Insere nova funcionalidade ao Wordpress */


