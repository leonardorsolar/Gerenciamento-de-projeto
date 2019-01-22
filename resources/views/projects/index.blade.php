<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gerenciamento</title>
</head>
<body>

<ul>
    <h1>Gerenciamento</h1>

    <ul>
    
        @forelse ($projects as $project)

            <li>
                <a href="{{ $project->path() }}">{{ $project->title }}</a>
            </li>
            @empty

            <li>No projects yet.</li>

        @endforelse

    </ul>

</ul> 

    
</body>
</html>
