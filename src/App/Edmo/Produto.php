<?php

namespace App\Edmo;

use SplObserver;

class Produto implements \SplSubject
{
    /**
     * @var float
     */
    protected $valor;

    /**
     * @var string
     */
    protected $nome;

    /**
     * @var \ArrayObject
     */
    protected $clientes;

    /**
     * @param $valor
     * @param $nome
     */
    function __construct($nome, $valor)
    {
        $this->valor = $valor;
        $this->nome = $nome;
        $this->clientes = new \ArrayObject();
    }

    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return \ArrayObject
     */
    public function getClientes()
    {
        return $this->clientes;
    }

    /**
     * @param SplObserver $observer
     * @return void
     */
    public function attach(SplObserver $observer)
    {
        $this->clientes->append($observer);
    }

    /**
     * @param SplObserver $observer
     */
    public function detach(SplObserver $observer)
    {

    }

    /**
     *
     */
    public function notify()
    {
        /** @var Cliente $cliente */
        foreach ($this->clientes as $cliente) {
            $cliente->update($this);
        }
    }

    /**
     * @param $valorNovo
     */
    public function mudarPreco($valorNovo)
    {
        $valorAntigo = $this->valor;
        $this->valor = $valorNovo;

        if ($valorNovo < $valorAntigo) {
            $this->notify();
        }
    }
}