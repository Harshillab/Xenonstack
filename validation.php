<?php
$number= $_POST['number'];

      function validatecard($number)
      {
          global $type;

          $cardtype = array(
              "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
              "mastercard" => "/^5[1-5][0-9]{14}$/",
              "amex"       => "/^3[47][0-9]{13}$/",
              "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
          );

          if (preg_match($cardtype['visa'],$number))
          {
        $type= "visa";
              return 'visa';
        
          }
          else if (preg_match($cardtype['mastercard'],$number))
          {
        $type= "mastercard";
              return 'mastercard';
          }
          else if (preg_match($cardtype['amex'],$number))
          {
              $type= "amex";
              return 'amex';
        
          }
          else if (preg_match($cardtype['discover'],$number))
          {
        $type= "discover";
              return 'discover';
          }
          else
          {
              return false;
          } 
      }

      validatecard($number);
      if (validatecard($number) !== false)
      {
      echo "$type detected. credit card number is valid";
      }
      else
      {
      echo " This credit card number is invalid.Try Again";
      header('Location: checkout.php'); die;
      
      }


      $simple_string = $number; 
        
      // Display the original string 
      // echo "Original String: " . $simple_string; 
        
      // Store the cipher method 
      $ciphering = "AES-128-CTR"; 
        
      // Use OpenSSl Encryption method 
      $iv_length = openssl_cipher_iv_length($ciphering); 
      $options = 0; 
        
      // Non-NULL Initialization Vector for encryption 
      $encryption_iv = '1234567891011121'; 
        
      // Store the encryption key 
      $encryption_key = $number; 
        
      // Use openssl_encrypt() function to encrypt the data 
      $encryption = openssl_encrypt($simple_string, $ciphering, 
                  $encryption_key, $options, $encryption_iv); 

      if(preg_match('/^[0-9]{3}$/', $cvv))
      {
        echo "valid";
      }else{
        echo "invalid";
        header('Location:checkout.php');
        die;
      }

?>