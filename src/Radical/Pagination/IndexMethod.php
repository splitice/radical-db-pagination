<?php
namespace Radical\Pagination;

class IndexMethod extends Internal\PaginationBase {
	function toURL($page = 1){
		if($page<=1){
			return $this->url;
		}else{
			return rtrim($this->url,'/').'/index'.$page.'.html';
		}
	}
}