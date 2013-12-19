<?php
namespace Radical\Pagination;
use Radical\Pagination\Template\IPaginationTemplate;

interface IPaginator {
	function toURL($page = 1);
	function output($last,IPaginationTemplate $template);
}