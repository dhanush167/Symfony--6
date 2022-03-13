
```
composer require annotations
```

<p>
 create first controller
</p>



```
composer require symfony/maker-bundle --dev

symfony console make:controller MovieController
```

<p>go to route </p>


```

http://127.0.0.1:8000/movie

```

<p>Route parameters</p>

```

symfony console debug:router

```

<p>add twig for project</p>

```
composer require twig

```


<p>Create a database using doctrine</p>


```

symfony console

composer require orm

symfony console list doctrine

```

<p>database connection </p>

```

composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
symfony console doctrine:database:create

```

<p>Entities in Symfony</p>


<p>1.add movie entity</p>

```
symfony console list doctrine
symfony console

symfony console make:entity Movie
```

```
symfony console make:entity Actor
```

<p>define a relation between table</p>

```
symfony console make:entity Movie

```

```
symfony console make:migration

php bin/console doctrine:migrations:migrate

```

<p>data fixtures</p>

```
composer require --dev doctrine/doctrine-fixtures-bundle
```
```
symfony console doctrine:fixtures:load
```