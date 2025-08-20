<?php include_once __DIR__ . '/../lang/Polish.php'; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Poolse Flashcards</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-4">
    <h1 class="text-center mb-4">Poolse Flashcards</h1>

    <!-- Kaart -->
    <div class="card shadow-lg">
        <div class="card-body text-center">
            <div id="wordDisplay" class="fw-bold"></div>
        </div>
    </div>

    <!-- Navigatie knoppen -->
    <div class="d-flex justify-content-center gap-3 mt-3">
        <button class="btn btn-secondary" onclick="previousWord()">⏮ Vorige</button>
        <button class="btn btn-primary" onclick="toggleTranslation()">🔄 Vertaling</button>
        <button class="btn btn-secondary" onclick="nextWord()">⏭ Volgende</button>
    </div>

    <!-- Autoplay knoppen -->
    <div class="d-flex justify-content-center gap-3 mt-3">
        <button class="btn btn-success" onclick="startAutoplay()">▶ Start Autoplay</button>
        <button class="btn btn-danger" onclick="stopAutoplay()">⏹ Stop Autoplay</button>
    </div>

    <!-- Instellingen knop -->
    <div class="text-center mt-4">
        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#settingsModal">⚙ Instellingen</button>
    </div>
</div>


<!-- Modal Instellingen -->
<div class="modal fade" id="settingsModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content rounded-3 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Instellingen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">

        <div class="settings-grid">
          <!-- Categorie / Subcategorie -->
          <div class="settings-pair">
            <div>
              <label for="categorySelect" class="form-label">Categorie</label>
              <select id="categorySelect" class="form-select"></select>
            </div>
            <div>
              <label for="subcategorySelect" class="form-label">Subcategorie</label>
              <select id="subcategorySelect" class="form-select"></select>
            </div>
          </div>

          <!-- Speed / Pause -->
          <div class="settings-pair">
            <div>
              <label for="speedRate" class="form-label">Snelheid</label>
              <input type="number" id="speedRate" class="form-control" min="0.5" max="2" step="0.1" value="1">
            </div>
            <div>
              <label for="pauseDuration" class="form-label">Pauze (seconden)</label>
              <input type="number" id="pauseDuration" class="form-control" min="0.5" max="5" step="0.5" value="1.5">
            </div>
          </div>

          <!-- Stemmen -->
          <div class="settings-pair">
            <div>
              <label for="voiceSelectEN" class="form-label">Engelse stem</label>
              <select id="voiceSelectEN" class="form-select"></select>
            </div>
            <div>
              <label for="voiceSelectPL" class="form-label">Poolse stem</label>
              <select id="voiceSelectPL" class="form-select"></select>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Sluiten</button>
      </div>
    </div>
  </div>
</div>

<script src="../js/EN_PL_config.js"></script>
<script src="../js/general_script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
