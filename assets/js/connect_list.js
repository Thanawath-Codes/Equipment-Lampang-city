document.addEventListener('DOMContentLoaded', function () {
    // Get all select boxes
    const selectBoxes = document.querySelectorAll('.add-equipments .select-box');

    // Add click event listener to each select box
    selectBoxes.forEach(function (selectBox) {
        selectBox.addEventListener('click', function () {
            // Toggle the 'active' class to change the background color
            this.classList.toggle('active');
        });

        // Add blur event listener to close the select box when clicking outside
        window.addEventListener('click', function (event) {
            if (!selectBox.contains(event.target)) {
                selectBox.classList.remove('active');
            }
        });
    });
});
