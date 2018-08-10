<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-07-04 10:52:12 --> Query error: ERRO:  coluna "img_cat_blog" da relação "categoria_galeria" não existe
LINE 1: ...aleria" ("descricao", "deleted", "data_cadastro", "img_cat_b...
                                                             ^ - Invalid query: INSERT INTO "categoria_galeria" ("descricao", "deleted", "data_cadastro", "img_cat_blog", "img_cat_blog_thumb") VALUES ('teste 1', 0, '2018-07-04 10:52:12', '4079431f75b8e3f7af4feebc7029ae37.jpg', '4079431f75b8e3f7af4feebc7029ae37.jpg')
ERROR - 2018-07-04 10:52:48 --> Severity: error --> Exception: Call to undefined method CategoriaGaleria_Model::consultaCategoriaGaleria() C:\xampp\htdocs\clubetaurus\application\controllers\Painel\CategoriaGaleria.php 45
ERROR - 2018-07-04 10:53:16 --> Severity: error --> Exception: Call to undefined method CategoriaGaleria_Model::consultaCategoriaGaleria() C:\xampp\htdocs\clubetaurus\application\controllers\Painel\CategoriaGaleria.php 45
ERROR - 2018-07-04 10:53:34 --> Severity: Notice --> Undefined index: id_cat_blog C:\xampp\htdocs\clubetaurus\application\views\painel\categoria_galeria\visualizar.php 12
ERROR - 2018-07-04 10:53:34 --> Severity: Notice --> Undefined index: id_cat_blog C:\xampp\htdocs\clubetaurus\application\views\painel\categoria_galeria\visualizar.php 21
ERROR - 2018-07-04 10:53:34 --> Severity: Notice --> Undefined variable: totalBlogs C:\xampp\htdocs\clubetaurus\application\views\painel\categoria_galeria\visualizar.php 26
ERROR - 2018-07-04 10:53:34 --> Severity: Notice --> Undefined index: id_cat_blog C:\xampp\htdocs\clubetaurus\application\views\painel\categoria_galeria\visualizar.php 27
ERROR - 2018-07-04 10:53:34 --> Severity: Notice --> Undefined index: img_cat_blog C:\xampp\htdocs\clubetaurus\application\views\painel\categoria_galeria\visualizar.php 52
ERROR - 2018-07-04 10:53:58 --> Severity: Notice --> Undefined variable: totalBlogs C:\xampp\htdocs\clubetaurus\application\views\painel\categoria_galeria\visualizar.php 26
ERROR - 2018-07-04 10:53:58 --> Severity: Notice --> Undefined index: img_cat_blog C:\xampp\htdocs\clubetaurus\application\views\painel\categoria_galeria\visualizar.php 52
ERROR - 2018-07-04 10:58:44 --> Query error: ERRO:  relação "galeria" não existe
LINE 1: SELECT * FROM galeria WHERE categoria = '1'  
                      ^ - Invalid query: SELECT * FROM galeria WHERE categoria = '1'  
ERROR - 2018-07-04 11:02:46 --> Query error: ERRO:  coluna "categoria" não existe
LINE 1: SELECT * FROM galeria WHERE categoria = '1'  
                                    ^ - Invalid query: SELECT * FROM galeria WHERE categoria = '1'  
