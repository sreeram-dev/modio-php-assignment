# Welcome to Mod.io Laravel Code Challenge

this code tests contains 3 challenges in incrementing difficulty. Please spin up your enviromnet with sail (docker).
And to start run phpunit tests for each challenge as found at:
```
\tests\feature\Challenge{Number}Test
```

There is boilerplate which is not 'always' complete in 
```
\app\http\controllers\Challenge{Number}
```

Hint: you may need to run and create your own migrations for some challenges.

## Challenge 1.0

this challenge covers:
- controllers
- routing
- api resource

implement the controllers in the challengeOne directory. Add the routes required and any resources.

Hint: make sure you are using the correct files

## Challenge 2.0

implement the controllers in the challengeTwo directory.

this challenge covers:
- migrations
- relationships
- pagination

Hint: check the TODOs

## Challenge 3.0

implement the controllers in the challengeThree directory.

this challenge covers:
- repository design pattern
- observers
- middleware
- services

Hint: these are designed to be basic examples. Don't overthink it

## Tests

Please note we have unit tests. This will give an idea of how well you have completed the challenges
Note: the test we run maybe different to what we provide you here.

(if you find an issue with a broken test or feel the test is broken contact us.)

Hint: run test suite (you will need to run it from the container)
```vendor/bin/phpunit --testsuite Tests "tests"```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Stuck

The docs are you best friend https://laravel.com/docs/8.x/installation
