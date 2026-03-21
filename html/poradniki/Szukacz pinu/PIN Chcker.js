
function showSection(sectionId) {
    // Ukryj obie sekcje
    document.getElementById('kahoot').classList.add('hidden');
    document.getElementById('quizizz').classList.add('hidden');

    // Pokaż tylko tę wybraną
    document.getElementById(sectionId).classList.remove('hidden');
}

async function checkPinK() {
    let pinK = 100000;
    const koniecK = 9999999;
    // const generator = setInterval(() => {
    //     if (pinK <= koniec) {
    //         // Wypisujemy liczbę
    //         console.log(pinK);
    //         pinK++;
    //     } 
    //     else {
    //         // Zatrzymujemy, gdy licznik dobije do końca
    //         clearInterval(generator);
    //         console.log("Zakończono generowanie.");
    //     }
    // }, 1); // 1 ms opóźnienia
    for (let i = pinK; i <= koniecK; i++) {
        const urlK = "https://kahoot.it/reserve/session/" + i
        try {
            const res = await fetch("https://corsproxy.io/?" + encodeURIComponent(urlK))
            if (res.status === 200) {
                // const dataK = await res.json()
                document.getElementById("activePinsK").innerHTML += i + "<BR>";
            }
        }
        catch (e) {
            document.getElementById("activePinsK").innerHTML = "⚠️ Błąd sprawdzania"
        }
    }
}
async function checkPinPojK() {
    const pinPojK = document.getElementById("pinPojK").value
    if (pinPojK != "") {
        const urlK = "https://kahoot.it/reserve/session/" + pinPojK
        try {
            const res = await fetch("https://corsproxy.io/?" + encodeURIComponent(urlK))
            if (res.status === 200) {
                // const dataK = await res.json()
                // document.getElementById("resultK").innerHTML = "✅ PIN istnieje<br>Nazwa quizu: " + data.name
                document.getElementById("resultK").innerHTML = "✅ PIN jest aktywny"
            }
            else {
                document.getElementById("resultK").innerHTML = "❌ PIN nie istnieje"
            }
        }
        catch (e) {
            document.getElementById("resultK").innerHTML = "⚠️ Błąd sprawdzania"
        }
    }
}

async function checkPinQ() {
    let pinQ = 100000;
    const koniecQ = 999999;
    // const generator = setInterval(() => {
    //     if (pinQ <= koniec) {
    //         // Wypisujemy liczbę
    //         console.log(pinQ);
    //         pinQ++;
    //     } 
    //     else {
    //         // Zatrzymujemy, gdy licznik dobije do końca
    //         clearInterval(generator);
    //         console.log("Zakończono generowanie.");
    //     }
    // }, 1); // 1 ms opóźnienia
    for (let j = pinQ; j <= koniecQ; j++) {
        const urlQ = "https://quizizz.com/join?gc=" + j
        try {
            const res = await fetch("https://corsproxy.io/?" + encodeURIComponent(urlQ))
            if (res.ok) {
                // const dataQ = await res.json()
                document.getElementById("activePinsQ").innerHTML += j + "<BR>";
            }
        }
        catch (e) {
            document.getElementById("activePinsQ").innerHTML = "⚠️ Błąd sprawdzania"
        }
    }
}
async function checkPinPojQ() {
    const pinPojQ = document.getElementById("pinPojQ").value
    if (pinPojQ != "") {
        const urlQ = "https://quizizz.com/join?gc=" + pinPojQ
        try {
            const res = await fetch("https://corsproxy.io/?" + encodeURIComponent(urlQ))
            if (res.ok) {
                // const dataQ = await res.json()
                // document.getElementById("resultQ").innerHTML = "✅ PIN istnieje<br>Nazwa quizu: " + data.name
                document.getElementById("resultQ").innerHTML = "✅ PIN jest aktywny"
            }
            else {
                document.getElementById("resultQ").innerHTML = "❌ PIN nie istnieje"
            }
        }
        catch (e) {
            document.getElementById("resultQ").innerHTML = "⚠️ Błąd sprawdzania"
        }
    }
}

