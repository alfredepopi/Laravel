require('./bootstrap');
const cookieStorage = {
    getItem: (item) => {
         const cookie = document.cookie
         .split(';')
         .map(cookie => cookie.split('='))
         .reduce((acc, [key, value]) => ({ ...acc, [key.trim()]: value }), {});
        return cookies[key];
    },
    setItem: (key, value) => {
        document.cookie = `${key}=${value}`;
    },
}

const storageType = cookieStorage;
const consentPropertyName = 'jdc_censent';

const shouldShowPopup = () => !storageType.getItem(consentPropertyName);
const saveToStorage = () => storageType.setItem(consentPropertyName, true);

window.onload = () => {

    const consentPopup = document.getElementById('consent-popup')
    const acceptBtn = document.getElementById('accept');

    const acceptFn = event => {
        saveToStorage(storageType);
        consentPopup.classList.add('hidden');
    };

    acceptBtn.addEventListener('click', acceptFn);

    if (shouldShowPopup(storageType)) {
        setTimeout(() => {
            consentPopup.classList.remove('hidden');
        }, 2000);
    };

    if (shouldShowPopup()) {
        const consent = confirm('Agree to the terms and conditions of the truc');
        if (consent) {
            saveToStorage();
        }
    };
}

