<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Varias funcoes uteis para o dia a dia do desenvolvedor
 *
 * @author Fabilei spinelli
 */
class Funcoesuteis {

    function montaArrayString($array) {
        if (is_array($array)) {
            if (sizeof($array) > 0)
                return str_replace(" , ", " ", implode(", ", $array));
            else
                return $array[0];
        }
    }

    function removeMask($string) {
        $string = preg_replace("/\D+/", "", $string);
        return $string;
    }

    function addMaskCNPJ($cnpj) {
        $cnpj = preg_replace("/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/", "\\1.\\2.\\3/\\4-\\5", $cnpj);
        return $cnpj;
    }

    function addMaskCEP($cep) {
        $cnpj = preg_replace("/^(\d{5})(\d{3})$/", "\\1-\\2", $cep);
        return $cnpj;
    }

    function addMaskfone($fone) {
        $fone = preg_replace("/^(\d{2})(\d{4})(\d{4})$/", "(\\1)\\2-\\3", $fone);
        return $fone;
    }

    function addMaskfoneSP($fone) {
        $fone = preg_replace("/^(\d{2})(\d{4})(\d{5})$/", "(\\1)\\2-\\3", $fone);
        return $fone;
    }

    function addMaskCPF($cpf) {
        $cpf = preg_replace("/^(\d{3})(\d{3})(\d{3})(\d{2})$/", "\\1.\\2.\\3-\\4", $cpf);
        return $cpf;
    }

    function addMaskCpfCnpj($var) {
        if ($var) {
            $var = preg_replace("/[^0-9]/", "", $var);
            if (strlen($var) <= 11) {//
                $var = str_pad($var, 11, "0", STR_PAD_LEFT);
                $mask = preg_replace("/^(\d{3})(\d{3})(\d{3})(\d{2})$/", "\\1.\\2.\\3-\\4", $var);
            } else {//00.000.000/0000-00 || 00000000000000 - 
                $var = str_pad($var, 14, "0", STR_PAD_LEFT);
                $mask = preg_replace("/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/", "\\1.\\2.\\3/\\4-\\5", $var);
            }
            return $mask;
        } else
            return false;
    }

    function validaCpfCnpj($var) {
        $var = preg_replace("/[^0-9]/", "", $var);
        if (strlen($var) == 11) {
            if ($this->validaCPF($var))
                return true;
            else
                return false;
        }else {
            if ($this->ValidaCnpj($var))
                return true;
            else
                return false;
        }
    }

    function validaCPF($cpf) {
        //000.000.001-91 valido
        // determina um valor inicial para o digito $d1 e $d2
        // pra manter o respeito ;)
        $d1 = 0;
        $d2 = 0;
        // remove tudo que não seja número
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        // lista de cpf inválidos que serão ignorados
        $ignore_list = array(
            '00000000000',
            '01234567890',
            '11111111111',
            '22222222222',
            '33333333333',
            '44444444444',
            '55555555555',
            '66666666666',
            '77777777777',
            '88888888888',
            '99999999999'
        );
        // se o tamanho da string for dirente de 11 ou estiver
        // na lista de cpf ignorados já retorna false
        if (strlen($cpf) != 11 || in_array($cpf, $ignore_list)) {
            return false;
        } else {
            // inicia o processo para achar o primeiro
            // número verificador usando os primeiros 9 dígitos
            for ($i = 0; $i < 9; $i++) {
                // inicialmente $d1 vale zero e é somando.
                // O loop passa por todos os 9 dígitos iniciais
                $d1 += $cpf[$i] * (10 - $i);
            }
            // acha o resto da divisão da soma acima por 11
            $r1 = $d1 % 11;
            // se $r1 maior que 1 retorna 11 menos $r1 se não
            // retona o valor zero para $d1
            $d1 = ($r1 > 1) ? (11 - $r1) : 0;
            // inicia o processo para achar o segundo
            // número verificador usando os primeiros 9 dígitos
            for ($i = 0; $i < 9; $i++) {
                // inicialmente $d2 vale zero e é somando.
                // O loop passa por todos os 9 dígitos iniciais
                $d2 += $cpf[$i] * (11 - $i);
            }
            // $r2 será o resto da soma do cpf mais $d1 vezes 2
            // dividido por 11
            $r2 = ($d2 + ($d1 * 2)) % 11;
            // se $r2 mair que 1 retorna 11 menos $r2 se não
            // retorna o valor zeroa para $d2
            $d2 = ($r2 > 1) ? (11 - $r2) : 0;
            // retorna true se os dois últimos dígitos do cpf
            // forem igual a concatenação de $d1 e $d2 e se não
            // deve retornar false.
            return (substr($cpf, -2) == $d1 . $d2) ? true : false;
        }
    }

