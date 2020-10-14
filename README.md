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

## Models
Any model classes go within `app/Models` and should extend `Framework/BaseModel`. At the moment, no full ORM exists - heavy work in progress both in documentation and function.
1. Protected property `$db` contains a PDO connection to the database configured. 
2. `protected $table` should be set to the table name.  
3. The `->all()` method returns an array of model objects with the a `attributes` property containing the row's data.

## Views
Views are placed in the `views` directory.

## Database
See `config/env.example.php` for the database connection parameters. Optional.

## Assets
Basic Webpack configuration included with asset base located at `/assets/index.js`. Includes Babel, Sass, and URL loaders.
NPM scripts include `npm run build` and `npm run watch`.

## Helpers
* `getBasePath(<optional appends>)` returns the path of the applications root directory.
* `getViewPath(<optional appends>)` returns the path of a the `view` directory.
* `config(<name>)` returns associated `<name>.php` config located in `/config`.

## Todo...
1. Migrations & Database Seeders.
2. DB Query Helpers & ORM.
3. View Templates or similar.
4. Route parameters.
5. Error Handling (and develop vs production).
6. Shell commands.