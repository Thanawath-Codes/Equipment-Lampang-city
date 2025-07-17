// เลือกเฉพาะ <a> ที่อยู่ใน section.middle .btns
const buttons = document.querySelectorAll("section.middle .btns a");

buttons.forEach((button) => {
    button.onclick = function (e) {
        let x = e.clientX - e.target.offsetLeft;
        let y = e.clientY - e.target.offsetTop;

        let ripple = document.createElement("span");
        ripple.style.left = `${x}px`;
        ripple.style.top = `${y}px`;

        this.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600); // 1 second = 1000 ms
    };
});
