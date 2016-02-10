<?php

/**
 * Class Sheep_Debug_Block_Logging
 *
 * @category Sheep
 * @package  Sheep_Subscription
 * @license  Copyright: Pirate Sheep, 2016, All Rights reserved.
 * @link     https://piratesheep.com
 */
class Sheep_Debug_Block_Logging extends Sheep_Debug_Block_Panel
{
    protected $logLineCount = null;

    public function getSubTitle()
    {
        $logging = $this->getLogging();
        $requestInfo = $this->getRequestInfo();

        return $this->__('%d logs, %d exceptions',
            $logging->getLineCount($this->helper->getLogFilename($requestInfo->getStoreId())),
            $logging->getLineCount($this->helper->getExceptionLogFilename($requestInfo->getStoreId()))
        );
    }


    public function isVisible()
    {
        return $this->helper->isPanelVisible('logging') && $this->getLogging()->getTotalLineCount();
    }


    /**
     * @return Sheep_Debug_Model_Logging
     */
    public function getLogging()
    {
        return $this->getRequestInfo()->getLogging();
    }


    public function getLogFiles()
    {
        return $this->getLogging()->getFiles();
    }

}
