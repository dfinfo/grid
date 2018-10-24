<?php
/**
 * @author Denis Fohl
 * 12/04/18
 */

namespace Dfinfo\Grid;

class Header
{
    /**
     * @var mixed
     */
    protected $id;
    /**
     * @var string
     */
    protected $label;
    /**
     * @var string
     */
    protected $labelShort;
    /**
     * @var string
     */
    protected $help;
    /**
     * @var mixed
     */
    protected $entity;

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label ?? ($this->getEntity() ? $this->getEntity()->__toString() : '');
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getLabelShort(): ?string
    {
        return $this->labelShort;
    }

    /**
     * @param string $labelShort
     */
    public function setLabelShort(?string $labelShort): void
    {
        $this->labelShort = $labelShort;
    }

    /**
     * @return string
     */
    public function getHelp(): string
    {
        return $this->help ?? '';
    }

    /**
     * @param string $help
     */
    public function setHelp(string $help): void
    {
        $this->help = $help;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id ?? ($this->getEntity() ? $this->getEntity()->getId() : null);
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param mixed $entity
     */
    public function setEntity($entity): void
    {
        $this->entity = $entity;
    }
}
