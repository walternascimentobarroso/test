laravel install
touch ./database/database.sqlite

php artisan migrate

php artisan make:Model Type -m
php artisan make:Model Rule -m
php artisan make:Model Blacklist -m

php artisan make:migration create_types_table
$table->string('description');

php artisan make:migration create_rules_table
$table->string('rule');
$table->string('description');
$table->integer('type_id');
$table->boolean('active');
$table->timestamps();

$table->foreign('type_id')->references('id')->on('types');

php artisan make:migration create_blacklists_table
$table->string('domain');
$table->string('description');
$table->boolean('active');

# test
