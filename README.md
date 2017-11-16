# DevDic

> DevDic is a programming dictionary for Developers by Developers. This Bot can teach you almost everything about almost 
> any programming language by showing you the language meaning and also suggest good important links/tutorials to learn.

## How to use

### Use case 1:

- First, go to facebook and search for `devdic`(devdic is the name of the bot). Once located, click on it.

- There are number of commands you can use to interact with the bot (example): 
  * `language php`
     This command will show details about PHP and will bring out a number of good links to learn about PHP.
  * `language php extension`
     This command will show PHP extension - `.php`
     
  To find out more about other commands, you can use to interact with the bot, type `help` and submit.


### Use case 2:

  * Head to the bot messenger page [here](https://www.messenger.com/t/devdic).

## Want to use our API?

Head over to the [documentation page](http://devdic.herokuapp.com/documentation) for available endpoints.

## Setting up the project

#### Requiremets:

 - PHP >= 5.6.4
 - Composer

 1. Clone the repository

```
   git clone git@github.com:DevOfFuture/DevDic.git
```

 2. Install dependencies

```
   composer install
```
3. Configuration

 Creates a new file - `.env`.
```
  cp .env.example .env
```
Change the content of .env to your configuration settings

4. Serving Your Application

```
   php -S localhost:9999 -t public
```

5. Relax and contribute to the project :fire:
