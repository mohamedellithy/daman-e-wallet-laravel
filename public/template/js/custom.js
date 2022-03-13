//* YOUR CUSTOMIZED JAVASCRIPT *//

///======Clone method
$(document).ready(function() {
    $("body").on("click", ".add_node_btn_frm_field", function(e) {
        var index = $(e.target).closest(".form_field_outer").find(".form_field_outer_row").length + 1;
        var cloned_el = $(e.target).closest(".form_field_outer_row").clone(true);

        $(e.target).closest(".form_field_outer").last().append(cloned_el).find(".remove_node_btn_frm_field:not(:first)").prop("disabled", false);

        $(e.target).closest(".form_field_outer").find(".remove_node_btn_frm_field").first().prop("disabled", true);

        //change id
        $(e.target)
            .closest(".form_field_outer")
            .find(".form_field_outer_row")
            .last()
            .find("input[type='text']")
            .attr("id", "mobileb_no_" + index);

        $(e.target)
            .closest(".form_field_outer")
            .find(".form_field_outer_row")
            .last()
            .find("select")
            .attr("id", "no_type_" + index);

        console.log(cloned_el);
        //count++;
    });
});