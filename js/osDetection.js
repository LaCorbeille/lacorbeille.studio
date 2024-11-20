function detectOS() {
    const userAgent = navigator.userAgent.toLowerCase();
    const platform = navigator.platform.toLowerCase();

    if (platform.includes("mac") || userAgent.includes("macintosh")) {
        return "MacOS";
    } else if (platform.includes("win") || userAgent.includes("windows")) {
        return "Windows";
    } else if (platform.includes("linux") || userAgent.includes("linux")) {
        return "Linux";
    } else if (/iphone|ipad|ipod/.test(userAgent)) {
        return "iOS";
    } else if (/android/.test(userAgent)) {
        return "Android";
    } else {
        return "Inconnu";
    }
}