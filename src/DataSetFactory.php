<?php
/**
 * @author Denis Fohl
 * 16/04/18
 */

namespace Dfinfo\Grid;


class DataSetFactory
{
    public static function create(iterable $sourceDatas, DataSetStrategyInterface $strategy, Grid $grid = null): DataSet
    {
        $dataSet = new DataSet();
        foreach ($sourceDatas as $sourceData) {
            $coordinates = $strategy->getCoordinates($sourceData, $grid);
            $strategy->addDataSource($dataSet, $sourceData, $coordinates);
        }

        return $dataSet;
    }
}