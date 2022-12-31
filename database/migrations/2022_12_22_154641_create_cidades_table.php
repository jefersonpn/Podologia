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
            $table->string('nome');
            $table->timestamps();
        });
           
            $data = [
                ['id' =>  4041, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Agua Boa'],
                ['id' =>  4042, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Agua Clara'],
                ['id' =>  4043, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Albuquerque'],
                ['id' =>  4044, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Alcinopolis'],
                ['id' =>  4045, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Alto Sucuriu'],
                ['id' =>  4046, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Amambai'],
                ['id' =>  4047, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Amandina'],
                ['id' =>  4048, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Amolar'],
                ['id' =>  4049, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Anastacio'],
                ['id' =>  4050, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Anaurilandia'],
                ['id' =>  4051, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Angelica'],
                ['id' =>  4052, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Anhandui'],
                ['id' =>  4053, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Antonio Joao'],
                ['id' =>  4054, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Aparecida do Taboado'],
                ['id' =>  4055, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Aquidauana'],
                ['id' =>  4056, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Aral Moreira'],
                ['id' =>  4057, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Arapua'],
                ['id' =>  4058, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Areado'],
                ['id' =>  4059, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Arvore Grande'],
                ['id' =>  4060, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Baianopolis'],
                ['id' =>  4061, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Balsamo'],
                ['id' =>  4062, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Bandeirantes'],
                ['id' =>  4063, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Bataguassu'],
                ['id' =>  4064, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Bataipora'],
                ['id' =>  4065, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Baus'],
                ['id' =>  4066, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Bela Vista'],
                ['id' =>  4067, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Bocaja'],
                ['id' =>  4068, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Bodoquena'],
                ['id' =>  4069, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Bom Fim'],
                ['id' =>  4070, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Bonito'],
                ['id' =>  4071, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Boqueirao'],
                ['id' =>  4072, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Brasilandia'],
                ['id' =>  4073, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Caarapo'],
                ['id' =>  4074, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Cabeceira do Apa'],
                ['id' =>  4075, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Cachoeira'],
                ['id' =>  4076, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Camapua'],
                ['id' =>  4077, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Camisao'],
                ['id' =>  4078, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Campestre'],
                ['id' =>  4079, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Campo Grande'],
                ['id' =>  4080, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Capao Seco'],
                ['id' =>  4081, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Caracol'],
                ['id' =>  4082, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Carumbe'],
                ['id' =>  4083, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Cassilandia'],
                ['id' =>  4084, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Chapadao do Sul'],
                ['id' =>  4085, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Cipolandia'],
                ['id' =>  4086, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Coimbra'],
                ['id' =>  4087, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Congonha'],
                ['id' =>  4088, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Corguinho'],
                ['id' =>  4089, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Coronel Sapucaia'],
                ['id' =>  4090, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Corumba'],
                ['id' =>  4091, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Costa Rica'],
                ['id' =>  4092, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Coxim'],
                ['id' =>  4093, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Cristalina'],
                ['id' =>  4094, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Cruzaltina'],
                ['id' =>  4095, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Culturama'],
                ['id' =>  4096, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Cupins'],
                ['id' =>  4097, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Debrasa'],
                ['id' =>  4098, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Deodapolis'],
                ['id' =>  4099, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Dois Irmaos do Buriti'],
                ['id' =>  4100, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Douradina'],
                ['id' =>  4101, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Dourados'],
                ['id' =>  4102, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Eldorado'],
                ['id' =>  4103, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Fatima do Sul'],
                ['id' =>  4104, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Figueirao'],
                ['id' =>  4105, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Garcias'],
                ['id' =>  4106, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Gloria de Dourados'],
                ['id' =>  4107, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Guacu'],
                ['id' =>  4108, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Guaculandia'],
                ['id' =>  4109, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Guadalupe do Alto Parana'],
                ['id' =>  4110, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Guia Lopes da Laguna'],
                ['id' =>  4111, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Iguatemi'],
                ['id' =>  4112, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Ilha Comprida'],
                ['id' =>  4113, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Ilha Grande'],
                ['id' =>  4114, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Indaia do Sul'],
                ['id' =>  4115, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Indaia Grande'],
                ['id' =>  4116, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Indapolis'],
                ['id' =>  4117, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Inocencia'],
                ['id' =>  4118, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Ipezal'],
                ['id' =>  4119, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Itahum'],
                ['id' =>  4120, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Itapora'],
                ['id' =>  4121, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Itaquirai'],
                ['id' =>  4122, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Ivinhema'],
                ['id' =>  4123, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Jabuti'],
                ['id' =>  4124, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Jacarei'],
                ['id' =>  4125, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Japora'],
                ['id' =>  4126, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Jaraguari'],
                ['id' =>  4127, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Jardim'],
                ['id' =>  4128, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Jatei'],
                ['id' =>  4129, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Jauru'],
                ['id' =>  4130, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Juscelandia'],
                ['id' =>  4131, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Juti'],
                ['id' =>  4132, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Ladario'],
                ['id' =>  4133, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Lagoa Bonita'],
                ['id' =>  4134, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Laguna Carapa'],
                ['id' =>  4135, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Maracaju'],
                ['id' =>  4136, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Miranda'],
                ['id' =>  4137, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Montese'],
                ['id' =>  4138, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Morangas'],
                ['id' =>  4139, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Morraria do Sul'],
                ['id' =>  4140, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Morumbi'],
                ['id' =>  4141, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Mundo Novo'],
                ['id' =>  4142, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Navirai'],
                ['id' =>  4143, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Nhecolandia'],
                ['id' =>  4144, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Nioaque'],
                ['id' =>  4145, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Nossa Senhora de Fatima'],
                ['id' =>  4146, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Nova Alvorada do Sul'],
                ['id' =>  4147, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Nova America'],
                ['id' =>  4148, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Nova Andradina'],
                ['id' =>  4149, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Nova Esperanca'],
                ['id' =>  4150, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Nova Jales'],
                ['id' =>  4151, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Novo Horizonte do Sul'],
                ['id' =>  4152, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Oriente'],
                ['id' =>  4153, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Paiaguas'],
                ['id' =>  4154, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Palmeiras'],
                ['id' =>  4155, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Panambi'],
                ['id' =>  4156, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Paraiso'],
                ['id' =>  4157, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Paranaiba'],
                ['id' =>  4158, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Paranhos'],
                ['id' =>  4159, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Pedro Gomes'],
                ['id' =>  4160, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Picadinha'],
                ['id' =>  4161, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Pirapora'],
                ['id' =>  4162, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Piraputanga'],
                ['id' =>  4163, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Ponta Pora'],
                ['id' =>  4164, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Ponte Vermelha'],
                ['id' =>  4165, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Pontinha do Cocho'],
                ['id' =>  4166, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Porto Esperanca'],
                ['id' =>  4167, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Porto Murtinho'],
                ['id' =>  4168, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Porto Vilma'],
                ['id' =>  4169, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Porto Xv de Novembro'],
                ['id' =>  4170, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Presidente Castelo'],
                ['id' =>  4171, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Prudencio Thomaz'],
                ['id' =>  4172, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Quebra Coco'],
                ['id' =>  4173, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Quebracho'],
                ['id' =>  4174, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Ribas do Rio Pardo'],
                ['id' =>  4175, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Rio Brilhante'],
                ['id' =>  4176, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Rio Negro'],
                ['id' =>  4177, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Rio Verde de Mato Grosso'],
                ['id' =>  4178, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Rochedinho'],
                ['id' =>  4179, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Rochedo'],
                ['id' =>  4180, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Sanga Puita'],
                ['id' =>  4181, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Santa Rita do Pardo'],
                ['id' =>  4182, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Santa Terezinha'],
                ['id' =>  4183, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Sao Gabriel do Oeste'],
                ['id' =>  4184, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Sao Joao do Apore'],
                ['id' =>  4185, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Sao Jose'],
                ['id' =>  4186, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Sao Jose do Sucuriu'],
                ['id' =>  4187, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Sao Pedro'],
                ['id' =>  4188, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Sao Romao'],
                ['id' =>  4189, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Selviria'],
                ['id' =>  4190, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Sete Quedas'],
                ['id' =>  4191, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Sidrolandia'],
                ['id' =>  4192, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Sonora'],
                ['id' =>  4193, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Tacuru'],
                ['id' =>  4194, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Tamandare'],
                ['id' =>  4195, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Taquari'],
                ['id' =>  4196, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Taquarussu'],
                ['id' =>  4197, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Taunay'],
                ['id' =>  4198, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Terenos'],
                ['id' =>  4199, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Tres Lagoas'],
                ['id' =>  4200, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Velhacaria'],
                ['id' =>  4201, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Vicentina'],
                ['id' =>  4202, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Vila Formosa'],
                ['id' =>  4203, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Vila Marques'],
                ['id' =>  4204, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Vila Rica'],
                ['id' =>  4205, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Vila Uniao'],
                ['id' =>  4206, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Vila Vargas'],
                ['id' =>  4207, 'estado_id' => 12, 'uf' => 'MS','nome' => 'Vista Alegre'],

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