const alert = document.querySelector("div[alert]");
console.log(alert);
setTimeout(() => {
    alert.remove();
}, 5000);
