<?php
/**
 * @author Denis Fohl
 * 23/05/18
 */

namespace Dfinfo\Grid;

interface HeaderFactory
{
    /**
     * @param mixed $datas
     *
     * @return Header
     */
    public static function create($datas): Header;
}