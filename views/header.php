<!doctype html>
<html lang="<?= htmlspecialchars($language ?? 'nl') ?>">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= htmlspecialchars(t('title', 'Taaltrainer')) ?></title>
    <link rel="stylesheet" href="/css/styles.css" />
  </head>
  <body>
    <header class="site-header">
      <nav class="nav">
        <a href="/?lang=nl"><?= htmlspecialchars(t('language.nl', 'Nederlands')) ?></a>
        <span> | </span>
        <a href="/?lang=en"><?= htmlspecialchars(t('language.en', 'English')) ?></a>
      </nav>
    </header>
