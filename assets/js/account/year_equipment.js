
        let dateDropdown = document.getElementById('year_equipment');

        let currentYear = new Date().getFullYear();
        let earliestYear = 1970;

        while (currentYear >= earliestYear) {
            let buddhistYear = currentYear + 543; // เพิ่ม 543 เพื่อแปลงเป็น พ.ศ.
            let dateOption = document.createElement('option');
            dateOption.text = buddhistYear;
            dateOption.value = buddhistYear;
            dateDropdown.add(dateOption);
            currentYear -= 1;
        }
