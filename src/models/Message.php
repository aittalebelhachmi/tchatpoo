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

        public function getId(): ?int
        {
            return $this->id;
        }
    
        public function getMessage(): ?string
        {
            return $this->message;
        }
    
        public function setMessage(string $message): self
        {
            $this->message = $message;
    
            return $this;
        }
    
        public function getReciever(): ?string
        {
            return $this->reciever;
        }
    
        public function setReciever(string $reciever): self
        {
            $this->reciever = $reciever;
    
            return $this;
        }
    
        public function getSender(): ?string
        {
            return $this->sender;
        }
    
        public function setSender(string $sender): self
        {
            $this->sender = $sender;
    
            return $this;
        }

        public function getDate(): ?date
        {
            return $this->date;
        }
    
        public function setDate(date $date): self
        {
            $this->date = $date;
    
            return $this;
        }

        public static function sendMessage($tab){
           
            $sql = "INSERT INTO messages(sender,receiver,message,date) VALUES(:sender,:receiver,:message,NOW())";
            $req = $db->prepare($sql);
            $req->execute($i);
        }


        


    }
