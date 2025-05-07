
@section('content')
<div class="container mx-auto p-4">
  <h1 class="text-2xl font-bold mb-4">{{ isset(\$task) ? 'Edit' : 'New' }} task</h1>
  <form method="POST" action="{{ isset(\$task) ? route('tasks.update',\$task) : route('tasks.store') }}">
    @csrf
    @isset(\$task) @method('PUT') @endisset
    <div class="mb-4"><label class="block">Title</label><input class="w-full border px-2 py-1" name="title" value="{{ old('title',\$task->title ?? '') }}"></div>
    <div class="mb-4"><label class="block">Type</label>
      <select class="w-full border px-2 py-1" name="type">
        <option value="class"{{ (old('type',\$task->type ?? '')=='class')?' selected':''}}>Class</option>
        <option value="event"{{ (old('type',\$task->type ?? '')=='event')?' selected':''}}>Event</option>
      </select>
    </div>
    <div class="mb-4"><label class="block">Description</label><textarea class="w-full border px-2 py-1" name="description">{{ old('description',\$task->description ?? '') }}</textarea></div>
    <div class="mb-4 grid grid-cols-2 gap-4">
      <div><label>Capacity</label><input type="number" class="w-full border px-2 py-1" name="capacity" value="{{ old('capacity',\$task->capacity ?? '') }}"></div>
      <div><label>Price (cents)</label><input type="number" class="w-full border px-2 py-1" name="price_cents" value="{{ old('price_cents',\$task->price_cents ?? '') }}"></div>
    </div>
    <div class="mb-4 grid grid-cols-2 gap-4">
      <div><label>Start Time</label><input type="datetime-local" class="w-full border px-2 py-1" name="start_time" value="{{ old('start_time', isset(\$task)?\$task->start_time->format('Y-m-d\TH:i'): '') }}"></div>
      <div><label>End Time</label><input type="datetime-local" class="w-full border px-2 py-1" name="end_time" value="{{ old('end_time', isset(\$task)?\$task->end_time->format('Y-m-d\TH:i'): '') }}"></div>
    </div>
    <div class="mb-4"><label class="block">Venue</label>
      <select class="w-full border px-2 py-1" name="venue_id">
        <option value="">None</option>
        @foreach(\$venues as \$venue)
          <option value="{{ \$venue->id }}"{{ (old('venue_id',\$task->venue_id ?? '')==\$venue->id)?' selected':'' }}>{{ \$venue->name }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Save</button>
  </form>
</div>
@endsection