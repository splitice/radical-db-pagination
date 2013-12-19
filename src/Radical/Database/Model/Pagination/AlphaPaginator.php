<?php
namespace Radical\Database\Model\Pagination;

use Radical\Database\Model\Table\TableSet;
use Radical\Database\Model\TableReferenceInstance;
use Radical\Pagination\IPaginator;
use Radical\Pagination\Template\IPaginationTemplate;
use Radical\Database\SQL;

/**
 * @author SplitIce
 * A paginated data set
 */
class AlphaPaginator implements IDatabasePaginator {
	private $source;
	private $page;
	private $set;
	private $field;
	
	public $url;
	public $sql;
	
	/**
	 * Internal method to get a result set
	 */
	private function _get(){
		$sql = clone $this->sql;
		$sql->where_and(array($this->field,'LIKE',$this->page.'%'));
		return $this->source->Filter($sql);
	}
	function __construct($source,$field){
		if($source instanceof TableReferenceInstance){
			$source = $source->getAll();
		}elseif(!($source instanceof TableSet)){
			throw new \Exception('Invalid Source passed to paginator');
		}
		
		$this->source = $source;
		$this->field = $field;
		$this->sql = new SQL\SelectStatement();
		$this->set = $this->_get();
	}
	
	public function getIterator() {
		$o = $this->set;
		while($o instanceof \IteratorAggregate){
			$o = $o->getIterator();
		}
		return $o;
	}
	
	function outputLinks(IPaginator $paginator,IPaginationTemplate $template){
		$paginator->Output(ceil($this->totalRows/$this->perPage), $template);
	}
}