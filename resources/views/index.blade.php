<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Livros</title>
</head>
<body>
    <h1>Lista de Livros</h1>
<ul>
    @foreach ($books as $book)
        <li>{{ $books->name_product }}</li>
    @endforeach
</ul>
</body>
</html>
