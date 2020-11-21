<?php
$idTable = isset($_POST['id']) ? $_POST['id'] : 'employee_table';
$columns = isset($_POST['col']) ? $_POST['col'] : ['#'];
$lines = isset($_POST['lines']) ? $_POST['lines'] : ['#'];
$size = isset($_POST['size']) ? $_POST['size'] : 'md';

$defaultClass = "table table-striped table-hover table-" + $size;
$class =  isset($_POST['size']) ? $_POST['size'] : 'md';

?>
<div class='table-responsive'>
        <table class='table table-striped table-hover table-md' id='employee_table'>
          <thead class='thead-dark rounded'>
            <tr>
                <?php
                foreach ($columns as $col) {
                  ?>
                  <th class="th-sm" scope='col'><?php echo $col; ?></th>
                  <?php
                }
                ?>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($lines as $line) {
              ?>
              <tr>
                <?php
              foreach ($line as $element) {
              ?>
              <td><?php echo $element; ?></td>
              <?php
            }
            ?>
          </tr>
          <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <?php
?>
