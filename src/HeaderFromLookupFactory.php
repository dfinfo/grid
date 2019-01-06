<?php
/**
 * @author Denis Fohl
 * 20/04/18
 */

namespace Dfinfo\Grid;

use Dfinfo\Entity\Lookup\LookupTrait;

class HeaderFromLookupFactory implements HeaderFactory
{
    /**
     * @param $data
     *
     * @return Header
     * @throws \Exception
     */
    public static function create($data): Header
    {
        if (!is_object($data)) {
            throw new \Exception('Param must be a lookup entity');
        }

        /** @var LookupTrait $data */
        $header = new Header();
        $header->setId($data->getId());
        $header->setLabel($data->getLibelle());
        $header->setLabelShort($data->getLibelleCourt());
        $header->setHelp($data->getLibelle());
        $header->setEntity($data);

        return $header;
    }
}