<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gerenciamento</title>
</head>
<body>

<ul>
    <h1>Gerenciamento</h1>
    
    @forelse ($projects as $project)

    <ul>

    <li>
        <a href="{{ $project->path}}">{{ $project->title}}</a>
    </li>
    @empty

    <li>No projects yet.</li>

    @endforelse

    </ul>

</ul> 

    
</body>
</html>
