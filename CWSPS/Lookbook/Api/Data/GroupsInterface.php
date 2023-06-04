<?php
/**
 * PHP Version 8.*
 * Magento Framework 2.4.6
 *
 * @category DataInterface
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

namespace CWSPS\Lookbook\Api\Data;

interface GroupsInterface
{
    public const ID = "entity_id";
    public const NAME = "name";
    public const IDENTIFIER = "identifier";
    public const BUTTON_LABEL = "button_label";
    public const BUTTON_LINK = "button_link";
    public const WIDTH = "width";
    public const HEIGHT = "height";

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): static;

    /**
     * @return string
     */
    public function getIdentifier(): string;

    /**
     * @param string $identifier
     * @return $this
     */
    public function setIdentifier(string $identifier): static;

    /**
     * @return string
     */
    public function getButtonLabel(): string;

    /**
     * @param string $buttonLabel
     * @return $this
     */
    public function setButtonLabel(string $buttonLabel): static;

    /**
     * @return string
     */
    public function getButtonLink(): string;

    /**
     * @param string $buttonLink
     * @return $this
     */
    public function setButtonLink(string $buttonLink): static;

    /**
     * @return int
     */
    public function getWidth(): int;

    /**
     * @param int $width
     * @return $this
     */
    public function setWidth(int $width): static;

    /**
     * @return int
     */
    public function getHeight(): int;

    /**
     * @param int $height
     * @return $this
     */
    public function setHeight(int $height): static;
}
