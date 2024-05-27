// const daysEl = document.getElementById("days");
// const hoursEl = document.getElementById("hours");
// const minsEl = document.getElementById("mins");

// var eventDate = document.getElementById("dateEvent").innerHTML;
// var timeEvent = document.getElementById("TimeEvent").innerHTML;

// const timeString = timeEvent; // input string

// const arr = timeString.split(":"); // splitting the string by colon

// const seconds = arr[0]*3600+arr[1]*60+(+arr[2]); // converting


// var today = new Date();

// var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();




// function countdown() {
//     if(compareTowDate(eventDate, date)){
//         const convertEventDate = new Date(eventDate);
//         // const timeEventConvert = new Date(timeEvent);
        
//         const currentDate = new Date();
    
//         const totalSeconds = (convertEventDate - currentDate) / 1000;
        
//         // const endDate = totalSeconds + seconds
//         const days = Math.floor(totalSeconds / 3600 / 24);
//         const hours = Math.floor(totalSeconds / 3600  ) % 24;
//         const mins = Math.floor(totalSeconds / 60) % 60;
    
//         daysEl.innerHTML = days;
//         hoursEl.innerHTML = formatTime(hours);
//         minsEl.innerHTML = formatTime(mins);
//     }else{
//         const convertEventDate = new Date(eventDate);
//         // const timeEventConvert = new Date(timeEvent);
        
//         const currentDate = new Date();
    
//         const totalSeconds = (convertEventDate - currentDate) / 1000;
        
//         const endDate = totalSeconds + seconds
//         const days = Math.floor(endDate / 3600 / 24);
//         const hours = Math.floor(endDate / 3600  ) % 24;
//         const mins = Math.floor(endDate / 60) % 60;
    
//         daysEl.innerHTML = days;
//         hoursEl.innerHTML = formatTime(hours);
//         minsEl.innerHTML = formatTime(mins);
//     }
    
// }

// function formatTime(time) { 
//     return time < 10 ? `0${time - 2}` : time;
// }

// // initial call
// countdown();

// setInterval(countdown, 1000);



// function compareTowDate(date1, date2) { 
//     const date1Arr = date1.split("-");
//     const date2Arr = date2.split("-");

//     const date1Convert = new Date(date1Arr[2], date1Arr[1] - 1, date1Arr[0]);
//     const date2Convert = new Date(date2Arr[2], date2Arr[1] - 1, date2Arr[0]);

//     if (date1Convert > date2Convert) {
//         return true;
//     } else {
//         return false;
//     }
// }








const daysEl = document.getElementById("days");
const hoursEl = document.getElementById("hours");
const minsEl = document.getElementById("mins");
var eventDate = document.getElementById("dateEvent").innerHTML;
var TimeEvent = document.getElementById("TimeEvent").innerHTML;

const newYears = eventDate;
const time = TimeEvent;

function countdown() {
    const newYearsDate = new Date(newYears + " " + time);
    const currentDate = new Date();

    const totalSeconds = (newYearsDate - currentDate) / 1000;

    const days = Math.floor(totalSeconds / 3600 / 24);
    const hours = Math.floor(totalSeconds / 3600) % 24;
    const mins = Math.floor(totalSeconds / 60) % 60;

    daysEl.innerHTML = days;
    hoursEl.innerHTML = formatTime(hours);
    minsEl.innerHTML = formatTime(mins);
}

function formatTime(time) {
//    console.log(time);
    return time < 10 ? `0${time}` : time;
}

// initial call
countdown();

setInterval(countdown, 1000);