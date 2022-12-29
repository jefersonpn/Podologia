<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Cidade;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->string('uf');
            $table->string('name');
            $table->timestamps();
        });
           
            $data = [
                ['id' =>  4041, 'estado_id' => 12, 'uf' => 'MS','name' => 'Agua Boa'],
                ['id' =>  4042, 'estado_id' => 12, 'uf' => 'MS','name' => 'Agua Clara'],
                ['id' =>  4043, 'estado_id' => 12, 'uf' => 'MS','name' => 'Albuquerque'],
                ['id' =>  4044, 'estado_id' => 12, 'uf' => 'MS','name' => 'Alcinopolis'],
                ['id' =>  4045, 'estado_id' => 12, 'uf' => 'MS','name' => 'Alto Sucuriu'],
                ['id' =>  4046, 'estado_id' => 12, 'uf' => 'MS','name' => 'Amambai'],
                ['id' =>  4047, 'estado_id' => 12, 'uf' => 'MS','name' => 'Amandina'],
                ['id' =>  4048, 'estado_id' => 12, 'uf' => 'MS','name' => 'Amolar'],
                ['id' =>  4049, 'estado_id' => 12, 'uf' => 'MS','name' => 'Anastacio'],
                ['id' =>  4050, 'estado_id' => 12, 'uf' => 'MS','name' => 'Anaurilandia'],
                ['id' =>  4051, 'estado_id' => 12, 'uf' => 'MS','name' => 'Angelica'],
                ['id' =>  4052, 'estado_id' => 12, 'uf' => 'MS','name' => 'Anhandui'],
                ['id' =>  4053, 'estado_id' => 12, 'uf' => 'MS','name' => 'Antonio Joao'],
                ['id' =>  4054, 'estado_id' => 12, 'uf' => 'MS','name' => 'Aparecida do Taboado'],
                ['id' =>  4055, 'estado_id' => 12, 'uf' => 'MS','name' => 'Aquidauana'],
                ['id' =>  4056, 'estado_id' => 12, 'uf' => 'MS','name' => 'Aral Moreira'],
                ['id' =>  4057, 'estado_id' => 12, 'uf' => 'MS','name' => 'Arapua'],
                ['id' =>  4058, 'estado_id' => 12, 'uf' => 'MS','name' => 'Areado'],
                ['id' =>  4059, 'estado_id' => 12, 'uf' => 'MS','name' => 'Arvore Grande'],
                ['id' =>  4060, 'estado_id' => 12, 'uf' => 'MS','name' => 'Baianopolis'],
                ['id' =>  4061, 'estado_id' => 12, 'uf' => 'MS','name' => 'Balsamo'],
                ['id' =>  4062, 'estado_id' => 12, 'uf' => 'MS','name' => 'Bandeirantes'],
                ['id' =>  4063, 'estado_id' => 12, 'uf' => 'MS','name' => 'Bataguassu'],
                ['id' =>  4064, 'estado_id' => 12, 'uf' => 'MS','name' => 'Bataipora'],
                ['id' =>  4065, 'estado_id' => 12, 'uf' => 'MS','name' => 'Baus'],
                ['id' =>  4066, 'estado_id' => 12, 'uf' => 'MS','name' => 'Bela Vista'],
                ['id' =>  4067, 'estado_id' => 12, 'uf' => 'MS','name' => 'Bocaja'],
                ['id' =>  4068, 'estado_id' => 12, 'uf' => 'MS','name' => 'Bodoquena'],
                ['id' =>  4069, 'estado_id' => 12, 'uf' => 'MS','name' => 'Bom Fim'],
                ['id' =>  4070, 'estado_id' => 12, 'uf' => 'MS','name' => 'Bonito'],
                ['id' =>  4071, 'estado_id' => 12, 'uf' => 'MS','name' => 'Boqueirao'],
                ['id' =>  4072, 'estado_id' => 12, 'uf' => 'MS','name' => 'Brasilandia'],
                ['id' =>  4073, 'estado_id' => 12, 'uf' => 'MS','name' => 'Caarapo'],
                ['id' =>  4074, 'estado_id' => 12, 'uf' => 'MS','name' => 'Cabeceira do Apa'],
                ['id' =>  4075, 'estado_id' => 12, 'uf' => 'MS','name' => 'Cachoeira'],
                ['id' =>  4076, 'estado_id' => 12, 'uf' => 'MS','name' => 'Camapua'],
                ['id' =>  4077, 'estado_id' => 12, 'uf' => 'MS','name' => 'Camisao'],
                ['id' =>  4078, 'estado_id' => 12, 'uf' => 'MS','name' => 'Campestre'],
                ['id' =>  4079, 'estado_id' => 12, 'uf' => 'MS','name' => 'Campo Grande'],
                ['id' =>  4080, 'estado_id' => 12, 'uf' => 'MS','name' => 'Capao Seco'],
                ['id' =>  4081, 'estado_id' => 12, 'uf' => 'MS','name' => 'Caracol'],
                ['id' =>  4082, 'estado_id' => 12, 'uf' => 'MS','name' => 'Carumbe'],
                ['id' =>  4083, 'estado_id' => 12, 'uf' => 'MS','name' => 'Cassilandia'],
                ['id' =>  4084, 'estado_id' => 12, 'uf' => 'MS','name' => 'Chapadao do Sul'],
                ['id' =>  4085, 'estado_id' => 12, 'uf' => 'MS','name' => 'Cipolandia'],
                ['id' =>  4086, 'estado_id' => 12, 'uf' => 'MS','name' => 'Coimbra'],
                ['id' =>  4087, 'estado_id' => 12, 'uf' => 'MS','name' => 'Congonha'],
                ['id' =>  4088, 'estado_id' => 12, 'uf' => 'MS','name' => 'Corguinho'],
                ['id' =>  4089, 'estado_id' => 12, 'uf' => 'MS','name' => 'Coronel Sapucaia'],
                ['id' =>  4090, 'estado_id' => 12, 'uf' => 'MS','name' => 'Corumba'],
                ['id' =>  4091, 'estado_id' => 12, 'uf' => 'MS','name' => 'Costa Rica'],
                ['id' =>  4092, 'estado_id' => 12, 'uf' => 'MS','name' => 'Coxim'],
                ['id' =>  4093, 'estado_id' => 12, 'uf' => 'MS','name' => 'Cristalina'],
                ['id' =>  4094, 'estado_id' => 12, 'uf' => 'MS','name' => 'Cruzaltina'],
                ['id' =>  4095, 'estado_id' => 12, 'uf' => 'MS','name' => 'Culturama'],
                ['id' =>  4096, 'estado_id' => 12, 'uf' => 'MS','name' => 'Cupins'],
                ['id' =>  4097, 'estado_id' => 12, 'uf' => 'MS','name' => 'Debrasa'],
                ['id' =>  4098, 'estado_id' => 12, 'uf' => 'MS','name' => 'Deodapolis'],
                ['id' =>  4099, 'estado_id' => 12, 'uf' => 'MS','name' => 'Dois Irmaos do Buriti'],
                ['id' =>  4100, 'estado_id' => 12, 'uf' => 'MS','name' => 'Douradina'],
                ['id' =>  4101, 'estado_id' => 12, 'uf' => 'MS','name' => 'Dourados'],
                ['id' =>  4102, 'estado_id' => 12, 'uf' => 'MS','name' => 'Eldorado'],
                ['id' =>  4103, 'estado_id' => 12, 'uf' => 'MS','name' => 'Fatima do Sul'],
                ['id' =>  4104, 'estado_id' => 12, 'uf' => 'MS','name' => 'Figueirao'],
                ['id' =>  4105, 'estado_id' => 12, 'uf' => 'MS','name' => 'Garcias'],
                ['id' =>  4106, 'estado_id' => 12, 'uf' => 'MS','name' => 'Gloria de Dourados'],
                ['id' =>  4107, 'estado_id' => 12, 'uf' => 'MS','name' => 'Guacu'],
                ['id' =>  4108, 'estado_id' => 12, 'uf' => 'MS','name' => 'Guaculandia'],
                ['id' =>  4109, 'estado_id' => 12, 'uf' => 'MS','name' => 'Guadalupe do Alto Parana'],
                ['id' =>  4110, 'estado_id' => 12, 'uf' => 'MS','name' => 'Guia Lopes da Laguna'],
                ['id' =>  4111, 'estado_id' => 12, 'uf' => 'MS','name' => 'Iguatemi'],
                ['id' =>  4112, 'estado_id' => 12, 'uf' => 'MS','name' => 'Ilha Comprida'],
                ['id' =>  4113, 'estado_id' => 12, 'uf' => 'MS','name' => 'Ilha Grande'],
                ['id' =>  4114, 'estado_id' => 12, 'uf' => 'MS','name' => 'Indaia do Sul'],
                ['id' =>  4115, 'estado_id' => 12, 'uf' => 'MS','name' => 'Indaia Grande'],
                ['id' =>  4116, 'estado_id' => 12, 'uf' => 'MS','name' => 'Indapolis'],
                ['id' =>  4117, 'estado_id' => 12, 'uf' => 'MS','name' => 'Inocencia'],
                ['id' =>  4118, 'estado_id' => 12, 'uf' => 'MS','name' => 'Ipezal'],
                ['id' =>  4119, 'estado_id' => 12, 'uf' => 'MS','name' => 'Itahum'],
                ['id' =>  4120, 'estado_id' => 12, 'uf' => 'MS','name' => 'Itapora'],
                ['id' =>  4121, 'estado_id' => 12, 'uf' => 'MS','name' => 'Itaquirai'],
                ['id' =>  4122, 'estado_id' => 12, 'uf' => 'MS','name' => 'Ivinhema'],
                ['id' =>  4123, 'estado_id' => 12, 'uf' => 'MS','name' => 'Jabuti'],
                ['id' =>  4124, 'estado_id' => 12, 'uf' => 'MS','name' => 'Jacarei'],
                ['id' =>  4125, 'estado_id' => 12, 'uf' => 'MS','name' => 'Japora'],
                ['id' =>  4126, 'estado_id' => 12, 'uf' => 'MS','name' => 'Jaraguari'],
                ['id' =>  4127, 'estado_id' => 12, 'uf' => 'MS','name' => 'Jardim'],
                ['id' =>  4128, 'estado_id' => 12, 'uf' => 'MS','name' => 'Jatei'],
                ['id' =>  4129, 'estado_id' => 12, 'uf' => 'MS','name' => 'Jauru'],
                ['id' =>  4130, 'estado_id' => 12, 'uf' => 'MS','name' => 'Juscelandia'],
                ['id' =>  4131, 'estado_id' => 12, 'uf' => 'MS','name' => 'Juti'],
                ['id' =>  4132, 'estado_id' => 12, 'uf' => 'MS','name' => 'Ladario'],
                ['id' =>  4133, 'estado_id' => 12, 'uf' => 'MS','name' => 'Lagoa Bonita'],
                ['id' =>  4134, 'estado_id' => 12, 'uf' => 'MS','name' => 'Laguna Carapa'],
                ['id' =>  4135, 'estado_id' => 12, 'uf' => 'MS','name' => 'Maracaju'],
                ['id' =>  4136, 'estado_id' => 12, 'uf' => 'MS','name' => 'Miranda'],
                ['id' =>  4137, 'estado_id' => 12, 'uf' => 'MS','name' => 'Montese'],
                ['id' =>  4138, 'estado_id' => 12, 'uf' => 'MS','name' => 'Morangas'],
                ['id' =>  4139, 'estado_id' => 12, 'uf' => 'MS','name' => 'Morraria do Sul'],
                ['id' =>  4140, 'estado_id' => 12, 'uf' => 'MS','name' => 'Morumbi'],
                ['id' =>  4141, 'estado_id' => 12, 'uf' => 'MS','name' => 'Mundo Novo'],
                ['id' =>  4142, 'estado_id' => 12, 'uf' => 'MS','name' => 'Navirai'],
                ['id' =>  4143, 'estado_id' => 12, 'uf' => 'MS','name' => 'Nhecolandia'],
                ['id' =>  4144, 'estado_id' => 12, 'uf' => 'MS','name' => 'Nioaque'],
                ['id' =>  4145, 'estado_id' => 12, 'uf' => 'MS','name' => 'Nossa Senhora de Fatima'],
                ['id' =>  4146, 'estado_id' => 12, 'uf' => 'MS','name' => 'Nova Alvorada do Sul'],
                ['id' =>  4147, 'estado_id' => 12, 'uf' => 'MS','name' => 'Nova America'],
                ['id' =>  4148, 'estado_id' => 12, 'uf' => 'MS','name' => 'Nova Andradina'],
                ['id' =>  4149, 'estado_id' => 12, 'uf' => 'MS','name' => 'Nova Esperanca'],
                ['id' =>  4150, 'estado_id' => 12, 'uf' => 'MS','name' => 'Nova Jales'],
                ['id' =>  4151, 'estado_id' => 12, 'uf' => 'MS','name' => 'Novo Horizonte do Sul'],
                ['id' =>  4152, 'estado_id' => 12, 'uf' => 'MS','name' => 'Oriente'],
                ['id' =>  4153, 'estado_id' => 12, 'uf' => 'MS','name' => 'Paiaguas'],
                ['id' =>  4154, 'estado_id' => 12, 'uf' => 'MS','name' => 'Palmeiras'],
                ['id' =>  4155, 'estado_id' => 12, 'uf' => 'MS','name' => 'Panambi'],
                ['id' =>  4156, 'estado_id' => 12, 'uf' => 'MS','name' => 'Paraiso'],
                ['id' =>  4157, 'estado_id' => 12, 'uf' => 'MS','name' => 'Paranaiba'],
                ['id' =>  4158, 'estado_id' => 12, 'uf' => 'MS','name' => 'Paranhos'],
                ['id' =>  4159, 'estado_id' => 12, 'uf' => 'MS','name' => 'Pedro Gomes'],
                ['id' =>  4160, 'estado_id' => 12, 'uf' => 'MS','name' => 'Picadinha'],
                ['id' =>  4161, 'estado_id' => 12, 'uf' => 'MS','name' => 'Pirapora'],
                ['id' =>  4162, 'estado_id' => 12, 'uf' => 'MS','name' => 'Piraputanga'],
                ['id' =>  4163, 'estado_id' => 12, 'uf' => 'MS','name' => 'Ponta Pora'],
                ['id' =>  4164, 'estado_id' => 12, 'uf' => 'MS','name' => 'Ponte Vermelha'],
                ['id' =>  4165, 'estado_id' => 12, 'uf' => 'MS','name' => 'Pontinha do Cocho'],
                ['id' =>  4166, 'estado_id' => 12, 'uf' => 'MS','name' => 'Porto Esperanca'],
                ['id' =>  4167, 'estado_id' => 12, 'uf' => 'MS','name' => 'Porto Murtinho'],
                ['id' =>  4168, 'estado_id' => 12, 'uf' => 'MS','name' => 'Porto Vilma'],
                ['id' =>  4169, 'estado_id' => 12, 'uf' => 'MS','name' => 'Porto Xv de Novembro'],
                ['id' =>  4170, 'estado_id' => 12, 'uf' => 'MS','name' => 'Presidente Castelo'],
                ['id' =>  4171, 'estado_id' => 12, 'uf' => 'MS','name' => 'Prudencio Thomaz'],
                ['id' =>  4172, 'estado_id' => 12, 'uf' => 'MS','name' => 'Quebra Coco'],
                ['id' =>  4173, 'estado_id' => 12, 'uf' => 'MS','name' => 'Quebracho'],
                ['id' =>  4174, 'estado_id' => 12, 'uf' => 'MS','name' => 'Ribas do Rio Pardo'],
                ['id' =>  4175, 'estado_id' => 12, 'uf' => 'MS','name' => 'Rio Brilhante'],
                ['id' =>  4176, 'estado_id' => 12, 'uf' => 'MS','name' => 'Rio Negro'],
                ['id' =>  4177, 'estado_id' => 12, 'uf' => 'MS','name' => 'Rio Verde de Mato Grosso'],
                ['id' =>  4178, 'estado_id' => 12, 'uf' => 'MS','name' => 'Rochedinho'],
                ['id' =>  4179, 'estado_id' => 12, 'uf' => 'MS','name' => 'Rochedo'],
                ['id' =>  4180, 'estado_id' => 12, 'uf' => 'MS','name' => 'Sanga Puita'],
                ['id' =>  4181, 'estado_id' => 12, 'uf' => 'MS','name' => 'Santa Rita do Pardo'],
                ['id' =>  4182, 'estado_id' => 12, 'uf' => 'MS','name' => 'Santa Terezinha'],
                ['id' =>  4183, 'estado_id' => 12, 'uf' => 'MS','name' => 'Sao Gabriel do Oeste'],
                ['id' =>  4184, 'estado_id' => 12, 'uf' => 'MS','name' => 'Sao Joao do Apore'],
                ['id' =>  4185, 'estado_id' => 12, 'uf' => 'MS','name' => 'Sao Jose'],
                ['id' =>  4186, 'estado_id' => 12, 'uf' => 'MS','name' => 'Sao Jose do Sucuriu'],
                ['id' =>  4187, 'estado_id' => 12, 'uf' => 'MS','name' => 'Sao Pedro'],
                ['id' =>  4188, 'estado_id' => 12, 'uf' => 'MS','name' => 'Sao Romao'],
                ['id' =>  4189, 'estado_id' => 12, 'uf' => 'MS','name' => 'Selviria'],
                ['id' =>  4190, 'estado_id' => 12, 'uf' => 'MS','name' => 'Sete Quedas'],
                ['id' =>  4191, 'estado_id' => 12, 'uf' => 'MS','name' => 'Sidrolandia'],
                ['id' =>  4192, 'estado_id' => 12, 'uf' => 'MS','name' => 'Sonora'],
                ['id' =>  4193, 'estado_id' => 12, 'uf' => 'MS','name' => 'Tacuru'],
                ['id' =>  4194, 'estado_id' => 12, 'uf' => 'MS','name' => 'Tamandare'],
                ['id' =>  4195, 'estado_id' => 12, 'uf' => 'MS','name' => 'Taquari'],
                ['id' =>  4196, 'estado_id' => 12, 'uf' => 'MS','name' => 'Taquarussu'],
                ['id' =>  4197, 'estado_id' => 12, 'uf' => 'MS','name' => 'Taunay'],
                ['id' =>  4198, 'estado_id' => 12, 'uf' => 'MS','name' => 'Terenos'],
                ['id' =>  4199, 'estado_id' => 12, 'uf' => 'MS','name' => 'Tres Lagoas'],
                ['id' =>  4200, 'estado_id' => 12, 'uf' => 'MS','name' => 'Velhacaria'],
                ['id' =>  4201, 'estado_id' => 12, 'uf' => 'MS','name' => 'Vicentina'],
                ['id' =>  4202, 'estado_id' => 12, 'uf' => 'MS','name' => 'Vila Formosa'],
                ['id' =>  4203, 'estado_id' => 12, 'uf' => 'MS','name' => 'Vila Marques'],
                ['id' =>  4204, 'estado_id' => 12, 'uf' => 'MS','name' => 'Vila Rica'],
                ['id' =>  4205, 'estado_id' => 12, 'uf' => 'MS','name' => 'Vila Uniao'],
                ['id' =>  4206, 'estado_id' => 12, 'uf' => 'MS','name' => 'Vila Vargas'],
                ['id' =>  4207, 'estado_id' => 12, 'uf' => 'MS','name' => 'Vista Alegre'],

              ];
                
              Cidade::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cidades');
    }
};