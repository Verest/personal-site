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
Controller classes are placed in `app/Controllers`. Supported return values include a view or JSON data. A view
path is returned in one of two formats and is relative to the `view` folder.
```
// Without Arguments (view only)
return response("view", "<path to view>");

// With Arguments
return response("<'view' or 'json'>", $data);

// Where $data above is...
$data = [
    'view' => '<path to view>', 
    'args' => ['<variableName1>' => '<value1>', ...]
];

// ...or...
$data = <something JSON-able, e.g. an array>;
```

## Views
Views are placed in the `views` directory.

## Assets
Basic Webpack configuration included with asset base located at `/assets/index.js`. Includes Babel, Sass, and URL loaders.
NPM scripts include `npm run build` and `npm run watch`.

## Helpers
* `getBasePath()` returns the path of the applications root directory.
* `getViewPath()` returns the path of a the `view` directory.

## Todo...
1. Models, Migrations, Database Seeders, etc.
2. Error Handling (and developer vs production).
3. View Templates or similar.