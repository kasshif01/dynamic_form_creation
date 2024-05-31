<?php
namespace Src;

class EmailSender {
    private $to;
    private $subject;
    private $message;
    private $headers;

    public function __construct($to, $subject, $message, $headers = '') {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $this->headers = $headers;
    }

    /**
     * @return bool|void
     */
    public function send() {
        if ($this->to === null) return false;
        ini_set('display_errors', 0); // disable error reporting
        if (mail($this->to, $this->subject, $this->message, $this->headers)){
            return true;
        }
    }

}
