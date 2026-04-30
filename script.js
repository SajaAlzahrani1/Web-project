function toggleNightMode() {
    var element = document.body;
    element.classList.toggle('night-mode');

    var btn = document.getElementById("night-mode-btn");

    if (element.classList.contains("night-mode")) {
        btn.innerHTML = "الوضع النهاري";
    } else {
        btn.innerHTML = "الوضع الليلي";
    }
}