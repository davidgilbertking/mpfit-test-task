@extends('layouts.app')

@section('content')
    <h1>Создание заказа</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div>
            <label>Имя клиента:</label><br>
            <input type="text" name="customer_name" value="{{ old('customer_name') }}" required>
        </div>

        <div>
            <label>Товар:</label><br>
            <select name="product_id" required>
                <option value="">Выберите товар</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} ({{ $product->price }} ₽)
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Количество:</label><br>
            <input type="number" name="quantity" min="1" value="{{ old('quantity', 1) }}" required>
        </div>

        <div>
            <label>Комментарий:</label><br>
            <textarea name="comment">{{ old('comment') }}</textarea>
        </div>

        <div>
            <label>Статус:</label><br>
            <select name="status">
                <option value="новый" {{ old('status') === 'новый' ? 'selected' : '' }}>Новый</option>
                <option value="выполнен" {{ old('status') === 'выполнен' ? 'selected' : '' }}>Выполнен</option>
            </select>
        </div>

        <button type="submit">Создать заказ</button>
    </form>

    <p><a href="{{ route('orders.index') }}">← Назад к списку заказов</a></p>
@endsection
