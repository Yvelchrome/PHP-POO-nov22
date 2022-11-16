<?php

namespace App\Controller;

class TotoController extends AbstractController {
    public function toto(){
        $this->render("toto.php",[],"toto please work");
    }
}