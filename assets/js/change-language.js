document.addEventListener('DOMContentLoaded', fetchLanguages);

async function fetchLanguages() {
    try {
        const [languagesResponse, currentLanguageResponse] = await Promise.all([
            fetch(`/get-languages.php`),
            fetch(`/get-locale.php`)
        ]);

        if (!languagesResponse.ok || !currentLanguageResponse.ok) {
            throw new Error('Failed to fetch data from the server');
        }

        const languages = await languagesResponse.json();
        const currentLanguage = await currentLanguageResponse.text();

        const languageSelect = document.getElementById('language');
        languageSelect.innerHTML = ''; // Clear existing options

        languages.forEach(lang => {
            const option = document.createElement('option');
            option.value = lang;
            option.textContent = lang;
            languageSelect.appendChild(option);
        });

        const savedLanguage = localStorage.getItem("language") || currentLanguage;
        setLanguageOnPageLoad(savedLanguage);
    } catch (error) {
        console.error("Error fetching languages or current language:", error);
    }
}

function setLanguageOnPageLoad(language) {
    const languageSelect = document.getElementById("language");
    if (languageSelect) {
        languageSelect.value = language;
    }
}

function changeLanguage(lang) {
    fetch(`/change-language.php`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ language: lang }),
    })
        .then((response) => {
            if (response.ok) {
                localStorage.setItem("language", lang);
                location.reload();
            } else {
                throw new Error("Failed to change language");
            }
        })
        .catch((error) => {
            console.error("Error changing language:", error);
        });
}
