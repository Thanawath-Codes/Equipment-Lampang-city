(() => {
  let allData = [];

  fetch('../../../application/config/graph/Graph_windows.php')
    .then(res => res.json())
    .then(data => {
      allData = data;

      const yearSelect = document.getElementById('select_year');

      // สร้าง array ปี พ.ศ. จากข้อมูล
      const allYears = data.map(item => item.year_equipment); // ปี พ.ศ.
      const latestBuddhistYear = Math.max(...allYears);
      yearSelect.value = latestBuddhistYear;

      function renderChart(selectedBuddhistYear) {
        const selectedGregorianYear = selectedBuddhistYear;

        const filtered = allData.filter(item => parseInt(item.year_equipment) === selectedGregorianYear);

        const windowsVersions = [...new Set(filtered.map(item => item.os_computer.trim().toUpperCase()))];

        const windowsColors = {
          "WINDOWS 7": "rgba(255, 99, 132, 0.7)",
          "WINDOWS 10": "rgba(54, 162, 235, 0.7)",
          "WINDOWS 11": "rgba(153, 102, 255, 0.7)"
        };

        const dataset = {
          labels: windowsVersions,
          datasets: [{
            label: `จำนวนผู้ใช้งาน Windows ในปี พ.ศ. ${selectedBuddhistYear}`,
            data: windowsVersions.map(version => {
              const entry = filtered.find(item => item.os_computer.trim().toUpperCase() === version);
              return entry ? parseInt(entry.user_count) : 0;
            }),
            backgroundColor: windowsVersions.map(version => windowsColors[version] || "rgba(200,200,200,0.7)")
          }]
        };

        const ctx = document.getElementById('doughnut').getContext('2d');
        if (window.windowsChart) window.windowsChart.destroy();
        window.windowsChart = new Chart(ctx, {
          type: 'doughnut',
          data: dataset,
          options: {
            responsive: true,
            plugins: {
              title: {
                display: true,
                text: `การใช้งาน Windows รุ่นต่างๆ ในปี พ.ศ. ${selectedBuddhistYear}`
              },
              legend: {
                display: true,
                position: 'bottom'
              }
            }
          }
        });
      }

      renderChart(latestBuddhistYear);

      yearSelect.addEventListener('change', () => {
        const selectedBuddhistYear = parseInt(yearSelect.value);
        renderChart(selectedBuddhistYear);
      });
    })
    .catch(error => console.error("เกิดข้อผิดพลาดในการโหลดข้อมูล:", error));
})();
