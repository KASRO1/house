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
function openSupport() {
    const tickets_list = document.getElementById("tickets-list");
    tickets_list.classList.add("show", "fade-in");
    document.addEventListener('click', function (event) {
        if (event.target === tickets_list) {
            tickets_list.classList.remove("fade-in");
            tickets_list.classList.add("fade-out");
            setTimeout(() => {
                tickets_list.classList.remove("show", "fade-out");
            }, 200); // Длительность анимации в миллисекундах
        }
    });
}

function closeSupport() {
    const tickets_list = document.getElementById("tickets-list");
    tickets_list.classList.remove("show", "fade-in");
    tickets_list.classList.add("fade-out");
    setTimeout(() => {
        tickets_list.classList.remove("fade-out");
    }, 200); // Длительность анимации в миллисекундах
}

