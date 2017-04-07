 /*global jQuery */
 // Global Variables //
var sickTotalUsed = "";
var sickHoursUsed = "";
var totalsArray = [""];
var regularTotalsArray = [""];
var vacationTotalsArray = [""];
var sickTotalsArray = [""];
var allDailyTotals = [""];
//Main function for the totals of the table
function calculateTotals() {
    "use strict";
// get value of field
    var aa = parseFloat($("#regularHours1").val());
// convert it to a float
    var ba = parseFloat($("#vacationHours1").val());
    var ca = parseFloat($("#sickHours1").val());
    var da = parseFloat($("#otherHours1").val());
    var ea = parseFloat($("#overtimeHours1").val());
    var fa = parseFloat($("#holidayHours1").val());
    var tuesday1 = aa + ba + ca + da + ea + fa;
// add them and output it
    $("#added1").html(aa + ba + ca + da + ea + fa);

    var ab = parseFloat($("#regularHours2").val());
    var bb = parseFloat($("#vacationHours2").val());
    var cb = parseFloat($("#sickHours2").val());
    var db = parseFloat($("#otherHours2").val());
    var eb = parseFloat($("#overtimeHours2").val());
    var fb = parseFloat($("#holidayHours2").val());
    var wednesday1 = ab + bb + cb + db + eb + fb;
    $("#added2").html(ab + bb + cb + db + eb + fb);

    var ac = parseFloat($("#regularHours3").val());
    var bc = parseFloat($("#vacationHours3").val());
    var cc = parseFloat($("#sickHours3").val());
    var dc = parseFloat($("#otherHours3").val());
    var ec = parseFloat($("#overtimeHours3").val());
    var fc = parseFloat($("#holidayHours3").val());
    var thursday1 = ac + bc + cc + dc + ec + fc;
    $("#added3").html(ac + bc + cc + dc + ec + fc);

    var ad = parseFloat($("#regularHours4").val());
    var bd = parseFloat($("#vacationHours4").val());
    var cd = parseFloat($("#sickHours4").val());
    var dd = parseFloat($("#otherHours4").val());
    var ed = parseFloat($("#overtimeHours4").val());
    var fd = parseFloat($("#holidayHours4").val());
    var friday1 = ad + bd + cd + dd + ed + fd;
    $("#added4").html(ad + bd + cd + dd + ed + fd);

    var ae = parseFloat($("#regularHours5").val());
    var be = parseFloat($("#vacationHours5").val());
    var ce = parseFloat($("#sickHours5").val());
    var de = parseFloat($("#otherHours5").val());
    var ee = parseFloat($("#overtimeHours5").val());
    var fe = parseFloat($("#holidayHours5").val());
    var saturday1 = ae + be + ce + de + ee + fe;
    $("#added5").html(ae + be + ce + de + ee + fe);

    var af = parseFloat($("#regularHours6").val());
    var bf = parseFloat($("#vacationHours6").val());
    var cf = parseFloat($("#sickHours6").val());
    var df = parseFloat($("#otherHours6").val());
    var ef = parseFloat($("#overtimeHours6").val());
    var ff = parseFloat($("#holidayHours6").val());
    var sunday1 = af + bf + cf + df + ef + ff;
    $("#added6").html(af + bf + cf + df + ef + ff);

    var ag = parseFloat($("#regularHours7").val());
    var bg = parseFloat($("#vacationHours7").val());
    var cg = parseFloat($("#sickHours7").val());
    var dg = parseFloat($("#otherHours7").val());
    var eg = parseFloat($("#overtimeHours7").val());
    var fg = parseFloat($("#holidayHours7").val());
    var monday1 = ag + bg + cg + dg + eg + fg;
    $("#added7").html(ag + bg + cg + dg + eg + fg);


    var week1Total = tuesday1 + wednesday1 + thursday1 + friday1 + saturday1 + sunday1 + monday1;
    week1Total = week1Total.toFixed(2);
    week1Total = parseFloat(week1Total);
    

    var ah = parseFloat($("#regularHours8").val());
    var bh = parseFloat($("#vacationHours8").val());
    var ch = parseFloat($("#sickHours8").val());
    var dh = parseFloat($("#otherHours8").val());
    var eh = parseFloat($("#overtimeHours8").val());
    var fh = parseFloat($("#holidayHours8").val());
    var tuesday2 = ah + bh + ch + dh + eh + fh;
    $("#added8").html(ah + bh + ch + dh + eh + fh);

    var ai = parseFloat($("#regularHours9").val());
    var bi = parseFloat($("#vacationHours9").val());
    var ci = parseFloat($("#sickHours9").val());
    var di = parseFloat($("#otherHours9").val());
    var ei = parseFloat($("#overtimeHours9").val());
    var fi = parseFloat($("#holidayHours9").val());
    var wednesday2 = ai + bi + ci + di + ei + fi;
    $("#added9").html(ai + bi + ci + di + ei + fi);

    var aj = parseFloat($("#regularHours10").val());
    var bj = parseFloat($("#vacationHours10").val());
    var cj = parseFloat($("#sickHours10").val());
    var dj = parseFloat($("#otherHours10").val());
    var ej = parseFloat($("#overtimeHours10").val());
    var fj = parseFloat($("#holidayHours10").val());
    var thursday2 = aj + bj + cj + dj + ej + fj;
    $("#added10").html(aj + bj + cj + dj + ej + fj);

    var ak = parseFloat($("#regularHours11").val());
    var bk = parseFloat($("#vacationHours11").val());
    var ck = parseFloat($("#sickHours11").val());
    var dk = parseFloat($("#otherHours11").val());
    var ek = parseFloat($("#overtimeHours11").val());
    var fk = parseFloat($("#holidayHours11").val());
    var friday2 = ak + bk + ck + dk + ek + fk;
    $("#added11").html(ak + bk + ck + dk + ek + fk);

    var al = parseFloat($("#regularHours12").val());
    var bl = parseFloat($("#vacationHours12").val());
    var cl = parseFloat($("#sickHours12").val());
    var dl = parseFloat($("#otherHours12").val());
    var el = parseFloat($("#overtimeHours12").val());
    var fl = parseFloat($("#holidayHours12").val());
    var saturday2 = al + bl + cl + dl + el + fl;//add them
    $("#added12").html(al + bl + cl + dl + el + fl);// output it

    var am = parseFloat($("#regularHours13").val());
    var bm = parseFloat($("#vacationHours13").val());
    var cm = parseFloat($("#sickHours13").val());
    var dm = parseFloat($("#otherHours13").val());
    var em = parseFloat($("#overtimeHours13").val());
    var fm = parseFloat($("#holidayHours13").val());
    var sunday2 = am + bm + cm + dm + em + fm;
    $("#added13").html(am + bm + cm + dm + em + fm);

    var an = parseFloat($("#regularHours14").val());
    var bn = parseFloat($("#vacationHours14").val());
    var cn = parseFloat($("#sickHours14").val());
    var dn = parseFloat($("#otherHours14").val());
    var en = parseFloat($("#overtimeHours14").val());
    var fn = parseFloat($("#holidayHours14").val());
    var monday2 = an + bn + cn + dn + en + fn;
    $("#added14").html(an + bn + cn + dn + en + fn);

    var week2Total = tuesday2 + wednesday2 + thursday2 + friday2 + saturday2 + sunday2 + monday2;
    week2Total = week2Total.toFixed(2);
    week2Total = parseFloat(week2Total);


// Weekly total variables
    var regularTotal = aa + ab + ac + ad + ae + af + ag + ah + ai + aj + ak + al + am + an;
    var vacationTotal = ba + bb + bc + bd + be + bf + bg + bh + bi + bj + bk + bl + bm + bn;
    var sickTotal = ca + cb + bc + cd + ce + cf + cg + ch + ci + cj + ck + cl + cm + cn;
    var otherTotal = da + db + dc + dd + de + df + dg + dh + di + dj + dk + dl + dm + dn;
    var overtimeTotal = ea + eb + ec + ed + ee + ef + eg + eh + ei + ej + ek + el + em + en;
    var holidayTotal = fa + fb + fc + fd + fe + ff + fg + fh + fi + fj + fk + fl + fm + fn;
    regularTotalsArray = {regularTotal: regularTotal,  holidayTotal: holidayTotal, overtimeTotal: overtimeTotal, otherTotal: otherTotal, week1Total: week1Total, week2Total:week2Total};
    // allDailyTotals = {tues1regular: aa, weds1regular: ab, thurs1regular: ac, fri1regular: ad, sat1regular: ae, sun1regular: af, mon1regular: ag, tues2regular: ah, weds2regular: ai, 
    //     thurs2regular: aj, fri2regular: ak,  sat2regular: al, sun2regular: am, mon2regular: an, tues1sick: ba, weds1sick: bb, thurs1sick: bc, fri1sick: bd, sat1sick: be, sun1sick: bf, 
    //     mon1sick: bg, tues2sick: bh, weds2sick: bi, thurs2sick: bj, fri2sick: bk, sat2sick: bl,  sun2sick: bm, mon2sick: bn, tues1vacation: ca, weds1vacation: cb, thurs1vacation: cc, 
    //     fri1vacation: cd, sat1vacation: ce, sun1vacation: cf,  mon1vacation: cg, tues2vacation: ch, weds2vacation: ci, thurs2vacation: cj, fri2vacation: ck, sat2vacation: cl, sun2vacation: cm, 
    //     mon2vacation: cn, tues1other: da, weds1other: db, thurs1other: dc, fri1other: dd, sat1other: de, sun1other: df, mon1other: dg, tues2other: dh, weds2other: di, thurs2other: dj, fri2other: dk, 
    //     sat2other: dl, sun2other: dm,  mon2other: dn, tues1overtime: ea, weds1overtime: eb,  thurs1overtime: ec, fri1overtime: ed, sat1overtime: ee, sun1overtime: ef, mon1overtime: eg, 
    //     tues2overtime: eh, weds2overtime: ei, thurs2overtime: ej, fri2overtime: ek, sat2overtime: el, sun2overtime: em, mon2overtime: en, tues1holiday: fa, weds1holiday: fb, thurs1holiday: fc, 
    //     fri1holiday: fd, sat1holiday: fe, sun1holiday: ff, mon1holiday: fg, tues2holiday: fh, weds2holiday: fi, thurs2holiday: fj, fri2holiday: fk, sat2holiday: fl, sun2holiday: fm, mon2holiday: fn 
    // }
    // console.log( allDailyTotals );
// var grandTotal = week1Total + week2Total;
    sickTotalUsed = parseFloat(sickTotal);
// vacation variables
    var beginningVacationLeave = parseFloat($("#beginningVacationLeave").val());
    var earnedVacationLeave = parseFloat($("#earnedVacationLeave").val());
    var subVacationLeave = earnedVacationLeave + beginningVacationLeave;
    var hoursUsedVacation = vacationTotal;
    var hoursEndingVacation = (subVacationLeave - hoursUsedVacation).toFixed(2);
// Convert hours to days 
    var daysEndingVacation = (hoursEndingVacation / 8).toFixed(2);
    var vacationTotalUsed = vacationTotal;
    hoursEndingVacation = parseFloat(hoursEndingVacation);
// Check for negative vacation hours. Provide popup/display noting how many days til time available
    if (hoursEndingVacation < 0) {
        $("#endingVacationHoursTD").addClass("warning");
        $("#endingVacationDaysTD").addClass("warning");
    } else {
        $("#endingVacationHoursTD").removeClass("warning");
        $("#endingVacationDaysTD").removeClass("warning");
    }
    vacationTotalsArray = {vacationTotalUsed: vacationTotalUsed, hoursEndingVacation: hoursEndingVacation};
    // console.log( vacationTotalsArray );
// Display Totals
// Weekly Totals
    $("#regularTotal").html(regularTotal);
    $("#vacationTotal").html(vacationTotal);
    $("#sickTotal").html(sickTotal);
    $("#vacationTotalUsed").html(vacationTotalUsed);
    $("#otherTotal").html(otherTotal);
    $("#overtimeTotal").html(overtimeTotal);
    $("#holidayTotal").html(holidayTotal);
    $("#weekTotal1").html(week1Total);
    $("#weekTotal2").html(week2Total);
// $("#grandTotal").html(week1Total + week2Total);

// PTO Totals
// Vaca Time Totals
    $("#subVacationLeave").html(subVacationLeave);
    $("#hoursUsedVacation").html(hoursUsedVacation);
    $("#hoursEndingVacation").attr('value', hoursEndingVacation);
    $("#daysEndingVacation").html(daysEndingVacation);
}




