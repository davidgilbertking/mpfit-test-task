# MPFit Test Task

Веб-приложение для управления товарами и заказами на Laravel 9.x

## 📦 Установка

1. Клонируйте репозиторий:

```bash
git clone https://github.com/davidgilbertking/mpfit-test-task.git
cd mpfit-test-task
```

2. Установите зависимости:

```bash
composer install
```

3. Скопируйте `.env` и сгенерируйте ключ:

```bash
cp .env.example .env
php artisan key:generate
```

4. Создайте файл SQLite:

```bash
touch database/database.sqlite
```

5. Запустите миграции и посейте данные:

```bash
php artisan migrate --seed
```

6. Запустите приложение:

```bash
php artisan serve
```

Перейдите в браузере: [http://127.0.0.1:8000/products](http://127.0.0.1:8000/products)

## ⚙️ Функционал

### Товары
- Добавление, редактирование, удаление
- Список с названием, ценой и категорией
- Привязка к категориям: лёгкий, хрупкий, тяжёлый

### Заказы
- Создание с выбором одного товара и количества
- Статусы: `новый`, `выполнен`
- Список и просмотр с полной информацией
- Редактирование только статуса

## ✅ Требования выполнены
- Валидация через FormRequest
- Используется Eloquent и миграции
- Связи: товары — категории, заказы — товары
- Laravel 9.x
- HTML-верстка минимальна по ТЗ
