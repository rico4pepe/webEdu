<?php
        class ValidateMail{
            public function checkmail($email){
                $pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/';
    
                // Use preg_match to perform the validation
                if (preg_match($pattern, $email)) {
                    return true; // It's a valid email
                } else {
                    return false; // It's not a valid email
                }
            }
        }

?>