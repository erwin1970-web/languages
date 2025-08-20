<?php
// Entry point for Polish flashcards
$title = "Poolse Flashcards";
$configFile = "../js/EN_PL_config.js"; // language-specific config


// Include your site's header
include 'head.php';


// Inject main view (no <html> shell here, we reuse your head/footer)
include __DIR__ . '/../views/flashcards.php';


// Include your site's footer
include 'footer.php';