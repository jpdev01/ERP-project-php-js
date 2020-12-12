<?php
$thisUrl = "main.php?folder=app/future-payments/&file=library.php";

include "filters.php";
?>
<div class="container-fluid">
    <div id="htmlModal"></div>
    
    <div class="row">
        <div class="my-custom-scrollbar my-custom-scrollbar-primary container">
            <div class='table-responsive'>
                <table class="table table-striped table-sm" id='employee_table'>
                    <thead class="thead-dark">
                        <tr>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Parcela</th>
                            <th>Bandeira</th>
                            <th>Venda</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-future-payments">
                        <?php
                        include "query.php";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php

    ?>
    <div class="row pl-4">
        <nav aria-label="...">
            <ul class="pagination pagination-sm">
                <?php
                for ($thisMonth = $mes - 2; $thisMonth <= $mes + 2; $thisMonth++) {
                    $thisYearAdap = $ano;
                    if ($thisMonth == $mes) {
                ?>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">
                                <?php echo $MONTHS_INITIALS[$thisMonth - 1]."/".$thisYearAdap; ?>
                                <span class="sr-only">(current)</span>
                            </span>
                        </li>
                <?php
                    } else {
                        $thisMonthAdap = $thisMonth;
                        if ($thisMonthAdap > 12) {
                            $y = 0;
                            while ($thisMonthAdap > 12) {
                                $thisMonthAdap--;
                                $y++;
                            }
                            $thisYearAdap++;
                        } 
                        else if ($thisMonthAdap < 1) {
                            $y = 12;
                            while ($thisMonthAdap < 0) {
                                $thisMonthAdap++;
                                $y--;
                            }
                            $thisYearAdap--;
                        } 
                        else {                           
                            $y = $thisMonth;
                        }
                        echo "<li class='page-item'><a class='page-link' href='".$thisUrl."&month=".$y."&year=".$thisYearAdap."'>" . $MONTHS_INITIALS[$y - 1] ."/". $thisYearAdap. "</a></li>";
                    }
                }
                ?>
            </ul>
        </nav>
    </div>
</div>