<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Bar Chart
    var ctx = document.getElementById("myBarChart");
    var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Laki-laki", "Perempuan"],
            datasets: [{
                label: "Jenis Kelamin",
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 99, 132, 0.5)'

                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)'
                ],
                data: [
                    <?php
                    $jumlah_laki = mysqli_query($mysqli, "select * from calon_siswa where jenis_kelamin='Laki-laki'");
                    echo mysqli_num_rows($jumlah_laki);
                    ?>,
                    <?php
                    $jumlah_perempuan = mysqli_query($mysqli, "select * from calon_siswa where jenis_kelamin='Perempuan'");
                    echo mysqli_num_rows($jumlah_perempuan);
                    ?>,
                ],
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'gender'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: <?php
                                $jumlah_data = mysqli_query($mysqli, "select * from calon_siswa");
                                echo mysqli_num_rows($jumlah_data);
                                ?>,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        display: true
                    }
                }],
            },
            legend: {
                display: false
            }
        }
    });
</script>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Islam", "Kristen", "Katolik", "Hindu", "Budha"],
            datasets: [{
                data: [
                    <?php
                    $jumlah_islam = mysqli_query($mysqli, "select * from calon_siswa where agama='Islam'");
                    echo mysqli_num_rows($jumlah_islam);
                    ?>,
                    <?php
                    $jumlah_kristen = mysqli_query($mysqli, "select * from calon_siswa where agama='Kristen'");
                    echo mysqli_num_rows($jumlah_kristen);
                    ?>,
                    <?php
                    $jumlah_katolik = mysqli_query($mysqli, "select * from calon_siswa where agama='Katolik'");
                    echo mysqli_num_rows($jumlah_katolik);
                    ?>,
                    <?php
                    $jumlah_hindu = mysqli_query($mysqli, "select * from calon_siswa where agama='Hindu'");
                    echo mysqli_num_rows($jumlah_hindu);
                    ?>,
                    <?php
                    $jumlah_buddha = mysqli_query($mysqli, "select * from calon_siswa where agama='Budha'");
                    echo mysqli_num_rows($jumlah_buddha);
                    ?>,
                ],
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#800080'],
            }],
        },
    });
</script>