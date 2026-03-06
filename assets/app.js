// NAVIGATION
function go(id) {
  document
    .querySelectorAll("section")
    .forEach((s) => s.classList.remove("active"));
  document.getElementById(id).classList.add("active");
}

// QUOTES INTERACTIVE
const quotes = [
  "Study the past if you would define the future",
  "History is the teacher of life",
  "The past is never dead",
  "Those who forget history repeat it",
  "Great ambition is the passion of a great character (Napoleon Bonaparte)",
];

let qi = 0;
const quoteBox = document.getElementById("quoteBox");

function showQuote() {
  if (!quoteBox) return;
  quoteBox.innerText = quotes[qi];
}

if (quoteBox) {
  showQuote();
  quoteBox.onclick = () => {
    qi = (qi + 1) % quotes.length;
    showQuote();
  };
}

// DUMMY HISTORY DATA
const histories = [
  { title: "Proklamasi", content: "Kemerdekaan Indonesia 1945" },
  { title: "Sumpah Pemuda", content: "Persatuan pemuda 1928" },
  { title: "Revolusi Industri", content: "Perubahan besar teknologi" },
];

const grid = document.getElementById("historyGrid");

if (grid) {
  grid.innerHTML = histories
    .map(
      (h) => `
  <div class="card">
   <h3>${h.title}</h3>
   <p>${h.content}</p>
  </div>
 `,
    )
    .join("");
}