    function ValidaCnpj($str) {
        //00.000.001/0001-36 valido
        if (!preg_match('|^(\d{2,3})\.?(\d{3})\.?(\d{3})\/?(\d{4})\-?(\d{2})$|', $str, $matches))
            return false;

        array_shift($matches);

        $str = implode('', $matches);
        if (strlen($str) > 14)
            $str = substr($str, 1);

        $sum1 = 0;
        $sum2 = 0;
        $sum3 = 0;
        $calc1 = 5;
        $calc2 = 6;

        for ($i = 0; $i <= 12; $i++) {
            $calc1 = $calc1 < 2 ? 9 : $calc1;
            $calc2 = $calc2 < 2 ? 9 : $calc2;

            if ($i <= 11)
                $sum1 += $str[$i] * $calc1;

            $sum2 += $str[$i] * $calc2;
            $sum3 += $str[$i];
            $calc1--;
            $calc2--;
        }

        $sum1 %= 11;
        $sum2 %= 11;

        return ($sum3 && $str[12] == ($sum1 < 2 ? 0 : 11 - $sum1) && $str[13] == ($sum2 < 2 ? 0 : 11 - $sum2)) ? true : false;
        //return ($sum3 && $str[12] == ($sum1 < 2 ? 0 : 11 - $sum1) && $str[13] == ($sum2 < 2 ? 0 : 11 - $sum2)) ? $str : false;
    }

    function get_valid_ip($ip) {
        return preg_match("/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])" .
                "(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/", $ip);
    }

    function get_valid_url($url) {

        $regex = "((https?|ftp)\:\/\/)?"; // Tipo
        $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // usuario e senha
        $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // host ou ip
        $regex .= "(\:[0-9]{2,5})?"; // porta
        $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // url
        $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // query
        $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // ancora

        return preg_match("/^$regex$/", $url);
    }

    function CalcDataHora($data = "", $hora = "") {
        if ($hora == "") {
            $hora = date("H:i:s");
        }
        if ($data == "") {
            $data = date("d/m/Y ");
        } else if ($this->validaData($data, "d")) {
            die("Padrao de data ($data) inválido! - Padrao = 15/01/2007");
        }
        $this->data = explode("/", $data);
        $this->hora = explode(":", $hora);
    }

    /**
     * Funcao para validar uma data em dois padroes (00-00-0000) e (0000-00-00)
     * @param string $data
     */
    function validaData($data) {
        if (trim($data)) {
            if (strstr($data, '-'))
                $op = explode('-', $data);
            else
                $op = explode('/', $data);

            if (strlen($op[0]) == 2) {
                $dia = (int) $op[0];
                $mes = (int) $op[1];
                $ano = (int) $op[2];
            } else {
                $ano = (int) $op[0];
                $mes = (int) $op[1];
                $dia = (int) $op[2];
            }
            if (checkdate($mes, $dia, $ano))
                return true;
            else
                return false;
        }else {
            return false;
        }
    }

