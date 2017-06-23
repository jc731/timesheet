"use strict";

function generateView(month, day, year) {
  var view = "<table>";

  // the column headings
  view += "<tr>\n    <th></th>\n    <th>Regular</th>\n    <th>Vacation</th>\n    <th>Sick</th>\n    <th>Other</th>\n    <th>Overtime</th>\n    <th>Holiday</th>\n    <th>Total</th>\n  </tr>";

  // loop over weeks
  Object.getOwnPropertyNames(data).forEach(function (week) {

    // loop over days of the week
    Object.getOwnPropertyNames(data[week]).forEach(function (day) {
      if (day !== "total") {
        var row = "<tr>";

        // the label in front of each row
        row += "<td>" + day + "</td>";

        // loop over the different hour types
        Object.getOwnPropertyNames(data[week][day]).forEach(function (hours) {
          row += "\n            <td>\n              <input\n                type=\"number\"\n                value=\"0\"\n                data-week=\"" + week + "\"\n                data-day=\"" + day + "\"\n                data-hours=\"" + hours + "\">\n            </td>";
        });

        // add a total for that day
        row += "\n          <td>\n            <input\n              type=\"number\"\n              readonly\n              value=\"0\"\n              data-week=\"" + week + "\"\n              data-day=\"" + day + "\"\n              data-hours=\"total\"\n              data-total=\"true\">\n          </td>";

        row += "</tr>";
        view += row;
      }
    });

    // after the week add an additional week total row
    view += "\n      <tr>\n        <td>Week Total: </td>\n        <td><input readonly data-week-total=\"" + week + "\" data-hour-total=\"regular\"></td>\n        <td><input readonly data-week-total=\"" + week + "\" data-hour-total=\"vacation\"></td>\n        <td><input readonly data-week-total=\"" + week + "\" data-hour-total=\"sick\"></td>\n        <td><input readonly data-week-total=\"" + week + "\" data-hour-total=\"other\"></td>\n        <td><input readonly data-week-total=\"" + week + "\" data-hour-total=\"overtime\"></td>\n        <td><input readonly data-week-total=\"" + week + "\" data-hour-total=\"holiday\"></td>\n        <td><input readonly data-week-total=\"" + week + "\" data-hour-total=\"total\"></td>\n      </tr>";

    // then add an empty row for spacing
    view += "<tr class=\"empty-row\"></tr>";
  });

  view += "</table>";
  return view;
}