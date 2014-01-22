<?php
namespace Radical\Database\Model\Pagination;

use Radical\Pagination\IPaginator;
use Radical\Pagination\Template\IPaginationTemplate;

interface IDatabasePaginator extends \IteratorAggregate {
	function outputLinks(IPaginator $paginator,IPaginationTemplate $template);
}