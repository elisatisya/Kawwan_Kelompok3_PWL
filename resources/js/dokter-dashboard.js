import Chart from 'chart.js/auto';

const sumber = document.getElementById('dokter-chart-data');
const grafik = sumber ? JSON.parse(sumber.textContent) : null;

if (grafik) {
    Chart.defaults.font.family = "'Poppins', sans-serif";
    Chart.defaults.color = '#747D80';

    const harian = document.getElementById('chart-harian');
    if (harian) {
        new Chart(harian, {
            type: 'line',
            data: {
                labels: grafik.harian.labels,
                datasets: [{
                    label: 'Pemeriksaan',
                    data: grafik.harian.data,
                    borderColor: '#079FA8',
                    backgroundColor: 'rgba(7, 159, 168, 0.12)',
                    pointBackgroundColor: '#079FA8',
                    pointRadius: 4,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.35,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, ticks: { precision: 0 }, grid: { color: '#F0F4F8' } },
                    x: { grid: { display: false } },
                },
            },
        });
    }

    const jenis = document.getElementById('chart-jenis');
    if (jenis) {
        const palet = ['#079FA8', '#F59E0B', '#6366F1', '#EC4899', '#22C55E', '#EF4444', '#8B5CF6', '#0EA5E9'];
        const labels = grafik.jenis.labels;
        const data = grafik.jenis.data.map(Number);
        const total = data.reduce((a, b) => a + b, 0);

        new Chart(jenis, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: labels.map((_, i) => palet[i % palet.length]),
                    borderWidth: 3,
                    borderColor: '#FFFFFF',
                    hoverOffset: 8,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '62%',
                plugins: {
                    legend: { 
                        position: 'bottom', 
                        labels: { usePointStyle: true, padding: 16 } 
                    },
                    tooltip: {
                        callbacks: {
                            label: (ctx) => {
                                const nilai = Number(ctx.parsed);
                                const persen = total ? Math.round((nilai / total) * 100) : 0;
                                return ` ${ctx.label}: ${nilai} pemeriksaan (${persen}%)`;
                            },
                        },
                    },
                },
            },
        });
    }
}