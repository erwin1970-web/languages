<?php
declare(strict_types=1);

function loadDict(string $lang): array {
  $path = __DIR__ . "/lang/$lang.json";
  if (!preg_match('/^[a-z]{2}$/i', $lang)) $lang = 'nl';
  if (!file_exists($path)) $path = __DIR__ . "/lang/nl.json";
  $json = file_get_contents($path);
  return json_decode($json ?: "{}", true) ?: [];
}

$language = $_GET['lang'] ?? 'nl';
$dict = loadDict($language);

function t(string $key, string $fallback = ''): string {
  global $dict;
  return isset($dict[$key]) ? (string)$dict[$key] : $fallback;
}

include __DIR__ . '/views/header.php';
?>
<main class="container">
  <h1><?= htmlspecialchars(t('title', 'Taaltrainer')) ?></h1>
  <p class="subtitle"><?= htmlspecialchars(t('subtitle', 'Leer woorden met flashcards')) ?></p>

  <section class="intro">
    <p><?= htmlspecialchars(t('intro', 'Welkom!')) ?></p>
  </section>
</main>
<?php include __DIR__ . '/views/footer.php';
