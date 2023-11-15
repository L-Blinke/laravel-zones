const originalTypeValue = crud.field('type').value;

const originalModelValue = crud.field('type').value;

i = 0;

if (originalTypeValue == "View") {
    crud.field('list-icon').hide();
}

while (crud.field('function_name_'+i).value !== undefined) {
    crud.field('function_name_'+i).show(crud.field('model_id').input.options.selectedIndex == i);
    i++;
}

crud.field('type').onChange(function(field) {
    crud.field('list-icon').show(field.value != "View");
}).change();

crud.field('model_id').onChange(function(field) {
    e = 0;

    while (crud.field('function_name_'+e).value !== undefined) {
        crud.field('function_name_'+e).show(crud.field('model_id').input.options.selectedIndex == e);
        e++;
    }
}).change();
