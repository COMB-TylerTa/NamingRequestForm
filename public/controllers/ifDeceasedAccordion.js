$('select[name="ifDeceasedSelection"]').change(function(event){
    var selected = $(this).find('option:selected');
    var value = selected.attr("value");
    if (value == "yes") {
        const ifNotDeceasedSection = document.getElementById('notDeceasedForm');

        ifNotDeceasedSection.classList.remove("show");
    }
});
