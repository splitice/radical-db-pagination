<?php
namespace Radical\Pagination\Pagination;
use Radical\Pagination\Pagination\Template\IPaginationTemplate;

interface IPaginator {
	function toURL($page = 1);
	function output($last,IPaginationTemplate $template);
}