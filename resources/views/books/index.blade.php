<!DOCTYPE html>
<html>

<head>
    <title>Daftar Buku</title>
</head>

<body>

    <h1>Daftar Buku</h1>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Cover</th>
            <th>Aksi</th>
        </tr>

        @foreach ($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->judul }}</td>
                <td>{{ $book->penulis }}</td>
                <td>{{ $book->tahun }}</td>
                <td>
                    <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'storage/covers/dummy.jpg' }}"
                        width="50">
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

    </table>

    <h2>{{ request('edit') ? 'Edit Buku' : 'Tambah Buku' }}</h2>

    @php $editBook = request('edit') ? $books->find(request('edit')) : null @endphp

    <form action="{{ $editBook ? '/books/' . $editBook->id : '/books' }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($editBook) @method('PUT') @endif

        <input type="text" name="judul" placeholder="Judul" value="{{ $editBook->judul ?? '' }}" required> <br>
        <input type="text" name="penulis" placeholder="Penulis" value="{{ $editBook->penulis ?? '' }}" required> <br>
        <input type="number" name="tahun" placeholder="Tahun" value="{{ $editBook->tahun ?? '' }}" required> <br>
        <input type="file" name="cover" accept="image/*"> <br>
        <button type="submit">{{ $editBook ? 'Update' : 'Simpan' }}</button>
    </form>

</body>

</html>