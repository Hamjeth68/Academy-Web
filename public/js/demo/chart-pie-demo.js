// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
    type: "pie",
    data: {
        labels: [
            "Introduction to Waste Management",
            "Hazardous Waste",
            "Waste Legislation",
            "Landfill Management",
            "Specialist Course",
            "Fire Safety",
        ],
        datasets: [
            {
                data: [
                    {
                        value: { $product_id },
                    },
                ],
                backgroundColor: [
                    "#007bff",
                    "#dc3545",
                    "#ffc107",
                    "#28a745",
                    "#038cfc",
                    "#4103fc",
                    "#000000",
                ],
            },
        ],
    },
});
