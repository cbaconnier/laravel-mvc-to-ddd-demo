# Demo
This is a demo of a fresh Laravel 8 application using Livewire, Jetstream and teams feature modified by the package [cbaconnier/laravel-mvc-to-ddd](https://github.com/cbaconnier/laravel-mvc-to-ddd)

## Architecture

```
.
├── boostrap
├── config
├── database
├── public
├── resources
├── routes
├── src
│   ├── App
│   │   ├── Controllers
│   │   ├── Exceptions
│   │   ├── Providers
│   │   └── View
│   ├── Domain  
│   │   ├── Team
│   │   │   ├── Actions
│   │   │   ├── Models
│   │   │   └── Policies
│   │   └── User   
│   │       ├── Actions
│   │       ├── Models
│   │       └── Rules
│   └── Support  
│       └── Middleware
├── storage
└── tests
    ├── App
    │   ├── ApiTokens
    │   ├── ApiTokens
    │   ├── Profile
    │   └── Teams
    ├── Domain
    └── App
```
