<?php

namespace Database\Seeders;

use App\Models\Blog\Category as BlogCategory;
use App\Models\Portfolio\Category as PortfolioCategory;
use App\Models\Portfolio\Post as PortfolioPost;
use App\Models\Blog\Post as BlogPost;
use App\Models\Navigation;
use App\Models\Page;
use App\Models\Service\Post as ServicePost;
use App\Models\User;
use Database\Factories\Concerns\CanCreateImages;
use Illuminate\Database\Seeder;

class ProdDataSeeder extends Seeder
{
    use CanCreateImages;

    public function run(): void
    {
        $this->seedUsers();
//        $this->seedService();
//        $this->seedBlog();
        $this->seedPortfolio();
        $this->seedPage();
        $this->seedMenu();
    }

    private function seedUsers(): void
    {

        User::create([
            'name' => 'Admin',
            'email' => 'admin@lotusnoir.ca',
            'password' => bcrypt('password'),
        ]);
    }

    private function seedService(): void
    {
        $posts = [
            [
                'title' => 'Gestion financière',
                'slug' => 'gestion-financiere',
                'text' => 'Supervision des finances de vos propriétés, incluant facturation, loyers, et optimisation des rendements immobiliers.',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'Service',
                                'subtitle_level' => 'span',
                                'heading_text' => "Gestion\nfinancière",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>Supervision des finances de vos propriétés, incluant facturation, loyers, et optimisation des rendements immobiliers.</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    "content_section" => [
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => '01',
                                'subtitle_text' => 'Service disponible',
                                'subtitle_level' => 'span',
                                'heading_text' => 'Perception des loyers',
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => "<p>Nous nous chargeons de la perception du loyer de tous vos locataires en plus d'effectuer les suivis pour les retards.</p>",
                                'buttons' => [],
                                'blocks' => []
                            ]
                        ],
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => '02',
                                'subtitle_text' => 'Service disponible',
                                'subtitle_level' => 'span',
                                'heading_text' => 'Comptabilité',
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => "<p>Notre équipe s'occupe de la comptabilisation des revenus et dépenses, la production des rapports financiers de chaque immeuble, la conciliation bancaire, etc.</p>",
                                'buttons' => [],
                                'blocks' => []
                            ]
                        ],
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => '03',
                                'subtitle_text' => 'Service disponible',
                                'subtitle_level' => 'span',
                                'heading_text' => 'Paiement des factures',
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => "<p>Règlement de vos factures du quotidien (à votre charge) afin d'éviter tout oubli d'une routine chargée.</p>",
                                'buttons' => [],
                                'blocks' => []
                            ]
                        ],
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => '04',
                                'subtitle_text' => 'Service disponible',
                                'subtitle_level' => 'span',
                                'heading_text' => 'Bien plus encore!',
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => "<p>Quelques tâches que vous aviez en tête de déléguer n'apparaissent pas dans notre liste? N'hésitez pas à communiquer avec nous pour vérifier si ces services sont offerts.</p>",
                                'buttons' => [],
                                'blocks' => []
                            ]
                        ],
                    ],
                    'footer_section' => $this->seedFooterSection(),
                ]
            ],
            [
                'title' => 'Gestion administrative',
                'slug' => 'gestion-administrative',
                'text' => 'Coordination et supervision des tâches administratives pour votre propriété, incluant gestion des locataires et contrats.',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'Service',
                                'subtitle_level' => 'span',
                                'heading_text' => "Gestion\nadministrative",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>Coordination et supervision des tâches administratives pour votre propriété, incluant gestion des locataires et contrats.</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    'content_section' => [
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => '01',
                                'subtitle_text' => 'Service disponible',
                                'subtitle_level' => 'span',
                                'heading_text' => "Gestion des clés, stationnements et espaces d'entreposage",
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => "<p>Il peut être ardu de devoir faire la gestion des clés de vos immeubles en plus des espaces de stationnement et d'entreposage. Nous vous offrons donc d'en faire la gestion pour vous à l'aide de nos outils d'organisation.</p>",
                                'buttons' => [],
                                'blocks' => []
                            ]
                        ],
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => '02',
                                'subtitle_text' => 'Service disponible',
                                'subtitle_level' => 'span',
                                'heading_text' => 'Location des logements vacants et publication des annonces',
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => "<p>Vous manquez de temps pour faire l'affichage de vos logements vacants donc ceux-ci n'ont pas la visibilité escomptée? Pas de souci, avec la visibilité de nos réseaux sociaux en plus de notre maîtrise des annonces de logements sur les sites appropriés, nous saurons diminuer le taux de vacances de vos unités.</p>",
                                'buttons' => [],
                                'blocks' => []
                            ]
                        ],
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => '03',
                                'subtitle_text' => 'Service disponible',
                                'subtitle_level' => 'span',
                                'heading_text' => 'Négociation et renouvellement des baux',
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => "<p>Le renouvellement des baux et l'augmentation du prix du loyer sont des tâches administratives qui peuvent prendre beaucoup de votre temps. Avec nos outils de gestion, nous vous garantissons une saison de renouvellement de baux tout en douceur et sans complications.</p>",
                                'buttons' => [],
                                'blocks' => []
                            ]
                        ],
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => '04',
                                'subtitle_text' => 'Service disponible',
                                'subtitle_level' => 'span',
                                'heading_text' => 'Gestion de la documentation légale',
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => "<p>Voici l'exemple d'une autre tâche administrative qui peut prendre beaucoup de votre précieux temps surtout lorsque le nombre d'unités dans votre portefeuille immobilier est élevé. Soyez assuré que notre équipe est outillée pour compléter cette tâche en peu de temps vous laissant ainsi plus de temps pour vous concentrer sur autre chose.</p>",
                                'buttons' => [],
                                'blocks' => []
                            ]
                        ],
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => '05',
                                'subtitle_text' => 'Service disponible',
                                'subtitle_level' => 'span',
                                'heading_text' => 'Bien plus encore!',
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => "<p>Quelques tâches que vous aviez en tête de déléguer n'apparaissent pas dans notre liste? N'hésitez pas à communiquer avec nous pour vérifier si ces services sont offerts.</p>",
                                'buttons' => [],
                                'blocks' => []
                            ]
                        ]
                    ],
                    'footer_section' => $this->seedFooterSection(),
                ]
            ],
            [
                'title' => 'Gestion opérationnelle',
                'slug' => 'gestion-operationnelle',
                'text' => 'Organisation quotidienne de la propriété, de la maintenance à la gestion locative, pour un fonctionnement optimal.',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'Service',
                                'subtitle_level' => 'span',
                                'heading_text' => "Gestion\nopérationnelle",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>Organisation quotidienne de la propriété, de la maintenance à la gestion locative, pour un fonctionnement optimal.</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    'content_section' => [
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => '01',
                                'subtitle_text' => 'Service disponible',
                                'subtitle_level' => 'span',
                                'heading_text' => "Négocier et gérer tous les contrats de services",
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => "<p>Des services d'entretien ménager jusqu'au contrat de déneigement, notre équipe se charge de trouver les meilleures entreprises de services pour maintenir l'immeuble en bon état durant toute l'année.</p>",
                                'buttons' => [],
                                'blocks' => []
                            ]
                        ],
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => '02',
                                'subtitle_text' => 'Service disponible',
                                'subtitle_level' => 'span',
                                'heading_text' => "Obtention des soumissions pour réparations urgentes et travaux majeurs",
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => "<p>Pour un problème de plomberie, d'électricité ou bien une réparation mineur dans votre immeuble, aucun problème n'est à notre épreuve. Nous détenons un éventail de contacts dans plusieurs secteurs différents pour répondre à vos besoins.</p>",
                                'buttons' => [],
                                'blocks' => []
                            ]
                        ],
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => '03',
                                'subtitle_text' => 'Service disponible',
                                'subtitle_level' => 'span',
                                'heading_text' => "Traitement des demandes ponctuelles des locataires",
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => "<p>Vous avez de la difficulté à trouver l'équilibre entre le travail et votre vie personnelle? Déléguez nous les demandes récurrentes ou ponctuelles de vos locataires. Nous traiterons leurs demandes sans que vous n'ayez à vous en préoccuper.</p>",
                                'buttons' => [],
                                'blocks' => []
                            ]
                        ],
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => '04',
                                'subtitle_text' => 'Service disponible',
                                'subtitle_level' => 'span',
                                'heading_text' => 'Bien plus encore!',
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => "<p>Quelques tâches que vous aviez en tête de déléguer n'apparaissent pas dans notre liste? N'hésitez pas à communiquer avec nous pour vérifier si ces services sont offerts.</p>",
                                'buttons' => [],
                                'blocks' => []
                            ]
                        ]
                    ],
                    'footer_section' => $this->seedFooterSection(),

                ]
            ]
        ];

        foreach ($posts as $post) {
            ServicePost::create([
                'title' => $post['title'],
                'slug' => $post['slug'],
                'text' => $post['text'],
                'image' => $this->createDefaultImage(),
                'content' => $post['content'] ?? [],
            ]);
        }
    }

    public function seedBlog(): void
    {
        $categories = BlogCategory::factory()->count(3)->create();
        BlogPost::factory()->count(50)
            ->hasAttached($categories->random(rand(1, 3))->first())
            ->create();
    }

    public function seedPortfolio(): void
    {
        $categories = PortfolioCategory::factory()->count(3)->create();
        PortfolioPost::factory()->count(50)
            ->hasAttached($categories->random(rand(1, 3))->first())
            ->create();
    }


    public function seedHomeSlider()
    {
        return [
            [
                'type' => 'slider',
                'data' => [
                    "slides" => [
                        [
                            "subtitle_text" => "Lorem ipsum dolor sit amet.",
                            "subtitle_level" => "span",
                            "heading_text" => "Lorem ipsum dolor sit amet.",
                            "heading_level" => "h2",
                            "heading_size" => "h1",
                            "text" => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris.</p>",
                            "image" => $this->createDefaultImage(),
                            "buttons" => [
                            ]
                        ],
                        [
                            "subtitle_text" => "Lorem ipsum dolor sit amet.",
                            "subtitle_level" => "span",
                            "heading_text" => "Lorem ipsum dolor sit amet.",
                            "heading_level" => "h2",
                            "heading_size" => "h1",
                            "text" => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris.</p>",
                            "image" => $this->createDefaultImage(),
                            "buttons" => [
                            ]
                        ]
                    ],
                    "template" => "full-screen",
                    "options" => [
                        "slidesPerView" => "1",
                        "pagination" => [
                            "enabled" => true
                        ],
                        "autoplay" => [
                            "enabled" => true,
                            "delay" => 10000,
                            "disableOnInteraction" => true
                        ],
                        "navigation" => [
                            "enabled" => true
                        ],
                        "loop" => true,
                        "parallax" => true,
                        "mousewheel" => true,
                        "keyboard" => true,
                        "speed" => 1200
                    ]
                ]
            ]
        ];

    }

    public function seedFooterSection()
    {
        return [
            [
                'type' => 'banner',
                'data' => [
                    'subtitle_text' => 'Contact',
                    'subtitle_level' => 'h2',
                    'heading_text' => "Avez-vous\nun projet ?",
                    'heading_level' => 'h2',
                    'heading_size' => 'h1',
                    'text' => "<p>Pour obtenir plus d'informations ou pour une consultation gratuite, laissez-nous un message via notre formulaire en cliquant ci-dessous. Notre équipe est prête à répondre à toutes vos questions.</p>",
                    'image' => $this->createDefaultImage(),
                    'buttons' => [
                        [
                            'style' => 'default',
                            'action' => [
                                'type' => 'App\\Models\\Page',
                                'data' => [
                                    'label' => 'Contactez-nous',
                                    'url' => '4',
                                    'target' => null
                                ]
                            ]
                        ],

                    ]
                ]
            ]
        ];
    }

    private function seedPage(): void
    {
        $pages = [
            [
                'title' => 'Accueil',
                'slug' => 'accueil',
                'text' => 'Bienvenue sur notre site web.',
                'content' => [
                    'header_section' => $this->seedHomeSlider(),
                ],
            ],
            [
                'title' => 'Services',
                'slug' => 'services',
                'text' => 'Contactez-nous pour plus d\'informations.',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'Services',
                                'subtitle_level' => 'span',
                                'heading_text' => "Besoin d'ajouter\ndu temps à vos journées?",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>Chex Vilaplex, nous scindons notre offre de services en trois grandes catégories. Explorez chacune d'entre elle pour y découvrir les multitudes de façons dont nous pouvons vous aider dans votre gestion immobilière.</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    'content_section' => [
                        [
                            'type' => 'grid',
                            'data' => [
                                'layout_type' => 'boxed',
                                'columns' => 33,
                                'type' => 'dynamic',
                                'show_title' => true,
                                'show_text' => true,
                                'show_image' => true,
                                'show_lightbox' => true,
                                'dynamic_type' => 'App\\Models\\Service\\Post',
                                'order_by' => 'created_at',
                                'order_direction' => 'asc',
                                'limit' => 999,
                                'per_page' => 999,
                                'category_ids' => []
                            ]
                        ]
                    ],
                    'footer_section' => $this->seedFooterSection(),
                ]
            ],
            [
                'title' => 'Blogue',
                'slug' => 'blogue',
                'text' => 'Contactez-nous pour plus d\'informations.',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'Blogue',
                                'subtitle_level' => 'span',
                                'heading_text' => "Quelques sujets qui\npourraient vous intéresser",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>À venir bientôt!</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    'content_section' => [
                        [
                            'type' => 'grid',
                            'data' => [
                                'layout_type' => 'boxed',
                                'columns' => 33,
                                'type' => 'dynamic',
                                'show_title' => true,
                                'show_text' => true,
                                'show_image' => true,
                                'show_lightbox' => true,
                                'dynamic_type' => 'App\\Models\\Blog\\Post',
                                'order_by' => 'created_at',
                                'order_direction' => 'asc',
                                'limit' => 999,
                                'per_page' => 999,
                                'category_ids' => []
                            ]
                        ]
                    ],
                    'footer_section' => $this->seedFooterSection(),
                ]
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
                'text' => 'Contactez-nous pour plus d\'informations.',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'Contact',
                                'subtitle_level' => 'span',
                                'heading_text' => "À la recherche d'une gestion\nImmobilière efficace et personnalisée?",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>Appelez-nous ou envoyez-nous un message en remplissant le formulaire ci-dessous pour discuter de vos besoins spécifiques. Nous avons hâte de travailler avec vous!</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    'footer_section' => [],
                    'content_section' => [
                        [
                            'type' => 'form',
                            'data' => [

                            ]
                        ]
                    ]
                ]
            ],
            [
                'title' => 'À propos',
                'slug' => 'a-propos',
                'text' => 'Découvrez\nnotre équipe',
                'content' => [
                    'header_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'À propos',
                                'subtitle_level' => 'span',
                                'heading_text' => "Découvrez\nnotre équipe",
                                'heading_level' => 'h1',
                                'heading_size' => 'h1',
                                'text' => "<p>Chez Vilaplex, nous sommes une équipe passionnée par la gestion efficace et durable des biens immobiliers. Notre équipe dévouée s'engage à vous offrir un service des plus professionnel qui ira au delà de vos attentes. Soyez donc rassuré que chacun de nos membres vous apporteront leur expertise dans tous les aspects de la gestion immobilière.</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => []
                            ]
                        ]
                    ],
                    'content_section' => [
                        [
                            'type' => 'section',
                            'data' => [
                                'section_number' => null,
                                'subtitle_text' => null,
                                'subtitle_level' => 'span',
                                'heading_text' => null,
                                'heading_level' => 'h2',
                                'heading_size' => 'h2',
                                'text' => null,
                                'buttons' => [],
                                'blocks' => [
                                    [
                                        'type' => 'twocolumn',
                                        'data' => [
                                            'left' => [
                                                'subtitle_text' => 'CO-FONDATRICE',
                                                'subtitle_level' => 'span',
                                                'heading_text' => 'Noémi De Carufel',
                                                'heading_level' => 'h2',
                                                'heading_size' => 'h3',
                                                'text' => null,
                                                'buttons' => []
                                            ],
                                            'right' => [
                                                'subtitle_text' => 'CO-FONDATRICE',
                                                'subtitle_level' => 'span',
                                                'heading_text' => 'Jessica Deschamps',
                                                'heading_level' => 'h2',
                                                'heading_size' => 'h3',
                                                'text' => null,
                                                'buttons' => []
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],
                    'footer_section' => [
                        [
                            'type' => 'banner',
                            'data' => [
                                'subtitle_text' => 'Contact',
                                'subtitle_level' => 'h2',
                                'heading_text' => "Besoin d'optimiser\nvotre temps ?",
                                'heading_level' => 'h2',
                                'heading_size' => 'h1',
                                'text' => "<p>Contactez notre équipe dès aujourd'hui pour une consultation gratuite et laissez-nous prendre soin de vos biens comme s'ils étaient les nôtres.</p>",
                                'image' => $this->createDefaultImage(),
                                'buttons' => [
                                    [
                                        'style' => 'default',
                                        'action' => [
                                            'type' => 'App\\Models\\Page',
                                            'data' => [
                                                'label' => 'Contactez-nous',
                                                'url' => '4',
                                                'target' => null
                                            ]
                                        ]
                                    ],

                                ]
                            ]
                        ]

                    ],

                ]
            ],
        ];

        foreach ($pages as $page) {
            Page::create([
                'title' => $page['title'],
                'slug' => $page['slug'],
                'text' => $page['text'],
                'image' => $this->createDefaultImage(),
                'content' => $page['content'] ?? '[]',
            ]);
        }
    }

    public function seedMenu()
    {

        $menus = [
            [
                'title' => 'Main',
                'handle' => 'Main',
            ],
        ];

        foreach ($menus as $menu) {
            Navigation::create([
                'title' => $menu['title'],
                'handle' => $menu['handle'],
                'items' => json_decode('{"5b210326-2262-4b4b-b3a3-8e6ea60bebe7":{"type":"App\\\\Models\\\\Page","data":{"label":"Services","url":"2","target":null},"children":{"d59e555f-3fb5-4b66-a613-a2277692916a":{"type":"App\\\\Models\\\\Service\\\\Post","data":{"label":"Gestion op\u00e9rationnelle","url":"3","target":null},"children":[]},"42c55340-a8a2-406a-93cc-2747c8b81bf7":{"type":"App\\\\Models\\\\Service\\\\Post","data":{"label":"Gestion administrative","url":"2","target":null},"children":[]},"d804be45-fbdd-44f9-b29c-651d3f3ab47a":{"type":"App\\\\Models\\\\Service\\\\Post","data":{"label":"Gestion financi\u00e8re","url":"1","target":null},"children":[]}}},"e4747ea5-03ee-43f3-bade-1d2c2ef06067":{"type":"App\\\\Models\\\\Page","data":{"label":"Blogue","url":"3","target":null},"children":[]},"134a0c23-e266-4cfe-a5e7-57361aab25cc":{"type":"App\\\\Models\\\\Page","data":{"label":"\u00c0 propos","url":"5","target":null},"children":[]},"58027fba-1488-451d-b716-66bd57ee9386":{"type":"App\\\\Models\\\\Page","data":{"label":"Contact","url":"4","target":null},"children":[]}}
', true),
            ]);
        }
    }
}
