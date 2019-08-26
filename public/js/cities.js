$(function () {

    $("#department").change(function(){
        var id=parseInt($(this).val());
        if(id>0){
            AjaxCities(id);
            $("#city").prop("disabled", false);
        }else{
            $("#city").prop("disabled", true);
            $("#city").html("");
        }

    });

    function AjaxCities(id){
        $.ajax({
            type: "get",
            url: "/cities",
            data: "id="+id,
            dataType: "json",
            success: function (response) {
                result = "";
                $.each(response, function(i, item) {
                    result += "<option value='"+item.id+"'>"
                                    +item.name+"</option>";
                });
                $("#city").html(result);
            }
        });
    }
});