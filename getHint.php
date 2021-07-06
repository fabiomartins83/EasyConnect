
<?php
// Array with names
$a[] = "Ana";
$a[] = "Beatriz";
$a[] = "Carolina";
$a[] = "Daniela";
$a[] = "Eduarda";
$a[] = "Fabiana";
$a[] = "Gabriela";
$a[] = "Heitor";
$a[] = "Ingrid";
$a[] = "Joana";
$a[] = "Kamila";
$a[] = "Luciana";
$a[] = "Mariana";
$a[] = "Nicole";
$a[] = "Ondina";
$a[] = "Patrícia";
$a[] = "Quintiliano";
$a[] = "Raquel";
$a[] = "Simone";
$a[] = "Tatiana";
$a[] = "Umbelina";
$a[] = "Valéria";
$a[] = "Xavier";
$a[] = "Zenon";

// get the q parameter from URL
$q = strtolower($_REQUEST["q"]);
$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    foreach($a as $name) {
        $len = strlen($q);
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "Sem sugestões" : $hint;
?> 