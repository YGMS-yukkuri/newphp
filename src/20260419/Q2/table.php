<?php 
$filename = "data.csv";
$row = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>

    <?php 
    if (($data = fopen($filename,"r")) !== false) {
    while(($aaa = fgetcsv($data)) !== false) {
        if($row == 0) {
            echo("<thead>");
            echo("<tr>");
            echo("<td>".$aaa[0]."</td>");
            
            echo("<td>".$aaa[1]."</td>");
            
            echo("<td>".$aaa[2]."</td>");
        echo("</tr></thead>");
        echo("<tbody>");
        $row++;
        } else {
        echo("<tr>");
        echo("<td>".$aaa[0]."</td>");
        echo("<td>".$aaa[1]."</td>");
        echo("<td>".$aaa[2]."</td>");
        echo("</tr>");
        }
    };
    echo("</tbody>");
    }
    
    
    ?>    
</table>
</body>
</html>