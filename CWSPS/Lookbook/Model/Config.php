<?php
/**
 * PHP Version 8.*
 * Magento Framework 2.4.6
 *
 * @category Configuration
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

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class responsible to provide access to system configuration related to the Lookbook
 */
class Config
{
    /**
     * Path to enable/disable lookbook in the system settings.
     */
    private const XML_PATH_ENABLED = 'general/lookbook/enabled';

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(private ScopeConfigInterface $scopeConfig)
    {
    }

    /**
     * Check if lookbook is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ENABLED);
    }
}
