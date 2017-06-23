function getPayPeriod() {
    
  // gets today's date, this is used to figure out what pay period we're currently in.
  var currentDate = new Date();

  // Need a starting pay period to calculate off 
  var refStart = new Date ('2017-01-17');

  // how long is the pay period 
  var payPeriodLength = 14;

  // calculates difference from start date to current date
  var diff = currentDate - refStart;

  //convert the milliseconds to days
  var daysDiff = Math.floor(diff / 1000 / 60 / 60 / 24);

  // Calculates the number of days since pay period started
  var daysSinceStartOfPayPeriod = daysDiff % payPeriodLength;
  
  // Days left in pay period
  var daysLeftInPayPeriod = payPeriodLength - daysSinceStartOfPayPeriod;

  // Calculate when first day of pay period was
  var firstDayOfPayPeriod = new Date();
  firstDayOfPayPeriod.setDate(firstDayOfPayPeriod.getDate() - daysSinceStartOfPayPeriod);
  
  // Calculate the last day of the pay period
  var lastDayOfPayPeriod = new Date();
  lastDayOfPayPeriod.setDate(lastDayOfPayPeriod.getDate() + daysLeftInPayPeriod);

  return {
    firstDayOfPayPeriod: firstDayOfPayPeriod,
    lastDayOfPayPeriod: lastDayOfPayPeriod
  }

}

