<?php

function my_vardump($data): void {
    if (is_array($data))
        echo array_dump($data);
    else echo light_dump($data);
}

function light_dump($data): string {
    if (is_string($data)) return my_gettype($data)."(".strlen($data).") \"".$data."\"\n";
    else if (is_bool($data)) return my_gettype($data)."(".var_export($data, true).")"."\n";
    else return my_gettype($data)."(".$data.")"."\n";
}

function my_gettype($data): string {
    switch (gettype($data)) {
        case "integer":
            return "int";
        case "boolean":
            return "bool";
        case "double":
            return "float";
        case "string":
            return "string";
        case "array":
            return "array";
    }
}

function array_dump(array $data, $depth = 0): string {
    $r = "";
    $r .= tab_print($depth).my_gettype($data)."(".count($data).") {\n";
    for ($i = 0; $i < count($data); $i++)
        if (!is_array($data[$i])) $r .= tab_print($depth + 1)."[".$i."]=>\n".tab_print($depth + 1).light_dump($data[$i]);
        else $r .= tab_print($depth + 1)."[".$i."]=>\n".array_dump($data[$i], $depth + 1);
    return $r.tab_print($depth)."}\n";
}

function tab_print($depth): string {
    $r = "";
    for($i = 0; $i < $depth; $i++)
        $r .= "  ";
    return $r;
}