<?php
/**
 * @author Joachim Doerr
 * @package redaxo5
 * @license MIT
 */

use FriendsOfRedaxo\MForm\Utils\MFormPageHelper;

// parse info fragment
$fragment = new rex_fragment();
$fragment->setVar('title', rex_i18n::msg('mform_info'), false);
$fragment->setVar('body', '<p>' . rex_i18n::msg('mform_example_description_repeater') . '</p>', false);
echo $fragment->parse('core/page/section.php');

// parse info fragment
$fragment = new rex_fragment();
$fragment->setVar('title', rex_i18n::msg('mform_demo_repeater'), false);
$fragment->setVar('body', MFormPageHelper::exchangeExamples('repeater'), false);
echo $fragment->parse('core/page/section.php');
