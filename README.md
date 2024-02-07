# Proyecto ApiFP2

Se realiza un api formal **(Api:JSON Spec)** para ofrecer los datos del proyecto de innovación gestionado por el **IES San Alberto** de Sabiñánigo
## Comenzando
Fecha de comienzo 7/02/2022
Planificación 
## Planificación de Tareas

| Tarea   | Responsable | Estado    | Fecha de Inicio | Fecha de Finalización | Notas                    |
|---------|-------------|-----------|-----------------|-----------------------|--------------------------|
| Tarea 1 | Manuel      | Terminada | 07-02-2024      | 07-02-2024 | Crear el proyectos (git) |
| Tarea 2 | Manuel      | Iniciada  | 07-02-2024      | 07-02-2024 | Dockerizar la BD         |
| Tarea 2 | Manuel      | Pendiente | 07-02-2024      |  |                          |
| Tarea 3 | Manuel      | Pendiente | 07-02-2024      |  |                          |

## Requisitos Funcionales

| ID   | Requisito                        | Prioridad | Estado      |
|------|----------------------------------|-----------|-------------|
| RNF1 | Documentar con git el proyecto   | Alta      | En progreso |
| RF2  | Dockerizar la base de datos      | Alta      | En progreso |
| RF3  |  |




### Pre-requisitos



### Instalación



## Uso



## Desarrollo

### Creamos el ambiente en laravel


#### Los modelos
Creamos cada modelo con el factory y seeder para realizar una población de datos 
```bash
php artisan make:model Family -fs
php artisan make:model Project -fs
php artisan make:model Entity -fs
php artisan make:model User -fs
php artisan make:model Technology -fs
php artisan make:model Favourite -fs
php artisan make:model Implement -fs
php artisan make:model Collaboration -fs
```
#### Los controladores 
De tipo resource API
```bash
php artisan make:controller FamilyController --api
php artisan make:controller ProjectController --api
php artisan make:controller EntityController --api
php artisan make:controller UserController --api
php artisan make:controller TechnologyController --api
php artisan make:controller FavouriteController --api
php artisan make:controller ImplementController --api
php artisan make:controller CollaborationController --api
```

#### Los resources
```bash
php artisan make:resource FamilyResource
php artisan make:resource ProjectResource
php artisan make:resource EntityResource
php artisan make:resource UserResource
php artisan make:resource TechnologyResource
php artisan make:resource FavouriteResource
php artisan make:resource ImplementResource
php artisan make:resource CollaborationResource
```
#### Los collection

```bash
php artisan make:resource FamilyCollection --collection
php artisan make:resource ProjectCollection --collection
php artisan make:resource EntityCollection --collection
php artisan make:resource UserCollection --collection
php artisan make:resource TechnologyCollection --collection
php artisan make:resource FavouriteCollection --collection
php artisan make:resource ImplementCollection --collection
php artisan make:resource CollaborationCollection --collection
```
#### Los request
```bash
php artisan make:request StoreFamilyRequest
php artisan make:request UpdateFamilyRequest

php artisan make:request StoreProjectRequest
php artisan make:request UpdateProjectRequest

php artisan make:request StoreEntityRequest
php artisan make:request UpdateEntityRequest

php artisan make:request StoreUserRequest
php artisan make:request UpdateUserRequest

php artisan make:request StoreTechnologyRequest
php artisan make:request UpdateTechnologyRequest

php artisan make:request StoreFavouriteRequest
php artisan make:request UpdateFavouriteRequest

php artisan make:request StoreImplementRequest
php artisan make:request UpdateImplementRequest

php artisan make:request StoreCollaborationRequest
php artisan make:request UpdateCollaborationRequest
```

#### Alternativa (Nuevo para mi)
Vamos a utilizar [blueprint](https://blueprint.laravelshift.com/) una alternativa que puede permitirme crear a partir de un yaml toda esta estructura anteriormente especificada.
##### Instalo el paquete
**-W o --with-all-dependencies**, Composer actualizará las dependencias de tu proyecto a sus últimas versiones permitidas dentro de las restricciones de tus versiones actuales, tratando de resolver cualquier conflicto de dependencia de la mejor manera posible.
````bash
composer require -W --dev laravel-shift/blueprint
````
*Creamos el fichero de especificación **draft.yaml**
````bash
php artisan blueprint:init
````
##### Completamos el fichero de especificación 
[Contenido del fichero ](./draft.yaml)

Ahora ejectuo el fichero para crear todo el ecosistema

```bash
php artisan blueprint:build
```
*Por el motivo que sea, no ha creado los seeder, los creo con artisan
````bash
php artisan make:seeder FamilySeeder
php artisan make:seeder ProjectSeeder
php artisan make:seeder EntitySeeder
php artisan make:seeder UserSeeder
php artisan make:seeder TechnologySeeder
php artisan make:seeder FavouriteSeeder
php artisan make:seeder ImplementSeeder
php artisan make:seeder CollaborationSeeder

````
### Pruebas



### Despliegue


## Herramientas Utilizadas


- [Docker](url)
- [swagger](url)
- [Laravel](url)
- [Api:Json (spec)](url)
- ...

## Contribuir


## Versionado

V1.0 

## Autores

- **Manuel Romero Miguel** - *Trabajo Inicial* - [UsuarioGitHub](https://github.com/MAlejandroR)


## Licencia


## Agradecimientos

