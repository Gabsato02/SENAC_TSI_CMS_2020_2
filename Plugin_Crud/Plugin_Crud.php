<?php 
/*
* Plugin Name: Plugin_Crud
* Plugin URI: https://sp.senac.br
* Description: Este é um plug-in de CRUD
* Version: 0.0.1
* Author: Gabriel Sato
* Author URI: https://sp.senac.br
* CC BY
*/

// Forma de evitar que o plug-in seja inicializado de outra forma que não o próprio Wordpress
if (!defined('WPINC')) exit;


/* When a plugin is activated, the action ‘activate_PLUGINNAME’ hook is called. 
In the name of this hook, PLUGINNAME is replaced with the name of the plugin, 
including the optional subdirectory. For example, when the plugin is located in 
wp-content/plugins/sampleplugin/sample.php, then the name of this hook will 
become ‘activate_sampleplugin/sample.php’.
When the plugin consists of only one file and is (as by default) located at wp-content/plugins/sample.php 
the name of this hook will be ‘activate_sample.php’. 

(Nome do arquivo com o path, a função hookada)
*/
register_activation_hook(__FILE__, 'criar_tabela');

function criar_tabela () {
    
    // Classe de PDO do WordPress
    global $wpdb;
    // O prefixo de criação de tabela 
$wpdb->query("CREATE TABLE {$wpdb->prefix}agenda (
                           id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                           nome VARCHAR(255) NOT NULL,
                           whatsapp BIGINT UNSIGNED NOT NULL)");
}