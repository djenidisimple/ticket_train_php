<?php
class Controller
{
   /**
    * Load a model file.
    * @param string $model The name of the model file to load (without the .php extension).
    * @return object An instance of the loaded model class.
    */ 
   public function model($model)
   {
       require_once '../app/Models/' . $model . '.php';
       return new $model();
   }    
   /**
    * Load a view file.
    * @param string $view The name of the view file to load (without the .php extension).
    * @param array $data An associative array of data to pass to the view. example : ['title' => 'Welcome']
    * @return void
    */
   public function view($view, $data = []):void
   {
        $data = $data;
       if (file_exists('../app/Views/' . $view . '.php')) {
           require_once '../app/Views/' . $view . '.php';
       } else {
           die('View does not exist');
       }
   }
}