<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'ecf-v-parrot-59b9dd8ce789.herokuapp.com',
    // 'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

session_regenerate_id(true);

if (isset($_SESSION["userID"])) {
    if (!isset($_SESSION['last_regeneration'])) {
        regenerate_session_id_loggedin();
    } else {
        $interval = 60 * 30;

        if (time() - $_SESSION['last_regeneration'] >= $interval) {
            regenerate_session_id_loggedin();
        }
    }

} else {

    if (!isset($_SESSION['last_regeneration'])) {
        regenerate_session_id();
    } else {
        $interval = 60 * 30;

        if (time() - $_SESSION['last_regeneration'] >= $interval) {
            regenerate_session_id();
        }
    }
}

function regenerate_session_id_loggedin() {
    session_regenerate_id(true);

    $userId = $_SESSION["userID"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);

    $_SESSION['last regeneration'] = time();
}

function regenerate_session_id() {
    session_regenerate_id(true);
    $_SESSION['last regeneration'] = time();
}

// Contact
return [
    'mail' => [
        'to_email' => 'vincent.parrot@xxx.com'
    ]
];