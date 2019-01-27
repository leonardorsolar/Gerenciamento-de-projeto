
 <div class="bg-white p-4 rounded-lg shadow" style="height: 200px">
        <h3 class="font-normal text-xl mb-4 -ml-6 mb-3 border-l-4 border-blue pl-4 "> 
        <a href="{{$project->path()}}" class="text-black no-underline">{{ $project->title }}</a>
        
        
        </h3>
        <div class="text-grey">{{ str_limit($project->description, 250)   }}</div>
    </div>

