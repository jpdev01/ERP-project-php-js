<?php

include '../../security/database/connection.php';
date_default_timezone_set('UTC');
$dataAtual = date("Y-m-d");
$sql = "SELECT * FROM clientes WHERE dataNascimento = '" . $dataAtual . "'";

$stm_sql = $db_connection->prepare($sql);
$stm_sql->execute();

$birthdays = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
if ($stm_sql->rowCount() != 0) {
?>
    <div class="my-custom-scrollbar my-custom-scrollbar-primary container p-2">
        <div class="table-responsive">
            <table id='employee_table' class='table table-sm table-striped'>
                <thead class='thead-dark'>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($birthdays as $birthday) {
                    ?>
                        <tr onclick="">
                            <td><?php echo $birthday['nome']; ?></td>
                            <td><?php echo $birthday['cpf']; ?></td>
                        </tr>
                    <?php
                    }

                    ?>

                </tbody>
            </table>
        </div>
    </div>
<?php
} else {
    echo "Nenhum aniversariante hoje";
}
?>