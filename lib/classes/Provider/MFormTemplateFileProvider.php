<?php
/**
 * Author: Joachim Doerr
 * Date: 18.07.16
 * Time: 20:06
 */

class MFormTemplateFileProvider
{
    const DEFAULT_THEME = 'default_theme';
    const THEME_PATH = 'mform/templates/%s_theme/';
    const ELEMENTS_PATH = 'elements/';

    /**
     * load specific theme template file
     * is the theme template file not exist load the file form the default theme
     * @param $templateType
     * @param string $subPath
     * @param string $theme
     * @param bool $stop
     * @return string
     * @author Joachim Doerr
     */
    static public function loadTemplate($templateType, $subPath = '', $theme = '', $stop = false)
    {
        if ($theme == '') {
            $theme = rex_addon::get('mform')->getConfig('mform_template');
        }

        // set theme path to load type template file
        $path = rex_path::addonData(sprintf(self::THEME_PATH . $subPath, $theme));
        $file = "mform_$templateType.ini"; // create file name

        // to print without template
        $templateString = '<element:label/><element:element/><element:output/>';

        // is template file exist? and template type not html
        if ($templateType != 'html' && file_exists($path . $file)) {
            // load theme file
            $templateString = implode(file($path . $file, FILE_USE_INCLUDE_PATH));
        } else {
            // stop recursion is default theme not founding
            if (!$stop) return self::loadTemplate($templateType, $subPath, self::DEFAULT_THEME, true);
        }

        // exchange template string
        return $templateString;
    }
}
