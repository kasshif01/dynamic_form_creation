<?php

namespace Src;

class FormController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Fetch all Forms
     * @return void
     */
    public function getAllForms(){
        return $this->db->fetchAll('forms');
    }

    /**
     * Display the list of the forms
     * @return void
     */
    public function renderFormsList(){
        $forms = $this->getAllForms();
        $data = [
            'forms' => $forms
        ];
        $this->views('forms_listing', $data);
    }

    /**
     * Load the form
     * @return void
     */
    public function loadForm(){
        if(@$_GET['form_id']){
            $form = $this->db->fetchRow('forms', ['id' => $_GET['form_id']]);
            if($form){
                $data = [
                    'form' => $form
                ];
                $this->views('form', $data);
            }else{
                echo "Requested form does not exist.";
            }
        }
    }

    /**
     * Call Internal API to save the data
     * @return void
     */
    public function saveForm(){
        $post = $_POST;
        if(!isset($post['captcha']) || @$post['captcha'] != 7){
            echo json_encode(["status" => 400, 'errors' => ["captcha" => ['captcha' => 'Incorrect captcha answer.']]]);
            die;
        }
        unset($post['captcha']);
        $response = InternalApi::send('/api/save-form', 'POST', $post);
        if($response['status'] === 200){
            $this->sendMail($post);
        }
        echo json_encode($response);
    }

    /**
     * @param $data
     * @return void
     */
    private function sendMail($data){
        $to = 'example@newrich.com';
        $subject = 'Dynamic Form Creation';
        $body = $this->getMailBody($data);
        $headers = 'From: kasshif01@gmail.com';
        $emailSender = new EmailSender($to, $subject, $body, $headers);
        $emailSender->send();
    }

    /**
     * Get Form by id
     * @param $form_id
     * @return array|false
     */
    private function getMailBody($post){
        $form = $this->db->fetchRow('forms', ['id'=>$post['form_id']], 'fields');
        $fields = !empty($form['fields']) ? unserialize($form['fields']) : "";
        $email_fields = [];
        if(!empty($fields)){
            foreach ($fields as $field){
                if(@$field['isEmailField']){
                    $email_fields[] = $field['name'];
                }
            }
        }
        $data = [
            'data' => $post,
            'fields' => $email_fields
        ];
        return $this->views('mail_template', $data, true);
    }


    public function createForm(){
        $payload = array(
            "form_name" => "Contact Form 4",
            "fields" => array(
                array(
                    "type" => "input",
                    "name" => "first_name",
                    "isEmailField" => true
                ),
                array(
                    "type" => "input",
                    "name" => "email",
                    "isEmailField" => true
                ),
                array(
                    "type" => "textarea",
                    "name" => "message",
                    "isEmailField" => true
                ),
                array(
                    "type" => "select",
                    "name" => "country",
                    "options" => array("USA", "Canada"),
                    "isEmailField" => true
                ),
                array(
                    "type" => "radio",
                    "name" => "gender",
                    "options" => array("Male", "Female"),
                    "isEmailField" => false
                ),
                array(
                    "type" => "checkbox",
                    "name" => "interest",
                    "options" => array("Reading", "Traveling", "Cooking", "Sports"),
                    "isEmailField" => false
                )
            ),
            "validation_rules" => array(
                "first_name" => array(
                    "required" => true
                ),
                "email" => array(
                    "required" => true,
                    "email" => true
                ),
                "country" => array(
                    "required" => true
                ),
                "gender" => array(
                    "required" => true
                ),
                "interest" => array(
                    "required" => true
                )
            )
        );
        InternalApi::send('/api/create-form', 'POST', $payload);
        echo "Form has been created.";
    }

}