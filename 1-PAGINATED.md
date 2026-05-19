## SERVED SIDE

```
public function index()
{
$books = Book::paginate(8); // sebelumnya pakai ::all()
return view('books.index', compact('books'));
}
```

## CLIENT SIDE

```
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<table id="booksTable" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Cover</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->judul }}</td>
                <td>{{ $book->penulis }}</td>
                <td>{{ $book->tahun }}</td>
                <td>
                    <img src="{{ $book->cover ? asset('storage/' . $book->cover) : '' }}" width="50">
                </td>
                <td>
                    <a href="/books?edit={{ $book->id }}">Edit</a>
                    <form action="/books/{{ $book->id }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus buku ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#booksTable').DataTable({
            pageLength: 8  // 8 data per halaman
        });
    });
</script>
```