function calculateOldSick(){
    // sick time     variables
    //this will later be read only (populated via php from db)
    var beginningOldSickLeave = parseFloat($("#beginningOldSickLeave").val());
    var oldSickSub = beginningOldSickLeave;
    //this will later be read on (populated via php from db)
    var beginningNewSickLeave = parseFloat($("#beginningNewSickLeave").val());
    var combinedBeginningSickLeave = beginningNewSickLeave + beginningOldSickLeave;
    var earnedNewSickLeave = parseFloat($("#earnedNewSickLeave").val());
    var subNewSickTime = beginningNewSickLeave + earnedNewSickLeave;
    var subCombinedSickLeave = combinedBeginningSickLeave + earnedNewSickLeave;
    var newSickEndingBalance = (subNewSickTime - sickTotalUsed).toFixed(2);
    newSickEndingBalance = parseFloat(newSickEndingBalance);
    var oldSickEndingBalance = beginningOldSickLeave;
    var oldSickUsed = 0;
    var newSickUsed = 0;
    if (newSickEndingBalance < 0) {
        oldSickUsed = newSickEndingBalance * (-1);
        oldSickUsed = parseFloat(oldSickUsed);
        newSickEndingBalance = 0;
        oldSickEndingBalance = oldSickSub - oldSickUsed;
    }
    newSickUsed = parseFloat((subNewSickTime - newSickEndingBalance).toFixed(2));
  
    var combinedSickUsed = parseFloat(oldSickUsed) + parseFloat(newSickUsed);  // newSickUsed = parseFloat(newSickUsed);
    var combinedSickEnding = (subCombinedSickLeave - combinedSickUsed).toFixed(2);
    // combinedSickEnding = parseFloat(combinedSickEnding).toFixed(2);
    // hours to days
    var oldSickDays = (oldSickEndingBalance / 8).toFixed(2);
    var newSickDays = (newSickEndingBalance / 8).toFixed(2);
    var combinedSickDays = parseFloat(oldSickDays) + parseFloat(newSickDays);
    combinedSickDays = parseFloat(combinedSickDays);
    combinedSickDays = combinedSickDays.toFixed(2);

    // Checks to see if hours are negative and then adds warning class to draw attention.
    if (combinedSickEnding < 0) {
        $("#oldSickEndingBalanceTD").addClass("warning");
        $("#newSickEndingBalanceTD").addClass("warning");
        $("#combinedSickEndingTD").addClass("warning");
        $("#oldSickDaysTD").addClass("warning");
        $("#newSickDaysTD").addClass("warning");
        $("#combinedSickDaysTD").addClass("warning");
    } else {
        $("#oldSickEndingBalanceTD").removeClass("warning");
        $("#newSickEndingBalanceTD").removeClass("warning");
        $("#combinedSickEndingTD").removeClass("warning");
        $("#oldSickDaysTD").removeClass("warning");
        $("#newSickDaysTD").removeClass("warning");
        $("#combinedSickDaysTD").removeClass("warning");
    }

    sickTotalsArray = {oldSickEnding: oldSickEndingBalance, oldSickUsed: oldSickUsed, newSickEndingBalance: newSickEndingBalance, newSickUsed: newSickUsed};
    // console.log( sickTotalsArray );
    //Sick Time Totals 
    $("#earnedCombinedSickLeave").html(earnedNewSickLeave);
    $("#beginningCombinedSickLeave").html(beginningOldSickLeave + beginningNewSickLeave);
    $("#oldSickSub").html(oldSickSub);
    $("#subNewSickTime").html(subNewSickTime);
    $("#newSickEndingBalance").attr('value', newSickEndingBalance);
    $("#oldSickEndingBalance").attr('value', oldSickEndingBalance);
    $("#newSickUsed").html(newSickUsed);
    $("#oldSickUsed").html(oldSickUsed);
    $("#oldSickDays").html(oldSickDays);
    $("#newSickDays").html(newSickDays);
    $("#combinedSickUsed").html(combinedSickUsed);
    $("#combinedSickEnding").attr('value', combinedSickEnding);
    $("#combinedSickDays").html(combinedSickDays);
    $("#subCombinedSickLeave").html(subCombinedSickLeave);

}

