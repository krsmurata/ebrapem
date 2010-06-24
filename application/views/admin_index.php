<?php $this->load->view('admin_cabecalho'); ?>
<table class="admin">
    <tr> 
        <th>Nome</th>
        <th>CPF</th>
        <th>Email</th>
        <th>Data Insc.</th>
        <th>Trabalho?</th>
        <th>Comprovante?</th>
        <th>Data Comp.</th>
        <th>Confirmado?</th>
    </tr>
<?php foreach($query as $row): ?>
    <tr>
        <td><?php echo anchor("inscricao/status/{$row->cpf}", $row->nome, array('target' => '_new')); ?></td>
        <td><?php echo $row->cpf; ?></td>
        <td><?php echo $row->email; ?></td>
        <td><?php echo $row->criado_em; ?></td> 
        <td><?php echo $row->trabalho_enviado == 1 ? 'Sim' : 'Não'; ?></td>
        <td>
            <?php if (!empty($row->pag_data_envio)) : ?>
            <a href='<?php echo base_url(); ?>comprovantes/<?php echo $row->pag_arquivo; ?>'><?php echo $row->pag_num_doc; ?></a>
            <?php else : ?>
            -
            <?php endif; ?>
        </td>
        <td><?php echo $row->pag_data_envio; ?></td>
        <td> 
            <?php if ($row->pag_confirmado == 1) : ?>
            SIM!
            <?php else :
                echo anchor("admin/confirmar_inscricao/{$row->cpf}", 'Confirmar', array('class' => 'confirmar'));
            endif; ?>
        </td>
    </tr>
<?php endforeach; ?>
</table>

<?php $this->load->view('rodape'); ?>
