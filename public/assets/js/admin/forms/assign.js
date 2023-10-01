const originalValue = crud.field('originalValue').value;

if (originalValue != null) {
    crud.field('assignMessage').hide();

    crud.field('patient_id').onChange(function(field) {
        crud.field('assignMessage').show(field.value != 0 && field.value != originalValue);
      }).change();
}else{
    crud.field('dispatchMessage').hide();
    crud.field('assignMessage').require();
    crud.field('patient_id').require();
}
