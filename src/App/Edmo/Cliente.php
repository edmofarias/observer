<?php

namespace App\Edmo;

use SplSubject;

class Cliente implements \SplObserver
{
    /**
     * @var string
     */
    protected $nome;

    /**
     * @param $nome
     */
    function __construct($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param SplSubject $subject
     */
    public function update(SplSubject $subject)
    {
        print 'O Cliente '.$this->getNome().' recebeu a notificação do produto '
            .$subject->getNome().' por R$ '.$subject->getValor()."\n";
    }

}