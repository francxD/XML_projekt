<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $xml = simplexml_load_file('users.xml');
    $login_success = false;
    $logged_in_user = "";

    foreach ($xml->user as $user) {
        if ($user->username == $username && $user->password == $password) {
            $login_success = true;
            $logged_in_user = $username;
            break;
        }
    }

    if ($login_success) {
        echo "Uspješno ste prijavljeni kao korisnik: " . htmlspecialchars($logged_in_user);
    } else {
        echo "Neispravno korisničko ime ili lozinka. Pokušajte ponovo.";
    }
}
?>