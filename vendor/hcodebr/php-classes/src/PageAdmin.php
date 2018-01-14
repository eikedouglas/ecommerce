<?php

namespace Hcode;

use Rain\Tpl;

Class PageAdmin extends Page{    
    private $tpl;
	private $options = [];
	private $defaults = [
		"data" => []
	];

    public function __construct($opts = array(), $tpl_dir = "/views/admin/") {
        
 		parent::__construct($opts, $tpl_dir);

    }
}
