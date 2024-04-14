# Spatie Laravel Data

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-data.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-data)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/spatie/laravel-data/Tests?label=tests)](https://github.com/spatie/laravel-data/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/laravel-data.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-data)

## Introduction

Spatie Laravel Data simplifies data manipulation and transformation in Laravel applications. It allows you to define data classes that encapsulate and structure your application data, making it easier to work with throughout your application.

## Features

- **Data Transfer Objects (DTOs):** Define DTOs to structure your data and enforce data integrity.
- **Data Transformation:** Transform your data using transformers, making it easy to adapt data for different contexts.
- **Validation:** Validate your data using Laravel's validation rules.
- **Serialization:** Serialize your data to JSON or other formats effortlessly.
- **Fluent API:** Utilize a fluent, expressive API for working with data.

## Getting Started

To get started with Spatie Laravel Data, define your data classes by extending the `Spatie\LaravelData\Data` class. You can then define properties on your data classes to represent the data fields. Use transformers to customize how your data is transformed and serialized.


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Documentation

You can find the full documentation on the [Spatie website](https://spatie.be/docs/laravel-data/v4/introduction).

## Installation

**Install the package using Composer:**

```bash
composer require spatie/laravel-data
```

```php
use Spatie\LaravelData\Data;

class CategoryData extends Data
{
    public function __construct(
        public ?int $id,

        public string $title,

        public string|null $is_active,

        /** @var Collection<int, BlogData>|null */
        public ?Collection $blogs,

        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $updated_at
    )
    {
    }
}
```

```php
public function store(CategoryData $request)
{
    Category::query()->create(Arr::only($request->all(), ['id', 'title', 'is_active']));

    $request->is_active = $request->is_active == true ? 1 : 0;

    Session::flash('success', 'Category created successfully');

    return redirect()->route('admin.categories.index');
}
```

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel Spatie/Laravel-data Demo above repo example, please send an e-mail to Taylor Otwell via [Mail Me](mailto:meghathanki2020@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

If you discover a security vulnerability within Spatie Laravel Data Demo above Repo, please send an e-mail to [Mail Me](mailto:meghathanki2020@gmail.com) . All security vulnerabilities will be promptly addressed.




