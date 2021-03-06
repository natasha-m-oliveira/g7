<?php
session_start();

use PhpLogin\Enrollment;
use PhpLogin\Event;
require_once __DIR__ . '/Model/Event.php';
$event = new Event();

if (!empty($_POST["national-mobility-btn"])) {
    require_once __DIR__ . '/Model/Enrollment.php';
    $enrollment = new Enrollment();
    $registrationResponse = $enrollment->registerEnrollment();
}

include __DIR__ . "/includes/header.php"; ?>
<main>
    <div class="container">
        <div class="anchor">
            <a href="#" id="top-of-page" class="button" data-anchor></a>
        </div>
        <div class="outset">
            <div class="description">
                <H1>Uma rede de cooperação que impacta a vida de mais de 70K alunos</H1>
                <a href="#map" class="button">SAIBA MAIS</a>
            </div>
        </div>
        <div class="space"></div>
        <div class="left about" id="about">
            <div class="description">
                <h2>Quem somos</h2>
                <p>A Rede 7, faz parte da <span>Rede de Cooperação</span> entre Instituições de Ensino Superior
                    denominada G7, pertencente ao <span>Sindicato das Entidades Mantenedoras</span> de
                    Estabelecimentos de Ensino Superior no Estado de São Paulo, SEMESP.</p>
                <p><span>CONFIANÇA, COMPROMETIMENTO E COOPERAÇÃO</span> são as palavras que sustentam o Rede
                    G7. Compartilhamos semanalmente ideias, projetos e ações para que juntos possamos ter
                    estratégias positivas para nossas instituições.</p>
            </div>
        </div>
        <div class="right about">
            <img src="assets/images/group-people-working.jpg" alt="Grupo de executivos discutindo">
        </div>
        <div class="space"></div>
        <div class="map title" id="map">
            <h2>Juntar para espalhar</h2>
        </div>
        <div class="map left">
            <div class="text-box">
                <p>Nosso propósito <span>é atingir melhores resultados acadêmicos e financeiros</span>
                    ativados pela sinergia entre as IES. Juntos, <span>somamos</span> aproximadamente:</p>
                <p>70K Alunos</p>
                <p>2.5K Docentes</p>
                <p>1.8K Colaboradores</p>
            </div>
        </div>
        <div class="map right">
            <img src="assets/images/cooperation-network-map.svg" alt="Mapa da rede de cooperação">
        </div>
        <div class="space"></div>
        <div class="box" id="network">
            <div class="title">
                <h2>Saiba quais são as <br />universidades da rede G7</h2>
            </div>
            <div class="container-slide active">
                <div class="slide">
                    <div class="left" data-image-slide>
                        <img src="assets/images/eniac-logo.svg" alt="ENIAC LOGO">
                    </div>
                    <div class="right">
                        <div class="text-box">
                            <p>Inovação, tecnologia, sustentabilidade e mão na massa são a <span>essência do
                                    Centro Universitário Eniac há 35 anos.</span> O Eniac forma líderes e
                                empreendedores que, desde alunos, desenvolvem as habilidades e <span>práticas
                                    profissionais</span> necessárias para se destacarem no <span>mercado de
                                    trabalho.</span> Todo esse investimento em infraestrutura e <span>padrões
                                    internacionais de qualidade</span>, tornam o Eniac a <span>melhor
                                    instituição de ensino superior de Guarulhos</span>, segundo o ranking do
                                MEC.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-slide">
                <div class="slide">
                    <div class="left" data-image-slide>
                        <img src="assets/images/faesa-logo.svg" alt="FAESA LOGO">
                    </div>
                    <div class="right">
                        <div class="text-box">
                            <p>Somos o <span>melhor Centro Universitário do Sudeste</span> e o terceiro melhor
                                do Brasil (MEC). Trabalhamos <span>determinados no sucesso dos nossos
                                    alunos</span> e no fomento do <span>empreendedorismo e da inovação.</span>
                                Com professores e equipe administrativa altamente qualificados, a FAESA tem se
                                <span>destacado</span> no cenário nacional por suas <span>práticas acadêmicas
                                    inovadoras</span> e por sua forte conexão com o setor produtivo e a
                                sociedade.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-slide">
                <div class="slide">
                    <div class="left" data-image-slide>
                        <img src="assets/images/fateb-logo.svg" alt="FATEB LOGO">
                    </div>
                    <div class="right">
                        <div class="text-box">
                            <p>A FATEB é uma <span>instituição particular de Ensino Superior</span>, que iniciou
                                suas atividades acadêmicas em fevereiro de 2001 e possui como missão,
                                <span>expandir o ensino de qualidade para a formação humana e
                                    profissional</span>, atendendo o mercado em sintonia com as tendências
                                educacionais.
                            </p>
                            <p>A IES tem o objetivo de <span>formar profissionais e empreendedores</span>
                                capacitados para atuar em diferentes áreas do conhecimento.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-slide">
                <div class="slide">
                    <div class="left" data-image-slide>
                        <img src="assets/images/fecaf-logo.svg" alt="FECAF LOGO">
                    </div>
                    <div class="right">
                        <div class="text-box">
                            <p>A FECAF sempre alicerçada no tripé: <span>Ensino, Pesquisa e Extensão</span>, tem
                                consciência que para o desenvolvimento de um país é <span>fundamental o
                                    desenvolvimento educacional de sua população</span>, por isso realiza ações
                                perenes que visam levar <span>Educação de Qualidade à todos os cidadãos da
                                    região a qual está inserida</span>, no intuito de tornar-se o maior polo
                                Educacional de Taboão da Serra e região.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-slide">
                <div class="slide">
                    <div class="left" data-image-slide>
                        <img src="assets/images/toledo-prudente-logo.svg" alt="TOLEDO PRUDENTE LOGO">
                    </div>
                    <div class="right">
                        <div class="text-box">
                            <p>Em 2014 e 2015, a instituição foi apontada como o melhor centro universitário do
                                Brasil. O <span>Centro Universitário Toledo Prudente</span> contabiliza mais de
                                15 mil profissionais formados. Dentre os seus diversos <span>diferenciais</span>
                                estão, certificação <span>black belt, escritório de aplicação jurídica,
                                    recomendação da OAB e internacionalização.</span></p>
                            <p>Além de contar com um corpo docente completamente inclinado à busca constante de
                                inovação e 100% mais próximo dos alunos.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-slide">
                <div class="slide">
                    <div class="left" data-image-slide>
                        <img src="assets/images/undb-logo.svg" alt="UNDB LOGO">
                    </div>
                    <div class="right">
                        <div class="text-box">
                            <p>A UNDB é avaliada como o <span>10º melhor Centro Universitário do país</span> e
                                lidera o ranking de instituições particulares de São Luís, capital onde está
                                localizada. <span>A performance de excelência</span> é resultado de um
                                consistente
                                trabalho de desenvolvimento de competências dos alunos e formação de
                                professores,
                                que tem em <span>seu DNA a inovação acadêmica.</span> O uso de metodologias
                                ativas e
                                o rigor avaliativo aliados à conexão com a comunidade e o mercado de trabalho,
                                <span>proporcionam ao aluno experiências de aprendizagem voltadas aos problemas
                                    do
                                    mundo real.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-slide">
                <div class="slide">
                    <div class="left" data-image-slide>
                        <img src="assets/images/uniopet-logo.svg" alt="UNIOPET LOGO">
                    </div>
                    <div class="right">
                        <div class="text-box">
                            <p>O Grupo Educacional Opet foi fundado em 25 de janeiro de 1973. Nestas mais de
                                quatro décadas, não parou de crescer e hoje é <span>responsável por uma completa
                                    estrutura organizacional que inclui Pós-Graduação, Graduação, Colégio,
                                    Opetwork Escola de Profissão, Editora – Sistema de Ensino e Instituto de
                                    Educação e Cidadania.</span> Desde a sua fundação, já formou mais de 100 mil
                                alunos.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-slide">
                <div class="slide">
                    <div class="left" data-image-slide>
                        <img src="assets/images/unis-logo.svg" alt="UNIS LOGO">
                    </div>
                    <div class="right">
                        <div class="text-box">
                            <p>O Unis é uma Instituição de Ensino que constantemente <span>investe em técnicas,
                                    métodos, metodologias e estruturas mais modernas</span> para oferecer o que
                                há
                                de melhor, tendo como diferencial o <span>processo de internacionalização</span>
                                em
                                parceria com diversas empresas internacionais. No Unis, o <span>aluno</span> é o
                                <span>centro do processo de educação</span>. Ele tem acesso ao que há de mais
                                moderno em metodologias de ensino e tecnologias que <span>permitem aprimorar
                                    seus
                                    conhecimentos.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-slide">
                <div class="slide">
                    <div class="left" data-image-slide>
                        <img src="assets/images/unisuam-logo.svg" alt="UNISUAM LOGO">
                    </div>
                    <div class="right">
                        <div class="text-box">
                            <p>Iniciamos com uma escola preparatória para o Colégio Naval. Passamos a formar
                                normalistas e chegamos ao Ensino Superior como SUAM. <span>Fomos o primeiro
                                    Centro Universitário do Brasil.</span> Em todos esses anos, a prioridade foi
                                uma só: os alunos em primeiro lugar. Já são <span>mais de 50 anos</span>
                                realizando sonhos e contribuindo para o desenvolvimento local e a
                                <span>construção de um futuro melhor.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="prev" data-prev aria-label="Previous"></div>
            <div id="next" data-next aria-label="Next"></div>
            <div aria-label="Slides" class="indicator">
                <span class="btn active" data-btn></span>
                <span class="btn" data-btn></span>
                <span class="btn" data-btn></span>
                <span class="btn" data-btn></span>
                <span class="btn" data-btn></span>
                <span class="btn" data-btn></span>
                <span class="btn" data-btn></span>
                <span class="btn" data-btn></span>
                <span class="btn" data-btn></span>
            </div>
        </div>
        <div class="space"></div>
        <div class="team title" id="team">
            <h2 data-team-title>Conheça o time<br />de Alta Liderança</h2>
        </div>
        <div class="left team">
            <img src="assets/images/rebeca-murad.png" alt="Rebeca Murad">
        </div>
        <div class="right team text-box">
            <div class="description">
                <h3>Rebeca Murad</h3>
                <p>Diretora Geral de Gestão do Grupo Dom Bosco no Estado do Maranhão.</p>
            </div>
        </div>
        <div class="left team">
            <img src="assets/images/zelly-toledo.png" alt="Zelly Toledo">
        </div>
        <div class="right team text-box">
            <div class="description">
                <h3>Zelly Toledo</h3>
                <p>Reitora do Centro Universitário Toledo Pudente no Estado de São Paulo.</p>
            </div>
        </div>
        <div class="left team">
            <img src="assets/images/arapuan-netto.png" alt="Arapuan Netto">
        </div>
        <div class="right team text-box">
            <div class="description">
                <h3>Arapuan Netto</h3>
                <p>Reitor do Centro Universitário Unisuam no Estado do Rio de Janeiro.</p>
            </div>
        </div>
        <div class="left team">
            <img src="assets/images/ruy-guerios.png" alt="Ruy Guérios">
        </div>
        <div class="right team text-box">
            <div class="description">
                <h3>Ruy Guérios</h3>
                <p>Reitor do Centro Universitário Eniac no Estado de São Paulo.</p>
            </div>
        </div>
        <div class="left team">
            <img src="assets/images/pedro-guerios.png" alt="Pedro Guérios">
        </div>
        <div class="right team text-box">
            <div class="description">
                <h3>Pedro Guérios</h3>
                <p>Vice-Reitor do Centro Universitário Eniac no Estado de São Paulo.</p>
            </div>
        </div>
        <div class="left team">
            <img src="assets/images/alexandre-nunes.png" alt="Alexandre Theodoro">
        </div>
        <div class="right team text-box">
            <div class="description">
                <h3>Alexandre Theodoro</h3>
                <p>Reitor do Centro Universitário FAESA no Estado do Espírito Santo.</p>
            </div>
        </div>
        <div class="left team">
            <img src="assets/images/marcel-gama.png" alt="Marcel Gama">
        </div>
        <div class="right team text-box">
            <div class="description">
                <h3>Marcel Gama</h3>
                <p>Diretor Administrativo e Financeiro da Faculdade FECAF no Estado de São Paulo.</p>
            </div>
        </div>
        <div class="left team">
            <img src="assets/images/adriana-karam.png" alt="Adriana Karam">
        </div>
        <div class="right team text-box">
            <div class="description">
                <h3>Adriana Karam</h3>
                <p>Superintendente Educacional no Grupo Opet no Estado do Paraná.</p>
            </div>
        </div>
        <div class="left team">
            <img src="assets/images/felipe-flausino.png" alt="Felipe Flausino">
        </div>
        <div class="right team text-box">
            <div class="description">
                <h3>Felipe Flausino</h3>
                <p>Superintendente de Ensino e Mercado no Grupo Unis no Estado de Minas Gerais.</p>
            </div>
        </div>
        <div class="left team">
            <img src="assets/images/paula-pontara.png" alt="Paula Pontara">
        </div>
        <div class="right team text-box">
            <div class="description">
                <h3>Paula Pontara</h3>
                <p>Reitora da Instituição de Ensino FATEB no Estado do Paraná.</p>
            </div>
        </div>
        <?php
        if (!empty($_SESSION["username"]) && $_SESSION["access"] > 1) {
            $where = 'category = "private" AND visible = 1';
            $meetings = $event->listEvent($where, null, null);
            include __DIR__ . "/includes/private-events.php";
        } else {
            $where = 'category = "public" AND visible = 1';
            $meetings = $event->listEvent($where, null, null);
            include __DIR__ . "/includes/public-events.php";
        } ?>
        <?php include __DIR__ . "/includes/form-enrollment.php"; ?>
    </div>
</main>
<script src="assets/scripts/slides.js"></script>
<script src="assets/scripts/validation.js"></script>
<?php include __DIR__ . "/includes/footer.php"; ?>