ERROR - 2018-07-04 11:03:08 --> Severity: Notice --> Undefined index: img_cat_blog C:\xampp\htdocs\clubetaurus\application\views\painel\categoria_galeria\visualizar.php 52
ERROR - 2018-07-04 11:04:54 --> Severity: Notice --> Undefined index: id_cat_blog C:\xampp\htdocs\clubetaurus\application\views\painel\categoria_galeria\editar.php 39
ERROR - 2018-07-04 11:04:54 --> Severity: Notice --> Undefined index: img_cat_blog_thumb C:\xampp\htdocs\clubetaurus\application\views\painel\categoria_galeria\editar.php 48
ERROR - 2018-07-04 11:05:26 --> Severity: Notice --> Undefined index: img_cat_blog_thumb C:\xampp\htdocs\clubetaurus\application\views\painel\categoria_galeria\editar.php 48
ERROR - 2018-07-04 12:05:44 --> Severity: Notice --> Undefined index: id_blog C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 28
ERROR - 2018-07-04 12:05:44 --> Severity: Notice --> Undefined index: blog_deleted C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 30
ERROR - 2018-07-04 12:05:44 --> Severity: Notice --> Undefined index: titulo C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 36
ERROR - 2018-07-04 12:05:44 --> Severity: Notice --> Undefined index: descricao C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 37
ERROR - 2018-07-04 12:05:44 --> Severity: Notice --> Undefined index: descricao C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 37
ERROR - 2018-07-04 12:05:44 --> Severity: Notice --> Undefined index: descricao_categoria_blog C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 38
ERROR - 2018-07-04 12:05:44 --> Severity: Notice --> Undefined index: id_blog C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 40
ERROR - 2018-07-04 12:06:52 --> Severity: Notice --> Undefined index: id_blog C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 28
ERROR - 2018-07-04 12:06:52 --> Severity: Notice --> Undefined index: blog_deleted C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 30
ERROR - 2018-07-04 12:06:52 --> Severity: Notice --> Undefined index: titulo C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 36
ERROR - 2018-07-04 12:06:52 --> Severity: Notice --> Undefined index: descricao C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 37
ERROR - 2018-07-04 12:06:52 --> Severity: Notice --> Undefined index: descricao C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 37
ERROR - 2018-07-04 12:06:52 --> Severity: Notice --> Undefined index: descricao_categoria_blog C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 38
ERROR - 2018-07-04 12:06:52 --> Severity: Notice --> Undefined index: id_blog C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 40
ERROR - 2018-07-04 12:07:16 --> Severity: Notice --> Undefined index: titulo C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 36
ERROR - 2018-07-04 12:07:16 --> Severity: Notice --> Undefined index: descricao C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 37
ERROR - 2018-07-04 12:07:16 --> Severity: Notice --> Undefined index: descricao C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 37
ERROR - 2018-07-04 12:07:16 --> Severity: Notice --> Undefined index: descricao_categoria_blog C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\lista.php 38
ERROR - 2018-07-04 12:09:56 --> Query error: ERRO:  sintaxe de entrada é inválida para integer: ""
LINE 1: SELECT * FROM vw_blog WHERE id_blog = ''  
                                              ^ - Invalid query: SELECT * FROM vw_blog WHERE id_blog = ''  
