
document.addEventListener('DOMContentLoaded', function () {
    const dateDropdown = document.getElementById('year_equipment');
    if (!dateDropdown) {
        console.error("ไม่พบ element id='year_equipment'");
        return;
    }

    let currentYear = new Date().getFullYear();
    let earliestYear = 1970;

    while (currentYear >= earliestYear) {
        let buddhistYear = currentYear + 543;
        let dateOption = document.createElement('option');
        dateOption.text = buddhistYear;
        dateOption.value = buddhistYear;
        dateDropdown.add(dateOption);
        currentYear -= 1;
    }
});

