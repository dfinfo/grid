<?php
/**
 * @author Denis Fohl
 * 13/04/18
 */

namespace Dfinfo\Grid;

class DataSet implements \Iterator
{
    /**
     * @var Data[]
     */
    protected $datas = [];
    /**
     * @var int
     */
    protected $iteratorPosition;

    /**
     * @param Data $data
     */
    public function addData(Data $data): void
    {
        $this->datas[] = $data;
    }

    /**
     * @param Header[] $coordinates
     *
     * @return Data|null
     * @throws \Exception
     */
    public function findData(array $coordinates): ?Data
    {
        $filtered = $this->filterDataSet($coordinates);
        if (count($filtered) > 1) {
            throw new \Exception('More than one corresponding \Grid\Data exists.');
        }
        if (count($filtered) === 0) {
            return null;
        }

        return $filtered[0];
    }

    /**
     * @param Header[]
     *
     * @return Data[]
     */
    public function filterDataSet(array $coordinates): array
    {
        $result = [];
        foreach ($this->getDatas() as $data) {
            if (isset($coordinates['row']) && $data->getRowHeader()->getId() !== $coordinates['row']->getId()) {
                continue;
            }
            if (isset($coordinates['level1Column']) && $data->getLevel1ColumnHeader()->getId() !== $coordinates['level1Column']->getId()) {
                continue;
            }
            if (isset($coordinates['level2Column']) && $data->getLevel2ColumnHeader()->getId() !== $coordinates['level2Column']->getId()) {
                continue;
            }
            if (isset($coordinates['level3Column']) && $data->getLevel3ColumnHeader()->getId() !== $coordinates['level3Column']->getId()) {
                continue;
            }
            $result[] = $data;
        }

        return $result;
    }

    /**
     * @return Data[]
     */
    public function getDatas(): array
    {
        return $this->datas;
    }

    /**
     * @param Data[] $datas
     */
    public function setDatas(array $datas): void
    {
        $this->datas = $datas;
    }

    /**
     * @param Header[]
     *
     * @return float
     */
    public function getTotal(array $coordinates): float
    {
        $result = 0;
        foreach ($this->filterDataSet($coordinates) as $data) {
            $result += $data->getValue();
        }

        return $result;
    }

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
