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

<p>MovieFormType.php</p>

```php

<?php

namespace App\Form;

use App\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',TextType::class,[
                 'attr'=>array(
                     'class'=>'form-control mb-5',
                     'placeholder'=>'Title'
                 )
            ])

            ->add('releaseYear',IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control mb-5',
                    'placeholder'=>'Release Year'
                )
            ])

            ->add('description',TextareaType::class,[
                'attr'=>array(
                    'class'=>'form-control mb-5',
                    'placeholder'=>'Description'
                )
            ])

//            ->add('imagePath',FileType::class,[
//                'attr'=>array(
//                    'class'=>'mb-5',
//                )
//            ])

            ->add('imagePath', FileType::class, array(
                'required' => false,
                'mapped' => false,
            ))
            //->add('actors')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Movie::class,
        ]);
    }
}

```

<p>MovieController.php</p>

```php

    #[Route('/movies/create', name: 'movie.create')]
    public function create(Request $request): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieFormType::class,$movie);
        $form->handleRequest($request);

        return $this->render('movie/create.html.twig',['form'=>$form->createView()]);
    }

```

<p>index.html.twig</p>

```php

   {{ form_start(form) }}

                <div class="row">

                    <div class="col-md-12">
                      {{ form_widget(form) }}
                    </div>

                    <div class="col-md-12">
                        <a href="{{ path('movie.index') }}" class="btn btn-sm btn-success"> Back</a>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>

                </div>

       {{ form_end(form) }}

```


