<?php
	
    class Muter {
        
        public $friendly_langs = array('en','en-gb');
        public $muteMe = false;
        public $returnString = '';
        
           function __construct($user) {
               $this->user = $user;
           }
           
           function lang() {
                if (!in_array($this->user->lang, $this->friendly_langs)) $this->muteMe = true; 
                return $this;
           }
           
           function background() {
                if ( strlen($this->user->profile_banner_url) == 0 )   $this->muteMe = true;  
                return $this;
           }
           
           function name() {
                if (!$user->name) $this->muteMe = true; 
                return $this;
           }
           
           function showBad() {
                if ($this->muteMe == true) $this->returnString = "<P><strong><a href=https://twitter.com/" . $this->user->screen_name . " target='_blank' style='color:red;'>@" . $this->user->screen_name . "</a></strong> <ul style='color:red;'><li> <strong>Name</strong>: " . $this->user->name . "</li><li><strong>Lang</strong>: " . $this->user->lang . "</li><li><strong>BG</strong>: " . $this->user->profile_banner_url. "</li></ul>";
                return $this;
           }
           
           function showGood() {
                if ($this->muteMe == false) $this->returnString = "<P><strong><a href=https://twitter.com/" . $this->user->screen_name . " target='_blank'>@" . $this->user->screen_name . "</a></strong> <ul><li> <strong>Name</strong>: " . $this->user->name . "</li><li><strong>Lang</strong>: " . $this->user->lang . "</li><li><strong>BG</strong>: " . $this->user->profile_banner_url. "</li></ul>";
                return $this;
           }
     }
    
?>