<?php $active = $language ?? 'nl'; ?>
<a href="?lang=nl" class="<?= $active==='nl'?'active':'' ?>">NL</a> |
<a href="?lang=en" class="<?= $active==='en'?'active':'' ?>">EN</a>

<!doctype html>
<html lang="<?= htmlspecialchars($language ?? 'nl') ?>">
  <head>
    <meta name="description" content="<?= htmlspecialchars(t('subtitle','Leer woorden met flashcards')) ?>">
    <link rel="canonical" href="<?= 'https://' . $_SERVER['HTTP_HOST'] . strtok($_SERVER['REQUEST_URI'],'?') ?>">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= htmlspecialchars(t('title', 'Taaltrainer')) ?></title>
    <!-- Gebruik relatieve paden, dus zonder leading slash -->
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <header class="site-header">
      <nav class="nav">
        <!-- Ook hier: geen leading slash, dan blijft hij netjes binnen /languages/ -->
        <a href="?lang=nl"><?= htmlspecialchars(t('language.nl', 'Nederlands')) ?></a>
        <span> | </span>
        <a href="?lang=en"><?= htmlspecialchars(t('language.en', 'English')) ?></a>
      </nav>
    </header>

