$.fn.serializeObject = function(){
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
		o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
$('#json_form').submit(function() {
    $('#result').text(JSON.stringify($('#json_form').serializeObject()));
    return false;
});
$('#sub_button').click(function() {
    $.post('#form.html', JSON.stringify($('#json_form').serializeObject()));
});
