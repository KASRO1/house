@section("footer")
    <div class="container">
        <div class="footer-content">
            <div class="footer-logo">
                <a href="/">
                    <img src="{{asset("images/logo.svg")}}" alt=""/>
                    {{$Domain ? $Domain['title'] :  "CRYPTOHOUSE"}}
                </a>
                <div class="copyright text_small_12">
                    © 2023. All rights reserved by {{$Domain ? $Domain['title'] :  "CRYPTOHOUSE"}}
                </div>
            </div>
            <div class="footer-links">
                <a href="/privacy" class="link_15">Privacy policy</a>
                <a href="/risk" class="link_15">Risk warning</a>
                <a href="/security" class="link_15">Security</a>
                <a href="/terms" class="link_15">Terms of use</a>
                <a href="/referral" class="link_15">Referral</a>
                <a rel="nofollow" class="trustpolot" href="https://trustpilotn.com/php/api.php?link={{$_SERVER['SERVER_NAME']}}&type=4">
                    <img height="22px" width="83px" class="dark" src="/images/trustpilot.svg" alt="trustpilot">
                </a>
            </div>
            <div class="footer-disclamer">
                <p class="text_small_12 _120">
                    The Transactions offered by this Website can be executed only by
                    fully competent adults. Transactions with financial instruments
                    offered on the Website involve substantial risk and trading may be
                    very risky
                </p>
            </div>
        </div>
    </div>

    <script src="{{asset("js/jquery-3.7.1.min.js")}}"></script>
    <script src="{{asset("js/custom-select.js")}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset("js/app.js")}}"></script>
    <script src="{{asset("js/load.js")}}"></script>
    <script>
        $(".burger").click(function () {
            $(this).toggleClass("active");
            $(".header-content").toggleClass("open");
            if ($(".header-content").hasClass("open")) {
                $("body").css("overflow", "hidden");
            } else {
                $("body").css("overflow", "");
            }
        });
    </script>
    <script>
        const selectSupport = new ItcCustomSelect("#selectSupport")
        let lastData = "";
        let ticketId = {{$ticket ? $ticket->id : 0}};
        function renderMessage(audioBoolean) {
            const message_container = document.getElementById("message-container");

            if(ticketId === 0){
                return;
            }
            $.ajax({
                url: '{{route("chat.message.get")}}',
                type: 'GET',
                data: {
                    ticket_id: ticketId,
                },
                success: function (data) {

                    if (lastData.length == data.messages.length) {
                        return;
                    }
                    if (!lastData) {
                        lastData = data.messages;
                    }

                    if(audioBoolean && lastData.length < data.messages.length && lastData != ""){
                        var audio = new Audio('/audio/notify.mp3');
                        audio.play();

                    }
                    lastData = data.messages;
                    message_container.innerHTML = "";


                    data.messages.forEach(function (item, index) {
                        const element = document.createElement("div");
                        element.classList.add("message");
                        const title = document.createElement("p");
                        title.classList.add("message-title");
                        if (item.role == "support") {
                            title.classList.add("support");
                            title.innerText = "Support";
                        } else {
                            title.innerText = "You";
                        }
                        const message = document.createElement("p");
                        message.classList.add("message-text")
                        message.innerText = item.message;

                        element.appendChild(title);
                        element.appendChild(message);

                        message_container.appendChild(element);
                    });

                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
        renderMessage(true);
        setInterval(()=>{
            renderMessage(true)

        }, 5000);



        const sendMessageForm = document.getElementById("sendMessageForm");
        sendMessageForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const formData = new FormData(sendMessageForm);
            $.ajax({
                url: '{{route("chat.message.send")}}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    const message = document.getElementById("sendMessageInput");
                    message.value = '';
                    renderMessage();

                },
                error: function (data) {
                    console.log(data);
                }
            });
        })

        const ticketForm = document.getElementById("ticketForm");
        ticketForm.addEventListener("submit", (e) =>
        {
            e.preventDefault();
            const formData = new FormData(ticketForm);
            formData.append("category", selectSupport.value);

            $.ajax({
                url: '{{route("chat.ticket.create")}}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    const ticketForm = document.getElementById("ticketForm");
                    const chat_container = document.getElementById("chat_container");
                    ticketForm.style.display = "none";
                    chat_container.style.display = "";
                    ticketId = data.id;
                    const ticket_id = document.getElementById("ticket_id");
                    ticket_id.value = data.id;
                    renderMessage(false);

                },
                error: function (data) {
                    const errors = data.responseJSON.errors;
                    const errorMessages = Object.values(errors);
                    errorMessages.forEach((errorMessage) => {
                        errorMessage.forEach((message) => {
                            iziToast.show({
                                ...commonOptions,
                                message: message,
                                iconUrl: "{{ asset('images/fail.svg') }}",
                            });
                        });
                    });
                }
            });
        })

    </script>
    <script src="{{asset("js/iziModal.min.js")}}"></script>
    <script>
        const modalOptions1 = {
            radius: "15px",
            padding: "30px",
            width: 500,
        };
        $("#errorMessage").iziModal(modalOptions1);
    </script>
@endsection
