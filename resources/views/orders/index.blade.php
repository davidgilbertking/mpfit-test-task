@extends('layouts.app')

@section('content')
    <h1>Список заказов</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('orders.create') }}">Создать заказ</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
        <tr>
            <th>ID</th>
            <th>Клиент</th>
            <th>Товар</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Статус</th>
            <th>Дата</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total_price }} ₽</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}">Посмотреть</a> |
                    <a href="{{ route('orders.edit', $order) }}">Редактировать</a> |
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Удалить заказ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">Заказы не найдены.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $orders->links() }}
@endsection