    /**
     * Funcao geradora de cpf válidoss
     * @return string com separadores
     */
    function geraCpfSeparadores() {
        $num = array();
        $num[9] = $num[10] = $num[11] = 0;
        for ($w = 0; $w > -2; $w--) {
            for ($i = $w; $i < 9; $i++) {
                $x = ($i - 10) * -1;
                $w == 0 ? $num[$i] = rand(0, 9) : '';
                echo ($w == 0 ? $num[$i] : '');
                ($w == -1 && $i == $w && $num[11] == 0) ?
                                $num[11]+=$num[10] * 2 :
                                $num[10 - $w]+=$num[$i - $w] * $x;
            }
            $num[10 - $w] = (($num[10 - $w] % 11) < 2 ? 0 : (11 - ($num[10 - $w] % 11)));
            echo $num[10 - $w];
        }
        $cpf = $num[0] . $num[1] . $num[2] . '.' . $num[3] . $num[4] . $num[5] . '.' . $num[6] . $num[7] . $num[8] . '-' . $num[10] . $num[11]; //Colocando separadores
        return $cpf;
    }

    /**
     * Funcao geradora de cpf válidos
     * @return string sem separadores
     */
    function geraCpf() {
        $num = array();
        $num[9] = $num[10] = $num[11] = 0;
        for ($w = 0; $w > -2; $w--) {
            for ($i = $w; $i < 9; $i++) {
                $x = ($i - 10) * -1;
                $w == 0 ? $num[$i] = rand(0, 9) : '';
                echo ($w == 0 ? $num[$i] : '');
                ($w == -1 && $i == $w && $num[11] == 0) ?
                                $num[11]+=$num[10] * 2 :
                                $num[10 - $w]+=$num[$i - $w] * $x;
            }
            $num[10 - $w] = (($num[10 - $w] % 11) < 2 ? 0 : (11 - ($num[10 - $w] % 11)));
            return $num[10 - $w];
        }
    }

    /**
     * Formata data do formato AAAAMMDD para DD/MM/AAAA
     * @param type $data
     * @return string
     */
    function DataBVtoDataBR($data) {
        //print_r($data);
        if ($data) {
            $ano = substr($data, 0, 4);
            $mes = substr($data, 4, -2);
            $dia = substr($data, 6, 7);
            $dt_format = $dia . '/' . $mes . '/' . $ano;
            return $dt_format;
        }
    }

    function DataBVMesAno($data) {
        //print_r($data);
        if ($data) {
            $ano = substr($data, 0, 4);
            $mes = substr($data, 4, 6);
            $dt_format = $mes . '/' . $ano;
            return $dt_format;
        }
    }

    function DataBRtoDataDB($data) {
        if ($data) {
            $dt = explode('/', $data);
            $ano = $dt[2];
            $mes = $dt[1];
            $dia = $dt[0];
            $dt_format = $ano . '-' . $mes . '-' . $dia;
            $dt_format = str_replace('--', '', $dt_format);
            return $dt_format;
        }
    }

    function getDiaMesDB($data) {
        if ($data) {
            $dt = explode('-', $data);
            $ano = $dt[0];
            $mes = $dt[1];
            $dia = $dt[2];
            $dt_format = $dia . '/' . $mes;
            return $dt_format;
        }
    }

    function getDataExplodeDB($data) {
        if ($data) {
            $dt = explode('-', $data);
            $ano = $dt[0];
            $mes = $dt[1];
            $dia = $dt[2];
            return $dt;
        }
    }

    function DataHoraDBtoDataBR($data) {
        if ($data) {
            $dt = explode('-', $data);
            $ano = $dt[0];
            $mes = $dt[1];
            $dia = explode(' ', $dt[2]);
            $dia = $dia[0];
            $hora = substr($dt[2], 3);
            return $dia . '/' . $mes . '/' . $ano . ' às ' . $hora;
        }
    }

    function DataHoraBRtoDataBR($data) {
        if ($dt = explode(' ', $data))
            return $dt[0];
    }

    function DataHoraDBtoDataSH($data) {
        if ($data) {
            $dt = explode('-', $data);
            $ano = $dt[0];
            $mes = $dt[1];
            $dia = explode(' ', $dt[2]);
            $dia = $dia[0];
            $hora = substr($dt[2], 3);
            return $dia . '/' . $mes . '/' . $ano;
        }
    }

