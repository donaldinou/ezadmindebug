<?php
namespace extension\ezadmindebug\autoloads {
    
    /**
     * @brief Class operator to manage functions in template
     * @details Class operator to manage functions in template
     * 
     * @author Adrien Loyant <adrien.loyant@te-laval.fr>
     * 
     * @date 2012-11-01
     * @version 1.0.0
     * @since 1.0.0
	 * @copyright GNU Public License v.2
     * 
     * extension\magez\autoloads
     */
    class eZAdminDebugTemplateOperators {
        
        /**
         * @brief The operators
         * @details The internal operators template
         *
         * @var array
         */
        protected $Operators;
        
        /**
         * @brief Return the operators names
         * @details Return the operators names
         *
         * @return array
         */
        public static function operators() {
            return array(
                            'todo',
            );
        }
        
        /**
         * @brief Constructor
         * @details The constructor for the operator
         *
         * @return void
         */
        public function __construct() {
            $this->Operators = static::operators();
        }
        
        /**
         * @brief Return an array with the template operator name.
         * @details Return an array with the template operator name.
         *
         * @return array
         */
        public function operatorList() {
            return $this->Operators;
        }
        
        /**
         * @brief Return true to tell the template engine that the parameter list exists per operator type
         * @details Return true to tell the template engine that the parameter list exists per operator type,
         * this is needed for operator classes that have multiple operators.
         *
         * @return boolean
         */
        public function namedParameterPerOperator() {
            return true;
        }
        
        /**
         * @brief Returns an array of named parameters, this allows for easier retrieval of operator parameters.
         * @details Returns an array of named parameters, this allows for easier retrieval of operator parameters.
         * @see \eZTemplateOperator::namedParameterList
         *
         * @return multitype:multitype:multitype:string boolean number  multitype:string boolean
         */
        public function namedParameterList() {
            return array(
                            'todo' => array(
                            ),
            );
        }
        
        /**
         * @brief Executes the PHP function for the operator cleanup and modifies \a $operatorValue
         * @details Executes the PHP function for the operator cleanup and modifies \a $operatorValue
         *
         * @param mixed $tpl
         * @param mixed $operatorName
         * @param mixed $operatorParameters
         * @param mixed $rootNamespace
         * @param mixed $currentNamespace
         * @param mixed $operatorValue This args is passed by reference
         * @param array $namedParameters
         * @param mixed $placement
         *
         * @return void
         */
        public function modify( $tpl, $operatorName, $operatorParameters, $rootNamespace, $currentNamespace, &$operatorValue, $namedParameters, $placement ) {
            switch ($operatorName) {
                case 'todo':
                    $operatorValue = $this->todo(  );
                    break;
                
                default:
                    // Nothing
                    break;
            }
        }
        
        /**
         * @brief 
         * @details 
         * 
         * @return string
         */
        public function todo(  ) {
            $result = '/';
            return $result;
        }
        
    }
    
}
?>