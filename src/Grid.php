<?php
/**
 * @author Denis Fohl
 * 12/04/18
 */

namespace Dfinfo\Grid;

class Grid
{
    /**
     * @var Header[]
     */
    protected $rowHeaders = [];
    /**
     * @var Header[]
     */
    protected $level1ColumnHeaders = [];
    /**
     * @var Header[]
     */
    protected $level2ColumnHeaders = [];
    /**
     * @var Header[]
     */
    protected $level3ColumnHeaders = [];

    /**
     * @param $id
     *
     * @return Header
     * @throws \Exception
     */
    public function findHeaderFromRow($id): Header
    {
        return $this->findHeader($id, 'row');
    }
    /**
     * @param $id
     *
     * @return Header
     * @throws \Exception
     */
    public function findHeaderFromLevel1Column($id): Header
    {
        return $this->findHeader($id, 'level1Column');
    }
    /**
     * @param $id
     *
     * @return Header
     * @throws \Exception
     */
    public function findHeaderFromLevel2Column($id): Header
    {
        return $this->findHeader($id, 'level2Column');
    }
    /**
     * @param $id
     *
     * @return Header
     * @throws \Exception
     */
    public function findHeaderFromLevel3Column($id): Header
    {
        return $this->findHeader($id, 'level3Column');
    }

    /**
     * @param        $id
     * @param string $headerGroup
     *
     * @return Header
     * @throws \Exception
     */
    protected function findHeader($id, string $headerGroup): Header
    {
        foreach ($this->getHeaders($headerGroup) as $header) {
            if ($header->getId() == $id) {
                return $header;
            }
        }

        throw new \Exception('Header not found : ' . $id);
    }

    /**
     * @param string|null $group
     *
     * @return Header[]
     */
    protected function getHeaders(string $group = null): array
    {
        if (is_null($group)) {
            return array_merge(
              $this->getRowHeaders(),
              $this->getLevel1ColumnHeaders(),
              $this->getLevel2ColumnHeaders(),
              $this->getLevel3ColumnHeaders()
            );
        }
        $method = 'get' . ucfirst($group) . 'Headers';

        return $this->$method();
    }

    /**
     * @return Header[]
     */
    public function getRowHeaders(): array
    {
        return $this->rowHeaders;
    }

    /**
     * @param Header[] $rowHeaders
     */
    public function setRowHeaders(array $rowHeaders): void
    {
        $this->rowHeaders = $rowHeaders;
    }

    /**
     * @return Header[]
     */
    public function getLevel1ColumnHeaders(): array
    {
        return $this->level1ColumnHeaders;
    }

    /**
     * @param Header[] $level1ColumnHeaders
     */
    public function setLevel1ColumnHeaders(array $level1ColumnHeaders): void
    {
        $this->level1ColumnHeaders = $level1ColumnHeaders;
    }

    /**
     * @return Header[]
     */
    public function getLevel2ColumnHeaders(): array
    {
        return $this->level2ColumnHeaders;
    }

    /**
     * @param Header[] $level2ColumnHeaders
     */
    public function setLevel2ColumnHeaders(array $level2ColumnHeaders): void
    {
        $this->level2ColumnHeaders = $level2ColumnHeaders;
    }

    /**
     * @return Header[]
     */
    public function getLevel3ColumnHeaders(): array
    {
        return $this->level3ColumnHeaders;
    }

    /**
     * @param Header[] $level3ColumnHeaders
     */
    public function setLevel3ColumnHeaders(array $level3ColumnHeaders): void
    {
        $this->level3ColumnHeaders = $level3ColumnHeaders;
    }
}
