<?php
use extension\ezadmindebug\autoloads\eZAdminDebugTemplateOperators;

$eZTemplateOperatorArray = array();
$eZTemplateOperatorArray[] = array(
    'script' => 'ezadmindebugtemplateoperators.php',
    'class' => 'extension\\ezadmindebug\\autoloads\\eZAdminDebugTemplateOperators',
    'operator_names' => eZAdminDebugTemplateOperators::operators()
);
