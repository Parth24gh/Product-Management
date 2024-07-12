<?php
$title = "Product";

include_once (__Dir__.'/../config/database.php');
include_once (__Dir__.'/../objects/product.php');
include_once (__Dir__.'/../objects/category.php');

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 10;
$from_record_num = ($records_per_page * $page) - $records_per_page;

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

$stmt = $product->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

include_once("header.php");
/*
echo "
    <script type="text/javascript" language="javascript">
        $(document).ready(function () {
            $(".buy-btn").click(function () {
                $.post("checkout.php", {
                    idx: <?= "\"$idx\"" ?>,
                    contents: $("#contents").val()
                },
                    function (data, status) {
                        $("#result").html(data);
                    });
            });
        });
    </script>
";
*/

    echo"<div id=\"product-cont\">

            <div id=\"content\">";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);

                    echo "
                    <div class=\"card\">
                        <div class=\"img\">
                            <img class=\"product-img\" src=\"{$img_link}\"></img>
                        </div>

                        <div class=\"details\">
                            <p><b>{$name}</b></p>
                            <p style=\"color: red;\"><b>{$price}</b></p>
                            <p class=\"prod-desc\">{$description}</p>
                            <button type=\"submit\" onclick=\"location.href='checkout.php?id={$id}'\" class=\"buy-btn\"><b> BUY </b></button>
                        </div>
                    </div>
                    ";
                }      
            echo "</div>";


            $page_url = "index.php?"; 
            $total_rows = $product->countAll();

            echo "<br><ul class='pagination'>";
            
            $total_pages = ceil($total_rows / $records_per_page);
            
            $range = 2;
            
            $initial_num = $page - $range;
            $condition_limit_num = ($page + $range)  + 1;
            
            for ($x=$initial_num; $x<$condition_limit_num; $x++) {
            
                if (($x > 0) && ($x <= $total_pages)) {
            
                    if ($x == $page) {
                        echo "<li class='active'><a href=\"#\">$x <span class=\"sr-only\">(current)</span></a></li>";
                    }
                    else {
                        echo "<li><a href='{$page_url}page=$x'>$x</a></li>";
                    }
                }
            }
            
            echo "</ul>";

    echo "</div>";

        ?>