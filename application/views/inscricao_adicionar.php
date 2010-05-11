<?php echo form_open_multipart('inscricao/processa_adicionar'); ?>
<p class='confirmada'>Valor: R$ <?php echo $valor; ?>,00 (Estudantes de Graduação: R$ <?php echo $valor/2; ?>,00)</p>
<p><b>*Nome:</b> <input type="text" value="<?php echo set_value('nome'); ?>" name="nome" maxlength="255" size="70"></p>
<p><b>*CPF:</b> <input type="text" value="<?php echo set_value('cpf'); ?>" name="cpf" maxlength="11" size="12"> <font color="blue"><b>Apenas N&uacute;meros.</b></font></p> 
<p><b>* Confirmar CPF:</b> <input type="text" value="<?php echo set_value('cpf_conf'); ?>" name="cpf_conf" maxlength="11" size="12"><font color="blue"><b>Apenas N&uacute;meros.</b></font></p>
<p class="destaque">Importante! O seu CPF será usado para confirmação de pagamento e consultas futuras.</p>
<p><b>*Data de Nascimento:</b> <input type "text" value="<?php echo set_value('nasc_dia'); ?>" name="nasc_dia" maxlength="2" size="2"> /
                      <input type="text" value="<?php echo set_value('nasc_mes'); ?>" name="nasc_mes" maxlength="2" size="2"> /
                      <input type="text" value="<?php echo set_value('nasc_ano'); ?>" name="nasc_ano" maxlength="4" size="4"></p> 
 
<p><b>*Endere&ccedil;o:</b> <input type="text" value="<?php echo set_value('endereco'); ?>" name="endereco" maxlength="255" size="70"></p> 
 
<p><b>*Cidade:</b> <input type="text" value="<?php echo set_value('cidade'); ?>" name="cidade" maxlength="100" size="30">
<b>*Estado:</b>
   <select name="estado" size="1"> 
       <option value="" <?php echo set_select('estado', '', TRUE); ?>>-</option> 
       <option value="AC" <?php echo set_select('estado', 'AC'); ?>>AC</option> 
       <option value="AL" <?php echo set_select('estado', 'AL'); ?>>AL</option> 
       <option value="AM" <?php echo set_select('estado', 'AM'); ?>>AM </option> 
       <option value="AP" <?php echo set_select('estado', 'AP'); ?>>AP</option> 
       <option value="BA" <?php echo set_select('estado', 'BA'); ?>>BA</option> 
       <option value="CE" <?php echo set_select('estado', 'CE'); ?>>CE</option> 
       <option value="DF" <?php echo set_select('estado', 'DF'); ?>>DF</option> 
       <option value="ES" <?php echo set_select('estado', 'ES'); ?>>ES</option> 
       <option value="GO" <?php echo set_select('estado', 'GO'); ?>>GO</option> 
       <option value="MA" <?php echo set_select('estado', 'MA'); ?>>MA</option> 
       <option value="MG" <?php echo set_select('estado', 'MG'); ?>>MG </option> 
       <option value="MS" <?php echo set_select('estado', 'MS'); ?>>MS</option> 
       <option value="MT" <?php echo set_select('estado', 'MT'); ?>>MT</option> 
       <option value="PA" <?php echo set_select('estado', 'PA'); ?>>PA</option> 
       <option value="PB" <?php echo set_select('estado', 'PB'); ?>>PB</option> 
       <option value="PE" <?php echo set_select('estado', 'PE'); ?>>PE</option> 
       <option value="PI" <?php echo set_select('estado', 'PI'); ?>>PI</option> 
       <option value="PR" <?php echo set_select('estado', 'PR'); ?>>PR</option> 
       <option value="RJ" <?php echo set_select('estado', 'RJ'); ?>>RJ </option> 
       <option value="RN" <?php echo set_select('estado', 'RN'); ?>>RN</option> 
       <option value="RO" <?php echo set_select('estado', 'RO'); ?>>RO</option> 
       <option value="RR" <?php echo set_select('estado', 'RR'); ?>>RR</option> 
       <option value="RS" <?php echo set_select('estado', 'RS'); ?>>RS</option> 
       <option value="SC" <?php echo set_select('estado', 'SC'); ?>>SC</option> 
       <option value="SE" <?php echo set_select('estado', 'SE'); ?>>SE</option> 
       <option value="SP" <?php echo set_select('estado', 'SP'); ?>>SP</option> 
       <option value="TO" <?php echo set_select('estado', 'TO'); ?>>TO </option> 
	</select> 
</p> 
 
