<?php
/**
 * Arquivo para registrar os dados de um aluno no banco de dados.
 */
try
{
    include 'includes/conexao.php';

    $sql ="SELECT id_aluno, nome, cpf,
                DATE_FORMAT('%d/%m/%Y', data_nascimento) AS dat_nasc
            FROM alunos
            ORDER BY nome ASC ";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();

} catch (Exception $e){
        echo $c->getMessage();
}
?>
<table>
    <thead>
        <tr>
            <th>ID</th> <th>Nome</th> <th>CPF</th> <th>Date Nascimento</th>
        </tr>
        <thead>
        <tbody>
        <?php  while($aluno = $stmt->fetchObject()): ?>
        <tr>
            <td><?=$aluno->id ?></td> <td><?= $aluno->nome ?></td>
            <td><?=$aluno->id ?></td> <td><?= $aluno->data_nasc ?></td>
        </td>
        <?php endwhile ?>
        </tbody>
    </table>
    