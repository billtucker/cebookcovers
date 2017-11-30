<?php
/**
 * Created by IntelliJ IDEA.
 * User: billt
 * Date: 10/13/2017
 * Time: 3:39 PM
 */

include_once ($_SERVER["DOCUMENT_ROOT"] ."/cebookcovers/config.php");

include_once($headerFooter ."header1.php");
//
include_once ($dbUtils ."dbutilis.php");


$conn = getConnection();

$indexSql = "select id, name, short_name from program";

$indexResult = runQuery($indexSql, $conn);
closeConn($conn);

$resultCount = $indexResult->num_rows;

?>

<div class="container-fluid">
    <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar pull-left navbar-side-custom">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link titletext" href="#">Categories<span class="sr-only">(current)</span></a>
                </li>
            </ul>

            <ul class="nav nav-pills flex-column">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle titletext" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Covers</a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-custom">
                        <?php
                        while($item = $indexResult->fetch_assoc()){
                            $shortName = $item['short_name'];
                            $id = $item['id'];
                            $fullName = $item['name'];
                            echo "<a class='dropdown-item titletext' href='covers.php?sname=$shortName&id=$id'>$fullName</a>" .PHP_EOL;
                        }


                        ?>
<!--                        <a class="dropdown-item titletext" href="#">AA</a>-->
<!--                        <a class="dropdown-item titletext" href="#">CA</a>-->
<!--                        <a class="dropdown-item titletext" href="#">NA</a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item titletext" href="#">6th Edition</a>-->
                    </div>
                </li>
            </ul>

            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle titletext" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gift Boxes</a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-custom">
                        <a class="dropdown-item titletext" href="#">AA</a>
                        <a class="dropdown-item titletext" href="#">CA</a>
                        <a class="dropdown-item titletext" href="#">NA</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item titletext" href="#">6th Edition</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="col-md-8">
            <p class="text-center">Start text here</p>
        </div>
    </div>
</div>

<?php

include_once ($_SERVER["DOCUMENT_ROOT"] .'/cebookcovers/headers_footers/footer.php');

?>
