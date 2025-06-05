let allData = [];

fetch('../../../application/config/graph/Graph_ms_office.php')
  .then(res => res.json())
  .then(data => {
    allData = data;

    const yearSelect = document.getElementById('year-selector');

    // 1. ค้นหาปีล่าสุด (year_equipment มากที่สุด)
    const allYears = data.map(item => parseInt(item.year_equipment));
    const latestBuddhistYear = Math.max(...allYears); // เช่น 2566
    const latestGregorianYear = latestBuddhistYear - 543;

    // 2. เซ็ต select ให้เลือกปีล่าสุด
    yearSelect.value = latestGregorianYear;

    // 3. ฟังก์ชันสำหรับแสดงกราฟจากปี
    function renderChart(selectedYear) {
      const selectedBuddhistYear = selectedYear + 543;
      const filtered = allData.filter(item => parseInt(item.year_equipment) === selectedBuddhistYear);

      console.log("ข้อมูลทั้งหมดที่ได้:", data);
      console.log("ข้อมูลปีที่เลือก:", selectedYear);
      console.log("ข้อมูลที่กรองแล้ว:", filtered);

      const officeVersions = [...new Set(filtered.map(item => item.microsoft_office.trim()))];

      const officeColors = {
        "MICROSOFT OFFICE 2010": "rgba(255, 99, 132, 0.7)",
        "MICROSOFT OFFICE 2013": "rgba(255, 159, 64, 0.7)",
        "MICROSOFT OFFICE 2016": "rgba(255, 205, 86, 0.7)",
        "MICROSOFT OFFICE 2019": "rgba(75, 192, 192, 0.7)",
        "MICROSOFT OFFICE 2021": "rgba(54, 162, 235, 0.7)",
        "MICROSOFT OFFICE 365": "rgba(153, 102, 255, 0.7)"
      };

      const dataset = {
        labels: officeVersions,
        datasets: [{
          label: `จำนวนผู้ใช้งาน Microsoft Office ในปี พ.ศ. ${selectedBuddhistYear}`,
          data: officeVersions.map(version => {
            const entry = filtered.find(item => item.microsoft_office.trim() === version);
            return entry ? parseInt(entry.user_count) : 0;
          }),
          backgroundColor: officeVersions.map(version => officeColors[version] || "rgba(200,200,200,0.7)")
        }]
      };

      const ctx = document.getElementById('barchart').getContext('2d');
      if (window.officeChart) window.officeChart.destroy();
      window.officeChart = new Chart(ctx, {
        type: 'bar',
        data: dataset,
        options: {
          responsive: true,
          plugins: {
            title: {
              display: true,
              text: `การใช้งาน Microsoft Office รุ่นต่างๆ ในปี พ.ศ. ${selectedBuddhistYear}`
            },
            legend: { display: false }
          },
          scales: {
            y: {
              beginAtZero: true,
              title: {
                display: true,
                text: 'จำนวนผู้ใช้งาน'
              },
              ticks: {
                stepSize: 1,
                precision: 0,
                callback: function (value) {
                  return Number.isInteger(value) ? value : null;
                }
              }
            }
          }
        }
      });
    }

    // 4. แสดงกราฟของปีล่าสุดทันที
    renderChart(latestGregorianYear);

    // 5. เมื่อมีการเลือกปีใหม่
    yearSelect.addEventListener('change', () => {
      const selectedYear = parseInt(yearSelect.value);
      renderChart(selectedYear);
    });
  })
  .catch(error => console.error("เกิดข้อผิดพลาดในการโหลดข้อมูล:", error));
