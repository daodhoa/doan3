$(document).on('click','.checkboxx',function () {
    var mangcaudalam = [];
    $('.checkboxx:checked').map(function () {
        var stt = $(this).data('stt')-1;
        if(mangcaudalam.indexOf(stt) == -1)
        {
            mangcaudalam.insert(mangcaudalam.length,stt);
        }
    })


    $('.minimap').each(function () {
        var a = parseInt($(this).text());
        if(mangcaudalam.indexOf(a) == -1)
        {
            // console.log($(this).text());
            $('#map'+$(this).text()).css('color','red');
        }
        else
        {
            $('#map'+$(this).text()).css('color','#00a65a');
        }
    })



    // if($(this).prop('checked')==true)
    // {
    //     alert($(this).data('stt'));
    // }
})

function jump(h){
    var top = document.getElementById(h).offsetTop;
    window.scrollTo(99, top);
}

// function jump(h) {
//     var top = document.getElementById(h).offsetTop,
//         left = document.getElementById(h).offsetLeft;
//     var animator = createAnimator({
//         start: [0,0],
//         end: [left, top],
//         duration: 500
//     }, function(vals){
//         console.log(arguments);
//         window.scrollTo(vals[0], vals[1]);
//     });
//
//     //run
//     animator();
// }



//Animator
//Licensed under the MIT License
function createAnimator(config, callback, done) {
    if (typeof config !== "object") throw new TypeError("Arguement config expect an Object");

    var start = config.start,
        mid = $.extend({}, start), //clone object
        math = $.extend({}, start), //precalculate the math
        end = config.end,
        duration = config.duration || 1000,
        startTime, endTime;

    //t*(b-d)/(a-c) + (a*d-b*c)/(a-c);
    function precalculate(a, b, c, d) {
        return [(b - d) / (a - c), (a * d - b * c) / (a - c)];
    }

    function calculate(key, t) {
        return t * math[key][0] + math[key][1];
    }

    function step() {
        var t = Date.now();
        var val = end;
        if (t < endTime) {
            val = mid;
            for (var key in mid) {
                mid[key] = calculate(key, t);
            }
            callback(val);
            requestAnimationFrame(step);
        } else {
            callback(val);
            done && done();
        }
    }

    return function () {
        startTime = Date.now();
        endTime = startTime + duration;

        for (var key in math) {
            math[key] = precalculate(startTime, start[key], endTime, end[key]);
        }

        step();
    }
}