
        // หากต้องการให้ขีดเพิ่มอัตโนมัติเมื่อพิมพ์เลข
        document.getElementById('imei_number').addEventListener('input', function(e) {
            let input = e.target.value.replace(/\D/g, ''); // ลบทุกตัวที่ไม่ใช่ตัวเลข
            let formattedInput = '';
            for (let i = 0; i < input.length; i++) {
                if (i === 5 || i === 10) { // เพิ่มขีดหลังเลขที่ 5 และ 10
                    formattedInput += '-';
                }
                formattedInput += input[i];
            }
            e.target.value = formattedInput;
        });