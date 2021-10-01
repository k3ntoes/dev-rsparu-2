//to Uppercase text
let toUpper = (id) => {
    var str = $(`#${id}`).val();
    str = str.toUpperCase();
    str = str.replace("'", "`");
    str = str.replace('"', '`');
    return $(`#${id}`).val(str);
}
//to Uppercase

//to Uppercase textarea
let toUpperTextarea = id => {
    var str = $(`#${id}`).val();
    str = str.toUpperCase();
    str = str.replace("'", "`");
    str = str.replace('"', '`');
    return $(`#${id}`).html(str);
}
//to Uppercase

let isEmpty = (value) => {
    return typeof value == 'string' && !value.trim() || typeof value == 'undefined' || value === null;
};

let disable_enter = () => {
    $('input[type=text]').on("keydown", function (e) {
        var keyCode = e.keyCode;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
}