<p><b>CEP:</b> <input name="cep" size="9" type="text" value="<?php echo set_value('cep'); ?>" maxlength="8"> <font color="blue"><b>Apenas N&uacute;meros.</b></font>
   <b>*Pa&iacute;s:</b> <input type="text" value="<?php echo set_value('pais', 'Brasil'); ?>" name="pais" maxlength="30" size="10"> </p> 
 
<p><b>*Telefone:</b> ( <input type="text" value="<?php echo set_value('tel_ddd'); ?>" name="tel_ddd" maxlength="2" size="2"> )
              <input type="text" value="<?php echo set_value('tel_fone'); ?>" name="tel_fone" maxlength="8" size="9"> </p> 
 
<p><b>*Email:</b> <input type="text" value="<?php echo set_value('email'); ?>" name="email" maxlength="255" size="70"></p> 
<p><b>*Confirmar Email:</b> <input type="text" value="<?php echo set_value('email_conf'); ?>" name="email_conf" maxlength="255" size="70"></p> 
 
 
<p><b>*Atividade:</b> <br/>
<?php foreach($atividades as $atividade) : ?>
    <input id="atividade" type=radio name="atividade" value="<?php echo $atividade->id; ?>" <?php echo set_radio('atividade', $atividade->id); ?>><?php echo $atividade->nome; ?><br/> 
<?php endforeach; ?>
</p>
<hr>

<h2>Trabalho</h2>
    <div id="enviar_trabalho_aviso" style="display:none;">
        <p class='destaque'>
            ATENÇÃO! Estudantes de Graduação não podem enviar trabalho.
        </p>
    </div>
    <p class='aguardando-conf'>
        É possível enviar o trabalho até o dia 06/07/2010.
    </p>
    <p>
        Enviar Trabalho?
        <input type="radio" name="enviar_trabalho" value="1" <?php echo set_radio('enviar_trabalho', '1'); ?>> Sim
        <input type="radio" name="enviar_trabalho" value="0" <?php echo set_radio('enviar_trabalho', '0'); ?>> Não
    </p>

<div id="form_enviar_trabalho" style="display:none;">

<p><b>*Grupo de Trabalho (GT)</b> <br />
<input id="gt" type=radio name="gt" value="GT01">GT1-Formação de Professores de Matemática<br />
<input id="gt" type=radio name="gt" value="GT02">GT2-Filosofia, Epistemologia e Educação Matemática<br />
<input id="gt" type=radio name="gt" value="GT03">GT3-Psicologia na Educação Matemática<br />
<input id="gt" type=radio name="gt" value="GT04">GT4-História da Matemática<br />
<input id="gt" type=radio name="gt" value="GT05">GT5-História da Educação Matemática<br />
<input id="gt" type=radio name="gt" value="GT06">GT6-Tecnologias Informáticas e Educação Matemática<br />
<input id="gt" type=radio name="gt" value="GT07">GT7-Etnomatemática<br />
<input id="gt" type=radio name="gt" value="GT08">GT8-Investigação em Sala de Aula e Formulação de Problemas<br />
<input id="gt" type=radio name="gt" value="GT09">GT9-Modelagem Matemática, Educação Estatística e Educação Ambiental<br />
<input id="gt" type=radio name="gt" value="GT10">GT10-Matemática do Ensino Superior<br />
<input id="gt" type=radio name="gt" value="GT11">GT11-Práticas Educativas em Educação Matemática<br />
<input id="gt" type=radio name="gt" value="GT12">GT12-Educação Matemática de Jovens e Adultos<br />
<input id="gt" type=radio name="gt" value="GT13">GT13-Estudos Interdisciplinares<br /></p>

<fieldset>
<legend>Trabalho</legend>
<p><b>*Situação:</b><br />
    <input name="trabalho_situacao" type="radio" id="trabalho_situacao" value="TA">Em Andamento
    <input name="trabalho_situacao" type="radio" id="trabalho_situacao" value="TC">Concluído
</p>

<p><b>*Título:</b> <input type="text" value="<?php echo set_value('trabalho_titulo'); ?>" name="trabalho_titulo" maxlength="255" size="70"></p>

<p><b>*Arquivo:</b> <input type="file" name="trabalho_arquivo" size="20" /> (PDF)</p>

<p><b>Carta de Recomendação:</b> <input type="file" name="trabalho_carta" size="20" /> (PDF)</p>

</fieldset>
</div>
<p style="color:red;"><b>* Campos obrigatórios.</b></p>
<p align="center"><input type="submit" value="Salvar" class="botao"></p>
<?php echo form_close(); ?>

