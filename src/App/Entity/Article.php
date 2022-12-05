<?php

namespace App\Entity;

class Article
{

    //Une constante, c'est comme une propriete de classe mais accessible
    // seulement en lecture. Sa valeur ne peut jamais etre modifiée, ni à
    // l'exterieur ni a l'interieur de la class. par defaut une constante est
    // publique.
    const REMISE_MAX = 20;

    // variable de class
    private static $remise = 10;

    // methode de class
    public static function setRemise($remise){
        self::$remise = (int)$remise;
    }

    public static function getRemise(){
        return self::$remise;
    }



    /**
     * @var string $reference référence de l'article
     */
    private $reference;

    /**
     * @var string $tradeName nom commercial de l'article
     */
    private $tradeName;

    /**
     * @var float $price prix de l'article
     */
    private $price;

    // Méthode d'objet : méthode qui agit uniquement sur l'objet courant
    // (désigné par $this)
    // c'est le cas des mutateurs et des accesseurs (getters et des setters)
    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getTradeName(): string
    {
        return $this->tradeName;
    }

    /**
     * @param string $tradeName
     */
    public function setTradeName(string $tradeName): void
    {
        $this->tradeName = $tradeName;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    // D'autre méthodes d'objet

    /**
     * @param int $percent
     */
    public function increasePrice(int $percent): void
    {
        $this->price = $this->price * (1 + $percent / 100);
    }

    public function decreasePrice(int $percent): void
    {
        $this->price = $this->price * (1 - $percent / 100);
    }

    // mauvaise facon de faire, le nom de la méthode n'est pas clair par
    // rapport a ce qui est fait
    private function generateReference()
    {
        $words = explode(' ', $this->tradeName);
        $letters = '';
        foreach ($words as $word) {
            $letters .= strtoupper(substr($word, 0, 1));
        }
        return $letters;
    }

    public function autoAssignmentReference()
    {
        $this->reference = $this->generateReference();
    }

    public function getPriceAfterDiscount()
    {
        return $this->price * (1 - Article::$remise / 100);
    }

}