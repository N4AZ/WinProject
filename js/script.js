var countDownDate = new Date("Jan 5, 2020 15:37:25").getTime();

var x = setInterval(function() 
{ 
    var dd = document.querySelector("#dd"); 
    var hh = document.querySelector("#hh"); 
    var mm = document.querySelector("#mm"); 
    var ss = document.querySelector("#ss");

    var now = new Date().getTime();
    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    dd.innerHTML = days;
    hh.innerHTML = hours;
    mm.innerHTML = minutes;
    ss.innerHTML = seconds;

    if (distance < 0) 
    {
        clearInterval(x);
        dd.innerHTML = "00";
        hh.innerHTML = "00";
        mm.innerHTML = "00";
        ss.innerHTML = "00";
        counter.innerHTML = "لقد وصلت متأخرا";
        win.classList.remove('disabled');
    }
}, 1000);


