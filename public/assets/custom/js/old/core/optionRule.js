//Auto Select
export let autoSelect = (id, val) => {
    $('select#' + id + ' option').each(function () {
        this.selected = (this.value == val);
    });
}

export let autoSelectLike = (id, val) => {
    var ids = "";
    //    console.log(val);
    $('select#' + id + ' option').each(function () {
        var rg = new RegExp(val, "gi");
        this.selected = (this.text.match(rg));
    });
    return $('#' + id).val();
}
//End Auto Select

//GET OPTION TEXT
export let getOptText = (id) => {
    var str = "";
    $('#' + id + ' option:selected').each(function () {
        str = $(this).text();
    });
    return str;
}
//GET OPTION TEXT