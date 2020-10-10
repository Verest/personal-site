# php-simple-framework

Basic framework I am creating for practice. Future intent is to host my own personal site using this framework.

## Routes
Defined in `routes/web.php` with the format:
```
return [
    'GET' => [
        '<PATH>' => '<Fully Qualified NameSpace of Controller>@<MethodName>',
    ],
]
```

## Controllers
Controller classes are placed in `app/Controllers`. For the present moment, a view path being returned is assumed. A view
path is returned in one of two formats and is relative to the `view` folder.
```
// Without Arguments
return "path/to/view.php";

// With Arguments
return [
    "view" => "path/to/view.php",
    "args" => [
        "<name1>" => "<value1>",
    ]
]
```

## Views
Views are placed in the `views` directory.

## Helpers
`getBasePath()` returns the path of the applications root directory.
`getViewPath()` returns the path of a the `view` directory.

### Todo...
1. Models, Migrations, Database Seeders, etc.
2. Controllers returning more than a view, e.g. JSON data.
3. Error Handling (and developer vs production).
4. View Templates or similar.
5. Default assets pipeline for CSS and JS, likely webpack with SASS/Babel.