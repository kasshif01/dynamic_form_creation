<?php

namespace Src\Api;


use Src\BaseController;

class Forms extends BaseController {


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Save the dynamic form configuration to the database.
     * @return void
     */
    public function createForms(){
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = json_decode(file_get_contents('php://input'), true);
            if(!empty($post['fields'])){
                $data = [
                    'form_name' => @$post['form_name'] ?? "",
                    'fields' => isset($post['fields']) ? serialize($post['fields']) : "",
                    'validation_rules' => isset($post['validation_rules']) ? serialize($post['validation_rules']) : "",
                ];
                $this->db->insert('forms', $data);
                echo json_encode(['status' => 200, 'message' => "Form has been saved successfully!"]);
            }else{
                echo json_encode(['status'=>400, 'message' => "Fields are missing."]);
            }
        }else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Content-Type: application/json');
            echo json_encode(['status'=>401, 'message' => 'Method Not Allowed']);
        }
    }

    /**
     * Save the form entires
     * @return void
     */
    public function saveForms(){
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post =  json_decode(file_get_contents('php://input'), true);
            if(@$post['form_id']){
                $errors = $this->validateForm($post);
                if(empty($errors)){
                     $data = [
                       'form_id' => $post['form_id'],
                       'fields'  => serialize($post),
                       'created_at' => date('Y-m-d h:i:s')
                     ];
                    $this->db->insert('entries', $data);
                    echo json_encode(['status' => 200, 'message' => "Form has been saved successfully!"]);
                }else{
                    echo json_encode(['status' => 400, 'errors'=>$errors, 'message' => "Something went wrong."]);
                }
            }
        }else{
            header('HTTP/1.1 405 Method Not Allowed');
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Method Not Allowed']);
        }
    }

    /**
     * validate form
     * @param $data
     * @return array
     */
    private function validateForm($data){
        $form = $this->getFormById($data['form_id']);
        $validation_rules = !empty($form['validation_rules']) ? unserialize($form['validation_rules']) : "";
        $error = [];
        if(!empty($validation_rules)){
            foreach ($validation_rules as $index => $rules){
                foreach ($rules as $key => $rule){
                    if($rule){
                        switch (strtolower($key)){
                            case "required":
                                if(!isset($data[$index]) || $data[$index] === ''){
                                    $error[$index][$key] = "This Field is required";
                                }
                                break;
                            case "email":
                                if(isset($data[$index]) && !filter_var($data[$index], FILTER_VALIDATE_EMAIL)){
                                    $error[$index][$key] = "Please enter a valid email address.";
                                }
                                break;
                        }
                    }
                }
            }
        }
        return $error;
    }


    /**
     * Get Form by id
     * @param $form_id
     * @return array|false
     */
    private function getFormById($form_id){
        return $this->db->fetchRow('forms', ['id'=>$form_id]);
    }


}