    function HoraSemData($data) {
        if ($data) {
            $dt = explode('-', $data);
            $ano = $dt[0];
            $mes = $dt[1];
            $dia = explode(' ', $dt[2]);
            $dia = $dia[0];
            $hora = substr($dt[2], 3);
            return $hora;
        }
    }

    function DataHoratoDataSH($data) {
        if ($data) {
            $dt = explode('-', $data);
            $ano = $dt[0];
            $mes = $dt[1];
            $dia = explode(' ', $dt[2]);
            $dia = $dia[0];
            $hora = substr($dt[2], 3);
            return $ano . '-' . $mes . '-' . $dia;
        }
    }

    function FormatMoedatoDB($valor) {
        if ($valor) {
            $tam = strlen($valor);
            if ($tam <= 6) {
                $val = $valor;
            } else {
                $vlr = explode(',', $valor);
                $vlr = $vlr[0] . '' . $vlr[1];
                $val = $vlr;
            }
            return $val;
        }
    }

    /**
     * Funcao para formatar um valor em real, com virgula
     * @access	public
     * @param	$valor
     * @param	string
     * @return	$val
     */
    function Formatvalor($valor) {
        if ($valor) {
            $tam = strlen($valor);
            if ($tam <= 6) {
                $val = $valor;
            } else if (($tam > 6 ) & ($tam <= 11 )) {
                $pos = explode(',', $valor);
                $val = $pos[0] . '' . $pos[1];
            } else if (($tam >= 12 ) & ($tam <= 15 )) {
                $pos = explode(',', $valor);
                $val = $pos[0] . '' . $pos[1] . '' . $pos[2];
            } else {
                $pos = explode(',', $valor);
                $val = $pos[0] . '' . $pos[1] . '' . $pos[2] . '' . $pos[3];
            }
            return $val;
        }
    }

    function DataDBtoDataBR($data) {
        if ($data) {
            $dt = explode('-', $data);
            $ano = $dt[0];
            $mes = $dt[1];
            $dia = $dt[2];
            $dt_format = $dia . '/' . $mes . '/' . $ano;
            return $dt_format;
        }
    }

    function DataDBtoDataBRNoBar($data) {
        if ($data) {
            $dt = explode('-', $data);
            $ano = $dt[0];
            $mes = $dt[1];
            $dia = $dt[2];
            $dt_format = $dia . '-' . $mes . '-' . $ano;
            return $dt_format;
        }
    }

    function MesAnoDBtoBR($data) {
        if ($data) {
            $dt = explode('-', $data);
            $ano = $dt[0];
            $mes = $dt[1];
            $dia = $dt[2];
            $dt_format = $mes . '/' . $ano;
            return $dt_format;
        }
    }

    function DifDataBR($data) {
        if ($data) {
            $ano1 = date('Y');
            $mes1 = date('m');
            $dia1 = date('d');
            $data = explode('/', $data);
            $ano2 = $data[2];
            $mes2 = $data[1];
            $dia2 = $data[0];
            $timestamp1 = mktime(0, 0, 0, $mes1, $dia1, $ano1);
            $timestamp2 = mktime(4, 12, 0, $mes2, $dia2, $ano2);
            $segundos_diferenca = $timestamp1 - $timestamp2;
            $dias_diferenca = $segundos_diferenca / (60 * 60 * 24);
            $dias_diferenca = abs($dias_diferenca);
            $dias_diferenca = floor($dias_diferenca);
            return $dias_diferenca;
        }
    }

    /**
     * Retorna os dias de diferenca entre a data enviada e a data corrente
     * @param string $data Data enviada no padrao Y-m-d
     * @return integer
     */
    function DifDataDB($data) {
        if ($data) {
            $ano1 = date('Y');
            $mes1 = date('m');
            $dia1 = date('d');
            $data = explode('-', $data);
            $ano2 = $data[0];
            $mes2 = $data[1];
            $dia2 = $data[2];
            $timestamp1 = mktime(0, 0, 0, $mes1, $dia1, $ano1);
            $timestamp2 = mktime(4, 12, 0, $mes2, $dia2, $ano2);
            $segundos_diferenca = $timestamp1 - $timestamp2;
            $dias_diferenca = $segundos_diferenca / (60 * 60 * 24);
            $dias_diferenca = abs($dias_diferenca);
            $dias_diferenca = floor($dias_diferenca);
            return $dias_diferenca;
        }
    }

