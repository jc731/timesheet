function calcDay(week, day) {
  var inputs = document.querySelectorAll("[data-week=\"" + week + "\"][data-day=\"" + day + "\"]");
  var total = 0;

  inputs.forEach(function (input) {
    if (input.dataset.total !== "true") {
      total += Number(input.value);
      data[week][day][input.dataset.hours] = Number(input.value);
    }
  });

  // update the DOM
  var totalInput = document.querySelector("[data-week=\"" + week + "\"][data-day=\"" + day + "\"][data-total=\"true\"]");
  totalInput.value = total;

  // update data object
  data[week][day].total = total;
}

function calcWeek(week) {

  // loop over each hour type: regular, vacation, etc
  Object.getOwnPropertyNames(data.wk1.monday).forEach(function (hour) {
    calcHours(hour);
  });

  // also calculate week grand total
  calcHours("total");

  function calcHours(hour) {
    var inputs = document.querySelectorAll("[data-week=\"" + week + "\"][data-hours=\"" + hour + "\"]");
    var total = 0;

    inputs.forEach(function (input) {
      total += Number(input.value);
    });

    // update DOM
    var totalInput = document.querySelector("[data-week-total=\"" + week + "\"][data-hour-total=\"" + hour + "\"");
    totalInput.value = total;

    // update data object
    data[week].total[hour] = total;
  }
}

