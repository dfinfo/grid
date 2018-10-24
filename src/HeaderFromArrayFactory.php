<?php
/**
 * @author Denis Fohl
 * 20/04/18
 */

namespace Dfinfo\Grid;

class HeaderFromArrayFactory implements HeaderFactory
{
    /**
     * @param array $data
     *
     * @return Header
     * @throws \Exception
     */
    public static function create($data): Header
    {
        if (!is_array($data) || !isset($data['id']) || !isset($data['label'])) {
            throw new \Exception('To create a Grid\Header, array must have id and label indexes');
        }

        $header = new Header();
        $header->setId($data['id']);
        $header->setEntity(isset($data['entity']) ? $data['entity'] : null);
        $header->setHelp(isset($data['help']) ? $data['help'] : null);
        $header->setLabel($data['label']);
        $header->setLabelShort($data['label']);

        return $header;
    }
}