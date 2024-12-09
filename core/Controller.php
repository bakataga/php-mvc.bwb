<?php
namespace BWB\Framework\mvc;

abstract class Controller{

/**cette propriete correspond a la 
*variable $_get elle sera initialisée 
*a la creation du controller
*  @var array
 */}

 private $get;

 /* 
 cette propriete correpsond a la variable superglobale $_post methode utiliseee pour ajouter une ressource */
 private $post;


 private $put;


 function __construct(){
  /* @return void
 */
 }

 protected function inputGet(): void{}

 protected function inputPost (): void{}

 protected function inputPut(): void{}

 final protected function render(): void{
/*  la methoe render affiche la vue selectionnee grace au premier argument
la methode utilise les indirection pour generer dynamiuement
les noms de variables utilisées dans la vue
@param string $pathToView chemin du fichier ou template de vue demandé
 @param array $datas -> la valeur par defaut permet de retourner des vues statiques*/
 }