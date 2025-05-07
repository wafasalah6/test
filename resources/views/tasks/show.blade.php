
@section('content')
<div class="container mx-auto p-4">
  <h1 class="text-2xl font-bold mb-4">{{ \$task->title }}</h1>
  <ul class="list-disc pl-5">
    <li><strong>Type:</strong> {{ ucfirst(\$task->type) }}</li>
    <li><strong>When:</strong> {{ \$task->start_time }} – {{ \$task->end_time }}</li>
    <li><strong>Capacity:</strong> {{ \$task->capacity }}</li>
    <li><strong>Price:</strong> {{ \$task->price_cents }} cents</li>
    <li><strong>Venue:</strong> {{ optional(\$task->venue)->name ?? 'N/A' }}</li>
    <li><strong>Description:</strong> {{ \$task->description }}</li>
  </ul>
  <a href="{{ route('tasks.index') }}" class="mt-4 inline-block text-blue-600">Back to list</a>
</div>
@endsection
