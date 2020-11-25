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

function criar_tabela()
{

    // Classe de PDO do WordPress
    global $wpdb;
    // O prefixo de criação de tabela 
    $wpdb->query("CREATE TABLE {$wpdb->prefix}agenda (
                           id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                           nome VARCHAR(255) NOT NULL,
                           whatsapp BIGINT UNSIGNED NOT NULL)");
}

register_deactivation_hook(__FILE__, 'apagar_tabela');

function apagar_tabela()
{
    // Classe de PDO do WordPress
    global $wpdb;
    // O prefixo de criação de tabela 
    $wpdb->query("DROP TABLE {$wpdb->prefix}agenda");
}

add_action('admin_menu', 'crud_do_meu_plugin');

function crud_do_meu_plugin()
{

    //Plugin-In no PRIMEIRO nível do menu
    add_menu_page(
        'Configurações do meu Plug-In', // Título da página de configuração do Plug-in
        'Meu Plug-in', // Título do plug-in no menu
        'administrator', // Quem pode acessar esse menu
        'meu-plugin-config', // Qual vai ser o nome do menu enquanto elemento
        'menu_configuracoes', // Qual função será executada na página do Plug-in
        'dashicons-buddicons-activity' // O ícone do plug-in
    );
}

function menu_configuracoes()
{

    global $wpdb;

    if (isset($_POST['submit'])) {

        if ($_POST['submit'] == 'Gravar') {

            $wpdb->query(
                $wpdb->prepare("INSERT INTO {$wpdb->prefix}agenda 
                                            (nome, whatsapp) 
                                       VALUES 
                                            (%s, %d)", $_POST['nome'], $_POST['whatsapp'])
            );
        }
    }

    if (isset($_GET['apagar'])) {
        $wpdb->query(
            $wpdb->prepare("DELETE FROM {$wpdb->prefix}agenda WHERE id = (%d)", $_GET['apagar'])
        );
    }

    if (isset($_GET['editar_form']) && !isset($_POST['alterar'])) {

        //Recuperar dados
        $id = preg_replace('/\D/', '', $_GET['editar_form']);

        $contatoEdit = $wpdb->get_results("SELECT nome, whatsapp 
                              FROM {$wpdb->prefix}agenda 
                              WHERE id = $id");

        require 'form_editar_TPL.php';
        exit();
    }

    if (isset($_POST['alterar'])) {

        $wpdb->query($wpdb->prepare(
            "             UPDATE  {$wpdb->prefix}agenda
                        SET nome = %s, whatsapp = %d
                        WHERE id = %d
          ",
            $_POST['nome'],
            $_POST['whatsapp'],
            $_POST['id']
        ));
    }


    $contatos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}agenda");

    require 'lista_TPL.php';
}
