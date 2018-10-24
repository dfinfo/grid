<?php
/**
 * @author Denis Fohl
 * 19/04/18
 */

namespace Dfinfo\Grid;


class Repartition
{
    /**
     * @var DataSet
     */
    protected $dividende;
    /**
     * @var DataSet
     */
    protected $diviseur;

    /**
     * @param DataSet $dividendeSet
     * @param DataSet $diviseurSet
     *
     * @return DataSet
     * @throws \Exception
     */
    public function getRepartition(DataSet $dividendeSet, DataSet $diviseurSet): DataSet
    {
        $result = new DataSet();
        foreach ($dividendeSet->getDatas() as $data) {
            $diviseur = $diviseurSet->findData($data->getCoordinates());
            $repartition = clone ($data);
            $repartition->setValue($data->getValue() / $diviseur->getValue());
            $result->addData($repartition);
        }

        return $result;
    }
}