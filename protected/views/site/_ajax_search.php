<?php

foreach ($results as $row)
{
echo "<br>";
echo "Name: ".$row['name']."   ";
echo "Part Number: ".$row['part_number']."   ";
echo "Barcode ".$row['barcode']."   ";
}

?>