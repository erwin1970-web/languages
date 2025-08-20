<?php

session_start();
if (isset($_GET['lang'])) {
  $language = preg_replace('/[^a-z]/i', '', $_GET['lang']);
  setcookie('lang', $language, time()+60*60*24*365, '/');
} else {
  $language = $_COOKIE['lang'] ?? 'nl';
}


declare(strict_types=1);

function t(string $key, string $fallback = ''): string {
  global $dict;
  if (!isset($dict[$key])) {
    error_log("Missing i18n key: $key");
  }
  return $dict[$key] ?? $fallback;
}


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

  
// index.php (in <main>)
<section id="flashcards" class="cards"></section>
<script>
document.addEventListener('DOMContentLoaded', async () => {
  const lang = new URLSearchParams(location.search).get('lang') || 'nl';
  // Later: fetch(`/api/words?lang=${lang}`)
  // voorlopig demo:
  const words = [{q:'hallo',a:'hello'},{q:'dank je',a:'thank you'}];
  const root = document.querySelector('#flashcards');
  root.innerHTML = words.map(w=>`<div class="card"><b>${w.q}</b><div>${w.a}</div></div>`).join('');
});
</script>
 
</main>

<?php include __DIR__ . '/views/footer.php';
