@foreach ($items as $item)
<h1>{{ $item->title }}</h1>
<p>{{ $item->description }}</p>
@endforeach