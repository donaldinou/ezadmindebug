<?php
namespace extension\ezadmindebug\classes\ajax {

    class ezjscAdminDebugServerFunctions extends \ezjscServerFunctions {

        public static function tail( array $args ) {
            $result = array( 'id' => 0, 'content' => null, 'filesize' => 0 );
            if ( is_array($args) && isset($args[0]) && isset($args[1]) && is_numeric($args[1]) ) {
                $pathName = base64_decode($args[0]);
                if ($args[1] != filesize($pathName)) {
                    $result['id'] = $args[0];
                    $result['filesize'] = filesize($pathName);
                    $offset = ($args[1]>0) ? $args[1] : $result['filesize']-1024;
                    $result['content'] = file_get_contents($pathName, false, null, $offset);
                }
            }
            return $result;
        }

        /**
         * Cache time for retunrned data, only currently used by ezjscPacker
         * @see ezjscServerFunctions::getCacheTime
         * @static
         * @access public
         * @param string $functionName
         * @return int Uniq timestamp (can return -1 to signal that $functionName is not cacheable)
         */
        public static function getCacheTime( $functionName ) {
            return parent::getCacheTime( $functionName );
        }

    }

}
