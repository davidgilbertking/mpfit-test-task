@extends('layouts.app')

@section('content')
    <h1>Информация о заказе #{{ $order->id }}</h1>

    <p><strong>Клиент:</strong> {{ $order->customer_name }}</p>
    <p><strong>Товар:</strong> {{ $order->product->name }}</p>
    <p><strong>Количество:</strong> {{ $order->quantity }}</p>
    <p><strong>Цена за единицу:</strong> {{ $order->product->price }} ₽</p>
    <p><strong>Итоговая цена:</strong> {{ $order->total_price }} ₽</p>
    <p><strong>Комментарий:</strong> {{ $order->comment ?? '—' }}</p>
    <p><strong>Статус:</strong> {{ $order->status }}</p>

    <p>
        <a href="{{ route('orders.edit', $order) }}">Редактировать</a> |
        <a href="{{ route('orders.index') }}">← Назад к списку</a>
    </p>
@endsection
