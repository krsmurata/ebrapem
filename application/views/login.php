<?php echo form_open('sessions/authenticate'); ?>
<p>
Usuário:<br />
<input type="text" name="login" size="20">
</p>
<p>
Senha:<br />
<input type="password" name="password" size="20">
</p>

<p><input type="submit" value="Entrar" class="botao"></p>
<?php echo form_close(); ?>
