Per eseguire l'applicativo è necessario avere installato docker e docker-compose.

1)Aprire un terminale bash nella cartella azienda_automobilistica
2)Eseguire il seguente comando:

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs 

3)Eseguire il seguente comando:

sudo chown -R $USER: .

4)Eseguire il seguente comando:

cp .env.example .env

5)aprire il .env file e controllare se le specifiche riguardanti al db siano le seguenti, e correggerle dove non sono uguali:

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=azienda_automobilistica
DB_USERNAME=sail
DB_PASSWORD=password

6)Eseguire il seguente comando:

vendor/bin/sail up -d

7)Eseguire il seguente comando:
docker ps -a

e verificare che il container mysql sia attivo e non sia terminato

	se dovesse termirnare lanciare i seguenti comandi:
		docker-compose down --volumes
		sail up --build

8)Eseguire il seguente comando per esguire il terminale del container:
vendor/bin/sail bash
	
	dal terminale del container eseguire:
	php artisan key:generate
	php artisan migrate:fresh --seed

crtl+p crtl+q per uscire dal terminale

ora l'applicativo è funzionante e può essere visto su qualsiasi browser sul localhost


vendor/bin/sail down    -> per terminare i container
vendor/bin/sail up		-> per far ripartire il tutto