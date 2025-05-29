

fetch('../../../application/config/graph/Graph_microsoft.php')
    .then(response => {
        if (!response.ok) throw new Error(`HTTP error! ${response.status}`);
        return response.json();
    })
    .then(data => {
        console.log("✅ ข้อมูลจาก API:", data);

        // 🔹 แปลงปีเป็นตัวเลขทั้งหมด แล้วหา 5 ปีล่าสุด
        const allYears = [...new Set(data.map(item => parseInt(item.year_equipment)))];
        const latestYears = allYears.sort((a, b) => b - a).slice(0, 5).sort((a, b) => a - b);
        console.log("📆 5 ปีล่าสุด:", latestYears);

        // 🔹 กรองข้อมูลเฉพาะ 5 ปีล่าสุด
        const filteredData = data.filter(item => latestYears.includes(parseInt(item.year_equipment)));

        // 🔹 รายชื่อ Microsoft Office ทั้งหมดที่มีในข้อมูล (ลบช่องว่าง)
        const officeVersions = [...new Set(filteredData.map(item => item.microsoft_office.trim()))];

        // 🔹 กำหนดสีแต่ละเวอร์ชัน
        const officeColors = {
            "MICROSOFT OFFICE 2010": "rgb(255, 67, 54)",
            "MICROSOFT OFFICE 2013": "rgb(234, 181, 7)",
            "MICROSOFT OFFICE 2016": "rgb(34, 202, 75)",
            "MICROSOFT OFFICE 2019": "rgb(0, 183, 255)",
            "MICROSOFT OFFICE 2021": "rgb(71, 7, 234)",
            "MICROSOFT OFFICE 365": "rgb(7, 22, 234)"
        };

        // 🔹 เตรียมชุดข้อมูลตามเวอร์ชัน
        const datasets = officeVersions.map(version => {
            const color = officeColors[version] || "rgb(200,200,200)";
            return {
                label: version,
                data: latestYears.map(year => {
                    const found = filteredData.find(item =>
                        parseInt(item.year_equipment) === year &&
                        item.microsoft_office.trim() === version
                    );
                    return found ? parseInt(found.user_count) : 0;
                }),
                borderColor: color,
                backgroundColor: color.replace("rgb", "rgba").replace(")", ", 0.5)"),
                fill: false,
                tension: 0.3,
                borderWidth: 2
            };
        });

        // 🔹 วาดกราฟ
        const ctx = document.getElementById("chart").getContext("2d");
        new Chart(ctx, {
            type: 'line', // หรือ 'bar' ก็ได้
            data: {
                labels: latestYears,
                datasets: datasets
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    title: { display: true, text: 'การใช้งาน Microsoft Office (5 ปีล่าสุด)' }
                },
                scales: {
                    x: { title: { display: true, text: 'ปี (พ.ศ.)' } },
                    y: {
                        beginAtZero: true,
                        title: { display: true, text: 'จำนวนผู้ใช้งาน (คน)' },
                        ticks: { stepSize: 1 }
                    }
                }
            }
        });

    })
    .catch(error => console.error("❌ Fetch error:", error));

