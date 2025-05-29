document.addEventListener("DOMContentLoaded", function() {
    var speedCpuInput = document.getElementById("speed_cpu");
    
    speedCpuInput.addEventListener("change", function() {
        var speedValue = this.value;
        
        // เช็คว่าหน่วย (GHz) มีต่อท้ายหรือไม่
        if (!speedValue.endsWith("GHz")) {
            // ถ้าหน่วย (GHz) ยังไม่มี ให้เพิ่มหน่วย GHz. ต่อท้าย
            this.value = speedValue + "GHz";
        }
    });
});