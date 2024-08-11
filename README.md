
# Holiday plans

Project to plan the holidays


## Installation

To deploy this project run

Create the .env file
```bash
cp .env.example .env
```

With docker we will run composer.json
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```


Create the docker containers
```bash
./vendor/bin/sail up -d
```

Set the application key
```bash
./vendor/bin/sail artisan key:generate
```

Run the migrations and seeds
```bash
./vendor/bin/sail artisan migrate --seed
```
## API Reference

#### Post Login

```http
  POST /api/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` `password` | `string` | **Required**. email password|

#### Get Holiday

```http
  GET /api/holiday
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `string` | **Required**. Your API key |

#### Get Holiday by id

```http
  GET /api/holiday/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `api_key` `id` | `string` `int` | **Required**. Returns the holiday by id  and your API key|


#### Put Holiday

```http
  PUT /api/holiday/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `api_key` `id` | `string` `int` | **Required**. Update the holiday by id  and your API key|



#### Delete Holiday

```http
  DELETE /api/holiday/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `api_key` `id` | `string` `int` | **Required**. Remove holiday by id  and your API key|
