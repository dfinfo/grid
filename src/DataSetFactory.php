<?php
/**
 * @author Denis Fohl
 * 16/04/18
 */

namespace Dfinfo\Grid;


class DataSetFactory
{
    public static function create(iterable $sourceDatas, 
                                  DataSetStrategyInterface $strategy, 
                                  string $unite, 
                                  Grid $grid = null): DataSet
    {
        $dataSet = new DataSet();
        $dataSet->setUnite($unite);
        foreach ($sourceDatas as $sourceData) {
            $coordinates = $strategy->getCoordinates($sourceData, $grid);
            $strategy->addDataSource($dataSet, $sourceData, $coordinates);
        }

        return $dataSet;
    }
}