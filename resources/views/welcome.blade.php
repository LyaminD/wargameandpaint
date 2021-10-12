@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wargame & Paint</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <body>
        <div id="loginBackground" class="bg-dark text-center mb-5">
            <h1>Bienvenu sur Wargame & Paint ! ! !</h1>
            <p>Wargame & Paint est un site de partage de photos sur l'univers de Games Workshop !</p>
            <p>Partage tes réalisations avec la communauté !</p>
            <div class="container">
                <div class="tribunal text-center my-5">
                    <img src="{{ asset('images/wargame.png') }}" class="banner">
                </div>
            </div>
            <div class="container d-flex text-center">
                <div class="col text-center">
                    <div class="button-div">
                        <div class="py-4 px-4">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                S'enregistrer
                            </button>
                            <!-- Modal -->
                            <div class="modal fade text-dark" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Mentions legales et politique
                                                de confidentialité</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-dark">
                                                <h1>MENTIONS LEGALES</h1>
                                                <div>
                                                    IDENTITÉ
                                                    Nom du site web : < Wargame And Paint>
                                                        Adresse : < https://wargameandpaint.yamms.fr>
                                                            Propriétaire : < D. Lyamin>
                                                                Responsable de publication : < D. Lyamin>
                                                                    Conception et réalisation : < D. Lyamin>

                                                                        Hébergement : < IONOS 1&1>
                                                                            Adresse : 7 Pl. de la Gare, 57200 Sarreguemines.
                                                                            site WEB : https://www.ionos.fr/

                                                                            <div><br></div>
                                                                            CONDITIONS D’UTILISATION
                                                                            L’utilisation du présent site implique
                                                                            l’acceptation pleine et entière des conditions
                                                                            générales d’utilisation décrites ci-après. Ces
                                                                            conditions d’utilisation sont susceptibles
                                                                            d’être modifiées ou complétées à tout moment.
                                                                            <div><br></div>
                                                                            INFORMATIONS
                                                                            Les informations et documents du site sont
                                                                            présentés à titre indicatif, n’ont pas de
                                                                            caractère exhaustif, et ne peuvent engager la
                                                                            responsabilité du propriétaire du site.

                                                                            Le propriétaire du site ne peut être tenu
                                                                            responsable des dommages directs et indirects
                                                                            consécutifs à l’accès au site.
                                                                            <div><br></div>
                                                                            INTERACTIVITÉ
                                                                            Les utilisateurs du site peuvent y déposer du
                                                                            contenu, apparaissant sur le site dans des
                                                                            espaces dédiés (notamment via les posts et les
                                                                            commentaires). Le contenu déposé reste sous la
                                                                            responsabilité de leurs auteurs, qui en assument
                                                                            pleinement l’entière responsabilité juridique.

                                                                            Le propriétaire du site se réserve néanmoins le
                                                                            droit de retirer sans préavis et sans
                                                                            justification tout contenu déposé par les
                                                                            utilisateurs qui ne satisferait pas à la charte
                                                                            déontologique du site ou à la législation en
                                                                            vigueur.
                                                                            <div><br></div>
                                                                            PROPRIÉTÉ INTELLECTUELLE
                                                                            Sauf mention contraire, tous les éléments
                                                                            accessibles sur le site (textes, images,
                                                                            graphismes, logo, icônes, sons, logiciels, etc.)
                                                                            restent la propriété exclusive de leurs auteurs,
                                                                            en ce qui concerne les droits de propriété
                                                                            intellectuelle ou les droits d’usage. 1

                                                                            Toute reproduction, représentation,
                                                                            modification, publication, adaptation de tout ou
                                                                            partie des éléments du site, quel que soit le
                                                                            moyen ou le procédé utilisé, est interdite, sauf
                                                                            autorisation écrite préalable de l’auteur.23

                                                                            Toute exploitation non autorisée du site ou de
                                                                            l’un quelconque des éléments qu’il contient est
                                                                            considérée comme constitutive d’une contrefaçon
                                                                            et poursuivie. 4

                                                                            Les marques et logos reproduits sur le site sont
                                                                            déposés par les sociétés qui en sont
                                                                            propriétaires.
                                                                            <div><br></div>
                                                                            LIENS
                                                                            Liens sortants
                                                                            Le propriétaire du site décline toute
                                                                            responsabilité et n’est pas engagé par le
                                                                            référencement via des liens hypertextes, de
                                                                            ressources tierces présentes sur le réseau
                                                                            Internet, tant en ce qui concerne leur contenu
                                                                            que leur pertinence.

                                                                            Liens entrants
                                                                            Le propriétaire du site autorise les liens
                                                                            hypertextes vers l’une des pages de ce site, à
                                                                            condition que ceux-ci ouvrent une nouvelle
                                                                            fenêtre et soient présentés de manière non
                                                                            équivoque afin d’éviter :

                                                                            tout risque de confusion entre le site citant et
                                                                            le propriétaire du site
                                                                            ainsi que toute présentation tendancieuse, ou
                                                                            contraire aux lois en vigueur.
                                                                            Le propriétaire du site se réserve le droit de
                                                                            demander la suppression d’un lien s’il estime
                                                                            que le site source ne respecte pas les règles
                                                                            ainsi définies.
                                                                            <div><br></div>
                                                                            CONFIDENTIALITÉ
                                                                            Tout utilisateur dispose d’un droit d’accès, de
                                                                            rectification et d’opposition aux données
                                                                            personnelles le concernant, en effectuant sa
                                                                            demande écrite et signée, accompagnée d’une
                                                                            preuve d’identité. 5678

                                                                            Le site recueille des informations
                                                                            personnelles,les adresses mails sont récoltées a
                                                                            des fins purements fonctionnelles, si besoin sur
                                                                            l'administration du site et la gestion des
                                                                            comptes utilisateurs, et n’est pas assujetti à
                                                                            déclaration à la CNIL. 9
                                                </div>
                                            </div>

                                            <h1>Politique de confidentialité</h1>
                                            <div><br></div>
                                            <div><strong>Introduction</strong></div>
                                            <div>Devant le développement des nouveaux outils de communication, il est
                                                nécessaire de porter une attention particulière à la protection de la vie
                                                privée. C’est pourquoi, nous nous engageons à respecter la confidentialité
                                                des renseignements personnels que nous collectons.</div>
                                            <div><br></div>
                                            <h2>Collecte des renseignements personnels</h2>
                                            <div><br></div>
                                            <div>
                                                <ul>
                                                    <li>Adresse électronique</li>
                                                </ul>
                                            </div>
                                            <div>Les renseignements personnels que nous collectons sont recueillis au
                                                travers de formulaires et grâce à l’interactivité établie entre vous et
                                                notre site Web. Nous utilisons également, comme indiqué dans la section
                                                suivante, des fichiers témoins et/ou journaux pour réunir des informations
                                                vous concernant.</div>
                                            <div><br></div>
                                            <h2>Formulaires&nbsp;et interactivité:</h2>
                                            <div>Vos renseignements personnels sont collectés par le biais de formulaire, à
                                                savoir :</div>
                                            <div><br></div>
                                            <div>
                                                <ul>
                                                    <li>Formulaire d'inscription au site Web</li>
                                                </ul>
                                            </div>
                                            <div>Nous utilisons les renseignements ainsi collectés pour les finalités
                                                suivantes :</div>
                                            <div><br></div>
                                            <div>
                                                <ul>
                                                    <li>Contact</li>
                                                </ul>
                                            </div>
                                            <div>Vos renseignements sont également collectés par le biais de l’interactivité
                                                pouvant s’établir entre vous et notre site Web et ce, de la façon suivante:
                                            </div>
                                            <div><br></div>
                                            <div>
                                                <ul>
                                                    <li>Commentaires </li>
                                                    <li>Correspondance</li>
                                                </ul>
                                            </div>
                                            <div>Nous utilisons les renseignements ainsi collectés pour les finalités
                                                suivantes :</div>
                                            <div><br></div>
                                            <div>
                                                <ul>
                                                    <li>Contact </li>
                                                </ul>
                                            </div>
                                            <div><br></div>
                                            <h2>Droit d’opposition et de retrait</h2>
                                            <div>Nous nous engageons à vous offrir un droit d’opposition et de retrait quant
                                                à vos renseignements personnels.</div>
                                            <div>Le droit d’opposition s’entend comme étant la possiblité offerte aux
                                                internautes de refuser que leurs renseignements personnels soient utilisées
                                                à certaines fins mentionnées lors de la collecte.</div>
                                            <div><br></div>
                                            <div>Le droit de retrait s’entend comme étant la possiblité offerte aux
                                                internautes de demander à ce que leurs renseignements personnels ne figurent
                                                plus, par exemple, dans une liste de diffusion.</div>
                                            <div><br></div>
                                            <div><strong>Pour pouvoir exercer ces droits, vous pouvez :</strong></div>
                                            <div><br></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div>Section du site web :&nbsp;&nbsp; Formulaire de contact du site web</div>
                                            <div><br></div>
                                            <h2>Droit d’accès</h2>
                                            <div>Nous nous engageons à reconnaître un droit d’accès et de rectification aux
                                                personnes concernées désireuses de consulter, modifier, voire radier les
                                                informations les concernant.</div>
                                            <div><br></div>
                                            <div><strong>L’exercice de ce droit se fera :</strong></div>
                                            <div><br></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div>Section du site web :&nbsp;&nbsp; formulaire de contact du site web</div>
                                            <div><br></div>
                                            <h2>Sécurité</h2>
                                            <div>Les renseignements personnels que nous collectons sont conservés dans un
                                                environnement sécurisé. Les personnes travaillant pour nous sont tenues de
                                                respecter la confidentialité de vos informations.</div>
                                            <div><br></div>
                                            <div>Pour assurer la sécurité de vos renseignements personnels, nous avons
                                                recours aux mesures suivantes :</div>
                                            <div><br></div>
                                            <div>
                                                <ul>
                                                    <li>Protocole SSL</li>
                                                    <li>Gestion des accès - personne autorisée</li>
                                                    <li>Gestion des accès - personne concernée</li>
                                                    <li>Logiciel de surveillance du réseau</li>
                                                    <li>Sauvegarde informatique</li>
                                                    <li>Identifiant / mot de passe</li>
                                                    <li>Pare-feu</li>
                                                </ul>
                                            </div>
                                            <div>Nous nous engageons à maintenir un haut degré de confidentialité en
                                                intégrant les dernières innovations technologiques permettant d’assurer la
                                                confidentialité de vos transactions. Toutefois, comme aucun mécanisme
                                                n’offre une sécurité maximale, une part de risque est toujours présente
                                                lorsque l’on utilise Internet pour transmettre des renseignements
                                                personnels.</div>
                                            <div><br></div>
                                            <h2>Législation</h2>
                                            <div>Nous nous engageons à respecter les dispositions législatives énoncées dans
                                                :</div>
                                            <div><br></div>
                                            <div>Législation: RGPD / CNIL</div>
                                            <div><br></div>
                                        </div>

                                        <div><input type="checkbox" id="myCheck" onclick="checkFunction()">Accepter les
                                            mentions légales et la politique de confidentialité</div>

                                        <p id="text" style="display:none"><a href="{{ route('register') }}"
                                                class="btn btn-primary" role="button"
                                                data-bs-toggle="button">S'enregistrer</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('login') }}" class="btn btn-primary mb-5" role="button" data-bs-toggle="button">Se connecter</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection

<script>
    function checkFunction() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("text");
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>
