<?php

namespace Hcode;

use Rain\Tpl;

Class Page {
    
    private $tpl;
	private $options = [];
	private $defaults = [
		"data" => []
	];

    public function __construct($opts = array(), $tpl_dir = "/views/") {
        
        // fazendo o merge dos dados da pagina passados por parametro
        $this->options = array_merge($this->defaults, $opts);

        // configurações de pastas do template
		$config = array(
			"tpl_dir"   => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
			"cache_dir" => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
			);

		Tpl::configure( $config );

		$this->tpl = new Tpl;

		$this->setData($this->options["data"]);

		$this->tpl->draw("header");
    }
    // metodo para fazer a atribuição dos dados da pagina pelo metodo do tpl 'assign'
    private function setData($data = array())
    {
    	foreach ($data as $key => $value) {
			$this->tpl->assign($key, $value);
		}
    }
    //metodo para criar o conteudo da pagina
	//$name : nome do template
	//$data() : dados que serao passados para esse conteudo
	//$returnHTML: se false ele nao retorna o html
    public function setTpl($name, $data = array(), $returnHTML = false)
    {
		
		$this->setData($data);

		return $this->tpl->draw($name, $returnHTML);

    } 

    //apos o carregamento da pagina ele chama o destruct:
    public function __destruct() {
		
		$this->tpl->draw("footer");
        
    }
}
