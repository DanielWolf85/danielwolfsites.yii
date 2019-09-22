<?php

namespace app\controllers;

use yii\web\Controller;

class MainController extends Controller
{
    
	public function d($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
}
