
@extends('main.layouts.default')

@section('content')
<div class="container">
  <section class="presentation">
      <article class="bg-default">
            <header>   
                <div>
                    <img src="{{ URL::asset('main/images/ElvisPresley.jpg') }}" alt="Imagem Pessoal">  
                </div>
                <div>
                    <h1>Diogo Marostega de Oliveira</h1>
                    <h2>Desenvolvedor Web - Full Stack</h2>      
                    <div class="l-social-resume">
                        <a class="btn btn-download btn-disabled" href="#" name="donwload_resume" >Resumo</a>
                        <ul class="h-social-icons">
                            <li>
                                <a href="#"><i class="rc rc-facebook"> </i></a>
                            </li>
                            <li>
                                <a href="#"><i class="rc rc-linkedin"> </i></a>
                            </li>
                            <li>
                                <a href="#"><i class="rc rc-github"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="rc rc-instagram"></i></a>
                            </li>                        
                        </ul>
                    </div>         
                </div>
            </header>          
      </article>
  </section>

  <aside id="about">
      <article>
          <header>Sobre</header>
          <main>
                <p class="no-margin"> Olá, eu sou o Diogo, desenvolvedor web fullstack. Bacharel em ciências da computação pelo UNIVALI - Universidade do Vale do Itajai. </p>
                <img src="{{ URL::asset('main/images/personal_signature.jpg') }}" alt="Image Assinatura estilosa!">
          </main>
      </article>
      <article>
          <header>
              Informações
          </header>
          <main>
               <table class="table-personal-info">
                   <tbody>
                    <tr>
                        <td>Nome</td>
                        <td>Diogo Marostega de Oliveira</td>
                    </tr>
                    <tr>
                        <td>Nascimento</td>
                        <td>06/07/1982</td>
                    </tr>
                    <tr>
                        <td>Endereço</td>
                        <td>
                            <address>
                                <p> Rua 501, Centro  </p>
                                <p> Balneário Camboriú, SC </p>
                                <p>CEP 88.330-699</p>
                            </address>
                        </td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>dmarostega@gmail.com</td>
                    </tr>                    
                    <tr>
                        <td>Telefone</td>
                        <td>654654</td>
                    </tr>
                   </tbody>
               </table>

          </main>
      </article>
  </aside>
  <section class="main-section">
      <article>
        <header>Trabalho</header> 
        <main>
            <h2>Desenvolvedor Web - Full Stack</h2>
            <h4>2019 - atual</h4>
            <p>Working on e-commerce web portal. Participating in and monitoring different kind of web projects (mostly websites). Mostly using PHP and Twitter Bootstrap 3.x & 4.x frameworks with LESS.</p>
        </main>       
      </article>
      <article id="education">
        <header>Educação</header>
        <main>
            <h2>Web Design  <span> Institute of Technology & Management (BITM)</span></h2>
            <h4>NOV 2015 - FEB 2016</h4>
            <p >Passed with 100% state scholarship. At February 2016 I suspend my status temporarily.</p>
        </main>
      </article>      
      <article id="experience">
        <header>Trabalhos Anteriores</header>
        <main>
            <div class="row">
                <div class="col w-25 period">
                    <p>
                        2015-2018
                    </p>
                </div>
                <div class="col  w-75">
                    <h2>Systems Analyst / Web Developer</h2>
                    <h4>Estonian Athletic Association, Tallinn, Estonia</h4>
                    <p >Researched, strategized and launched best UX improvements for nonprofit sites.</p>
                </div>
            </div>
            <!-- <table class="table table-light">
                <tbody>
                    <tr>
                        <td class="period">
                            <p>
                                2015-2018
                            </p>
                        </td>
                        <td>
                            <h2>Systems Analyst / Web Developer</h2>
                            <h4>Estonian Athletic Association, Tallinn, Estonia</h4>
                            <p >Researched, strategized and launched best UX improvements for nonprofit sites.</p>
                        </td>
                    </tr>
                </tbody>
            </table> -->
        </main>
      </article>
      <article>
        <header>Habilidades</header>
        <main>
            <h2>Desenvolvimento </h2>
            <div class="label-progress">
                <h4>HTML5</h4>
                <progress id="file" value="32" max="100"> 32% </progress>
            </div>
        </main>
      </article>      
      <article id="portfolio">
        <!-- 
            <header>PortFolio</header>
        <div>
            <img src="" alt="imagem do card">
            <h3>titulo</h3>
        </div> -->
      <!-- </article>
        <article>
        <header>Testimonials</header>
      </article>   
    -->
      <article id="contact">
        <header>Contato</header>
        <main class="personal-contact">           
            <p>Email: an@email.com</p>
            <p>Web: www.example.com</p>
            <form action="">
                <div>
                    <label for="input_name">Nome</label>
                    <div>
                        <input type="text" name="input_name" id="input_name">
                    </div>
                </div>
                <div>
                    <label for="input_email">E-Mail</label>
                    <div>
                        <input type="text" name="input_email" id="input_email">
                    </div>
                </div>
                <div>
                    <label for="input_subject">Assunto</label>
                    <div>
                        <input type="text" name="input_subject" id="input_subject">
                    </div>
                </div>
                <div>
                    <label for="textarea_message">Mensagem</label>
                    <div>
                        <textarea name="textarea_message" id="textarea_message">
                        </textarea>
                    </div>
                </div>
                <div style="text-align: right">
                    <input class="btn" type="submit" value="Enviar">
                </div>
            </form>
        </main>
      </article>  
  </section>
</div>  <!-- /container-->
@endsection