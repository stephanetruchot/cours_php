<?php


    function print_rv2($arrayFruits){
        echo '<pre>';
        print_r ($arrayFruits);
        echo '</pre>';
    }

    $fruits = ['banane', 'fraise', 'pomme', 'poire'];

    print_rv2($fruits)

?>