    function FormatMoedaDBtoBR($valor) {
        if ($valor) {
            return number_format($valor, 2, ',', '.');
        }
    }

    function FormatMoedaDB($valor) {
        if ($valor) {
            return number_format($valor, 2, '.', ',');
        }
    }

    function FormatMoeda($valor) {
        if ($valor) {
            return number_format($valor, 2, ',', '.');
        }
    }

    function FormatMesExtenso($mes) {
        switch ($mes) {
            case "01": $mes = "Janeiro";
                break;
            case "02": $mes = "Fevereiro";
                break;
            case "03": $mes = "Março";
                break;
            case "04": $mes = "Abril";
                break;
            case "05": $mes = "Maio";
                break;
            case "06": $mes = "Junho";
                break;
            case "07": $mes = "Julho";
                break;
            case "08": $mes = "Agosto";
                break;
            case "09": $mes = "Setembro";
                break;
            case "10": $mes = "Outubro";
                break;
            case "11": $mes = "Novembro";
                break;
            case "12": $mes = "Dezembro";
                break;
        }
        return $mes;
    }

    function formatEstado($sigla) {
        if ($sigla) {
            switch (strtoupper($sigla)) {
                case "AC":$estado = "ACRE";
                    break;
                case "AL":$estado = "ALAGOAS";
                    break;
                case "AM":$estado = "AMAZONAS";
                    break;
                case "AP":$estado = "AMAPÁ";
                    break;
                case "BA":$estado = "BAHIA";
                    break;
                case "CE":$estado = "CEARÁ";
                    break;
                case "DF":$estado = "DISTRITO FEDERAL";
                    break;
                case "ES":$estado = "ESPÍRITO SANTO";
                    break;
                case "GO":$estado = "GOIÁS";
                    break;
                case "MA":$estado = "MARANHÃO";
                    break;
                case "MG":$estado = "MINAS GERAIS";
                    break;
                case "MS":$estado = "MATO GROSSO DO SUL";
                    break;
                case "MT":$estado = "MATO GROSSO";
                    break;
                case "PA":$estado = "PARÁ";
                    break;
                case "PB":$estado = "PARAÍBA";
                    break;
                case "PE":$estado = "PERNAMBUCO";
                    break;
                case "PI":$estado = "PIAUÍ";
                    break;
                case "PR":$estado = "PARANÁ";
                    break;
                case "RJ":$estado = "RIO DE JANEIRO";
                    break;
                case "RN":$estado = "RIO GRANDE DO NORTE";
                    break;
                case "RO":$estado = "RONDÔNIA";
                    break;
                case "RR":$estado = "RORAIMA";
                    break;
                case "RS":$estado = "RIO GRANDE DO SUL";
                    break;
                case "SC":$estado = "SANTA CATARINA";
                    break;
                case "SE":$estado = "SERGIPE";
                    break;
                case "SP":$estado = "SÃO PAULO";
                    break;
                case "TO":$estado = "TOCANTINS";
                    break;
            }
            return $estado;
        }
    }

    public function remove_acentos($titulo = NULL) {
        $old = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', '}', ']', '°', '+', '(', ')', '*', '#', '@', '!', '#', '$', '%', '¨', ':', '’', '‘', ',');
        $new = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '-por-cento', ' ', ' ', ' ', ' ', ' ');
        return str_replace($old, $new, $titulo);
    }

    public function formata_url($titulo = NULL) {
        $titulo = $this->remove_acentos($titulo);
        return url_title($titulo, 'dash', TRUE); //função do helper url | url_title(DA_ONDE_PEGA_OS_DADOS, O SEPARADOR ENTRE AS PALAVRAS, BOOLEAN TUDO MINUSCULO OU NÃO)
    }

}
