function myFunction() {
    return true;
}

$(document).on('click','.checkboxx',function () {
    var mangcauhoi = [];
    $('.checkboxx:checked').map(function () {
        var cauhoi = $(this).data('ques');
        if(mangcauhoi.indexOf(cauhoi) == -1)
        {
            mangcauhoi.insert(mangcauhoi.length,cauhoi);
        }
    })

    $('.socaudatraloi').html(mangcauhoi.length);
})

Array.prototype.insert = function (index, item) {//phương thức insert vào mảng
    this.splice(index, 0, item);
};

Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};

Array.prototype.equals = function (array) {
    // if the other array is a falsy value, return
    if (!array)
        return false;

    // compare lengths - can save a lot of time
    if (this.length != array.length)
        return false;

    for (var i = 0, l=this.length; i < l; i++) {
        // Check if we have nested arrays
        if (this[i] instanceof Array && array[i] instanceof Array) {
            // recurse into the nested arrays
            if (!this[i].equals(array[i]))
                return false;
        }
        else if (this[i] != array[i]) {
            // Warning - two different object instances will never be equal: {x:20} != {x:20}
            return false;
        }
    }
    return true;
}

Object.defineProperty(Array.prototype, "equals", {enumerable: false});
