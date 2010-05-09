<table>
    <tr> 
        <th>Nome</th>
        <th>CPF</th>
    </tr>
<?php foreach($query->result() as $row): ?>
    <tr>
        <td><?php echo anchor('inscricao/edit/'.$row->id, $row->nome); ?><td>
        <td><?php echo $row->cpf; ?><td>
    </tr>
<?php endforeach; ?>

