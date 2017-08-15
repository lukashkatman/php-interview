<?php

/**
 * Created by PhpStorm.
 * User: Tim de Wit (Pixels)
 * Date: 4/11/2017
 * Time: 7:45 AM
 */
namespace util;
class Model
{

    /*
     * Please analyze the function tableName
     * What does it do?
     * What will the output be if called from a class that extends this class?
     *
     * PS. No cheating ;)
     */
				//CustomerModel = _customer_model
    public function tableName() {
        $fullClassName = get_class();
        $pieces = explode('\\', $fullClassName);
        $className = $pieces[count($pieces) - 1];
        $result = '';
        for($i = 0; $i < strlen($className); $i++) {
            $char = $className[$i];
            if(ctype_upper($char)) {
                if($i == 0) {
                    $result .= strtolower($char);
                    continue;
                }
                else {
                    $result .= '_' . strtolower($char);
                    continue;
                }
            }

            $result .= $char;
        }

        return $result;
    }


    /*
     * Is this function finished?
     * What does it return?
     * What should it return?
     * Why would it not work properly with PDO?
     */
    public function find($db, $fields = [], $conditions = []) {
        if($db instanceof Database)
            $db = $db->handle();

        if($db instanceof \PDO)
            throw new \Exception('$db is not of type PDO or Database');

        $selection = '*';
        if(count($fields)) {
            $selection = '';
            foreach ($fields as $field) {
                $selection .=  $field . ', ';
				
				
            }
		//	return $selection;
            $selection = substr($selection, 0, strlen($selection) - 2);
			//return $selection;
        }

        $query = 'SELECT ' . $selection . ' FROM ' . $this->tableName();
       // return $query;
        $condition_str = '';
        if(count($conditions)) {
            $condition_str = ' ';
            foreach ($conditions as $key => $condition) {
                if(!is_array($condition))
                    continue;
                $condition_str .= $key . ' ';
                return $condition_str;
                foreach ($condition as $sub_key => $sub_condition) {
                    $condition_str .= $sub_key . '=' . (is_string($sub_condition) ? '"' . $sub_condition . '"' : $sub_condition) . ' AND ';
                }
            }
            $condition_str = substr($condition_str, 0, strlen($condition_str) - 5);
        }

        return $query . $condition_str . ';';

    }

}