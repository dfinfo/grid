<?php
/**
 * @author Denis Fohl
 * 13/04/18
 */

namespace Dfinfo\Grid;

class Data
{
    // TODO voir type Scalar en PHP7.2 ?
    /**
     * @var mixed
     */
    protected $value;
    /**
     * @var Header
     */
    protected $rowHeader;
    /**
     * @var Header
     */
    protected $level1ColumnHeader;
    /**
     * @var Header
     */
    protected $level2ColumnHeader;
    /**
     * @var Header
     */
    protected $level3ColumnHeader;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return Header
     */
    public function getRowHeader(): ?Header
    {
        return $this->rowHeader;
    }

    /**
     * @param Header $rowHeader
     */
    public function setRowHeader(?Header $rowHeader): void
    {
        $this->rowHeader = $rowHeader;
    }

    /**
     * @return Header
     */
    public function getLevel1ColumnHeader(): ?Header
    {
        return $this->level1ColumnHeader;
    }

    /**
     * @param Header $level1ColumnHeader
     */
    public function setLevel1ColumnHeader(?Header $level1ColumnHeader): void
    {
        $this->level1ColumnHeader = $level1ColumnHeader;
    }

    /**
     * @return Header
     */
    public function getLevel2ColumnHeader(): ?Header
    {
        return $this->level2ColumnHeader;
    }

    /**
     * @param Header $level2ColumnHeader
     */
    public function setLevel2ColumnHeader(?Header $level2ColumnHeader): void
    {
        $this->level2ColumnHeader = $level2ColumnHeader;
    }

    /**
     * @return Header
     */
    public function getLevel3ColumnHeader(): ?Header
    {
        return $this->level3ColumnHeader;
    }

    /**
     * @param Header $level3ColumnHeader
     */
    public function setLevel3ColumnHeader(?Header $level3ColumnHeader): void
    {
        $this->level3ColumnHeader = $level3ColumnHeader;
    }

    /**
     * @return Header[]
     */
    public function getCoordinates()
    {
        $coordinates = [];
        if (!is_null($this->getRowHeader())) {
            $coordinates['row'] = $this->getRowHeader();
        }
        if (!is_null($this->getLevel1ColumnHeader())) {
            $coordinates['level1Column'] = $this->getLevel1ColumnHeader();
        }
        if (!is_null($this->getLevel2ColumnHeader())) {
            $coordinates['level2Column'] = $this->getLevel2ColumnHeader();
        }
        if (!is_null($this->getLevel3ColumnHeader())) {
            $coordinates['level3Column'] = $this->getLevel3ColumnHeader();
        }

        return $coordinates;
    }
}
