<?php

require_once('iso2709.php');

class MTDBR_ISO2709 extends iso2709_record{
	var $mtdbr_tree;
	var $_prefix;


	function MTDBR_ISO2709($pr = null)
	{
		if ($pr) $this->_prefix = $pr;

	}

	function linkXML(&$mtdbr_tree)
	{
		$this->iso2709_record('',AUTO_UPDATE);
		$this->mtdbr_tree =& $mtdbr_tree;
	}

	function setIdPrefix($pr)
	{
		$this->_prefix = $pr;
	}

	function findTag2($node,$tag,$path = null) 
	{

		list($tag1,$tag2) = explode('/',$tag,2);

		if (is_object($node)){
			if ($node != $this->mtdbr_tree && $tag1 == $node->tagname()){
				//echo "Looking for $tag in $path".$node->tagname()."\n";
				if ($tag2){
			  	if($node -> has_child_nodes()) {
			    	foreach($children as $child) {
							$this->findTag($child,$tag2,$path."\\".$tag1);
						}
					}
				} else {
					array_push($this->_tags,$node);	
				}
			} else {
		  	if($node -> has_child_nodes()) {
		    	foreach($children as $child) {
						//echo "Looking for $tag in $path".$child->tagname()."\n";
						$this->findTag($child,$tag);
					}
				}
			}
		}
		return $this->_tags;

	}

	function findTag($node,$tag,$path = null) {

		if ($this->mtdbr_tree != $node) {
			$path.="/".$node->tagname();
		}else{
			$this->_tags = array();
		}
	
	  if($node->has_child_nodes()) {
			list($tag1,$tag2) = explode('/',$tag,2);
			if ($this->mtdbr_tree != $node && $node->tagname() == $tag1){
				$tag = $tag2;
			}
	    # continue as there are children to this node
	    $children = $node -> child_nodes();
	    foreach($children as $child) {
	      # first, check to see if a child is an actual node, and not just #text
	      if($child -> type == XML_ELEMENT_NODE) {
					//echo ("Lookin in node $path in ".$child->tagname()." for $tag \n");
	        # we have a real node, now check against the one were looking for
					if($child -> tagname() == $tag) {
	          # found it
						array_push($this->_tags,$child);	
					}else{
	          $a = $this->findTag($child, $tag, $path);
					}
	      }
			}
		}
	  return $this->_tags;
	}

	function dump()
	{
		// ====================================
		// '/record/metadata/mtdbr/Autor/Nome';
		// ====================================

		$this->set_rs('n');
		$this->set_dt('a');

		$ok = false;

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/Controle/IdentificacaoDocumento");
		foreach ($nodes as $node){	
			$this->add_field('001','  ',$this->_prefix.$node->get_content());
			$ok = true;
		}

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/Controle/Sigla");
		foreach ($nodes as $node){	
			$this->add_field('003','  ',$node->get_content());
		}

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/Controle/DataAtualizacao");
		foreach ($nodes as $node){	
			$this->add_field('005','  ',str_replace('-','/',substr($node->get_content(),0,10)));
		}

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/Controle/IdentificacaoDocumento");
		foreach ($nodes as $node){	
			$this->add_field('008','  ',$node->get_content());
		}

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/BibliotecaDigital/URLDocumento");
		foreach ($nodes as $node){	
			$this->add_field('856','  ','u',$node->get_content());
		}

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/Arquivol/URL");
		foreach ($nodes as $node){	
			$this->add_field('856','  ','u',$node->get_content());
		}		


		$c_245=0;
		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/Titulo");
		foreach ($nodes as $node){	
			$idioma = $node->get_attribute('Idioma');
			switch ($idioma){
				case ('pt'):
						$f = 'a';
					break;
				case ('en'):
						$f = 'b';
					break;
				default:
						$f = 'c';
					break;
			}
			$subfield_245[$c_245++]= array($f=>$node->get_content());
		}

		if ($subfield_245){
			$this->add_field('245','  ',$subfield_245);
		}

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/Idioma");
		foreach ($nodes as $node){	
			$idioma = $node->get_content();
			switch($idioma){
				case ('pt'): $idioma = 'por'; break;
				case ('en'): $idioma = 'eng'; break;
				case ('es'): $idioma = 'spa'; break;
				case ('fr'): $idioma = 'fre'; break;
				default:
				break;
			}
			$this->add_field('051','  ',a,$idioma);
		}

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/Grau");
		foreach ($nodes as $node){	
			$this->add_field('502','  ',a,$node->get_content());
		}

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/Resumo");
		foreach ($nodes as $node){	
			$idioma = $node->get_attribute('Idioma');
			switch ($idioma){
				case ('en'):
						$this->add_field('940','  ',a,$node->get_content());
					break;
				default:
						$this->add_field('520','  ',a,$node->get_content());
					break;
			}
		}

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/Assunto");
		foreach ($nodes as $node){	
			$idioma = $node->get_attribute('Idioma');
			switch ($idioma){
				case ('en'):
						$this->add_field('651','  ',a,$node->get_content());
					break;
				default:
						$this->add_field('650','  ',a,$node->get_content());
					break;
			}
		}

		$c_260=0;
		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/DataDefesa");
		foreach ($nodes as $node){	
			$subfield_260[$c_260++]= array('c'=>$node->get_content());
		}

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/LocalDefesa/Cidade");
		foreach ($nodes as $node){	
			$subfield_260[$c_260++]= array('a'=>$node->get_content());
		}


		if ($c_260>0){
			$this->add_field('260','  ',$subfield_260);
		}

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/Autor/Nome");
		foreach ($nodes as $node){	
			$this->add_field('100','  ',a,$node->get_content());
		}

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/Contribuidor/Nome");
		foreach ($nodes as $node){	
			$papel = $node->get_attribute('Papel');
			if ($papel){
				$this->add_field('700','  ',a,$node->get_content(), e,$papel);
			} else { 
				$this->add_field('700','  ',a,$node->get_content());
			}
		}

		$nodes=$this->findTag(&$this->mtdbr_tree,"metadata/mtdbr/Programa/Instituicao/Nome");
		foreach ($nodes as $node){	
			$this->add_field('710','  ',a,$node->get_content());
		}

		return $ok;

	}

	function iso2709()
	{	
		if ($this->dump()){
			return $this->get_fullrecord();
		}
	}

	function _MTDBR_ISO2709()
	{
	}
	
	
}

?>