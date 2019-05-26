
<h1>Привет, {{ $name }}</h1><br><hr>
<label style="font-weight: bold;"> Имя клиента:</label>
<a href="mailto:{{$name1}}" style="color: red;font-size: 20px;">{{$name1}}</a>
<br><hr>
<label style="font-weight: bold;">Номер телефон клиента:</label>
<a href="tel:{{$telephone}}" style="color: red;font-size: 20px;"><i class="fa fa-phone"> {{$telephone}} </i></a><br><hr>
<label style="font-weight: bold;">Описание сообщении:</label>
<p> {{ $messsage }} </p>
