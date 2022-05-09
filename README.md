# Ascension CMS/API Framework

## Getting started

To get started you will need to ensure you have composer installed on your system, this can be either system wide or local for the project. It is recommended that you install it system wide for ease.

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

After installation you update the required dependancies that will also install the core:

```
composer update
```

### Serving the CMS

Set your web root to the following:
 

```
public_html/
```

## Developing

### Developing new areas of functionality
Areas of business logic should be implemented under the lib folder utilising PSR-0 namespacing this will ensure the dependancy injection is able to
address these classes with ease.

### Adding DataStorage Objects

To add access to other systems classes can be created under the PSR-0 root "<b>lib/</b>" these classes are free in terms
of functionality and structure but it is recommended that they follow the example as a bare minimum


### Controllers

Each class should contain a constructor that allows for the following objects to be passed into it:

```  /**
     * Controller constructor.
     * @param Repository $Repository
     */
    public function __construct(
        HTTP $Request,
        $settings,
        Repository $Repository
    )
    {
        $this->Request = $Request;
        $this->settings = $settings;
        $this->Repository = $Repository;
    }
```
### Object description:


| Object | Description |
|--------| ----------- |
|Request | Allows access to data provided to the system via GET/POST/PUT ect.|
| Settings | Allows object->property based access to the configuration file |
| Repository | Allows access to the repository access to the repository witin the same area of business functionality|

### Interfaces

Standard Interface notation applies.

### Repository

Example

```
/**
 * Class Repository
 * @package API\Repository
 */
class Repository implements IRepository
{

    /**
     * @var $dataStorage - Datastorage connector
     */
    protected $dataStorage;

    /**
     * @var object
     */
    protected $settings;

    /**
     * @param $dataStorage
     * @param $settings
     */
    public function __construct(
        $dataStorage,
        $settings
    ) {
        $this->dataStorage = $dataStorage;
        $this->settings = $settings;
    }
}
```

Each repository is provided with two objects passed via the core framework providing access to the datastorage objects and settings.

| Object      | Description|
|-------------| -----------| 
| DataStorage | Data storage object providing access to external systems
| Settings | Object->Property based access to the settings file.|



Authored by Chris Kay-Ayling 2022
