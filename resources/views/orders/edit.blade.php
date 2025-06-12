@extends('layouts.app')

@section('content')
    <h1>Редактировать статус заказа #{{ $order->id }}</h1>

    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="status">Статус:</label>
            <select name="status" id="status">
                <option value="новый" {{ $order->status === 'новый' ? 'selected' : '' }}>новый</option>
                <option value="выполнен" {{ $order->status === 'выполнен' ? 'selected' : '' }}>выполнен</option>
            </select>
        </div>

        <button type="submit">Сохранить</button>
        <a href="{{ route('orders.index') }}">Отмена</a>
    </form>
@endsection
