<?php
/**
 * Created by PhpStorm.
 * User: ggric
 * Date: 26/09/2022
 * Time: 10:46
 */
include_once "lib\BladeOne.php";
use \eftec\bladeone\BladeOne;

class BladeOneM extends BladeOne
{
    public function run($view = null, $variables = []): string
    {
        $out=parent::run($view,$variables);
        echo $out;
        return $out;
    }

}