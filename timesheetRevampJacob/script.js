
// fixes the forEach because IE is dumb
  if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = function (callback, argument) {
        argument = argument || window;
        for (var i = 0; i < this.length; i++) {
            callback.call(argument, this[i], i, this);
        }
    };
  }


// creates the payPeriod Range
var payPeriod = getPayPeriod();


var allTheInputs = document.querySelectorAll('input');
allTheInputs.forEach(function (input) {
  input.oninput = function () {
    calcDay(input.dataset.week, input.dataset.day);
    calcWeek(input.dataset.week);
  };
});


console.log(payPeriod);