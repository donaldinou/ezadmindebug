<?php
use extension\ezadmindebug\classes\helpers\eZAdminDebugHelper;

// global vars
$Module = $Params['Module'];
$http = \eZHTTPTool::instance();
$tpl = \eZTemplate::factory();
$sys = \eZSys::instance();

// vars to set in the template
$files = array();

// BEGIN
$files = array_merge(eZAdminDebugHelper::iterateLogDirectory(), eZAdminDebugHelper::iterateStoreDirectory(), eZAdminDebugHelper::iterateDebugDirectory());
// END


// set template variables
if ($tpl instanceof \eZTemplate) {
    $tpl->setVariable('files', $files);
    $tpl->setVariable('errors', array());
    $Result['content'] = $tpl->fetch( 'design:admindebug/list.tpl' );
}

// result
$Result['path'] = array(
                    array(
                        'url' => false,
                        'text' => ezpI18n::tr( 'modules/admin/admindebug/list', 'Administrate Debug')
                    )
);
