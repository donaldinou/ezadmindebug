<?php
namespace extension\ezadmindebug\classes\helpers {

    use extension\ezextrafeatures\classes\helpers\Helper;

    abstract class eZAdminDebugHelper extends Helper {

        public static function iterateStoreDirectory( $hasEncoded=true ) {
            $ini = eZINI::instance();
            $stoDir = ($ini instanceof eZINI && $ini->hasVariable('FileSettings', 'VarDir')) ? $ini->variable('FileSettings', 'VarDir') : 'var';
            $logDir = ($ini instanceof eZINI && $ini->hasVariable('FileSettings', 'LogDir')) ? $ini->variable('FileSettings', 'LogDir') : 'log';
            $stoDirectory = getcwd().DIRECTORY_SEPARATOR.$stoDir.DIRECTORY_SEPARATOR.$logDir;
            return iterateDirectory($stoDirectory);
        }

        public static function iterateLogDirectory( $hasEncoded=true ) {
            $ini = eZINI::instance();
            $varDir = 'var'; // FIXME : variable 'VarDir' is used for storage log in eZ Publish...
            $logDir = ($ini instanceof eZINI && $ini->hasVariable('FileSettings', 'LogDir')) ? $ini->variable('FileSettings', 'LogDir') : 'log';
            $logDirectory = getcwd().DIRECTORY_SEPARATOR.$varDir.DIRECTORY_SEPARATOR.$logDir;
            return iterateDirectory($logDirectory);
        }

        public static function iterateDirectory( $directory, $hasEncoded=true ) {
            if (!is_string($directory)) {
                throw new InvalidArgumentException('invalid');
            }
            $result = array();
            $iterator = new DirectoryIterator($directory);
            foreach ($iterator as $fileinfo) { // NOTE use iterator template operator
                // temp : $result[] = addLogFile($fileinfo);
                if ($fileinfo instanceof DirectoryIterator && !$fileinfo->isDir() && $fileinfo->isReadable() ) { // NOTE : we can use getExtension method for php 5.3.6
                    $data = array('name' => $fileinfo->getFilename(), 'path' => $fileinfo->getPath());
                    if ($hasEncoded) {
                        $data['id'] = base64_encode($fileinfo->getPathname());
                    }
                    $result[] = $data;
                }
            }
            return $result;
        }

        public static function iterateDebugDirectory( $hasEncoded=true ) {
            $debug = eZDebug::instance();
            $logFiles = ($debug instanceof eZDebug) ? $debug->logFiles() : array();
            $result = array();
            foreach ($logFiles as $fileinfo) {
                $fileinfo[0] = getcwd().DIRECTORY_SEPARATOR.substr_replace($fileinfo[0], '', -1, 1);
                $data[] = array('name' => $fileinfo[1], 'path' => $fileinfo[0]);
                if ($hasEncoded) {
                    $data['id'] = base64_encode($fileinfo[0].DIRECTORY_SEPARATOR.$fileinfo[1]);
                }
                $result[] = $data;
            }
            return $result;
        }

    }

}
