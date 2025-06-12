@extends('layouts.app')

@section('content')
    <h1>Редактировать товар</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Название:</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
        </div>

        <div>
            <label>Описание:</label>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label>Цена:</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}">
        </div>

        <div>
            <label>Категория:</label>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Сохранить изменения</button>
    </form>
@endsection
