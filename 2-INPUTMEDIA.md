## CONTROLLER STORE

```
$data = $request->except('cover');

if ($request->hasFile('cover')) {
    $data['cover'] = $request->file('cover')->store('covers', 'public');
}

Book::create($data);

```

## CONTROLLER UPDATE

```
$book = Book::find($id);
$data = $request->except('cover');

if ($request->hasFile('cover')) {
    $data['cover'] = $request->file('cover')->store('covers', 'public');
}

$book->update($data);

```

## THEAD

```
<th>Cover</th>
```

## TBODY

```
<td>
    <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'storage/covers/dummy.jpg' }}"
        width="50">
</td>
```

## FORM

```
<form action="{{ $editBook ? '/books/' . $editBook->id : '/books' }}" method="POST" enctype="multipart/form-data">

<input type="file" name="cover" accept="image/*"> <br>
```
