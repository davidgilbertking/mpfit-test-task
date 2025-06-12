@extends('layouts.app')

@section('content')
    <h1>Добавить товар</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Название:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="description">Описание:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
            @error('description') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="price">Цена:</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" required step="0.01">
            @error('price') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="category_id">Категория:</label>
            <select id="category_id" name="category_id" required>
                <option value="">-- выберите категорию --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <div>{{ $message }}</div> @enderror
        </div>

        <button type="submit">Сохранить</button>
    </form>
@endsection
