
        // หากต้องการให้ขีดเพิ่มอัตโนมัติเมื่อพิมพ์เลข
        document.getElementById('phone').addEventListener('input', function(e) {
            let input = e.target.value.replace(/\D/g, ''); // ลบทุกตัวที่ไม่ใช่ตัวเลข
            let formattedInput = '';
            for (let i = 0; i < input.length; i++) {
                if (i === 3 || i === 6) { // เพิ่มขีดหลังเลขที่ 3 และ 6
                    formattedInput += '-';
                }
                formattedInput += input[i];
            }
            e.target.value = formattedInput;
        });
