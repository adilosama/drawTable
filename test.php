<?php

function printRow($items, $isEmpty = false, $isColorized = true) {

    $itemCount = count($items);
    if ($isEmpty) {
        print("+");
        for ($i = 0; $i < $itemCount; $i++) {
            if ($isColorized) {
                print("\033[0;3$i" . "m----------\033[0m+");
            } else {
                print("----------+");
            }
        }
    } else {
        print("|");
        $i = 0;
        foreach ($items as $item) {
            if ($isColorized) {
                print("\033[0;3" . $i++ . "m $item   \033[0m|");
            } else {
                print(" $item   |");
            }
        }
    }
    print("\n");
}

function comp($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

function printTable($items) {

    foreach ($items as $key => &$itm) {
        uksort($itm, 'comp');
    };

    $headers = array_keys(@$items[0]);
    printRow($headers, true);
    printRow($headers);
    printRow($headers, true);
    foreach ($items as $itm) {
        printRow($itm);
    }
    printRow($headers, true);
}


?>
