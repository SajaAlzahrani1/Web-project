
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
window.onload = function() {
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
