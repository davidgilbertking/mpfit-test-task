@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Список заказов</h1>

        <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Создать заказ</a>

        @if($orders->count())
            <table class="table table-bordered">
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
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->total_price }} ₽</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">Посмотреть</a>
                            <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-warning">Редактировать</a>
                            <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить заказ?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $orders->links() }} <!-- Пагинация -->
        @else
            <p>Заказы не найдены.</p>
        @endif
    </div>
@endsection
