<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>

<ul>
    
    // todos projetos ... um projeto
    @foreach ($projects as $project)

    <li>{{ $project->title}}</li>

    @endforeach

</ul>

    
</body>
</html>
