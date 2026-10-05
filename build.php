<?php

/**
 * Générateur du portfolio statique
 *
 * PHP exécute les pages du portfolio,
 * puis enregistre le résultat HTML dans /dist.
 */

$root = __DIR__;
$dist = $root . '/dist';

fwrite(STDERR, "=== Génération du portfolio ===\n\n");

/*
 * ---------------------------------------------------------
 * 1. Supprimer l'ancien dossier dist
 * ---------------------------------------------------------
 */

function supprimerDossier($dossier)
{
    if (!is_dir($dossier)) {
        return;
    }

    $elements = scandir($dossier);

    foreach ($elements as $element) {
        if ($element === '.' || $element === '..') {
            continue;
        }

        $chemin = $dossier . DIRECTORY_SEPARATOR . $element;

        if (is_dir($chemin)) {
            supprimerDossier($chemin);
        } else {
            unlink($chemin);
        }
    }

    rmdir($dossier);
}

supprimerDossier($dist);
mkdir($dist, 0777, true);


/*
 * ---------------------------------------------------------
 * 2. Copier les fichiers statiques
 * ---------------------------------------------------------
 */

function copierDossier($source, $destination)
{
    if (!is_dir($destination)) {
        mkdir($destination, 0777, true);
    }

    $elements = scandir($source);

    foreach ($elements as $element) {
        if ($element === '.' || $element === '..') {
            continue;
        }

        $sourcePath = $source . DIRECTORY_SEPARATOR . $element;
        $destinationPath = $destination . DIRECTORY_SEPARATOR . $element;

        if (is_dir($sourcePath)) {
            copierDossier($sourcePath, $destinationPath);
        } else {
            copy($sourcePath, $destinationPath);
        }
    }
}

$dossiersARecopier = [
    'css',
    'images',
    'js',
    'src'
];

foreach ($dossiersARecopier as $dossier) {
    fwrite(STDERR, "Copie de /$dossier...\n");

    copierDossier(
        $root . '/' . $dossier,
        $dist . '/' . $dossier
    );
}


/*
 * ---------------------------------------------------------
 * 3. Fonction permettant d'exécuter une page PHP
 * ---------------------------------------------------------
 */

function genererPage($fichier, $parametres = [])
{
    global $root;

    // On sauvegarde les paramètres GET actuels
    $ancienGet = $_GET;

    // On fournit les paramètres nécessaires à la page PHP
    $_GET = $parametres;

    // Capture de tout le HTML produit par le fichier PHP
    ob_start();

    include $root . '/' . $fichier;

    $html = ob_get_clean();

    // On restaure $_GET
    $_GET = $ancienGet;

    return $html;
}


/*
 * ---------------------------------------------------------
 * 4. Générer la page d'accueil
 * ---------------------------------------------------------
 */

fwrite(STDERR, "Génération de index.html...\n");

$html = genererPage('index.php');

file_put_contents(
    $dist . '/index.html',
    $html
);


/*
 * ---------------------------------------------------------
 * 5. Générer les pages de catégories
 * ---------------------------------------------------------
 */

$categories = [
    'personnel' => 'projets-personnels.html',
    'professionnel' => 'projets-professionnels.html'
];

foreach ($categories as $type => $nomFichier) {

    fwrite(STDERR, "Génération de $nomFichier...\n");

    $html = genererPage(
        'intermediaire.php',
        [
            'type' => $type
        ]
    );

    file_put_contents(
        $dist . '/' . $nomFichier,
        $html
    );
}


/*
 * ---------------------------------------------------------
 * 6. Générer les pages de chaque projet
 * ---------------------------------------------------------
 */

$jsonPath = $root . '/projets.json';

$json = file_get_contents($jsonPath);

$projets = json_decode($json, true);

if (!is_array($projets)) {
    die("Erreur : impossible de lire projets.json\n");
}

foreach ($projets as $projet) {

    $type = $projet['projectForSchool']
        ? 'professionnel'
        : 'personnel';

    $id = $projet['id'];

    $nomFichier = "projet-$type-$id.html";

    fwrite(STDERR, "Génération de $nomFichier...\n");

    $html = genererPage(
        'galerie.php',
        [
            'type' => $type,
            'id' => $id
        ]
    );

    file_put_contents(
        $dist . '/' . $nomFichier,
        $html
    );
}


/*
 * ---------------------------------------------------------
 * 7. Fin
 * ---------------------------------------------------------
 */

fwrite (STDERR,"\n");
fwrite (STDERR,"====================================\n");
fwrite (STDERR," Portfolio généré avec succès !\n");
fwrite (STDERR,"====================================\n");
fwrite (STDERR,"\nDossier généré : $dist\n");