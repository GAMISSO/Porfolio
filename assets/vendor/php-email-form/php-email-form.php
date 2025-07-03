<?php
class PHP_Email_Form {
    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $ajax = false;
    private $messages = [];

    public function add_message($content, $label, $min_length = 0) {
        if(strlen($content) >= $min_length) {
            $this->messages[] = "$label: $content";
        }
    }

    public function send() {
        $headers = "From: {$this->from_name} <{$this->from_email}>\r\n";
        $body = implode("\n", $this->messages);
        if(mail($this->to, $this->subject, $body, $headers)) {
            return 'Message envoyé avec succès !';
        } else {
            return 'Erreur lors de l\'envoi du message.';
        }
    }
}