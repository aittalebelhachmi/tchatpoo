<?php
    // namespace Models;

    class Message {
        private $id;
        private $message;
        private $reciever;
        private $sender;
        private $date;

        public function __construct() {
            
        }

        public function getId()
        {
            return $this->id;
        }
    
        public function getMessage()
        {
            return $this->message;
        }
    
        public function setMessage($message)
        {
            $this->message = $message;
        }
    
        public function getReciever()
        {
            return $this->reciever;
        }
    
        public function setReciever($reciever)
        {
            $this->reciever = $reciever;
        }
    
        public function getSender()
        {
            return $this->sender;
        }
    
        public function setSender($sender)
        {
            $this->sender = $sender;
        }

        public function getDate()
        {
            return $this->date;
        }
    
        public function setDate($date)
        {
            $this->date = $date;
        }

        public static function sendMessage($tab){
           
            $sql = "INSERT INTO messages(sender,receiver,message,date) VALUES(:sender,:receiver,:message,NOW())";
            $req = $db->prepare($sql);
            $req->execute($i);
        }
    }
