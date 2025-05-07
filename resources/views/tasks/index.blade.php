
@section('content')
<div class="container mx-auto p-4">
  <h1 class="text-2xl font-bold mb-4">tasks</h1>
  <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">New task</a>
  <table class="min-w-full mt-4 border-collapse">
    <thead><tr class="bg-gray-100"><th class="px-4 py-2">Title</th><th>Type</th><th>Start</th><th>End</th><th>Venue</th><th>Actions</th></tr></thead>
    <tbody>
    @foreach($tasks as $task)
      <tr class="border-t">
        <td class="px-4 py-2"><a href="{{ route('tasks.show',$task) }}" class="text-blue-600">{{ $task->title }}</a></td>
        <td class="px-4 py-2">{{ ucfirst($task->type) }}</td>
        <td class="px-4 py-2">{{ $task->start_time }}</td>
        <td class="px-4 py-2">{{ $task->end_time }}</td>
        <td class="px-4 py-2">{{ optional($task->venue)->name ?? 'N/A' }}</td>
        <td class="px-4 py-2">
          <a href="{{ route('tasks.edit',$task) }}" class="text-yellow-600 mr-2">Edit</a>
          <form action="{{ route('tasks.destroy',$task) }}" method="POST" class="inline">@csrf @method('DELETE')
            <button class="text-red-600" onclick="return confirm('Delete?')">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection