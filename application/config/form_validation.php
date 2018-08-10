<?php

$config = array(
    'cartao/CartaoCielo/cadastroPremium' => array(
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required|min_length[3]|max_length[250]'
        ),
        array(
            'field' => 'cpf',
            'label' => 'CPF',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'whatsapp',
            'label' => 'Telefone',
            'rules' => 'required'
        ),
        array(
            'field' => 'cod_estado',
            'label' => 'Estado',
            'rules' => 'required'
        ),
        array(
            'field' => 'cod_cidade',
            'label' => 'Cidade',
            'rules' => 'required'
        ),
        array(
            'field' => 'id_plano',
            'label' => 'Plano',
            'rules' => 'required'
        )
    ),
    'cartao/CartaoCielo/cadastroBasico' => array(
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required|min_length[3]|max_length[250]'
        ),
        array(
            'field' => 'cpf',
            'label' => 'CPF',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'whatsapp',
            'label' => 'Telefone',
            'rules' => 'required'
        ),
        array(
            'field' => 'cod_estado',
            'label' => 'Estado',
            'rules' => 'required'
        ),
        array(
            'field' => 'cod_cidade',
            'label' => 'Cidade',
            'rules' => 'required'
        ),
        array(
            'field' => 'id_plano',
            'label' => 'Plano',
            'rules' => 'required'
        )
    ),
    'Home/faleConosco' => array(
        array(
            'field' => 'nome',
            'label' => 'Nome',
            'rules' => 'required|min_length[3]|max_length[250]'
        ),
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'assunto',
            'label' => 'Assunto',
            'rules' => 'required|min_length[3]|max_length[250]'
        ),
        array(
            'field' => 'mensagem_fale_conosco',
            'label' => 'Mensagem',
            'rules' => 'required|min_length[3]'
        ),
        array(
            'field' => 'g-recaptcha-response',
            'label' => 'Capctha precisa ser marcado,',
            'rules' => 'required'
        )
    )
);
