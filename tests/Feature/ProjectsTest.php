<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function only_authenticated_users_can_create_projects() 
    {
        //$this->withoutExceptionHandling();
            //raw(); utilizar o médoto raw para pré-preencher os atributos comuns, após 
            //preenchidos estes atributos simplesmente complete com os valores adicionais que você precisa:
            //$attributes = factory('App\Project')->raw(['owner_id' => null]);
        $attributes = factory('App\Project')->raw();


            // assertSessionHasErrors: Afirmando a sessão tem erros para uma dada chave ...
            // $this->post('/projects', $attributes)->assertSessionHasErrors('owner_id');
        $this->post('/projects', $attributes)->assertRedirect('login');
            
    }    
    
    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory('App\User')->create());

    $attributes = [

            'title' => $this->faker->sentence,
            'description'  => $this->faker->paragraph
        ];

        // envio da requisição
        $this->post('/projects', $attributes)->assertRedirect('/projects'); 

        // Verifica no banco se os atributos foram criado na tabela projets
        $this->assertDatabaseHas('projects', $attributes);

        // recupera
        $this->get('/projects')->assertSee($attributes['title']); 

    }

         /** @test */
         public function a_user_can_view_a_project() 
         {
            $this->withoutExceptionHandling();

            $project = factory('App\Project')->create();

            //$this->get('/projects/' .  $project->id)

            $this->get($project->path())
                ->assertSee($project->title)
                ->assertSee($project->description);;
         }  
    


        /** @test */
        public function a_project_require_a_title() 
        {

            $this->actingAs(factory('App\User')->create());


            $attributes = factory('App\Project')->raw(['title' => '']);
    
            $this->post('/projects', $attributes)->assertSessionHasErrors('title');
        }  

         /** @test */
         public function a_project_require_a_description() 
         {

            $this->actingAs(factory('App\User')->create());

            $attributes = factory('App\Project')->raw(['description' => '']);
     
             $this->post('/projects', $attributes)->assertSessionHasErrors('description');
         } 
         

}