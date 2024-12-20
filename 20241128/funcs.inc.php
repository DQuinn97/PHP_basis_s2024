<?php
function requiredLoggedIn()
{
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit;
    }
}
function requiredLoggedOut()
{
    if (isLoggedIn()) {
        header("Location: index.php");
        exit;
    }
}

function isLoggedIn(): bool
{
    session_start();

    $loggedin = FALSE;

    if (isset($_SESSION['loggedin'])) {
        if ($_SESSION['loggedin'] > time()) {
            $loggedin = TRUE;
            logIn($_SESSION['userId']);
        }
    }

    return $loggedin;
}

function logIn($uId)
{
    // session_start();
    $_SESSION['userId'] = $uId;
    $_SESSION['loggedin'] = time() + 3600;
}

function showMessages()
{
    if (isset($_SESSION['messages'])):
        foreach ($_SESSION['messages'] as $message):
            echo '<div class="alert text-white bg-primary" role="alert">
                ' . $message['content'] . '<div class="alert-text"></div>
             </div>';
        endforeach;
        unset($_SESSION['messages']);
    endif;
}
