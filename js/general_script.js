let currentWordIndex = 0;
let showingTranslation = false;
let voices = { en: null, pl: null };
let isAutoplaying = false;
let autoplayTimer = null;

let currentSpeechRate = 1;
let currentPauseDuration = 1.5;

const synth = window.speechSynthesis;

// Initialisatie
window.speechSynthesis.onvoiceschanged = populateVoices;
window.addEventListener("DOMContentLoaded", () => {
    loadCategoryOptions();
    attachSettingsListeners();
    showWord();
});

function loadCategoryOptions() {
    const categorySelect = document.getElementById("categorySelect");
    categorySelect.innerHTML = "<option value='default'>Standaard</option>";
    // TODO: dynamisch vullen met echte categorieën
}

function showWord() {
    const wordDisplay = document.getElementById("wordDisplay");
    const wordPair = APP_CONFIG.defaultWordList[currentWordIndex];
    wordDisplay.textContent = showingTranslation ? wordPair.pl : wordPair.en;
}

function toggleTranslation() {
    showingTranslation = !showingTranslation;
    showWord();
}

function previousWord() {
    if (currentWordIndex > 0) {
        currentWordIndex--;
        showingTranslation = false;
        showWord();
    }
}

function nextWord() {
    if (currentWordIndex < APP_CONFIG.defaultWordList.length - 1) {
        currentWordIndex++;
        showingTranslation = false;
        showWord();
    }
}

// --- Spreken ---
function speak(text, voice, langFallback) {
    return new Promise((resolve, reject) => {
        const utt = new SpeechSynthesisUtterance(text);
        if (voice) utt.voice = voice;
        else utt.lang = langFallback;

        utt.rate = currentSpeechRate;
        utt.onend = resolve;
        utt.onerror = reject;

        synth.speak(utt);
    });
}

function populateVoices() {
    const availableVoices = synth.getVoices();
    const voiceSelectEN = document.getElementById("voiceSelectEN");
    const voiceSelectPL = document.getElementById("voiceSelectPL");

    voiceSelectEN.innerHTML = "";
    voiceSelectPL.innerHTML = "";

    availableVoices.forEach(voice => {
        if (voice.lang.startsWith("en")) {
            let opt = new Option(voice.name, voice.name);
            voiceSelectEN.add(opt);
        }
        if (voice.lang.startsWith("pl")) {
            let opt = new Option(voice.name, voice.name);
            voiceSelectPL.add(opt);
        }
    });

    voiceSelectEN.addEventListener("change", () => {
        voices.en = availableVoices.find(v => v.name === voiceSelectEN.value);
    });
    voiceSelectPL.addEventListener("change", () => {
        voices.pl = availableVoices.find(v => v.name === voiceSelectPL.value);
    });

    if (voiceSelectEN.options.length > 0) {
        voiceSelectEN.selectedIndex = 0;
        voices.en = availableVoices.find(v => v.name === voiceSelectEN.value);
    }
    if (voiceSelectPL.options.length > 0) {
        voiceSelectPL.selectedIndex = 0;
        voices.pl = availableVoices.find(v => v.name === voiceSelectPL.value);
    }
}

// --- Settings koppelen ---
function attachSettingsListeners() {
    const speedInput = document.getElementById("speedRate");
    const pauseInput = document.getElementById("pauseDuration");

    if (speedInput) {
        currentSpeechRate = parseFloat(speedInput.value) || 1;
        speedInput.addEventListener("input", () => {
            currentSpeechRate = parseFloat(speedInput.value) || 1;
        });
    }
    if (pauseInput) {
        currentPauseDuration = parseFloat(pauseInput.value) || 1.5;
        pauseInput.addEventListener("input", () => {
            currentPauseDuration = parseFloat(pauseInput.value) || 1.5;
        });
    }
}

// --- Autoplay ---
async function startAutoplay() {
    if (isAutoplaying) return;
    isAutoplaying = true;

    while (isAutoplaying && currentWordIndex < APP_CONFIG.defaultWordList.length) {
        const wordPair = APP_CONFIG.defaultWordList[currentWordIndex];

        // Eerst Engels
        await speak(wordPair.en, voices.en, "en-US");
        await wait(currentPauseDuration * 1000);

        // Dan Pools
        await speak(wordPair.pl, voices.pl, "pl-PL");
        await wait(currentPauseDuration * 1000);

        nextWord();
    }
}

function stopAutoplay() {
    isAutoplaying = false;
    synth.cancel();
    if (autoplayTimer) {
        clearTimeout(autoplayTimer);
        autoplayTimer = null;
    }
}

function wait(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
