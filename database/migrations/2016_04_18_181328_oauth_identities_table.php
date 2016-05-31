<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class OauthIdentitiesTable extends Migration
{
    /**
     * The authentication service providers table name.
     *
     * @var string
     */
    protected $authenticationProvidersTable;
    /**
     * The users table name.
     *
     * @var string
     */
    protected $usersTable;

    /**
     * CreateOauthIdentitiesTable constructor.
     */
    public function __construct()
    {
        $this->authenticationProvidersTable = Config::get('laraveltube-socialite.table');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->authenticationProvidersTable, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('provider_user_id');
            $table->string('provider');
            $table->string('access_token');
            $table->string('avatar');
            $table->string('name')->nullable();
            $table->string('nickname')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->authenticationProvidersTable, function (Blueprint $table) {
            $table->dropForeign('oauth_identities_user_id_foreign');
        });
        Schema::drop($this->authenticationProvidersTable);
    }
}
