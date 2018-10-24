<?php
/**
 * @author Denis Fohl
 * 21/04/18
 */

namespace Dfinfo\Grid;


trait Iterative
{
    /**
     * @var int
     */
    protected $iteratorPosition;

    public function __construct() {
        $this->iteratorPosition = 0;
    }

    public function rewind() {
        $this->iteratorPosition = 0;
    }

    public function current() {
        return $this->datas[$this->iteratorPosition];
    }

    public function key() {
        return $this->iteratorPosition;
    }

    public function next() {
        ++$this->iteratorPosition;
    }

    public function valid() {
        return isset($this->datas[$this->iteratorPosition]);
    }
}