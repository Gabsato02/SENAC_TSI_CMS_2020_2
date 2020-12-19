<div class='wrap'>

    <h1>Plug-In de Menu</h1>

    <form method='POST' action='options.php' style='display: flex; flex-direction: column; width: 300px;'>
        <label for='APItoken' style='margin-top: 20px;'>Token da API</label>    
        <input type='text' name='APItoken' id='APItoken' width='50'>

        <label for='APIurl' style='margin-top: 20px;'>URL da API</label>
        <input type='text' name='APIurl' id='APIurl'>

        <?php submit_button(); ?>
    </form>

</div>