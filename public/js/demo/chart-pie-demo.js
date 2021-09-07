// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
    type: "pie",
    data: {
        labels: _ldata,
        datasets: [
            {
                data: _cdata,
                backgroundColor: [
                    "#007bff",
                    "#dc3545",
                    "#ffc107",
                    "#28a745",
                    "#a82504",
                    "#4103fc",
                    "#03fc98",
                    "#fcf003",
                    "#6fdef6",
                    "#e52a84",
                    "#f678b5",
                    "#0c9de8",
                    "#ee6161",
                ],
            },
        ],
    },
});
