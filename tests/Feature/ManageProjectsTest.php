<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Project;


class ManageProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_cannot_manage_projects() 
    {
        //$this->withoutExceptionHandling();
            //raw(); utilizar o médoto raw para pré-preencher os atributos comuns, após 
            //preenchidos estes atributos simplesmente complete com os valores adicionais que você precisa:
            //$attributes = factory('App\Project')->raw(['owner_id' => null]);  
        //$attributes = factory('App\Project')->raw();
        $project = factory('App\Project')->create();

            // assertSessionHasErrors: Afirmando a sessão tem erros para uma dada chave ...
            // $this->post('/projects', $attributes)->assertSessionHasErrors('owner_id');
        $this->get('/projects')->assertRedirect('login');
        $this->get('/projects/create')->assertRedirect('login');
        $this->get($project->path())->assertRedirect('login');
        $this->post('/projects', $project->toarray())->assertRedirect('login');
        
            
    }      

    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling();

       // $this->actingAs(factory('App\User')->create());
       $this->signIn();

        $this->get('/projects/create')->assertStatus(200);

    $attributes = [

            'title' => $this->faker->sentence,
            'description'  => $this->faker->sentence,
            'notes' => 'Bloco de notas aqui'
        ];

        // envio da requisição
        $response = $this->post('/projects', $attributes);

        $project = Project::where($attributes)->first();

        

        $response->assertRedirect($project->path());

        // Verifica no banco se os atributos foram criado na tabela projets
        $this->assertDatabaseHas('projects', $attributes); 

        // recupera
        $this->get($project->path())
        ->assertSee($attributes['title'])
        ->assertSee($attributes['description'])
        ->assertSee($attributes['notes']);

    }

    /** @test */
    function a_user_can_update_a_project()
    {
        $this->signIn();

        $this->withoutExceptionHandling();

        $project = factory('App\Project')->create(['owner_id' => auth()->id()]);

        $this->patch($project->path(), [
            'notes' =>  'çhanged'
        ])->assertRedirect($project->path());

        $this->assertDatabaseHas('projects', ['notes' =>  'çhanged']);
    }

         /** @test */
         public function a_user_can_view_their_project() 
         {
            $this->signIn();

            $this->withoutExceptionHandling();

            $project = factory('App\Project')->create(['owner_id' => auth()->id()]);

            //$this->get('/projects/' .  $project->id)

            $this->get($project->path())
                ->assertSee($project->title)
                ->assertSee($project->description);;
         }  
    
       /** @test */
       public function an_authenticated_cannot_view_the_projects_of_others() 
       {
        $this->signIn();

        //$this->withoutExceptionHandling();

        $project = factory('App\Project')->create();
        // está recebendo 500
        $this->get($project->path())->assertStatus(403);

       } 

       /** @test */
    public function an_authenticated_user_cannot_update_the_projects_of_others()
    {
        $this->signIn();

        $project = factory('App\Project')->create();

        $this->patch($project->path())->assertStatus(403);
    }

        /** @test */
        public function a_project_require_a_title() 
        {

            $this->signIn();


            $attributes = factory('App\Project')->raw(['title' => '']);
    
            $this->post('/projects', $attributes)->assertSessionHasErrors('title');
        }  

         /** @test */
         public function a_project_require_a_description() 
         {

            $this->signIn();

            $attributes = factory('App\Project')->raw(['description' => '']);
     
             $this->post('/projects', $attributes)->assertSessionHasErrors('description');
         } 
         

}