const chartColors = {
  red: "rgb(255, 99, 132)",
  orange: "rgb(255, 159, 64)",
  yellow: "rgb(255, 205, 86)",
  green: "rgb(75, 192, 192)",
  info: "#41B1F9",
  blue: "#3245D1",
  purple: "rgb(153, 102, 255)",
  grey: "#EBEFF6",
};

const line = document.getElementById("line").getContext("2d");

const myline = new Chart(line, {
  type: "line",
  data: {
    labels: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],
    datasets: [
      {
        label: "Sales",
        data: [0, 10, 5, 2, 20, 30, 45, 40, 60, 50, 70, 60],
        backgroundColor: "rgba(50, 69, 209,.6)",
        borderWidth: 3,
        borderColor: "rgba(63,82,227,1)",
        pointBorderWidth: 0,
        pointBorderColor: "transparent",
        pointRadius: 3,
        pointBackgroundColor: "transparent",
        pointHoverBackgroundColor: "rgba(63,82,227,1)",
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: true,
    layout: {
      padding: {
        top: 10,
      },
    },
    // legend: {
    //   display: false,
    // },
  },
});

const donut = document.getElementById("donut").getContext("2d");
const myDonut = new Chart(donut, {
  type: "doughnut",
  data: {
    labels: ["Bottle", "Serum", "Cream", "Mask", "Cleanser"],
    datasets: [
      {
        backgroundColor: [
          chartColors.red,
          chartColors.orange,
          chartColors.yellow,
          chartColors.green,
          chartColors.blue,
        ],
        data: [20, 20, 20, 20, 20],
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: true,
    title: {
      display: false,
    },
    tooltips: {
      mode: "index",
      intersect: false,
    },
  },
});