function calculateSick(){
    // sick time variables
    //this will later be read only (populated via php from db)
    var beginningSickLeave = parseFloat($("#beginningSickLeave").val());
    //this will later be read on (populated via php from db)
    var earnedSickLeave = parseFloat($("#earnedSickLeave").val());
    var subSickTime = beginningSickLeave + earnedSickLeave;
    // sickTotalUsed is global variable from main table
    var sickEndingBalance = (subSickTime - sickTotalUsed).toFixed(2);
    // var sickUsed = 0;
    sickHoursUsed = subSickTime - sickEndingBalance;
    // // hours to days
    var daysEndingSick = (sickEndingBalance / 8).toFixed(2);

    // // Checks to see if hours are negative and then adds warning class to draw attention.
    if (sickEndingBalance < 0) {
        $("#hoursEndingSickTD").addClass("warning");
        $("#daysEndingSickTD").addClass("warning");
    } else {
        $("#hoursEndingSickTD").removeClass("warning");
        $("#daysEndingSickTD").removeClass("warning");

    }

    sickTotalsArray = {sickEnding: sickEndingBalance, sickUsed: sickHoursUsed};
    // console.log( sickTotalsArray );

    // //Sick Time Totals 
    $("#subSickTime").html(subSickTime);
    $("#sickEndingBalance").attr('value', sickEndingBalance);
    $("#sickHoursUsed").html(sickHoursUsed);
    $("#daysEndingSick").html(daysEndingSick);

}

// function buildTotalsArray(){
//     totalsArray = regularTotalsArray;
//     $.extend(totalsArray, vacationTotalsArray);
//     $.extend(totalsArray, sickTotalsArray);
//     $.extend(totalsArray, allDailyTotals);
//     JSON.stringify(totalsArray);
// }


function submitTheThing (){
    $("#combinedSickEnding").prop('disabled', false);
    $("#newSickEndingBalance").prop('disabled', false);
    $("#oldSickEndingBalance").prop('disabled', false);
    $("#hoursEndingVacation").prop('disabled', false);
    $("#sickEndingBalance").prop('disabled', false);
}


function overTimeEligiable () {
    $("th").removeClass("overtime");
    $("td").removeClass("overtime");
}