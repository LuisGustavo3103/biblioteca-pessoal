<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'Dom Casmurro',
                'author' => 'Machado de Assis',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Globo Livros',
                'sinopse' => 'Bentinho escreve sobre sua paixão pela vizinha Capitu, criando uma das obras mais controversas da literatura brasileira. A dúvida sobre o adultério de Capitu com Escobar permanece como um dos maiores enigmas literários.',
                'gender' => 'romance',
                'publish_year' => 1899
            ],
            [
                'title' => 'Orgulho e Preconceito',
                'author' => 'Jane Austen',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Companhia das Letras',
                'sinopse' => 'Elizabeth Bennet e Mr. Darcy superam mal-entendidos e preconceitos para encontrar o amor verdadeiro na Inglaterra do século XVIII.',
                'gender' => 'romance',
                'publish_year' => 1813
            ],
            [
                'title' => 'Gabriela, Cravo e Canela',
                'author' => 'Jorge Amado',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Companhia das Letras',
                'sinopse' => 'Em Ilhéus dos anos 1920, a chegada da bela e sensual Gabriela transforma a vida do árabe Nacib e movimenta toda a cidade.',
                'gender' => 'romance',
                'publish_year' => 1958
            ],
            [
                'title' => 'A Moreninha',
                'author' => 'Joaquim Manuel de Macedo',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Ática',
                'sinopse' => 'O jovem médico Augusto se apaixona por Carolina, a moreninha, em uma história de amor ambientada no Rio de Janeiro do século XIX.',
                'gender' => 'romance',
                'publish_year' => 1844
            ],
            [
                'title' => 'Iracema',
                'author' => 'José de Alencar',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Ática',
                'sinopse' => 'A lenda do Ceará através do amor trágico entre a índia Iracema e o colonizador português Martim, simbolizando o nascimento do povo brasileiro.',
                'gender' => 'romance',
                'publish_year' => 1865
            ],

            // FANTASY
            [
                'title' => 'O Senhor dos Anéis: A Sociedade do Anel',
                'author' => 'J.R.R. Tolkien',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Martins Fontes',
                'sinopse' => 'Frodo Baggins herda um anel mágico e perigoso, iniciando uma épica jornada para destruí-lo e salvar a Terra Média do Senhor Sombrio.',
                'gender' => 'fantasy',
                'publish_year' => 1954
            ],
            [
                'title' => 'Harry Potter e a Pedra Filosofal',
                'author' => 'J.K. Rowling',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Rocco',
                'sinopse' => 'Harry Potter descobre no seu 11º aniversário que é um bruxo e ingressa na Escola de Magia e Bruxaria de Hogwarts, onde vive aventuras extraordinárias.',
                'gender' => 'fantasy',
                'publish_year' => 1997
            ],
            [
                'title' => 'As Crônicas de Nárnia: O Leão, a Feiticeira e o Guarda-Roupa',
                'author' => 'C.S. Lewis',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Martins Fontes',
                'sinopse' => 'Quatro irmãos descobrem um mundo mágico dentro de um guarda-roupa e se tornam reis e rainhas de Nárnia.',
                'gender' => 'fantasy',
                'publish_year' => 1950
            ],
            [
                'title' => 'O Hobbit',
                'author' => 'J.R.R. Tolkien',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Martins Fontes',
                'sinopse' => 'Bilbo Bolseiro é convencido pelo mago Gandalf a acompanhar treze anões em uma aventura para recuperar o tesouro guardado pelo dragão Smaug.',
                'gender' => 'fantasy',
                'publish_year' => 1937
            ],

            // SCIENCE_FICTION
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Companhia das Letras',
                'sinopse' => 'Em um futuro totalitário, Winston Smith trabalha reescrevendo a história para o Partido. Uma distopia sobre vigilância, controle mental e a luta pela verdade e liberdade individual.',
                'gender' => 'science_fiction',
                'publish_year' => 1949
            ],
            [
                'title' => 'Admirável Mundo Novo',
                'author' => 'Aldous Huxley',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Globo Livros',
                'sinopse' => 'Uma sociedade futurista onde o prazer é obrigatório e o sofrimento foi eliminado através da tecnologia e drogas, questionando o preço da felicidade artificial.',
                'gender' => 'science_fiction',
                'publish_year' => 1932
            ],
            [
                'title' => 'Fahrenheit 451',
                'author' => 'Ray Bradbury',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Globo Livros',
                'sinopse' => 'Em uma sociedade futura onde os livros são proibidos, Guy Montag é um bombeiro cuja função é queimar livros, até questionar o sistema.',
                'gender' => 'science_fiction',
                'publish_year' => 1953
            ],
            [
                'title' => 'Eu, Robô',
                'author' => 'Isaac Asimov',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Aleph',
                'sinopse' => 'Uma coleção de contos sobre robôs e suas interações com humanos, explorando as famosas Três Leis da Robótica.',
                'gender' => 'science_fiction',
                'publish_year' => 1950
            ],

            // SUSPENSE
            [
                'title' => 'O Nome da Rosa',
                'author' => 'Umberto Eco',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Record',
                'sinopse' => 'Em um mosteiro medieval, o frade Guilherme de Baskerville investiga uma série de mortes misteriosas, combinando mistério, filosofia e história.',
                'gender' => 'suspense',
                'publish_year' => 1980
            ],
            [
                'title' => 'O Código Da Vinci',
                'author' => 'Dan Brown',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Arqueiro',
                'sinopse' => 'O simbologista Robert Langdon é envolvido em uma investigação sobre um assassinato no Louvre que revela segredos sobre o Santo Graal.',
                'gender' => 'suspense',
                'publish_year' => 2003
            ],
            [
                'title' => 'A Garota no Trem',
                'author' => 'Paula Hawkins',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Record',
                'sinopse' => 'Rachel viaja diariamente de trem e observa um casal que acredita ter a vida perfeita, até que a mulher desaparece.',
                'gender' => 'suspense',
                'publish_year' => 2015
            ],
            [
                'title' => 'E Não Sobrou Nenhum',
                'author' => 'Agatha Christie',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Globo Livros',
                'sinopse' => 'Dez pessoas são convidadas para uma ilha e começam a morrer uma por uma, seguindo um poema macabro.',
                'gender' => 'suspense',
                'publish_year' => 1939
            ],

            // ADVENTURE
            [
                'title' => 'A Ilha do Tesouro',
                'author' => 'Robert Louis Stevenson',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Agir',
                'sinopse' => 'O jovem Jim Hawkins parte em uma aventura marítima em busca do tesouro do temido Capitão Flint, enfrentando piratas perigosos.',
                'gender' => 'adventure',
                'publish_year' => 1883
            ],
            [
                'title' => 'As Aventuras de Robinson Crusoé',
                'author' => 'Daniel Defoe',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Nova Fronteira',
                'sinopse' => 'Após um naufrágio, Robinson Crusoé fica preso em uma ilha deserta por anos, lutando para sobreviver e manter sua sanidade.',
                'gender' => 'adventure',
                'publish_year' => 1719
            ],
            [
                'title' => 'O Guarani',
                'author' => 'José de Alencar',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Ática',
                'sinopse' => 'A história de Peri, um índio guarani, e sua devoção a Ceci, filha de um fidalgo português, em meio a aventuras no Brasil colonial.',
                'gender' => 'adventure',
                'publish_year' => 1857
            ],
            [
                'title' => 'Vinte Mil Léguas Submarinas',
                'author' => 'Júlio Verne',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Agir',
                'sinopse' => 'O professor Aronnax é capturado pelo misterioso Capitão Nemo e embarca em uma incrível jornada submarina pelo mundo.',
                'gender' => 'adventure',
                'publish_year' => 1870
            ],

            // TERROR
            [
                'title' => 'Drácula',
                'author' => 'Bram Stoker',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Globo Livros',
                'sinopse' => 'O conde Drácula deixa sua terra natal na Transilvânia para espalhar a maldição vampírica na Inglaterra vitoriana.',
                'gender' => 'terror',
                'publish_year' => 1897
            ],
            [
                'title' => 'Frankenstein',
                'author' => 'Mary Shelley',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Companhia das Letras',
                'sinopse' => 'Victor Frankenstein cria uma criatura a partir de partes de cadáveres, mas sua criação se torna uma ameaça aterrorizante.',
                'gender' => 'terror',
                'publish_year' => 1818
            ],
            [
                'title' => 'O Exorcista',
                'author' => 'William Peter Blatty',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Rocco',
                'sinopse' => 'Uma menina de 12 anos é possuída por uma entidade demoníaca, e sua mãe busca ajuda de dois padres para um exorcismo.',
                'gender' => 'terror',
                'publish_year' => 1971
            ],
            [
                'title' => 'O Iluminado',
                'author' => 'Stephen King',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Suma',
                'sinopse' => 'Jack Torrance se torna caseiro de um hotel isolado nas montanhas durante o inverno, onde forças sobrenaturais despertam sua loucura.',
                'gender' => 'terror',
                'publish_year' => 1977
            ],

            // BIOGRAPHY
            [
                'title' => 'Steve Jobs',
                'author' => 'Walter Isaacson',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Companhia das Letras',
                'sinopse' => 'A biografia autorizada do cofundador da Apple, baseada em mais de quarenta entrevistas com Jobs nos seus últimos dois anos de vida.',
                'gender' => 'biography',
                'publish_year' => 2011
            ],
            [
                'title' => 'Minha Luta',
                'author' => 'Karl Ove Knausgård',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Companhia das Letras',
                'sinopse' => 'Autobiografia brutalmente honesta do autor norueguês sobre sua vida cotidiana, família e relacionamentos.',
                'gender' => 'biography',
                'publish_year' => 2009
            ],
            [
                'title' => 'Einstein: Sua Vida, Seu Universo',
                'author' => 'Walter Isaacson',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Companhia das Letras',
                'sinopse' => 'Biografia completa de Albert Einstein, explorando tanto seu gênio científico quanto sua vida pessoal e política.',
                'gender' => 'biography',
                'publish_year' => 2007
            ],
            [
                'title' => 'Diário de Anne Frank',
                'author' => 'Anne Frank',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Record',
                'sinopse' => 'O diário íntimo de Anne Frank durante os dois anos em que esteve escondida com sua família durante a ocupação nazista na Holanda.',
                'gender' => 'biography',
                'publish_year' => 1947
            ],

            // DIDACTIC
            [
                'title' => 'Sapiens: Uma Breve História da Humanidade',
                'author' => 'Yuval Noah Harari',
                'isbn' => fake()->isbn13(),
                'publisher' => 'L&PM',
                'sinopse' => 'Uma análise fascinante sobre como o Homo sapiens conseguiu dominar o mundo, explorando três revoluções: cognitiva, agrícola e científica.',
                'gender' => 'didactic',
                'publish_year' => 2011
            ],
            [
                'title' => 'Uma Breve História do Tempo',
                'author' => 'Stephen Hawking',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Intrínseca',
                'sinopse' => 'Hawking explica conceitos complexos da física moderna, como buracos negros, teoria da relatividade e origem do universo, de forma acessível.',
                'gender' => 'didactic',
                'publish_year' => 1988
            ],
            [
                'title' => 'O Mundo Assombrado pelos Demônios',
                'author' => 'Carl Sagan',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Companhia das Letras',
                'sinopse' => 'Sagan defende o pensamento científico e crítico contra superstições e pseudociências, mostrando a importância da ciência na sociedade.',
                'gender' => 'didactic',
                'publish_year' => 1995
            ],
            [
                'title' => 'Freakonomics',
                'author' => 'Steven D. Levitt',
                'isbn' => fake()->isbn13(),
                'publisher' => 'Record',
                'sinopse' => 'Os autores aplicam princípios econômicos para explicar fenômenos sociais aparentemente não relacionados, revelando conexões surpreendentes.',
                'gender' => 'didactic',
                'publish_year' => 2005
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
