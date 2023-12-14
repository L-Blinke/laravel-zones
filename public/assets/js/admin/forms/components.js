i = 0;
i2 = 1;

while (crud.field('function_name_'+i+"_"+i2).value !== undefined) {
    for (let index = 1; index <= crud.field('range').value; index++) {
        crud.field('function_name_'+i+"_"+index).show(crud.field('model_id').input.options.selectedIndex == i);
        i2++;
    }
    i++;
    i2 = 1;
}

crud.field('range').onChange(function(field) {
    console.log(field.value);
}).change();

crud.field('model_id').onChange(function(field) {
    e = 0;
    e2 = 1;

    while (crud.field('function_name_'+e+"_"+e2).value !== undefined) {
        for (let index = 1; index <= 4; index++) {
            crud.field('function_name_'+e+"_"+index).show(crud.field('model_id').input.options.selectedIndex == e && crud.field('range').value >= index);
            e2++;
        }
        e++;
        e2 = 1;
    }


}).change();

crud.field('range').onChange(function(field) {
    e = 0;
    e2 = 1;

    while (crud.field('function_name_'+e+"_"+e2).value !== undefined) {
        for (let index = 1; index <= 4; index++) {
            crud.field('function_name_'+e+"_"+index).show(crud.field('model_id').input.options.selectedIndex == e && crud.field('range').value >= index);
            e2++;
        }
        e++;
        e2 = 1;
    }


}).change();
