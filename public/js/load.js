$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function validateInput(inputElement) {

    var inputValue = inputElement.value;

    if (isNaN(inputValue)) {

        inputElement.classList.add('fail-text');
    } else {

        inputElement.classList.remove('fail-text');
    }
}
