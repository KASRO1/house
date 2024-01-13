@section("footer")
    <div class="container">
        <div class="footer-content">
            <div class="footer-logo">
                <a href="/">
                    <img src="{{asset("images/logo.svg")}}" alt=""/>
                    {{$Domain['title'] ?? "CRYPTOHOUSE"}}
                </a>
                <div class="copyright text_small_12">
                    © 2023. All rights reserved by Cryptohouse
                </div>
            </div>
            <div class="footer-links">
                <a href="/privacy" class="link_15">Privacy policy</a>
                <a href="/risk" class="link_15">Risk warning</a>
                <a href="/security" class="link_15">Security</a>
                <a href="/terms" class="link_15">Terms of use</a>
                <a href="/referral" class="link_15">Referral</a>
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
        function renderMessage(audioBoolean) {
            const message_container = document.getElementById("message-container");

            ticketId = {{$ticket ? $ticket->id : 0}};

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

                    if(audioBoolean){
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
                    const message = document.getElementById("ticketMessage");
                    message.value = '';
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

@endsection