ERROR - 2018-07-04 12:10:24 --> Severity: error --> Exception: Call to undefined method Galeria_Model::consultaBlogVw() C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 40
ERROR - 2018-07-04 12:35:55 --> Severity: Notice --> Undefined index: id_categoria_gal C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 111
ERROR - 2018-07-04 12:35:55 --> Severity: Notice --> Undefined index: id_categoria_gal C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 111
ERROR - 2018-07-04 12:35:55 --> Query error: ERRO:  valor nulo na coluna "id_categoria_gal" viola a restrição não-nula
DETAIL:  Registro que falhou contém (2, lost de novo, null, lost, 0, 12:35:55). - Invalid query: INSERT INTO "galeria" ("titulo", "descricao", "deleted", "id_categoria_gal", "data_cadastro") VALUES ('lost', 'lost de novo', 0, NULL, '2018-07-04 12:35:55')
ERROR - 2018-07-04 12:36:37 --> Query error: ERRO:  coluna "id_cat_gal" da relação "galeria" não existe
LINE 1: ...INTO "galeria" ("titulo", "descricao", "deleted", "id_cat_ga...
                                                             ^ - Invalid query: INSERT INTO "galeria" ("titulo", "descricao", "deleted", "id_cat_gal", "data_cadastro") VALUES ('lost', 'lost de novo&nbsp;', 0, '2', '2018-07-04 12:36:37')
ERROR - 2018-07-04 13:14:20 --> Severity: Notice --> Undefined property: Galeria::$Utilidades C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 167
ERROR - 2018-07-04 13:14:20 --> Severity: error --> Exception: Call to a member function novoThumb() on null C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 167
ERROR - 2018-07-04 13:17:07 --> Severity: error --> Exception: Call to undefined method Galeria_Model::consultaBlogVw() C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 41
ERROR - 2018-07-04 13:17:12 --> Severity: error --> Exception: Call to undefined method Galeria_Model::consultaBlogVw() C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 41
ERROR - 2018-07-04 13:22:07 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 12
ERROR - 2018-07-04 13:22:07 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 16
ERROR - 2018-07-04 13:22:07 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 21
ERROR - 2018-07-04 13:22:07 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 26
ERROR - 2018-07-04 13:22:07 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 41
ERROR - 2018-07-04 13:22:07 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 47
ERROR - 2018-07-04 13:22:07 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 53
ERROR - 2018-07-04 13:22:07 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 59
ERROR - 2018-07-04 13:22:12 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 12
ERROR - 2018-07-04 13:22:12 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 16
ERROR - 2018-07-04 13:22:12 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 21
ERROR - 2018-07-04 13:22:12 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 26
ERROR - 2018-07-04 13:22:12 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 41
ERROR - 2018-07-04 13:22:12 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 47
ERROR - 2018-07-04 13:22:12 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 53
ERROR - 2018-07-04 13:22:12 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 59
ERROR - 2018-07-04 13:23:33 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 12
ERROR - 2018-07-04 13:23:33 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 16
ERROR - 2018-07-04 13:23:33 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 21
ERROR - 2018-07-04 13:23:33 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 26
ERROR - 2018-07-04 13:23:33 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 41
ERROR - 2018-07-04 13:23:33 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 47
ERROR - 2018-07-04 13:23:33 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 53
ERROR - 2018-07-04 13:23:33 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 59
ERROR - 2018-07-04 13:23:54 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 12
ERROR - 2018-07-04 13:23:54 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 16
ERROR - 2018-07-04 13:23:54 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 21
ERROR - 2018-07-04 13:23:54 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 26
ERROR - 2018-07-04 13:23:54 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 41
ERROR - 2018-07-04 13:23:54 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 47
ERROR - 2018-07-04 13:23:54 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 53
ERROR - 2018-07-04 13:23:54 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 59
ERROR - 2018-07-04 13:26:59 --> Severity: error --> Exception: Call to undefined method Galeria_Model::consultaBlog() C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 70
ERROR - 2018-07-04 13:27:15 --> Severity: Notice --> Undefined index: categoria C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 71
ERROR - 2018-07-04 13:27:15 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 38
ERROR - 2018-07-04 13:27:15 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 40
ERROR - 2018-07-04 13:27:15 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 81
ERROR - 2018-07-04 13:27:44 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 38
ERROR - 2018-07-04 13:27:44 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 40
ERROR - 2018-07-04 13:27:44 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 81
ERROR - 2018-07-04 13:28:03 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 38
ERROR - 2018-07-04 13:28:03 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 40
ERROR - 2018-07-04 13:28:03 --> Severity: Notice --> Undefined variable: blogs C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 81
ERROR - 2018-07-04 13:29:11 --> Severity: Notice --> Undefined index: descricao C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 81
ERROR - 2018-07-04 13:33:57 --> Severity: Notice --> Undefined variable: imagens C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 87
ERROR - 2018-07-04 13:34:27 --> Severity: Notice --> Undefined variable: imagens C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 84
ERROR - 2018-07-04 13:37:23 --> Severity: Warning --> Illegal string offset 'img_galeria_thumb' C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 88
ERROR - 2018-07-04 13:37:23 --> Severity: Warning --> Illegal string offset 'id_gal_img' C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 88
ERROR - 2018-07-04 13:37:23 --> Severity: Warning --> Illegal string offset 'img_galeria_thumb' C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 88
ERROR - 2018-07-04 13:37:23 --> Severity: Warning --> Illegal string offset 'id_gal_img' C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 88
ERROR - 2018-07-04 13:37:23 --> Severity: Warning --> Illegal string offset 'img_galeria_thumb' C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 88
ERROR - 2018-07-04 13:37:23 --> Severity: Warning --> Illegal string offset 'id_gal_img' C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 88
ERROR - 2018-07-04 13:37:23 --> Severity: Warning --> Illegal string offset 'img_galeria_thumb' C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 88
ERROR - 2018-07-04 13:37:23 --> Severity: Warning --> Illegal string offset 'id_gal_img' C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 88
ERROR - 2018-07-04 13:37:23 --> Severity: Warning --> Illegal string offset 'img_galeria_thumb' C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 88
ERROR - 2018-07-04 13:37:23 --> Severity: Warning --> Illegal string offset 'id_gal_img' C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 88
ERROR - 2018-07-04 13:37:23 --> Severity: Warning --> Illegal string offset 'img_galeria_thumb' C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 88
ERROR - 2018-07-04 13:37:23 --> Severity: Warning --> Illegal string offset 'id_gal_img' C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 88
ERROR - 2018-07-04 13:37:23 --> Severity: error --> Exception: Class 'CI_Controller' not found C:\xampp\htdocs\clubetaurus\system\core\CodeIgniter.php 369
ERROR - 2018-07-04 13:58:31 --> Severity: Notice --> Undefined index: img_prod_thumb C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 90
ERROR - 2018-07-04 13:58:31 --> Severity: Notice --> Undefined index: img_prod C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 90
ERROR - 2018-07-04 13:58:31 --> Severity: Notice --> Undefined index: img_prod_thumb C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 90
ERROR - 2018-07-04 13:58:31 --> Severity: Notice --> Undefined index: img_prod C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 90
ERROR - 2018-07-04 13:58:31 --> Severity: Notice --> Undefined index: img_prod_thumb C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 90
ERROR - 2018-07-04 13:58:31 --> Severity: Notice --> Undefined index: img_prod C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 90
ERROR - 2018-07-04 13:58:31 --> Severity: Notice --> Undefined index: img_prod_thumb C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 90
ERROR - 2018-07-04 13:58:31 --> Severity: Notice --> Undefined index: img_prod C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\editar.php 90
ERROR - 2018-07-04 13:58:31 --> Severity: error --> Exception: Class 'CI_Controller' not found C:\xampp\htdocs\clubetaurus\system\core\CodeIgniter.php 369
ERROR - 2018-07-04 13:58:31 --> Severity: error --> Exception: Class 'CI_Controller' not found C:\xampp\htdocs\clubetaurus\system\core\CodeIgniter.php 369
ERROR - 2018-07-04 16:34:13 --> Severity: Notice --> Undefined index: id_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 12
ERROR - 2018-07-04 16:34:13 --> Severity: Notice --> Undefined index: deleted_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 16
ERROR - 2018-07-04 16:34:13 --> Severity: Notice --> Undefined index: id_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 21
ERROR - 2018-07-04 16:34:13 --> Severity: Notice --> Undefined index: id_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 26
ERROR - 2018-07-04 16:34:13 --> Severity: Notice --> Undefined index: titulo_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 41
ERROR - 2018-07-04 16:34:13 --> Severity: Notice --> Undefined index: descricao_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 47
ERROR - 2018-07-04 16:34:13 --> Severity: Notice --> Undefined index: descricao_categoria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 53
ERROR - 2018-07-04 16:34:13 --> Severity: Notice --> Undefined index: deleted_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 59
ERROR - 2018-07-04 16:34:21 --> Severity: Notice --> Undefined index: id_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 12
ERROR - 2018-07-04 16:34:21 --> Severity: Notice --> Undefined index: deleted_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 16
ERROR - 2018-07-04 16:34:21 --> Severity: Notice --> Undefined index: id_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 21
ERROR - 2018-07-04 16:34:21 --> Severity: Notice --> Undefined index: id_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 26
ERROR - 2018-07-04 16:34:21 --> Severity: Notice --> Undefined index: titulo_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 41
ERROR - 2018-07-04 16:34:21 --> Severity: Notice --> Undefined index: descricao_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 47
ERROR - 2018-07-04 16:34:21 --> Severity: Notice --> Undefined index: descricao_categoria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 53
ERROR - 2018-07-04 16:34:21 --> Severity: Notice --> Undefined index: deleted_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 59
ERROR - 2018-07-04 16:34:33 --> Severity: Notice --> Undefined index: id_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 12
ERROR - 2018-07-04 16:34:33 --> Severity: Notice --> Undefined index: deleted_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 16
ERROR - 2018-07-04 16:34:33 --> Severity: Notice --> Undefined index: id_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 21
ERROR - 2018-07-04 16:34:33 --> Severity: Notice --> Undefined index: id_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 26
ERROR - 2018-07-04 16:34:33 --> Severity: Notice --> Undefined index: titulo_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 41
ERROR - 2018-07-04 16:34:33 --> Severity: Notice --> Undefined index: descricao_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 47
ERROR - 2018-07-04 16:34:33 --> Severity: Notice --> Undefined index: descricao_categoria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 53
ERROR - 2018-07-04 16:34:33 --> Severity: Notice --> Undefined index: deleted_galeria C:\xampp\htdocs\clubetaurus\application\views\painel\galeria\visualizar.php 59
ERROR - 2018-07-04 16:35:40 --> Severity: Notice --> Undefined variable: galeria_imagens C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 343
ERROR - 2018-07-04 16:35:40 --> Severity: Notice --> Undefined variable: galeria_imagens C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 344
ERROR - 2018-07-04 16:37:38 --> Severity: error --> Exception: Call to undefined method Galeria_Model::excluirFoto() C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 91
ERROR - 2018-07-04 16:41:00 --> Severity: error --> Exception: Call to undefined method Galeria_Model::excluirFoto() C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 91
ERROR - 2018-07-04 16:41:31 --> Severity: error --> Exception: Call to undefined method Galeria_Model::excluirFoto() C:\xampp\htdocs\clubetaurus\application\controllers\Painel\Galeria.php 91
