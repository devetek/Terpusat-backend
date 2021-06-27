## About
A simple PHP Laravel graphql integration, thanks to [rebing](https://github.com/rebing/graphql-laravel) to create a awesome package. But if you want to use other laravel graphql alternative package, below we have lists which can use to help on building graphql server with Laravel. Each package have their own pros and cons.

## Development
Before you start, check if there all requirements already installed. This boilerplate depends on:
- docker `Docker version 20.10.7, build f0df350`
- docker-compse `docker-compose version 1.29.2, build 5becea4c`
- composer `Composer version 2.0.4 2020-10-30 22:39:11`
- GNU Make `GNU Make 3.81`

After installation finished, running the service by type shortcut command from the root directory:

```sh
make run
```

The dependencies and command above running well in macOS and Linux. For Windows user, you can use docker-compose command but it need setup the environment manually before running docker-compose. currently this project depends on `bitnami/laravel` base image without vendor installed inside. Composer still needed in the host to installing dependencies befor mounting it to the docker container.

## Bookmark
- [lighthouse-php](https://lighthouse-php.com/)
- [Laravel Lighthouse - GraphQL](https://www.toptal.com/graphql/laravel-graphql-server-tutorial)
- [UnitTest GraphQL](https://dev.to/marvinrabe/testing-graphql-apis-with-laravel-49p1)

## Support
If you face any problems while running this project, you can contact me from any of the contacts on [terpusat](https://terpusat.com/)
