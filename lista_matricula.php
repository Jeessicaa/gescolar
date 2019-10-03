<?php
try
{
    include 'includes/conexao.php';

    $sql -"SELECT a.id, a.nome, a.cpf, cs.nome AS curso, t.descricao AS turma,
                    DATE_FORMAT (a.data nascimento, '%d/%m/%Y') AS data_nasc,
                    DATE_FORMAT (c.data_matricula, '%d/%m/%y') AS data_mat
                    FROM aluno a
                    JOIN matricula c ON (C.id_aluno = a,id)
                    JOIN matricula t ON(t.id = c.id_turma)
                    JOIN curso    cs ON (cs.id= t.id curso)
                    ORDER BY nome ASC";
    $stm - $conexao >prepare($sql);
    $stmt->execute();

} catch(Exeception $e) {
        echo $e->getMessage();
}
?>
<link href="css/estilos.css" type="text/css" rel="stylesheet"/>

<?php include_once 'includes /cabecalho.php' ?>

<table>
    <thead>
        <tr>
            <th>ID </th>
            <th>Nome</th>
            <th> CPF</th>
            <th>Data Nasvimento </th>
            <th>Curso </th>
            <th>Turma</th>
            <th>Data Matricula </th>
        </th>
    </thead>
    <tbody>
    <?php while($matricula = $stmt ->fetchObject()):?>
    <th>
        <td><?= $matricula->id ?></td>
        <td><?= $matricula->nome ?></td>
        <td><?= $matricula->cpf ?></td>
        <td><?= $matricula->data_nasc ?></td>
        <td><?= $matricula->curso ?></td>
        <td><?= $matricula->data_mat ?></td>
    </td>
    <?php endwhile ?>
    </tbody>
</table>







