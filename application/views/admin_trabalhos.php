<?php $this->load->view('admin_cabecalho'); ?>
<p>
    Filtrar por:
    <b><?php echo anchor("admin/trabalhos", "TODOS"); ?></b> |
    <b>Carta de Recomendação</b> [ <?php echo anchor("admin/trabalhos/carta/sim", 'SIM'); ?> - <?php echo anchor("admin/trabalhos/carta/nao", 'NÃO'); ?> ]
    ou <b>GT</b>
    <select id='gt-filtro' onchange="document.location='<?php echo base_url(); ?>index.php/admin/trabalhos/gt/'+this.value">
        <option value='todos'>TODOS</option>
        <option value="GT01" <?php if ($filtro == 'gt' && $val == 'GT01') { echo 'selected'; } ?>>GT1-Formação de Professores de Matemática</option>
        <option value="GT02" <?php if ($filtro == 'gt' && $val == 'GT02') { echo 'selected'; } ?>>GT2-Filosofia, Epistemologia e Educação Matemática</option>
        <option value="GT03" <?php if ($filtro == 'gt' && $val == 'GT03') { echo 'selected'; } ?>>GT3-Psicologia na Educação Matemática</option>
        <option value="GT04" <?php if ($filtro == 'gt' && $val == 'GT04') { echo 'selected'; } ?>>GT4-História da Matemática</option>
        <option value="GT05" <?php if ($filtro == 'gt' && $val == 'GT05') { echo 'selected'; } ?>>GT5-História da Educação Matemática</option>
        <option value="GT06" <?php if ($filtro == 'gt' && $val == 'GT06') { echo 'selected'; } ?>>GT6-Tecnologias Informáticas e Educação Matemática</option>
        <option value="GT07" <?php if ($filtro == 'gt' && $val == 'GT07') { echo 'selected'; } ?>>GT7-Etnomatemática</option>
        <option value="GT08" <?php if ($filtro == 'gt' && $val == 'GT08') { echo 'selected'; } ?>>GT8-Investigação em Sala de Aula e Formulação de Problemas</option>
        <option value="GT09" <?php if ($filtro == 'gt' && $val == 'GT09') { echo 'selected'; } ?>>GT9-Modelagem Matemática, Educação Estatística e Educação Ambiental</option>
        <option value="GT10" <?php if ($filtro == 'gt' && $val == 'GT10') { echo 'selected'; } ?>>GT10-Matemática do Ensino Superior</option>
        <option value="GT11" <?php if ($filtro == 'gt' && $val == 'GT11') { echo 'selected'; } ?>>GT11-Práticas Educativas em Educação Matemática</option>
        <option value="GT12" <?php if ($filtro == 'gt' && $val == 'GT12') { echo 'selected'; } ?>>GT12-Educação Matemática de Jovens e Adultos</option>
        <option value="GT13" <?php if ($filtro == 'gt' && $val == 'GT13') { echo 'selected'; } ?>>GT13-Estudos Interdisciplinares</option>
    </select>
</p>
<table class="admin">
    <tr> 
        <th>Nome</th>
        <th>GT</th>
        <th>Trabalho Título</th>
        <th>Trabalho Arquivo</th>
        <th>Carta de Recomendação</th>
        <th>Inscrição Confirmada?</th>
        <th>Aprovado?</th>
    </tr>
<?php foreach($query as $row): ?>
    <tr>
        <td><?php echo anchor("inscricao/status/{$row->cpf}", $row->nome, array('target' => '_new')); ?></td>
        <td><?php echo $row->gt; ?></td>
        <td><?php echo $row->trabalho_titulo; ?></td>
        <td><a href='<?php echo base_url(); ?>trabalhos/<?php echo $row->trabalho_arquivo; ?>'><?php echo $row->trabalho_arquivo; ?></a></td>
        <td><a href='<?php echo base_url(); ?>trabalhos/<?php echo $row->trabalho_carta; ?>'><?php echo $row->trabalho_carta; ?></a></td>
        <td> 
            <?php if ($row->pag_confirmado == 1) : ?>
            SIM!
            <?php else :
                //echo anchor("admin/confirmar_inscricao/{$row->cpf}", 'Confirmar', array('class' => 'confirmar'));
            ?>
            <b>NÃO</b>
            <?php endif; ?>
        </td>

        <td> 
            <?php if ($row->trabalho_aprovado == 1) : ?>
            SIM!
            <?php else :
                echo anchor("admin/aprovar_trabalho/{$row->cpf}", 'Aprovar', array('class' => 'aprovar'));
            endif; ?>
        </td>
    </tr>
<?php endforeach; ?>
</table>

<?php $this->load->view('rodape'); ?>
