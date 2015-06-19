<?php
/**
 * Created by PhpStorm.
 * User: splitice
 * Date: 25-11-2014
 * Time: 6:57 PM
 */

namespace Radical\Database\Model\Pagination;


use Radical\Database\Model\Table\TableSet;
use Radical\Database\SQL;
use Radical\Web\Pagination\IPaginationSource;

class DatabaseAdapter implements IPaginationSource {
    private $source;
    private $sql;

    function __construct(TableSet $set){
        $this->source = $set;
        $this->sql = new SQL\SelectStatement(null,null);
    }
    function get_where($field, $value){
        $sql = clone $this->sql;
        $sql->where_and(array($field,'LIKE',$value));
        return $this->source->Filter($sql);
    }
    function get_limit($start, $count){
        $sql = clone $this->sql;
        $sql->limit($start, $count);

        return $this->source->Filter($sql);
    }
    function getCount(){
        return $this->source->getCount();
    }
} 