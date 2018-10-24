<?php
/**
 * @author Denis Fohl
 * 20/04/18
 */

namespace Dfinfo\Grid;

interface DataSetStrategyInterface
{
    /**
     * @param mixed     $sourceData
     * @param Grid|null $grid
     *
     * @return Header[]
     */
    public function getCoordinates($sourceData, Grid $grid = null): array;

    /**
     * @param DataSet    $dataSet
     * @param mixed      $sourceData
     * @param Header[]   $coordinates
     *
     * @return void
     */
    public function addDataSource(DataSet $dataSet, $sourceData, array $coordinates): void;
}