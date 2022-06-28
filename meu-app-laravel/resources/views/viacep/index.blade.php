<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ViaCEP</title>
</head>
<body>
    <section>
        <form action="{{ route('viacep.index.post') }}" method="post">
            @csrf
            <label for="cep">CEP:</label>
            <input type="text" name="cep" id="cep" placeholder="Digite o CEP">
            <button type="submit">Buscar</button>
            
        </form>
    </section>
</body>
</html>