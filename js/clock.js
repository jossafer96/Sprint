function myClock() {
    let date = new Date();
    let hours = date.getHours(); // 0 - 23
    let minutes = date.getMinutes(); // 0 - 59
    let seconds = date.getSeconds(); // 0 -59

    if (hours == 0) {
        hours = 12;
    }
    if (hours > 12) {
        hours = hours - 12;
    }
    if (hours < 10) {
        hours = '0' + hours;
    }
    if (minutes < 10) {
        minutes = '0' + minutes;
    }
    if (seconds < 10) {
        seconds = '0' + seconds;
    }
    let time = hours + ":" + minutes + ":" + seconds;
    document.getElementById("my-clock").innerHTML = time;

    setTimeout(myClock, 1000);
}

function myDate() {
    let date = new Date();
    let day = date.getDate();
    let month = date.getMonth();
    let year = date.getFullYear();

    switch (date.getMonth()) {
        case 0:
            month = 'Enero';
            break;
        case 1:
            month = 'Febrero';
            break;
        case 2:
            month = 'Marzo';
            break;
        case 3:
            month = 'Abril';
            break;
        case 4:
            month = 'Mayo';
            break;
        case 5:
            month = 'Junio';
            break;
        case 6:
            month = 'Julio';
            break;
        case 7:
            month = 'Agosto';
            break;
        case 8:
            month = 'Septiembre';
            break;
        case 9:
            month = 'Octubre';
            break;
        case 10:
            month = 'Noviembre';
            break;
        case 11:
            month = 'Deciembre';
            break;
        default:
            month = 'Mes no Disponible';
    }
    let today = day + ", " + month + " " + year + '.';
    document.getElementById('my-date').innerHTML = today ;
}

myClock();
myDate();