<?php

class Utilidades extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function enviaEmail($email, $assunto, $msg) {
        $html = $this->layoutEmail($assunto, $msg, $email);
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.clubedotaurus.com.br';
        $config['smtp_port'] = '587';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'noreply@clubedotaurus.com.br';
        $config['smtp_pass'] = 'narnia00@7';
        $config['wordwrap'] = TRUE;
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html';
        $config['validation'] = TRUE;
        $this->email->initialize($config);
        $this->email->from($config['smtp_user'], 'Quiz Trezo');
        $this->email->to(filter_var($email, FILTER_SANITIZE_EMAIL));
        $this->email->subject($assunto);
        $this->email->set_newline("\r\n");
        $this->email->message($html);
        //$this->email->reply_to('noreply@noreply.com', 'NAO RESPONDA');

        if (!$this->email->send()) {
            print_r($this->email->print_debugger());
            echo "NAO ENVIOU";
            die();
            return false;
        } else {
            //print_r($this->email->print_debugger());
            //echo "ENVIOU";
            //die();
            return true;
        }
    }

    public function layoutEmail($assunto, $html, $email = '') {
        $dados = array(
            "titulo_email" => $assunto,
            "email" => $email,
            "texto_email" => "<div> " . $html . "</div>"
            . "<p></p>"
        );
        return $this->load->view('email/layout', $dados, true);
    }

    // $imgOriginal   - './uploads/categoria_conteudo/'
    // $pastaImgThumb - './uploads/categoria_conteudo_thumb/'

    public function novoThumb($img, $imgOriginal, $pastaImgThumb) {
        $config = array();
        $novo_path = $imgOriginal;
        $config['image_library'] = 'gd2';
        $config['source_image'] = $novo_path . $img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = 100;
        $config['new_image'] = $pastaImgThumb;
        $config['width'] = 309;
        $config['height'] = 230;
        $config['master_dim'] = 'width';
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        if (!$this->image_lib->resize()) {
            $error = $this->image_lib->display_errors();
            echo $error;
            return false;
        } else {
            $this->image_lib->clear();
            unset($config);
            return true;
        }
    }

    public function novoMiniThumb($img, $imgOriginal, $pastaImgThumb) {
        $config = array();
        $novo_path = $imgOriginal;
        $config['image_library'] = 'gd2';
        $config['source_image'] = $novo_path . $img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = 100;
        $config['new_image'] = $pastaImgThumb;
        $config['width'] = 225;
        $config['height'] = 160;
        $config['master_dim'] = 'width';
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        if (!$this->image_lib->resize()) {
            $error = $this->image_lib->display_errors();
            echo $error;
            return false;
        } else {
            $this->image_lib->clear();
            unset($config);
            return true;
        }
    }

    public function imagemPrincipal($img, $imgOriginal, $pastaImgThumb, $width, $height) {
        $config = array();
        $novo_path = $imgOriginal;
        $config['image_library'] = 'gd2';
        $config['source_image'] = $novo_path . $img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = 100;
        $config['new_image'] = $pastaImgThumb;
        $config['width'] = $width;
        $config['height'] = $height;
        $config['master_dim'] = 'width';
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        if (!$this->image_lib->resize()) {
            $error = $this->image_lib->display_errors();
            echo $error;
            return false;
        } else {
            $this->image_lib->clear();
            unset($config);
            return true;
        }
    }

    public function imgCartMini($img, $imgOriginal, $pastaImgThumb) {
        $config = array();
        $novo_path = $imgOriginal;
        $config['image_library'] = 'gd2';
        $config['source_image'] = $novo_path . $img;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = 100;
        $config['new_image'] = $pastaImgThumb;
        $config['width'] = 60;
        $config['height'] = 60;
        $config['master_dim'] = 'width';
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        if (!$this->image_lib->resize()) {
            $error = $this->image_lib->display_errors();
            echo $error;
            return false;
        } else {
            $this->image_lib->clear();
            unset($config);
            return true;
        }
    }

    public function removeImage($img, $caminho) {
        if (unlink("./".$caminho."/" . $img)) {
            return true;
        } else {
            return false;
        }
    }

    function aasort(&$array, $key) {
        $sorter = array();
        $ret = array();
        reset($array);
        foreach ($array as $ii => $va) {
            $sorter[$ii] = $va[$key];
        }
        asort($sorter);
        foreach ($sorter as $ii => $va) {
            $ret[$ii] = $array[$ii];
        }
        $array = $ret;
    }

    /**
     * função responsável por estabelecer conexão com a base de dados do cliente.
     */
    public function conectarBaseCliente($userDb, $dataBase) {
        if ($userDb != null && $dataBase != null) {
            //sysvalley03:26a102fbd0@mysql.sysvalley.com.br/sysvalley03
            $senha = $this->clienteDbAcesso($dataBase);
            $dsn = 'mysqli://' . $userDb . ':' . $senha . '@mysql.sysvalley.com.br/' . $dataBase . '?char_set=utf8&dbcollat=utf8_general_ci&cache_on=false&cachedir=&save_queries=true';
            return $this->load->database($dsn, true);
        } else {
            return 'Login e senha inválidos';
        }
    }

    /**
     * função responsável por retornar a senha do banco de dados do cliente
     */
    public function senhaCripto($dataBase, $login, $senha) {
        $database = $this->utilidades->database($dataBase);

        $this->db_cliente = $this->utilidades->conectarBaseCliente($database, $database);

        $query_ = 'SELECT pessoa_razaosocial, pessoa_documento, pessoa_senha ';
        $query_ .= 'FROM pessoa ';
        $query_ .= "WHERE deleted <> 1 ";
        $query_ .= "AND pessoa_usuario <> '' ";
        $query_ .= "AND pessoa_usuario = '" . $login . "' ";
        $query_ .= "AND pessoa_senha = '" . $senha . "' ";

        $dados = $this->db_cliente
                ->query($query_)
                ->result();

        $this->db_cliente->close();

        if ($dados != null) {
            $retorno['database'] = $database;
            $retorno['usuario'] = $dados[0]->pessoa_razaosocial;
            $retorno['documento'] = $dados[0]->pessoa_documento;
            $retorno['senha'] = $dados[0]->pessoa_senha;
            $retorno['falha'] = 'true';
        } else {
            $retorno['falha'] = 'false';
        }
        return $retorno;
    }

    public function criptSenha($senha) {
        if (isset($senha)) {
            $senhaSalt = 'SLT' . $senha . 'V4LY';
            $senhaSha = hash('sha256', $senhaSalt, true);
            $senhaBase64 = base64_encode($senhaSha);

            return $senhaBase64;
        } else {
            return 0;
        }
    }

    /**
     * função responsável por retornar a senha do banco de dados do cliente
     */
    public function clienteDbAcesso($dataBase) {
        if ($dataBase != null) {
            switch ($dataBase) {
                case "sysvalley03":
                    return "26a102fbd0";
                    break;
                default:
                    return "Base de dados n�o encontrada";
            }
        } else {
            return 'Base de dados n�o encontrada';
        }
    }

    /**
     * função responsável por retornar a quantidade de registros para as consultas de TOP
     */
    public function limiteParaConsultasTop() {
        return 10;
    }

    public function database($cnpj) {
        if ($cnpj != null) {
            switch ($cnpj) {
                case "123456":
                    return "sysvalley03";
                    break;
                default:
                    return "sem base";
            }
        } else {
            return 'sem base';
        }
    }

    /**
     * função responsável por verificar os períodos das consultas.
     * Retornar uma string com a parte da SQL pronta para utilizar nas consultas começando com AND.
     */
    public function dataParaConsultas($campoAnoIni = null, $anoIni = null, $campoAnoFim = null, $anoFim = null) {
        $SQL = '';
        $sqlMes = 0;
        $sqlAno = 0;

        // regra para montar a SQL quando todos os filtros são informados
        if ($anoIni != null && $anoFim != null && $anoIni != '' && $anoFim != '') {
            $SQL .= " AND " . $campoAnoIni . " >= '" . $anoIni . "' ";
            $SQL .= " AND " . $campoAnoFim . " <= '" . $anoFim . "' ";
            $sqlMes = 1;
            $sqlAno = 1;
        }

        // regra para montar a SQL quando os filtros de mês não são vazios e são de mesmo valor (iguais)
        if ($anoIni != null && $anoFim != null && $anoIni == $anoFim && $sqlMes == 0) {
            $SQL .= " AND " . $campoAnoFim . " >= '" . $anoIni . "' ";
            $sqlMes = 1;
        }

        //regra individual para ano inicial
        if ($anoIni != null && $anoIni != '' && $sqlAno == 0) {
            $SQL .= " AND " . $campoAnoIni . " >= '" . $anoIni . "' ";
        }
        //regra individual para ano final
        if ($anoFim != null && $anoFim != '' && $sqlMes == 0) {
            $SQL .= " AND " . $campoAnoFim . " <= '" . $anoFim . "' ";
        }

        return $SQL;
    }

    /**
     * função responsável por verificar os períodos das consultas.
     * Retornar uma string com a parte da SQL pronta para utilizar nas consultas começando com WHERE.
     */
    public function dataParaConsultaWhere($campoMes = null, $mesIni = null, $mesFim = null, $campoAno = null, $anoIni = null, $anoFim = null) {
        $SQL = '';
        $sqlMes = 0;
        $sqlAno = 0;

        // regra para montar a SQL quando todos os filtros são informados
        if ($mesIni != null && $mesFim != null && $anoIni != null && $anoFim != null && $anoIni != $anoFim) {
            $SQL .= " WHERE (({$campoMes} BETWEEN {$mesIni} AND 12 AND {$campoAno} = {$anoIni})";
            $SQL .= " OR ({$campoMes} BETWEEN 1 AND {$mesFim} AND {$campoAno} = {$anoFim})";
            $SQL .= " OR ({$campoAno} BETWEEN {$anoIni} + 1 AND {$anoFim} - 1))";
            $sqlMes = 1;
            $sqlAno = 1;
        }

        //depreciado
        //if($mesIni != null && $mesFim != null && $anoIni != null && $anoFim != null)
        //{
        //	$SQL .= " AND to_date(" . $campoAno . " ||'/'|| " . $campoMes . "||'/'||'01/', 'YYYY-MM-DD') between '".$anoIni."-".$mesIni."-01' and '".$anoFim."-".$mesFim."-01' ";
        //	$sqlMes = 1;
        //	$sqlAno = 1;
        //}
        // regra para montar a SQL quando os filtros de mês não são vazios e são de mesmo valor (iguais)
        if ($mesIni != null && $mesFim != null && $mesIni == $mesFim && $sqlMes == 0) {
            $SQL .= ' WHERE ' . $campoMes . ' >= ' . $mesIni;
            $sqlMes = 1;
        }
        // regra para montar SQL para comparação entre anos
        if ($anoIni != null && $anoFim != null && $sqlAno == 0 && $sqlMes == 1) {
            $SQL .= ' AND ' . $campoAno . ' BETWEEN ' . $anoIni . ' AND ' . $anoFim;
            $sqlAno = 1;
        } else if ($anoIni != null && $anoFim != null && $sqlAno == 0 && $sqlMes == 0) {
            $SQL .= ' WHERE ' . $campoAno . ' BETWEEN ' . $anoIni . ' AND ' . $anoFim;
            $sqlAno = 1;
        }

        //regra individual para mês inicial
        if ($mesIni != null && $sqlMes == 0) {
            $SQL .= ' WHERE ' . $campoMes . ' >= ' . $mesIni;
            $sqlMes = 2;
        }

        //regra individual para ano inicial
        if ($anoIni != null && $sqlAno == 0 && $sqlMes == 0) {
            $SQL .= ' WHERE ' . $campoAno . ' >= ' . $anoIni;
            $sqlAno = 2;
        } else if ($anoIni != null && $sqlAno == 0 && $sqlMes == 2) {
            $SQL .= ' AND ' . $campoAno . ' >= ' . $anoIni;
            $sqlAno = 2;
        }

        //regra individual para mês final
        if ($mesFim != null && $sqlMes == 0 && $sqlAno == 0) {
            $SQL .= ' WHERE ' . $campoMes . ' <= ' . $mesFim;
            $sqlMes = 2;
        } else if ($mesFim != null && $sqlMes == 0 && $sqlAno == 2) {
            $SQL .= ' AND ' . $campoMes . ' <= ' . $mesFim;
            $sqlMes = 2;
        } else if ($mesFim != null && $sqlMes == 2 && $sqlAno == 2) {
            $SQL .= ' AND ' . $campoMes . ' <= ' . $mesFim;
            $sqlMes = 2;
        }

        //regra individual para ano final
        if ($anoFim != null && $sqlAno == 0 && $sqlMes == 0) {
            $SQL .= ' WHERE ' . $campoAno . ' <= ' . $anoFim;
        } else if ($anoFim != null && $sqlAno == 2 && $sqlMes == 0) {
            $SQL .= ' AND ' . $campoAno . ' <= ' . $anoFim;
        } else if ($anoFim != null && $sqlAno == 2 && $sqlMes == 2) {
            $SQL .= ' AND ' . $campoAno . ' <= ' . $anoFim;
        }

        return $SQL;
    }

}
