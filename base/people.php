<?php
    class People{
        protected $name = array('name','age','sex');
        public function getname(){
            $na = $this->name;
            return $na;
        }
        public function geta(){
            $p = new self();
            $na = $p->name;
            return $na;
        }
    }
?>