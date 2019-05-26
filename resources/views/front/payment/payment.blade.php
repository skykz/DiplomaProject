
<style>
    @import url("https://fonts.googleapis.com/css?family=Share+Tech+Mono");
    * {
        transition: all .3s ease;
        font-family: 'Share Tech Mono', monospace;
        font-size: 15px;
        outline: none;
    }
    * input:focus {
        transform: scale(1.1);
    }

    .main {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    input {
        margin: 5px;
        color: white;
    }

    ::-webkit-input-placeholder {
        color: white;
        opacity: 0.9;
    }

    ::-moz-placeholder {
        color: white;
        opacity: 0.9;
    }

    :-ms-input-placeholder {
        color: white;
        opacity: 0.9;
    }

    :-moz-placeholder {
        color: white;
        opacity: 0.9;
    }

    form {
        position: relative;
        top: 10%;
        left: 7%;
        width: 100%;
    }
    form .card {
        position: relative;
    }
    form .card .card-front {
        width: 425px;
        height: 250px;
        border-radius: 10px;
        background: url("http://www.dualspark.com/assets/images/background/low_poly_background.jpg");
        background-size: cover;
        position: relative;
        z-index: 99;
    }
    form .card .card-front input {
        border: none;
        border-bottom: 2px solid white;
        background: transparent;
        padding: 5px;
        margin-left: 7%;
    }
    form .card .card-front .bank-name {
        position: absolute;
        left: 175px;
        top: 5%;
    }
    form .card .card-front .card-num {
        position: absolute;
        width: 100%;
        top: 7em;
        margin-left: 7%;
    }
    form .card .card-front .card-num input {
        width: 50px;
        margin: 5px;
    }
    form .card .card-front .holder-name {
        position: absolute;
        left: 0;
        top: 170px;
    }
    form .card .card-front .exp-date {
        position: absolute;
        left: 50%;
        top: 170px;
    }
    form .card .card-front .exp-date input {
        width: 25px;
        margin: 5px;
    }
    form .card .card-front .sign {
        position: absolute;
        top: 80px;
        right: 5%;
        width: 30px;
        height: 30px;
        background: url("http://www.clker.com/cliparts/6/e/2/s/6/V/plainwifiright.svg");
        background-size: cover;
    }
    form .card .card-back {
        width: 425px;
        height: 250px;
        border-radius: 10px;
        background: rgba(224, 221, 215, 0.75);
        position: relative;
        z-index: -1;
        margin-top: -50%;
        left: 30%;
    }
    form .card .card-back .magnet {
        position: relative;
        width: 100%;
        background: #333;
        height: 60px;
        top: 20%;
    }
    form .card .card-back input {
        position: absolute;
        top: 60%;
        right: 10%;
        border: none;
        border: 2px solid white;
        background: #ccc;
        padding: 5px;
        width: 50px;
    }

    .submit {
        width: 100%;
        position: relative;
        top: 20px;
    }
    .submit input[type=submit] {
        padding: 15px !important;
        color: black;
        background: transparent;
        border: 2px solid #0e5b65;
        border-radius: 8px;
        width: 120%;
        text-transform: uppercase;
    }
    .submit input[type=submit]:hover, .submit input[type=submit]:focus, .submit input[type=submit]:active {
        background: #0e5b65;
        cursor: pointer;
        color: white;
        border: 0;
        transform: scale(1.1);
    }

</style>
<center>
    <h1 style="font-size: 30px">Форма оплаты для покупки товара</h1>
</center>
<div class="main">

    <form action="{{route('apply.order')}}" method="post">

        @csrf
        <div class="card group">

            <div class="card-front">
                <input type="text" placeholder="Имя банка" class="bank-name" />
                <div class="card-num">
                    <input type="hidden" value="{{$user_id}}" name="user_id"/>
                    <input type="hidden" value="{{$product_id}}" name="product_id"/>
                    <input class="inputs" type="text" maxlength="4" placeholder="1234" pattern="[0-9]{4}" />
                    <input class="inputs" type="text" placeholder="1234" maxlength="4" pattern="[0-9]{4}" />
                    <input class="inputs" type="text" placeholder="1234" maxlength="4" pattern="[0-9]{4}" />
                    <input class="inputs" type="text" placeholder="1234" maxlength="4" pattern="[0-9]{4}" />
                </div>
                <input type="text" placeholder="Владелец карты" class="holder-name" />
                <div class="exp-date">
                    <input class="inputs" pattern="[0-9]{2}" placeholder="12" type="text" maxlength="2" />
                    <input class="inputs" pattern="[0-9]{2}" placeholder="12" type="text" maxlength="2" />
                </div>
                <div class="sign"></div>
            </div>

            <div class="card-back">
                <div class="magnet"></div>
                <input class="inputs" placeholder="CVC код" type="text" maxlength="3" pattern="[0-9]{3}" />
            </div>

        </div>
        <div class="submit">
            <input type="submit" value="Оплатить" />
        </div>

    </form>
</div>
<script>
    // autoTab input field, when it reaches maxlength
    $(".inputs").keyup(function () {
        if (this.value.length == this.maxLength) {
            $(this).next('.inputs').focus();
        }
    });
</script>
