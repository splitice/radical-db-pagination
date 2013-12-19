<?php
namespace Radical\Pagination\Pagination;

class CallbackMethod extends Internal\PaginationBase {
	function toURL($page = 1){
		$callback = $this->url;
		return $callback($page);
	}
}