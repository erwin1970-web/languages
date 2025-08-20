// Polish <-> English language configuration for the flashcard app
const APP_CONFIG = {
languageCode: 'polish',
targetVoiceLang: 'pl-PL',
baseVoiceLang: 'en-US',


baseKey: 'en',
targetKey: 'pl',


messages: {
noWordsToLearn: "No more words to learn in this category!",
wordAddedSuccess: (word, category) => `Word "${word}" successfully added to category "${category}"!`,
resetKnownWords: "All known words have been reset!",
listeningModeStarted: (count) => `Listening mode started. Repeating the first ${Math.min(count, 25)} unknown words.`,
listeningModeStopped: "Listening mode stopped.",
noWordsInListeningMode: "No words to learn in listening mode for this category.",
noWordsToMark: "No more words to mark as known.",
markedAsKnown: (word) => `"${word}" marked as known!`,
bothWordsRequired: "Both words must be filled in!",
noVoicesFound: "No speech voices found. Speaking functionality will be disabled.",
clearCacheConfirm: "Are you sure you want to clear all stored app data (including known words and custom words) and refresh the page? This will reset the app to its default state.",
resetKnownConfirm: "Are you sure you want to reset all known words?",
resetConfirmYes: "Yes",
resetConfirmNo: "No"
},


// NOTE: Kept your list intact; a few Polish forms may be grammatical cases (intentional?).
defaultWordList: [
{ en: "and", pl: "i", known: false, category: "Section 1 Unit 1", subcategory: "Words" },
{ en: "an apple", pl: "jabłko", known: false, category: "Section 1 Unit 1", subcategory: "Words" },
{ en: "milk", pl: "mleko", known: false, category: "Section 1 Unit 1", subcategory: "Words" },
{ en: "bread", pl: "chleb", known: false, category: "Section 1 Unit 1", subcategory: "Words" },
{ en: "water", pl: "woda", known: false, category: "Section 1 Unit 1", subcategory: "Words" },
{ en: "a woman", pl: "kobieta", known: false, category: "Section 1 Unit 1", subcategory: "Words" },
{ en: "a man", pl: "mężczyzna", known: false, category: "Section 1 Unit 1", subcategory: "Words" },
{ en: "a girl", pl: "dziewczyna", known: false, category: "Section 1 Unit 1", subcategory: "Words" },
{ en: "boy", pl: "chlopiec", known: false, category: "Section 1 Unit 1", subcategory: "Words" },
{ en: "a boy", pl: "chlopcem", known: false, category: "Section 1 Unit 1", subcategory: "Words" },
{ en: "He is a boy", pl: "On jest chlopcem", known: false, category: "Section 1 Unit 1", subcategory: "Sentences" },
{ en: "A man is drinking milk and water", pl: "Mężczyzna pije mleko i wodę", known: false, category: "Section 1 Unit 1", subcategory: "Sentences" },
{ en: "He is eating an apple", pl: "On je jabłko", known: false, category: "Section 1 Unit 1", subcategory: "Sentences" },
{ en: "She eats bread", pl: "Ona je chleb", known: false, category: "Section 1 Unit 1", subcategory: "Sentences" },
{ en: "I am drinking water and eating bread", pl: "Piję wodę i jem chleb", known: false, category: "Section 1 Unit 1", subcategory: "Sentences" },
{ en: "A woman is eating", pl: "Kobieta je", known: false, category: "Section 1 Unit 1"}]
}