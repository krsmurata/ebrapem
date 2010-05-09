<script language="javascript">
jQuery(document).ready(function() {
  jQuery('#enviar_trabalhos').click(function(){
    jQuery('#form_enviar_trabalhos').toggle();
  });
});

</script>

<?php echo form_open_multipart('inscricao/processa_adicionar'); ?>

<p><b>*Nome:</b> <input type="text" name="nome" maxlength="255" size="70">
<b>*CPF:</b> <input type="text" name="cpf" maxlength="11" size="12"> <font color="blue"><b>Apenas N&uacute;meros.</b></font></p> 
 
<p><b>*Data de Nascimento:</b> <input name="nasc_dia" maxlength="2" size="2"> /
                      <input type="text" name="nasc_mes" maxlength="2" size="2"> /
                      <input type="text" name="nasc_ano" maxlength="4" size="4"></p> 
 
<p><b>*Endere&ccedil;o:</b> <input type="text" name="endereco" maxlength="255" size="70"></p> 
 
<p><b>*Cidade:</b> <input type="text" name="cidade" maxlength="100" size="30">
<b>*Estado:</b>
   <select name="estado" size="1"> 
       <option value="AC">AC</option> 
       <option value="AL">Al</option> 
       <option value="AM">AM </option> 
       <option value="AP">AP</option> 
       <option value="BA">BA</option> 
       <option value="CE">CE</option> 
       <option value="DF">DF</option> 
       <option value="ES">ES</option> 
       <option value="GO">GO</option> 
       <option value="MA">MA</option> 
       <option value="MG">MG </option> 
       <option value="MS">MS</option> 
       <option value="MT">MT</option> 
       <option value="PA">PA</option> 
       <option value="PB">PB</option> 
       <option value="PE">PE</option> 
       <option value="PI">PI</option> 
       <option value="PR">PR</option> 
       <option value="RJ">RJ </option> 
       <option value="RN">RN</option> 
       <option value="RO">RO</option> 
       <option value="RR">RR</option> 
       <option value="RS">RS</option> 
       <option value="SC">SC</option> 
       <option value="SE">SE</option> 
       <option value="SP">SP</option> 
       <option value="TO">TO </option> 
	</select> 
</p> 
 
<p><b>*CEP:</b> <input name="cep" size="9" type="text" maxlength="8"> <font color="blue"><b>Apenas N&uacute;meros.</b></font>
   <b>* Pa&iacute;s:</b> <input type="text" name="pais" value="Brasil" maxlength="30" size="10"> </p> 
 
<p><b>*Telefone:</b> ( <input type="text" name="tel_ddd" maxlength="2" size="2"> )
              <input type="text" name="tel_fone" maxlength="8" size="9"> </p> 
 
<p><b>*Email:</b> <input type="text" name="email" maxlength="255" size="70"></p> 
<p><b>*Confirma&ccedil;ao Email:</b> <input type="text" name="email_conf" maxlength="255" size="70"></p> 
 
 
<p><b>*Atividade:</b> <br/> 
<input id="atividade" type=radio name="atividade" value="1">Estudante de Gradua&ccedil;&atilde;o<br/> 
<input id="atividade" type=radio name="atividade" value="2">Estudante de P&oacute;s-gradua&ccedil;&atilde;o lato sensu<br/> 
<input id="atividade" type=radio name="atividade" value="3">Estudante de P&oacute;s-gradua&ccedil;&atilde;o stricto sensu (Mestrado e Doutorado)<br/> 
<input id="atividade" type=radio name="atividade" value="4">Professor da Educa&ccedil;&atilde;o B&aacute;sica<br/> 
<input id="atividade" type=radio name="atividade" value="5">Professor da Educa&ccedil;&atilde;o Superior<br/> 
<input id="atividade" type=radio name="atividade" value="6">Outra<br/></p> 

<hr>

<h2>Trabalho</h2>
<p><input type="checkbox" name="enviar_trabalho" id="enviar_trabalhos">Enviar Trabalho</p>

<div id="form_enviar_trabalhos" style="display:none;">

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

<p><b>*Título:</b> <input type="text" name="trabalho_titulo" maxlength="255" size="70"></p>

<p><b>*Arquivo:</b> <input type="file" name="trabalho_arquivo" size="20" /> (PDF)</p>

<p><b>Carta de Recomendação:</b> <input type="file" name="trabalho_carta" size="20" /> (PDF)</p>

</fieldset>
</div>
<p style="color:red;"><b>* Campos obrigatórios.</b></p>
<p align="center"><input type="submit" value="Salvar"></p>
<?php echo form_close(); ?>

