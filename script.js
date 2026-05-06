
function toggleNightMode() {
    var element = document.body;
    element.classList.toggle('night-mode');

    var btn = document.getElementById("night-mode-btn");

    if (element.classList.contains("night-mode")) {
        btn.innerHTML = "الوضع النهاري";
        localStorage.setItem('nightMode', 'enabled'); // save state
    } else {
        btn.innerHTML = "الوضع الليلي";
        localStorage.setItem('nightMode', 'disabled'); // save state
    }
}

// When page loads, check saved state and apply it
window.onload = function () {
    if (localStorage.getItem('nightMode') === 'enabled') {
        document.body.classList.add('night-mode');
        var btn = document.getElementById("night-mode-btn");
        if (btn) btn.innerHTML = "الوضع النهاري";
    }

}

// Update gallery based on search and filter
function updateGallery() {
    let searchText = document.getElementById('search-input').value.trim();
    let filterValue = document.getElementById('region-filter').value;

    let cards = document.querySelectorAll('.region-card');
    let visibleCount = 0;

    cards.forEach(card => {
        let category = card.getAttribute('data-category');
        let name = card.querySelector('h3').innerText;

        // check if the card matches the search text and dropdown filter
        let matchesSearch = name.includes(searchText);
        let matchesFilter = (filterValue === 'all' || category === filterValue);

        // if it matches BOTH show it
        if (matchesSearch && matchesFilter) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none'; // hide card
        }
    });

    document.getElementById('result-count').innerText = visibleCount;
}



function searchRegions() {
    updateGallery();
}

function filterRegions() {
    updateGallery();
}

// Validation for ALL required fields 
function validateForm() {
    // Fetching field values from the form
    var name = document.forms["addForm"]["place_name"].value;
    var mainImg = document.forms["addForm"]["main_image"].value;
    var desc = document.forms["addForm"]["description"].value;
    var category = document.forms["addForm"]["category"].value;
    var activities = document.forms["addForm"]["activities"].value;
    var landmarks = document.forms["addForm"]["landmarks"].value;
    var facts = document.forms["addForm"]["facts"].value;
    var gallery1 = document.forms["addForm"]["gallery_img1"].value;

    // Check if any of these mandatory fields are empty
    if (name == "" || mainImg == "" || desc == "" || category == "" || activities == "" || landmarks == "" || facts == "" || gallery1 == "") {
        alert("يرجى تعبئة كافة الحقول، بما في ذلك حقل الحقائق.");
        return false;
    }

    // Return true if everything is filled
    return true;
}