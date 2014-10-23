<?php

// global vars
$Module = $Params['Module'];
$http = \eZHTTPTool::instance();
$tpl = \eZTemplate::factory();
$sys = \eZSys::instance();

// vars to set in the template
$files = array();
//$errors = new eZTemplateErrorManager();

// BEGIN
if ($http instanceof \eZHTTPTool && $http->hasPostVariable('FileList')) {
    $fileList = $http->postVariable('FileList');
    foreach ($fileList as $id) {
        $pathName = base64_decode($id);
        $filesize = filesize($pathName);
        $content = file_get_contents($pathName, false, null, $filesize-1024);
        $files[] = array( 'name' => basename($pathName), 'id' => $id, 'content' => $content, 'filesize' => $filesize );
    }
}
// END

// set template variables
if ($tpl instanceof \eZTemplate) {
    $tpl->setVariable('files', $files);
    $tpl->setVariable('errors', array());
    $Result['content'] = $tpl->fetch( 'design:admindebug/view.tpl' );
}

// result
$Result['path'] = array(
                    array(
                        'url' => false,
                        'text' => ezpI18n::tr( 'modules/admin/admindebug/list', 'View Debug')
                    )
);
