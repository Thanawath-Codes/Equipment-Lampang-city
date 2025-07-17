document.getElementById('key_product_office').addEventListener('input', function(e) {
    let input = e.target.value; // เก็บค่า input ทั้งหมด
    let formattedInput = '';
    let count = 0;
    for (let i = 0; i < input.length; i++) {
        if (input[i].match(/[a-zA-Z0-9]/)) { // ตรวจสอบว่าเป็นตัวอักษรหรือตัวเลขหรือไม่
            formattedInput += input[i]; // เพิ่มตัวอักษรหรือตัวเลขเข้าไปใน formattedInput
            count++;
            if ((count === 5 || count === 10 || count === 15 || count === 20) && count < input.length) {
                formattedInput += '-'; // เพิ่มเครื่องหมาย "-" หลังจากตัวอักษรหรือตัวเลขที่ 5, 10, 15, และ 20
            }
        }
    }
    e.target.value = formattedInput;
});
