@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Список товаров</h1>

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Добавить товар</a>

        @if($products->count())
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Цена (₽)</th>
                    <th>Категория</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->name ?? '—' }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Редактировать</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Удалить товар?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $products->links() }} <!-- Пагинация -->
        @else
            <p>Товары не найдены.</p>
        @endif
    </div>
@endsection
