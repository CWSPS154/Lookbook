<?php
/**
 * PHP Version 8.*
 * Magento Framework 2.4.6
 *
 * @category Model
 *
 * @package Lookbook
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 *
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 03/06/23
 * */

declare(strict_types=1);

namespace CWSPS\Lookbook\Model;

use CWSPS\Lookbook\Api\Data\GroupsInterface;
use Magento\Framework\Model\AbstractModel;

class Groups extends AbstractModel implements GroupsInterface
{
    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = GroupsInterface::ID;

    /**
     * @inheritDoc
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel\Groups::class);
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->_getData(GroupsInterface::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name): static
    {
        return $this->setData(GroupsInterface::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getIdentifier(): string
    {
        return $this->_getData(GroupsInterface::IDENTIFIER);
    }

    /**
     * @inheritDoc
     */
    public function setIdentifier(string $identifier): static
    {
        return $this->setData(GroupsInterface::IDENTIFIER, $identifier);
    }

    /**
     * @inheritDoc
     */
    public function getButtonLabel(): string
    {
        return $this->_getData(GroupsInterface::BUTTON_LABEL);
    }

    /**
     * @inheritDoc
     */
    public function setButtonLabel(string $buttonLabel): static
    {
        return $this->setData(GroupsInterface::BUTTON_LABEL, $buttonLabel);
    }

    /**
     * @inheritDoc
     */
    public function getButtonLink(): string
    {
        return $this->_getData(GroupsInterface::BUTTON_LINK);
    }

    /**
     * @inheritDoc
     */
    public function setButtonLink(string $buttonLink): static
    {
        return $this->setData(GroupsInterface::BUTTON_LINK, $buttonLink);
    }

    /**
     * @inheritDoc
     */
    public function getWidth(): int
    {
        return $this->_getData(GroupsInterface::WIDTH);
    }

    /**
     * @inheritDoc
     */
    public function setWidth(int $width): static
    {
        return $this->setData(GroupsInterface::WIDTH, $width);
    }

    /**
     * @inheritDoc
     */
    public function getHeight(): int
    {
        return $this->_getData(GroupsInterface::HEIGHT);
    }

    /**
     * @inheritDoc
     */
    public function setHeight(int $height): static
    {
        return $this->setData(GroupsInterface::HEIGHT, $height);
    }
}
