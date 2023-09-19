<?php
require_once("../PhpConnections/Constant.php");

class EncryptDecrypt {
    private static $encryptionKey = SECRET_KEY; // Replace with a strong, secret key
    
    public static function encrypt($params) {
        // Encode the parameters as JSON
        $jsonParams = json_encode($params);
        
        // Encryption
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($jsonParams, 'aes-256-cbc', self::$encryptionKey, 0, $iv);
        
        // Encode the encrypted data for safe inclusion in the URL
        $encodedEncrypted = urlencode(base64_encode($encrypted));
        return $encodedEncrypted;
    }
    
    public static function decrypt($encryptedData, $iv) {
        // Decode and decrypt the data
        $encodedEncrypted = urldecode($encryptedData);
        $encrypted = base64_decode($encodedEncrypted);
        
        // Ensure that the same secret key is used here as in the encrypt method
        $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', self::$encryptionKey, 0, $iv);
        
        // Parse the decrypted data as JSON
        $decryptedParams = json_decode($decrypted, true);
        
        // Check if JSON decoding was successful
        if ($decryptedParams !== null) {
            return $decryptedParams;
        } else {
            // Handle the case where JSON decoding failed
            return null;
        }
    }
}

$subject_id = 13; // Replace with the actual student ID
$class_id = 8;   // Replace with the actual class ID

$params = [
    'subject_id' => $subject_id,
    'class_id' => $class_id,
];

$encryptedData = EncryptDecrypt::encrypt($params);
echo "Encrypted Data: $encryptedData";

// Simulate the retrieval of the IV (this should be saved along with the encrypted data)
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

$decryptedParams = EncryptDecrypt::decrypt($encryptedData, $iv);
print_r($decryptedParams);

if ($decryptedParams !== null && isset($decryptedParams['subject_id']) && isset($decryptedParams['class_id'])) {
    $subject_id = $decryptedParams['subject_id'];
    $class_id = $decryptedParams['class_id'];

    echo "Decrypted Data:<br>";
    print_r($decryptedParams);

    echo "<br>subject_id: $subject_id <br /> class_id: $class_id";
} else {
    echo "Error: Unable to retrieve subject ID and class ID";
    print_r($decryptedParams);
}
