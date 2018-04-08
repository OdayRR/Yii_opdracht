<?php
namespace app\models;

use yii\db\ActiveRecord;

class Posts extends ActiveRecord 
{
    
    private $service_name;
    private $problem_Description;
    private $client_name;
    private $client_number;
   


    public function rules() {
        
        return [

            [['service_name', 'problem_Description','client_name','client_number'], 'required'],
       
        ];
    }
}





