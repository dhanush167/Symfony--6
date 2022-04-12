<h3> Creating Routes as Attributes or Annotations </h3>

<p> Creating Routes (This configuration tells Symfony to look for routes) </p>

```
composer require annotations
```

<h3>
 
 create first controller
 
</h3>



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

<p>how to compile assets in symfony 6 compile css</p>

```
composer require symfony/webpack-encore-bundle
```
```
npm install --global yarn

npm i @symfony/webpack-encore
```

```
npm run dev
```

<p>javascript compile</p>

```
npm run watch
```

<hr>

<p>create form</p>

```
composer require symfony/form
```

```
symfony console make:form MovieFormType Movie
```

```
composer require symfony/mime
```


<p>Validation</p>

```
composer require symfony/validator doctrine/annotations
```

<p>add to entity file</p>

```
use Symfony\Component\Validator\Constraints as Assert;
```

## Security

```
composer require symfony/security-bundle
```

```
php bin/console make:user
```

```
symfony console make:migration
symfony console doctrine:migrations:migrate
```

```
symfony console make:registration-form
```

<p>add login form</p>

```
symfony console make:auth
```
<h4> Query Builder </h4>

```php


    public function selectOnlyTitle()
    {
        $qb = $this->createQueryBuilder('m');
        return $qb->select('m.title')
        ->getQuery()
        ->getResult();
    }

    public function selectOnlyTitleId7()
    {
        $qb = $this->createQueryBuilder('m');
        return $qb->select('m.title')
        ->where('m.id=7')
        ->getQuery()
        ->getResult();
    }


    public function selectOnlyLimitData()
    {
        $qb = $this->createQueryBuilder('m');
        return $qb->select('m.title')
        ->setMaxResults('2')
        ->setFirstResult(3)
        ->getQuery()
        ->getResult();
    }

    public function selectOnlyLimitDataRandom()
    {
        $randomId = rand(1, 5);

        $qb = $this->createQueryBuilder('m');

        return $qb->select('m.title')
        ->setMaxResults(3)
        ->setFirstResult($randomId)
        ->getQuery()
        ->getResult();

    }

    public function passParameterOrVariable()
    {

        $randomId = rand(7, 9);

        $qb = $this->createQueryBuilder('m');

        return $qb->select('m.title')
        ->where('m.id=:val')
        ->setParameter('val', $randomId)
        ->getQuery()
        ->getResult();
       

    }
    
    /*set multiple setParameters*/
    ->setParameters(array('param1'=> $param1, 'param2' => $param2))
    
    

```











