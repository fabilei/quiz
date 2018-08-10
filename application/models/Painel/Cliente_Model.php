<?php

/**
 * Model Cliente
 *
 * @author Fabilei Spinelli
 */
class Cliente_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->load->library('Utilidades');
    }

    public function Cliente() {
        return new Cliente_Model();
    }

    function consultaCpf($cpf){
        $query_ = 'SELECT * FROM cliente ';
        $query_ .= "WHERE cpf = '" . $cpf . "' ";
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function consultaLista(){
        $query_ = 'SELECT * FROM cliente';
        //$query_ .= ' WHERE deleted <> 1 ';
        $query_ .= ' ORDER BY deleted ASC, nome ASC ';
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function consultaCliente($id_cliente){
        $query_ = 'SELECT * FROM vw_cliente ';
        $query_ .= " WHERE id_cliente = '" . $id_cliente . "' ";
        $dados = $this->db->query($query_)->result_array();
        return $dados[0];
    }

    public function salvar($usr) {
        if ($this->db->insert('cliente', $usr))
            return $this->db->insert_id();
    }

    public function salvarVeiculo($veiculo) {
        if ($this->db->insert('veiculo', $veiculo))
            return $this->db->insert_id();
    }

    public function salvarImagens($imagens) {
        if ($this->db->insert('veiculo_imagens', $imagens))
            return $this->db->insert_id();
    }
    
    public function salvarImagensClassificados($imagens) {
        if ($this->db->insert('classificado_imagem', $imagens))
            return $this->db->insert_id();
    }

    public function salvarEdicao($usr) {
        $this->db->where("id_cliente", $usr->id_cliente);
        if ($this->db->update("cliente", $usr))
            return true;
    }

    public function desativarCliente($id_cliente) {
        $query_ = 'UPDATE cliente ';
        $query_ .= "SET deleted = '1' ";
        $query_ .= "WHERE id_cliente = '" . $id_cliente . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function ativarCliente($id_cliente) {
        $query_ = 'UPDATE cliente ';
        $query_ .= "SET deleted = '0' ";
        $query_ .= "WHERE id_cliente = '" . $id_cliente . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function alterarSenha($id_cliente, $senha) {
        $query_ = 'UPDATE cliente ';
        $query_ .= "SET senha = '" . md5($senha) . "' ";
        $query_ .= "WHERE id_cliente = '" . $id_cliente . "' AND deleted <> '1' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function consultaExisteEmailUsuario($email) {
        $query_ = "SELECT * FROM cliente where email = ? ";
        $dados = $this->db->query($query_,array($email))->result();
        return $dados;
    }

    public function consultaLembrarSenha($email) {
        $query_ = "SELECT * FROM cliente where email = ? AND deleted <> '1' ";
        $dados = $this->db->query($query_,array($email))->result();
        return $dados[0];
    }

    public function enviaEmailUsuario($mail) {
        $query_ = "SELECT * FROM cliente WHERE id_usuario = ? AND deleted <> '1' ";
        $dados = $this->db->query($query_, array($mail->id_usuario))->result();
        if ($this->enviaEmail($dados[0]->email, $mail->assunto, $mail->mensagem)) {
            $this->db->where("id_usuario", $mail->id_usuario);
            if ($this->db->update("cliente", array("senha" => md5("123mudar456")))) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function verPassCliente($pass) {
        $query_ = "SELECT * FROM cliente WHERE id_cliente = ? AND senha = ? ";
        $dados = $this->db->query($query_, array($this->session->userdata('id_cliente'), md5($pass)))->result();
        if ($dados) {
            $this->db->where("id_cliente",$this->session->userdata('id_cliente'));
            $this->db->update("cliente", array("conta_removida" => 1,'deleted' => 1));
            return true;
        } else {
            return false;
        }
    }

    public function enviaEmail($email, $assunto, $msg) {
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
        $this->email->message($msg);
        $this->email->reply_to('noreply@noreply.com', 'NAO RESPONDA');

        if (!$this->email->send()) {
//            print_r($this->email->print_debugger());
//            die("NAO ENVIOU");
            return false;
        } else {
//            print_r($this->email->print_debugger());
//            die("ENVIOU");
            return true;
        }
    }

    public function enviaEmailPagamento($email, $assunto, $msg) {
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
        $this->email->message($msg);
        $this->email->reply_to($config['smtp_user'], "Contato");
        if (!$this->email->send(false)) {
//            print_r($this->email->print_debugger());
//            print_r("NAO ENVIOU");
            return false;
        } else {
//            print_r($this->email->print_debugger());
//            print_r("ENVIOU");
            return true;
        }
    }

    public function cancelarPagamento($pagto) {
        $this->db->where("id_pagamento", $pagto->id_pagamento);
        if ($this->db->update("pagamento", $pagto))
            return true;
        return false;
    }

    public function dropDownCliente() {
        $query_ = 'SELECT * FROM cliente ';
        $query_ .= "WHERE deleted <> '1' ";
        $query_ .= "ORDER BY nome ASC ";
        $dados = $this->db->query($query_)->result_array();
        $html = '<select class="form-control selectpicker" data-live-search="true" id="id_cliente" name="id_cliente">';
        $html .= '<option value="0">Selecione</option>';
        foreach ($dados as $cliente) {
            $html .= '<option value="' . $cliente["id_cliente"] . '">' . $cliente["nome"] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function dropDownClienteFiltro() {
        $query_ = 'SELECT * FROM cliente ';
        $query_ .= "WHERE deleted <> '1' ";
        $query_ .= "ORDER BY nome ASC ";
        $dados = $this->db->query($query_)->result_array();
        $html = '<select class="form-control selectpicker" multiple data-live-search="true" data-actions-box="true" id="id_cliente" name="id_cliente" title="Usuário">';
//        $html .= '<option value="0">Usuário</option>';
        foreach ($dados as $cliente) {
            $html .= '<option value="' . $cliente["id_cliente"] . '">' . $cliente["nome"] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function dropDownClienteEdit($id_cliente) {
        $query_ = 'SELECT * FROM cliente ';
        $query_ .= "WHERE deleted <> '1' ";
        $query_ .= "ORDER BY nome ASC ";
        $dados = $this->db->query($query_)->result_array();
        $html = '<select class="form-control selectpicker" data-live-search="true" id="id_cliente" name="id_cliente">';
        $html .= '<option value="0">Selecione</option>';
        foreach ($dados as $cliente) {
            if ($id_cliente == $cliente['id_cliente']) {
                $html .= '<option value="' . $cliente["id_cliente"] . '" selected="selected">' . $cliente["nome"] . '</option>';
            } else {
                $html .= '<option value="' . $cliente["id_cliente"] . '">' . $cliente["nome"] . '</option>';
            }
        }
        $html .= '</select>';
        return $html;
    }

    public function excluirClienteCadastro($id) {
        $this->db->where("id_cliente", $id);
        $this->db->delete("cliente");
    }

    public function consultaListaVeiculos(){
        $query_ = 'SELECT * FROM vw_veiculo_imagem';
        $query_ .= " WHERE id_veiculo IS NOT NULL AND deleted <> 1 ";
        $query_ .= " AND (imagem IS NOT NULL OR img_veiculo IS NOT NULL) ";
        $query_ .= ' ORDER BY random() ';
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function consultaListaVeiculosHome(){
        $query_ = 'SELECT * FROM vw_veiculos_home';
        $query_ .= ' ORDER BY random() ';
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function consultaVeiculo($id_veiculo){
        $query_ = 'SELECT * FROM veiculo';
        $query_ .= " WHERE id_veiculo = '".$id_veiculo."' ";
        $dados = $this->db->query($query_)->result_array();
        return $dados[0];
    }

    public function consultaVeiculoImagens($id_veiculo){
        $query_ = 'SELECT * FROM veiculo_imagens';
        $query_ .= " WHERE id_veiculo = '".$id_veiculo."' ";
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function listaVeiculos($id_cliente){
        $query_ = 'SELECT * FROM vw_veiculo';
        $query_ .= " WHERE id_cliente = '".$id_cliente."' ";
        //$query_ .= " WHERE id_cliente = '21' ";
        $query_ .= ' ORDER BY id_veiculo ASC ';
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function listaCodigosVeiculos($id_cliente){
        $query_ = "SELECT array_to_string(array_agg(distinct id_veiculo),',') AS id_veiculo FROM veiculo";
        $query_ .= " WHERE id_cliente = ".$id_cliente." ";
        //$query_ .= " WHERE id_cliente = '21' ";
        $query_ .= ' ORDER BY id_veiculo ASC ';
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function listaVeiculosImagens($id_veiculo){
        $query_ = 'SELECT * FROM veiculo_imagens';
        $query_ .= " WHERE id_veiculo IN (".$id_veiculo.") ";
        $query_ .= ' ORDER BY id_veiculo ASC ';
        $dados = $this->db->query($query_)->result_array();
        return $dados;
    }

    public function editarClienteSenha($usr) {
        $this->db->where("id_cliente", $usr->id_cliente);
        if ($this->db->update("cliente", $usr))
            return true;
    }

    public function dropDownAnoVeiculo() {
        $query_ = 'SELECT * FROM ano ';
        $query_ .= "ORDER BY descricao ASC ";
        $dados = $this->db->query($query_)->result_array();
        $html = '<select class="selectpicker" data-live-search="true" data-actions-box="true" id="id_anos" name="id_anos[]" title="Anos">';
        $html .= '<option value="0">Anos &nbsp;&nbsp;</option>';
        foreach ($dados as $ano) {
            $html .= '<option value="' . $ano["id_anos"] . '">' . $ano["descricao"] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function dropDownAnoVeiculoCad() {
        $query_ = 'SELECT * FROM ano ';
        $query_ .= "ORDER BY descricao ASC ";
        $dados = $this->db->query($query_)->result_array();
        $html = '<select class="selectpicker" data-live-search="true" data-actions-box="true" id="id_anos" name="id_anos" title="Anos">';
        $html .= '<option value="0">Anos &nbsp;&nbsp;</option>';
        foreach ($dados as $ano) {
            $html .= '<option value="' . $ano["id_anos"] . '">' . $ano["descricao"] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function dropDownModeloVeiculo() {
        $query_ = 'SELECT * FROM modelo ';
        $query_ .= "ORDER BY descricao ASC ";
        $dados = $this->db->query($query_)->result_array();
        $html = '<select class="selectpicker" data-live-search="true" data-actions-box="true" id="id_modelo" name="id_modelo[]" title="Modelos">';
        $html .= '<option value="0">Modelos &nbsp;&nbsp;</option>';
        foreach ($dados as $modelo) {
            $html .= '<option value="' . $modelo["id_modelo"] . '">' . $modelo["descricao"] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function dropDownModeloVeiculoCad() {
        $query_ = 'SELECT * FROM modelo ';
        $query_ .= "ORDER BY descricao ASC ";
        $dados = $this->db->query($query_)->result_array();
        $html = '<select class="selectpicker" data-live-search="true" data-actions-box="true" id="id_modelo" name="id_modelo" title="Modelos">';
        $html .= '<option value="0">Modelos &nbsp;&nbsp;</option>';
        foreach ($dados as $modelo) {
            $html .= '<option value="' . $modelo["id_modelo"] . '">' . $modelo["descricao"] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function dropDownCorVeiculo() {
        $query_ = 'SELECT * FROM cor_veiculo ';
        $query_ .= "ORDER BY descricao ASC ";
        $dados = $this->db->query($query_)->result_array();
        $html = '<select class="selectpicker" data-live-search="true" data-actions-box="true" id="id_cor_vei" name="id_cor_vei[]" title="Cores">';
        $html .= '<option value="0">Cores &nbsp;&nbsp;</option>';
        foreach ($dados as $cor) {
            $html .= '<option value="' . $cor["id_cor_vei"] . '">' . $cor["descricao"] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function dropDownCorVeiculoCad() {
        $query_ = 'SELECT * FROM cor_veiculo ';
        $query_ .= "ORDER BY descricao ASC ";
        $dados = $this->db->query($query_)->result_array();
        $html = '<select class="selectpicker" data-live-search="true" data-actions-box="true" id="id_cor_vei" name="id_cor_vei" title="Cores">';
        $html .= '<option value="0">Cores &nbsp;&nbsp;</option>';
        foreach ($dados as $cor) {
            $html .= '<option value="' . $cor["id_cor_vei"] . '">' . $cor["descricao"] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function salvarVeiculoImagemPrincipal($vinculo) {
        if ($this->db->insert('veiculo_imagem_vinculo', $vinculo))
            return $this->db->insert_id();
    }

    public function excluirVeiculoImagemPrincipal($id_veiculo) {
        $query_ = 'DELETE FROM veiculo_imagem_vinculo ';
        $query_ .= "WHERE id_veiculo = '" . $id_veiculo . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function atualizarImagemVeiculo($id_veiculo, $imagem) {
        $query_ = 'UPDATE veiculo ';
        $query_ .= "SET imagem = '" . $imagem . "' ";
        $query_ .= "WHERE id_veiculo = '" . $id_veiculo . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function atualizarImagemPrincipal($id_veiculo, $id_imagem) {
        $query_ = 'UPDATE veiculo_imagens ';
        $query_ .= "SET principal = 0 ";
        $query_ .= "WHERE id_veiculo = '" . $id_veiculo . "' ";
        $dados = $this->db->query($query_);
        
        $query_ = 'UPDATE veiculo_imagens ';
        $query_ .= "SET principal = 1 ";
        $query_ .= "WHERE id_vei_img = '" . $id_imagem . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function excluirFotoVeiculo($id_imagem, $id_veiculo) {

        $query_ = 'SELECT * FROM veiculo_imagens ';
        $query_ .= "WHERE id_vei_img = '" . $id_imagem . "' AND principal = 1 ";
        $dados = $this->db->query($query_)->result_array();

        if($dados != null){
            $query_ = 'UPDATE veiculo ';
            $query_ .= "SET imagem = '' ";
            $query_ .= "WHERE id_veiculo = '" . $id_veiculo . "' ";
            $dados = $this->db->query($query_);
        }

        $query_ = 'DELETE FROM veiculo_imagem_vinculo ';
        $query_ .= "WHERE id_veiculo = '" . $id_veiculo . "' ";
        $dados = $this->db->query($query_);

        $query_ = 'DELETE FROM veiculo_imagens ';
        $query_ .= "WHERE id_vei_img = '" . $id_imagem . "' ";
        $dados = $this->db->query($query_);
        
        return $dados;
    }

    public function excluirVeiculoAjax($id_veiculo) 
    {
        $query_ = 'DELETE FROM veiculo_imagem_vinculo ';
        $query_ .= "WHERE id_veiculo = '" . $id_veiculo . "' ";
        $dados = $this->db->query($query_);

        $query_ = 'DELETE FROM veiculo_imagens ';
        $query_ .= "WHERE id_veiculo = '" . $id_veiculo . "' ";
        $dados = $this->db->query($query_);

        $query_ = 'DELETE FROM veiculo ';
        $query_ .= "WHERE id_veiculo = '" . $id_veiculo . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function atualizarVeiculo($veiculo)
    {
        $query_ = 'UPDATE veiculo ';
        $query_ .= "SET id_cor = ".$veiculo->id_cor.", ";
        $query_ .= " id_ano = ".$veiculo->id_ano.", ";
        $query_ .= " descricao = '".$veiculo->descricao."', ";
        $query_ .= " id_modelo = ".$veiculo->id_modelo." ";
        $query_ .= "WHERE id_veiculo = '" . $veiculo->id_veiculo . "' ";
        $dados = $this->db->query($query_);
        return $dados;
    }

    public function salvarNotificacao($notificacao)
    {
        if ($this->db->insert('notificacao', $notificacao))
            return $this->db->insert_id();
    }

}
