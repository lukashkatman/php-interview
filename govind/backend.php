<?php
/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 8/12/2017
 * Time: 12:38 PM
 */
 require_once 'core/init.php';
$information = new Information();

if (Input::exists()) {
   if(Token::check(Input::get("token"))){
    $validate = new Validate();
    $validate = $validate->check($_POST, array(
        'name' => array(
            'required' => true,
            'min' => 2,
            'max' => 20,
            'realname' =>true,
         
        ),    
      
        'email' => array(
            'required' => true,            
            'max' => 30
        ),
        'contact' => array(
            'required' => true,
            'min'=>7,
            'max'=>14,       
            'phone'=> true
        ),
       
        
    ));
if ($validate->passed()) {
        // insert information
   
   
    try {
        $information->create(array(
            'name' =>  Input::get('name'),
            'email' => Input::get('email'),
            'contact' => Input::get('contact')
                       
        ));
		echo"<tr><td>".Input::get('name')."</td><td>".Input::get('email')."</td><td>".Input::get('contact')."</td></tr>";
    } catch (Exception $e) {
       echo json_encode ($e->getMessage());
    }
    
    } else {
      
     $errors = $validate->errors();
	echo json_encode($errors);
       
    }
  } 
}