<html>
  <head>
    <title>PK decrypter</title>
  </head>
  <body>
	  <H1>Private Key Decrypter</H1>
	  <H3> VERY INSECURE - Don't Use </H3></br>
Paste everything between and including</br>
-----BEGIN ENCRYPTED PRIVATE KEY-----
and</br>
-----END ENCRYPTED PRIVATE KEY-----</br>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pem = $_POST['pem'];
    $passcode = $_POST['passcode'];

    // Decrypt the private key
    $private_key = openssl_get_privatekey($pem, $passcode);

    // Export the decrypted private key in PEM format
    openssl_pkey_export($private_key, $decrypted_pem);

    // Display the decrypted private key in PEM format
    echo "<pre>$decrypted_pem</pre>";
}
?>

<form method="post">
    <label for="pem">Private Key in PEM format:</label><br>
    <textarea id="pem" name="pem" rows="10" cols="50"></textarea><br>
    <label for="passcode">Passcode:</label><br>
    <input type="password" id="passcode" name="passcode"><br>
    <input type="submit" value="Submit">
</form>
  </body>
</html>
