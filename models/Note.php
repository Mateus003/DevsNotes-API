<?php

    //namespace models\Notes;

    class Notes{
        private string $title;
        private string $body;
        private int $id;

        public function getTitle(){
            return $this->title;
        }

        public function getBody(){
            return $this->body;
        }

        public function getId(){
            return $this->id;
        }

        public function setTitle(string $t){
            $this->title = $t;
        }

        public function setBody(string $b){
            $this->body = $b;
        }

        public function setId(int $id){
            $this->id = $id;
        }

      
    }
?>