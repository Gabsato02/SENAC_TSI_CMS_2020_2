<div class='wrap'>

    <br><br>

    <form method='POST' action='http://localhost/wordpress/wp-admin/admin.php?page=meu-plugin-config'>
        <table border='1' width='50%' style='text-align: center;'>
            <tr>
                <td>Nome</td>
                <td>Whatsapp</td>
                <td colspan='2'>Gerenciar</td>
            </tr>

            <tr>

            <tr>
                <td><input type="text" name="nome" value="<?php echo $contatoEdit[0]->nome; ?>"> </td>
                <td><input type="text" name="whatsapp" value="<?php echo $contatoEdit[0]->whatsapp; ?>"> </td>
                <td> <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="alterar" value="1">
                    <?php submit_button('alterar'); ?>
                </td>
            </tr>

        </table>
    </form>

</div>