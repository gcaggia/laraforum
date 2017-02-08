<?php 

function test()
{
    return 'toto';
}

/**
 * This function return an integer from a string
 */
function intString($argStr)
{
    $sum = 0;
    for($i = 0; $i < strlen($argStr); $i++) {
        $sum += ord($argStr[$i]);
    }
    return $sum;
}

function boostrapColorLabel($argStr)
{
    $hash = intString($argStr)%5;

    switch ($hash) {
        case 1:
            $class = 'primary';
            break;
        case 2:
            $class = 'success';
            break;
        case 3:
            $class = 'info';
            break;
        case 4:
            $class = 'warning';
            break;
        case 5:
            $class = 'danger';
            break;
        default:
            $class = 'info';
    }
    
    return 'label-' . $class;

}