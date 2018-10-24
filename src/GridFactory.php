<?php
/**
 * @author Denis Fohl
 * 12/04/18
 */

namespace Dfinfo\Grid;

class GridFactory
{
    /**
     * @param array $headersSources
     *
     * @return Grid
     */
    public static function create(array $headersSources)
    {
        $grid = new Grid();
        foreach ($headersSources as $type => $source) {
            $method = 'set' . ucfirst($type) . 'Headers';
            $grid->$method(self::createHeadersFromDatas($source['datas'], $source['factory']));
        }

        return $grid;
    }

    /**
     * @param array         $datas
     * @param HeaderFactory $factory
     *
     * @return array
     */
    public static function createHeadersFromDatas(array $datas, $factory)
    {
        $result = [];
        foreach ($datas as $data) {
            $result[] = $factory::create($data);
        }

        return $result;
    }
}
