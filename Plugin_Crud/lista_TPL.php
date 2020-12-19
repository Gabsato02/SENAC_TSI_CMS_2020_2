<div class='wrap'>

    <h1>Minha agenda</h1>

    <br><br>

    <form method='POST'>
        <table border='1' width='50%' style='text-align: center;'>
            <tr>
                <td>Nome</td>
                <td>Whatsapp</td>
                <td colspan='2'>Gerenciar</td>
            </tr>

            <?php
            if (count($contatos) > 0) {
                foreach ($contatos as $key => $value) {
                    echo "<tr>
                            <td>{$value->nome}</td>
                            <td>{$value->whatsapp}</td>
                            <td><a href='admin.php?page={$_GET['page']}&apagar={$value->id}'>Apagar</a></td>
                            <td><a href='admin.php?page={$_GET['page']}&editar_form={$value->id}'>Editar</a></td>
                            
                          </tr>";
                }
            } else {
                echo "<td colspan='3'>Não há registros nessa tabela.</td>";
            }

            ?>

            <tr>
                <td><input type='text' name='nome'></td>
                <td><input type='text' name='whatsapp'></td>
                <td></td>
                <td style='display: flex; justify-content: center;'><?php submit_button('Gravar'); ?></td>
            </tr>

        </table>
    </form>

</div>