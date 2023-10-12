$(document).ready(function() {
    $("#addEmail").on("click", function() {
        $("#more-input").append("<div class=\"input-wrapper\"><input type=\"text\" name=\"parent_id\" class=\"form-control parent_id\" placeholder=\"Ведите название категории\" id=\"parent_id\" value=\"\"/><input type=\"hidden\" name=\"parent_id_hidden\" id=\"parent_id_hidden\"/><div class=\"suggestions\"></div></div>");
    });
    $("#removeEmail").on("click", function() {
        $("#more-input").children().last().remove();
    });
});

$(document).ready(function() { $("#e1").select2(); });
$(document).ready(function() { $("#e2").select2(); });
$(document).ready(function() { $("#e3").select2(); });

$(".select option").each(function() {
    $(this).siblings('[value="'+ this.value +'"]').remove();

    console.log("test");
});

// <div className="input-wrapper"><label>@error('parent_id_hidden')<div className=parent_id_hidden>{{$message}}</div>@enderror<input type="text" name="parent_id" className="form-control" placeholder="Ведите название категории" id="parent_id" value=""/><input type="hidden" name="parent_id_hidden" id="parent_id_hidden"/></label><div id="suggestions"></div></div>
