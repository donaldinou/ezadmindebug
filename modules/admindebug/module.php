<?php

$Module = array(
                'name' => 'eZ Admin Debug',
                'variable_params' => false,
                'ui_component_match' => 'module',
                'function' => array()
);

$ViewList = array();
$ViewList['list'] = array(
                'script' => 'admin/list.php',
                'function' => array( 'list' ),
                'params' => array(),
                'unordered_params' => array(),
                'default_navigation_part' => 'ezsetupnavigationpart'
);
$ViewList['view'] = array(
                'script' => 'admin/view.php',
                'function' => array( 'view' ),
                'params' => array(),
                'unordered_params' => array(),
                'default_navigation_part' => 'ezsetupnavigationpart'
);

$FunctionList = array();
$FunctionList['list'] = array();
$FunctionList['view'] = array();
