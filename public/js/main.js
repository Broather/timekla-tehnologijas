"use strict";

function setupDeleteForms() {
    // document ir HTML fails kuram ir <script> tags šim skriptam
    let deleteForms = document.querySelectorAll('form.deletion-form');
    // katrai <form class="deletion-form"> pievieno "eventListener" kas izmet confirmation screen on submit
    for (let form of deleteForms) {
        form.addEventListener('submit', function (event) {
            // aptur submit
            event.preventDefault();
            // classic confirmation window with localhost says ...
            if (window.confirm('Vai tiešām vēlaties dzēst šo ierakstu?')) {
                form.submit();
            } else {
                // beidz darbību bez submit 
                return false;
            }
        });
    }
}
// izsauc setupDeleteForms() kad viss HTML fails ir ielādējies tīmeklī 
document.addEventListener("DOMContentLoaded", function () {
    setupDeleteForms();
});
