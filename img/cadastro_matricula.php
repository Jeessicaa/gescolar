<?php 
/**
 * Arquivo para registrar os dados de um aluno ne banca de dados.
 */
try 
{ 
    include 'includes/conexao.php';

    //lista de alunos
    $stmt_aluno = $conexao -> prepere("SELECT *  FROM aluno ORDER BY nome ASC");
    $stmt_aluno->execute();

    //lista de turmas 
    $stmt_turmas - $conexao->prepare("SELECT * FROM turma ");
    $stmt_turma->execute();

    if(isset($_REQUEST['cadastrar']))

    {
        $sql = "INSERT INTO matricula (id_turma, id_aluno, data_matricula)
                        VALUES (?, ?, NOW())";
         $stmt= $conexao->prepare($sql);
         $stmt->bindParam(1, $_REQUEST['id turma']);
         $stmt->bindParam(2, $_REQUEST['id aluno']);
         $stmt->execute();

         echo "Matricula realizada com sucesso!";
    }
} catch(Exception $e){
    echo $e->getMessage();
}
?>
<link hret= "css/estilo.css" type= "text/css" rel="sty_esheet"/>

<?php include_once 'includes/capecacalho.php' ?>

<div >
<fieldset>
    <legend> Nome Matricula </legend>
        <form action="cadastro_matricula.php?cadastrar" method="post">
            <label>
                <select name="id_turma">
                <?php while($turma = $stmt_turmas->fetchobject()); ?>
                <option value="<?= $turma->id ?> "descricao ?> </option>
                <?php endwhile ?>
                </select>
            </label>
            <label>
                <select neme="id_aluno">
                 <?php while($aluno = $stmt_aluno->fetchobject()); ?>
                    <option value="<?= $aluno->id ?> "> <?= $aluno->nome ?> </option>
                 <?php endwhile ?>
                </select>
            </label>
             <button type="submit">Salvar Matrícula </button>
        </form>
    </legend>
</fieldset>
</div>