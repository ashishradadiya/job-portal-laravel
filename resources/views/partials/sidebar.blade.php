<div class="col-md-2">  
    <ul class="list-group">
        @if(auth()->user()->role->name == 'admin')
        <li class="list-group-item"><a href="{{ route('home') }}" class="text-primary text-decoration-none">Dashboard</a></li>
        <li class="list-group-item"><a href="{{ route('users.list') }}" class="text-primary text-decoration-none">User Applications</a></li>
        @else
        <li class="list-group-item"><a href="{{ route('test.show') }}" class="text-primary text-decoration-none">Dashboard</a></li>
        @endif
    </ul>
</div>
