<?php
/**
 * @todo    General file information
 *
 * @author  Tim Lochmüller
 */

namespace HDNET\CalendarizeNews\Xclass;

use GeorgRinger\News\ViewHelpers\LinkViewHelper;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;

/**
 * @todo General class information
 *
 */
class NewsLinkViewHelper extends LinkViewHelper
{

    /**
     * Render link to news item or internal/external pages
     *
     * @param \GeorgRinger\News\Domain\Model\News $newsItem      current news object
     * @param array                               $settings
     * @param boolean                             $uriOnly       return only the url without the a-tag
     * @param array                               $configuration optional typolink configuration
     * @param string                              $content       optional content which is linked
     *
     * @return string link
     */
    public function render(
        \GeorgRinger\News\Domain\Model\News $newsItem,
        array $settings = array(),
        $uriOnly = false,
        $configuration = array(),
        $content = ''
    ) {
        try {
            $config = ObjectAccess::getProperty($newsItem, 'sorting', true);
            if (is_array($config)) {
                $configuration['additionalParams'] .= '&tx_news_pi1[index]=' . $config['uid'];
            }
        } catch (\Exception $ex) {
        }
        return parent::render($newsItem, $settings, $uriOnly, $configuration, $content); // TODO: Change the autogenerated stub
    }

}