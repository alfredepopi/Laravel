const storageType = localStorage;
const consentPropertyName = 'jdc_censent';

const shouldShowPopup = () => !storageType.getItem(consentPropertyName);
const saveToStorage = () => storageType.setItem(consentPropertyName, true);

window.onload = () => {
    if (shouldShowPopup()) {
        const consent = confirm('Agree to the terms and conditions of the truc');
        if (consent) {
            saveToStorage();
        }
    };
}