<?php
namespace Radical\Pagination\Template;
use Radical\Pagination\IPaginator;

interface IPaginationTemplate {
	function onePage();
	function prevLink(IPaginator $paginator,$page);
	function nextLink(IPaginator $paginator,$page);
	function lastLink(IPaginator $paginator,$page);
	function pageLink(IPaginator $paginator,$page,$isCurrent=false);
}