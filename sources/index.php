<?php
// Allow error messages in development mode
if (getenv("APPLICATION_MODE") == "dev") {
    $isDebug = true;
    ini_set("display_errors", true);
    error_reporting(E_ERROR || E_WARNING);
} else {
    $isDebug = false;
}
// Registering the composer autoload files
try {
    $autoloadPath = './vendor/autoload.php';
    if (file_exists($autoloadPath)) {
        require_once './vendor/autoload.php';
    } else {
        throw new \Exception("The required dependencies are not installed with 'composer update'");
    }
} catch(Exception $exception) {
    echo $exception->getMessage();
    die;
}
// Load the smarty template engine
$templatePath = realpath(__DIR__."/app/templates");
$loader = new \Twig\Loader\FilesystemLoader($templatePath);
$twig = new \Twig\Environment($loader, [
    'debug' => $isDebug,
]);
// Load account details
session_set_cookie_params(strtotime('+1 minutes', 0));
session_start();
if (!isset($_SESSION["accountDetails"])) {
    $accountDetails = new \FinTSInfo\AccountDetails();
    $_SESSION["accountDetails"] = $accountDetails;
} else {
    $accountDetails = $_SESSION["accountDetails"];
}

// Render the page
echo $twig->render("index.html.twig", [
    "application" => [
        "name" => getenv("APPLICATION_NAME")
    ],
    "account" => [
        "balance" => $accountDetails->accountBalance,
        "transactions" => $accountDetails->transactions
    ]
]);